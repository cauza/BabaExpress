<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Str;
use DB;
use App\Mail\CustomerRegisterMail;
use Mail;

class LoginController extends Controller
{
    public function loginForm()
    {
        if (auth()->guard('customer')->check()) return redirect(route('customer.dashboard'));
        return view('mitra.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:customers,email',
            'password' => 'required|string'
        ]);

        $auth = $request->only('email', 'password');
        $auth['status'] = 1;


        if (auth()->guard('customer')->attempt($auth)) {
            return redirect()->intended(route('customer.dashboard'));
        }

        return redirect()->back()->with(['error' => 'Email / Password Salah']);
    }
    

    public function registerForm()
    {
        if (auth()->guard('customer')->check()) return redirect(route('customer.dashboard'));
        return view('mitra.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'customer_name' => 'required|string|max:100',
            'customer_phone' => 'required',
            'email' => 'required|email',
            'customer_address' => 'required|string',
            'password'  =>  'required|min:6|confirmed'
        ]);


        DB::beginTransaction();
        try {
            $customer = Customer::where('email', $request->email)->first();

            if (!auth()->guard('customer')->check() && $customer) {
                return redirect()->back()->with(['error' => 'Email sudah terdaftar, silahkan Login Terlebih Dahulu']);
            }

            if (!auth()->guard('customer')->check()) {
                $customer = Customer::create([
                    'name' => $request->customer_name,
                    'email' => $request->email,
                    'password' => $request->password,
                    'phone_number' => $request->customer_phone,
                    'address' => $request->customer_address,
                    'activate_token' => Str::random(30),
                    'status' => false
                ]);
            }

            DB::commit();
            if (!auth()->guard('customer')->check()) {
                Mail::to($request->email)->send(new CustomerRegisterMail($customer, $request->password));
            }
            return redirect(route('customer.registersuccess'))->with(['success' => 'Pendaftaran Berhasil, silahkan periksa email untuk verifikasi']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }


    }

    public function registersuccess()
    {
        return view('mitra.registersuccess');
    }

    public function verifyCustomerRegistration($token)
    {
        $customer = Customer::where('activate_token', $token)->first();
        if ($customer) {
            $customer->update([
                'activate_token' => null,
                'status' => 1
            ]);
            return redirect(route('customer.login'))->with(['success' => 'Verifikasi Berhasil, Silahkan Login']);
        }
        return redirect(route('customer.login'))->with(['error' => 'Invalid Verifikasi Token']);
    }

    public function logout()
    {
        auth()->guard('customer')->logout(); //JADI KITA LOGOUT SESSION DARI GUARD CUSTOMER
        return redirect(route('frontpage'));
    }

    public function dashboard()
    {
        $orders = Order::selectRaw('COALESCE(sum(CASE WHEN status = 0 THEN subtotal END), 0) as pending, 
        COALESCE(sum(CASE WHEN status = 0 THEN cost END), 0) as ongkir,
        COALESCE(sum(CASE WHEN status = 0 THEN discount END), 0) as discount,
        COALESCE(count(CASE WHEN status = 3 THEN subtotal END), 0) as shipping,
        COALESCE(count(CASE WHEN status = 4 THEN subtotal END), 0) as completeOrder')
        ->where('customer_id', auth()->guard('customer')->user()->id)->get();

        return view('mitra.dashboard', compact('orders'));
    }
}

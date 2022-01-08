<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Driver;
use Illuminate\Support\Str;
use DB;
use App\Mail\DriverRegisterMail;
use Mail;

class LoginController extends Controller
{
    public function loginForm()
    {
        if (auth()->guard('driver')->check()) return redirect(route('driver.dashboard'));
        return view('driver.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:drivers,email',
            'password' => 'required|string'
        ]);

        $auth = $request->only('email', 'password');
        $auth['status'] = 1;


        if (auth()->guard('driver')->attempt($auth)) {
            return redirect()->intended(route('driver.dashboard'));
        }

        return redirect()->back()->with(['error' => 'Email / Password Salah']);
    }


    public function registerForm()
    {
        if (auth()->guard('driver')->check()) return redirect(route('driver.dashboard'));
        return view('driver.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'driver_name' => 'required|string|max:100',
            'driver_phone' => 'required',
            'email' => 'required|email',
            'password'  =>  'required|min:6|confirmed'
        ]);


        DB::beginTransaction();
        try {
            $driver = Driver::where('email', $request->email)->first();

            if (!auth()->guard('driver')->check() && $driver) {
                return redirect()->back()->with(['error' => 'Email sudah terdaftar, silahkan Login Terlebih Dahulu']);
            }

            if (!auth()->guard('driver')->check()) {
                $driver = Driver::create([
                    'name' => $request->driver_name,
                    'email' => $request->email,
                    'password' => $request->password,
                    'phone_number' => $request->driver_phone,
                    'activate_token' => Str::random(30),
                    'status' => false
                ]);
            }

            DB::commit();
            Mail::to($request->email)->send(new DriverRegisterMail($driver, $request->password));
            return redirect(route('driver.registersuccess'))->with(['success' => 'Pendaftaran Berhasil, silahkan periksa email untuk verifikasi']);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function registersuccess()
    {
        return view('driver.registersuccess');
    }

    public function dashboard()
    {
        $data = auth()->guard('driver')->user();
        return view('driver.index', compact('data'));
    }

    public function verifyDriverRegistration($token)
    {
        $driver = Driver::where('activate_token', $token)->first();
        if ($driver) {
            $driver->update([
                'activate_token' => null,
                'status' => 1
            ]);
            return redirect(route('driver.login'))->with(['success' => 'Verifikasi Berhasil, Silahkan Login']);
        }
        return redirect(route('driver.login'))->with(['error' => 'Invalid Verifikasi Token']);
    }

    public function logout()
    {
        auth()->guard('driver')->logout();
        return redirect(route('frontpage'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;


class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.customer.index', compact('customers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'phone_number' => 'required',
            'email' => 'required|email|unique:customers',
            'address' => 'required|string',
            'password'  =>  'required|min:6'
        ]);

        Customer::create([
            'id' => Str::random(36),
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'status' => true
        ]);

        return redirect(route('mitra.index'))->with(['success' => 'Pengguna baru ditambahkan!']);
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('admin.customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'phone_number' => 'required',
            'email' => ['required', 'email', Rule::unique('customers', 'email')->ignore($customer)],
            'address' => 'required|string'
        ]);


        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect(route('mitra.index'))->with(['success' => 'Data pengguna berhasil diperbarui!']);
    }

    public function editPass($id)
    {
        $customer = Customer::find($id);
        return view('admin.customer.editpass', compact('customer'));
    }

    public function updatePassword(Request $request, $id)
    {
        $customer = Customer::find($id);
        $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $customer->update([
            'password' => $request->password,
        ]);

        return redirect(route('mitra.index'))->with(['success' => 'Password pengguna berhasil diperbarui!']);
    }

    public function destroy($id)
    {
        $customer = customer::withCount(['order'])->find($id);
        if ($customer->order_count == 0) {
            $customer->delete();
            return redirect(route('mitra.index'))->with(['success' => 'Data pengguna berhasil dihapus!']);
        }
        return redirect(route('mitra.index'))->with(['error' => 'Mitra ini memiliki riwayat pesanan!']);
    }
}

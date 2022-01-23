<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Driver;
use Illuminate\Validation\Rule;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.driver.index', compact('drivers'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:20',
            'email' => 'required|email|unique:drivers',
            'password' => 'required|string|min:8',
            'phone_number' => 'required'
        ]);

       
        Driver::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_number' => $request->phone_number,
            'status' => true
        ]);

        return redirect(route('driver.index'))->with(['success' => 'Driver baru ditambahkan!']);
    }

    public function edit($id)
    {
        $driver = Driver::find($id);
        return view('admin.driver.edit', compact('driver'));
    }

    public function update(Request $request, $id)
    {
        $driver = Driver::find($id);
        $this->validate($request, [
            'name' => 'required|string|max:20',
            'email' => ['required', 'email', Rule::unique('drivers', 'email')->ignore($driver)],
            'phone_number' => 'required'
        ]);


        $driver->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return redirect(route('driver.index'));
    }

    public function editPass($id)
    {
        $driver = Driver::find($id);
        return view('admin.driver.editpass', compact('driver'));
    }

    public function updatePassword(Request $request, $id)
    {
        $driver = Driver::find($id);
        $this->validate($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $driver->update([
            'password' => $request->password,
        ]);

        return redirect(route('driver.index'))->with(['success' => 'Password driver berhasil diperbarui!']);
    }

    public function destroy($id)
    {
        $driver = Driver::withCount(['ordertrack'])->find($id);
        if ($driver->ordertrack_count == 0) {
            $driver->delete();
            return redirect(route('driver.index'))->with(['success' => 'Data driver berhasil dihapus!']);
        }
        return redirect(route('driver.index'))->with(['error' => 'Driver ini memiliki riwayat pengantaran!']);
    }
}

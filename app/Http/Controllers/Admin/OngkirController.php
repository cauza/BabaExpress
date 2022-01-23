<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ongkir;

class OngkirController extends Controller
{
    public function index()
    {
        $ongkirs = Ongkir::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.ongkir.index', compact('ongkirs'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kecamatan' => 'required|string|max:50',
            'ongkir' => 'required|integer'
        ]);

        Ongkir::create($request->except('_token'));
        return redirect(route('ongkir.index'))->with(['success' => 'Ongkir baru ditambahkan!']);
    }

    public function edit($id)
    {
        $ongkir = Ongkir::find($id);
        return view('admin.ongkir.edit', compact('ongkir'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kecamatan' => 'required|string|max:50',
            'ongkir' => 'required|integer'
        ]);

        $ongkir = Ongkir::find($id);
        $ongkir->update([
            'kecamatan' => $request->kecamatan,
            'ongkir' => $request->ongkir,
        ]);

        return redirect(route('ongkir.index'))->with(['success' => 'Data ongkir diperbarui!']);
    }

    public function destroy($id)
    {
        $ongkir = Ongkir::find($id);
        $ongkir->delete();
        return redirect(route('ongkir.index'))->with(['success' => 'Data Ongkir Dihapus!']);
       
    }
}

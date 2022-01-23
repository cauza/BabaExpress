<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderTrack;
use App\Ongkir;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DriverController extends Controller
{
   public function order() 
   {
       $orders = Order::orderBy('id', 'ASC')->where('status','0')->paginate(10);
       return view('driver.order', compact('orders'));
   }

    public function history()
    {
        $driver_id = auth()->guard('driver')->id();
        $orders = OrderTrack::orderBy('created_at', 'DESC')->where('driver_id','=', $driver_id)->paginate(10);
        return view('driver.history', compact('orders'));
    }

    public function detailOrder($id){
        $orders = Order::find($id);
        if ($orders!=null){
            return view('driver.detail', compact('orders'));
        }
        return redirect(route('driver.order'));
    }

    public function detailResi($resi)
    {
        $orders = Order::where('resi','=', $resi)->first();
        $tracks  = OrderTrack::where('order_id','=',$orders->id)->orderBy('created_at', 'ASC')->get();
        return view('driver.detailresi', compact('orders','tracks'));
    }

    public function pickup(){
        $kecamatans = Ongkir::orderBy('kecamatan', 'ASC')->get();
        return view('driver.pickup', compact('kecamatans'));
    }

    public function pickupStore(Request $request)
    {
        $this->validate($request, [
            'nama_pengirim' => 'required|string|max:50',
            'alamat_pengirim' => 'required|string|max:250',
            'kontak_pengirim' => 'required|string|max:50',
            'nama_penerima' => 'required|string|max:50',
            'alamat_penerima' => 'required|string|max:250',
            'kontak_penerima' => 'required|string|max:50',
            'nama_barang' => 'required|string|max:50',
            'berat' => 'required|string|max:50',
            'harga' => 'required|string|max:50',
            'volume' => 'required|string|max:50',
            'kecamatan_id' => 'required|integer',
            'ongkir' => 'required|string|max:50'
        ]);

        $resi = Carbon::parse($request->order_date)->format('yymd') . Str::upper(Str::random(6));
        $order = Order::create([
            'resi' => $resi,
            'mitra_id' => $request->mitra_id,
            'nama_pengirim' => $request->nama_pengirim,
            'alamat_pengirim' => $request->alamat_pengirim,
            'kontak_pengirim' => $request->kontak_pengirim,
            'nama_penerima' => $request->nama_penerima,
            'alamat_penerima' => $request->alamat_penerima,
            'kontak_penerima' => $request->kontak_penerima,
            'nama_barang' => $request->nama_barang,
            'berat' => $request->berat,
            'harga' => $request->harga,
            'volume' => $request->volume,
            'kecamatan_id' => $request->kecamatan_id,
            'ongkir' => $request->ongkir,
            'status' => 1,
        ]);

        $driver_id = auth()->guard('driver')->id();
        OrderTrack::create([
            'order_id' => $order->id,
            'driver_id' => $driver_id,
            'status' => 1,
        ]);

        return redirect(route('cetakresi', $resi));
    }

    public function updateStatus($id)
    {
        $order = Order::find($id);

        $order->update([
            'status' => 2,
        ]);

        $driver_id = auth()->guard('driver')->id();
        OrderTrack::create([
            'order_id' => $order->id,
            'driver_id' => $driver_id,
            'status' => 2,
        ]);

        return redirect(route('driver.dashboard'))->with(['success' => 'Password driver berhasil diperbarui!']);
    }

    public function scan()
    {
        return view('driver.scan');
    }

    public function scanresi()
    {
        return view('driver.scanresi');
    }

    public function mitra()
    {
        return view('driver.mitra');
    }

    public function send()
    {
        return view('driver.send');
    }

    public function sendStore(Request $request)
    {
        $order = Order::where('resi','=', $request->resi)->first();
        if ($order != null) {
            return redirect(route('driver.detailresi', $order->resi));
        }
        return view('driver.mitra')->with(['success' => 'Data driver berhasil diperbarui!']);;
    }

    public function pickupmitra($id)
    {
        $customer = Customer::find($id);
        $kecamatans = Ongkir::orderBy('kecamatan', 'ASC')->get();
        if ($customer!=null){
            return view('driver.pickupmitra', compact('customer','kecamatans'));
        }
            return view('driver.mitra');
    }

    public function cekmitra(Request $request)
    {
        $customer = Customer::find($request->mitra_id);
        if ($customer!=null){
            return redirect(route('driver.pickupmitra', $customer->id));
        }
            return view('driver.mitra')->with(['success' => 'Data driver berhasil diperbarui!']);;
    }

    public function cetakresi($resi)
    {
        $resi = $resi;
        return view('driver.resi', compact('resi'));
    }
}

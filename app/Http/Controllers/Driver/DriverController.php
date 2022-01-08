<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use App\Order;
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

    public function detailOrder($id){
        $orders = Order::find($id);
        return view('driver.detail', compact('orders'));
    }

    public function pickup(){
       return view('driver.pickup');
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
            'ongkir' => 'required|string|max:50'
        ]);

        $resi = Carbon::parse($request->order_date)->format('yymd') . Str::upper(Str::random(6));
        $customer_id = auth()->guard('customer')->id();
        Order::create([
            'resi' => $resi,
            'mitra_id' => $customer_id,
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
            'ongkir' => $request->ongkir
        ]);

        return redirect(route('cekresi', $resi));
    }

    public function scan()
    {
        return view('driver.scan');
    }
}

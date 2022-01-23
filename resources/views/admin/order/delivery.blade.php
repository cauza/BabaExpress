@extends('layouts.admin')

@section('title')
    <title>Daftar Order</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Order</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                Daftar Order
                            </h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                                    @if (isset($errors) && $errors->any())
                                        <div class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    @endif

                                    @if (session()->has('failures'))

                                        <table class="table table-danger">
                                            <tr>
                                                <th>Row</th>
                                                <th>Attribute</th>
                                                <th>Errors</th>
                                                <th>Value</th>
                                            </tr>

                                            @foreach (session()->get('failures') as $validation)
                                                <tr>
                                                    <td>{{ $validation->row() }}</td>
                                                    <td>{{ $validation->attribute() }}</td>
                                                    <td>
                                                        <ul>
                                                            @foreach ($validation->errors() as $e)
                                                                <li>{{ $e }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        {{ $validation->values()[$validation->attribute()] }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>

                                    @endif

                          	<!-- FORM UNTUK FILTER DAN PENCARIAN -->
                            <form action="#" method="get">
                                <div class="input-group mb-3 col-md-6 float-right">
                                    <input type="text" name="q" class="form-control" placeholder="Cari..." value="">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit"><i class="fa fa-search" ></i> Cari</button>
                                    </div>
                                </div>
                            </form>
                            <!-- FORM UNTUK FILTER DAN PENCARIAN -->
                          
                          	<!-- TABLE UNTUK MENAMPILKAN DATA ORDER -->
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Mitra</th>
                                            <th>Penerima</th>
                                            <th>Resi</th>
                                            <th>Status</th>
                                            <th>Ongkir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @forelse ($orders as $val)
                                        <tr>
                                            <td>{{ number_format(( $orders->currentPage() - 1) * $orders->perPage() + $loop->iteration) }}</td>
                                            <td>
                                                @if ($val->order->mitra_id == 1)
                                                    Non Mitra
                                                @else
                                                    {{ $val->order->mitra->name }}
                                                @endif
                                            </td>
                                            <td>
                                                <strong>{{ $val->order->nama_penerima }}</strong> <br>
                                                {{ $val->order->alamat_penerima }} <br>
                                                {{ $val->order->kontak_penerima }}
                                            </td>
                                            <td>{{ $val->order->resi }}</td>
                                            <td>{{ $val->status_label }}</td>
                                            <td>Rp. {{ number_format($val->order->ongkir) }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="8" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            
                            {!! $orders->appends(['q' => Request::get('q')])->links() !!}
                            <p>
                            Menampilkan {{ number_format((($orders->currentPage() - 1) * $orders->perPage()) + 1) }} - {{ $orders->currentPage() == $orders->lastPage() ? number_format($orders->total()) : number_format($orders->currentPage() * $orders->perPage()) }} dari {{ number_format($orders->total()) }} data
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
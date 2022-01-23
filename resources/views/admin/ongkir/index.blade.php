@extends('layouts.admin')

@section('title')
    <title>Ongkir</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Daftar Ongkir</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
              	
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Ongkir</h4>
                        </div>
                        <div class="card-body">
                          
                            <form action="{{ route('ongkir.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" name="kecamatan" class="form-control" value="{{ old('kecamatan') }}" required>
                                    <p class="text-danger">{{ $errors->first('kecamatan') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="ongkir">Ongkir</label>
                                    <input type="text" name="ongkir" class="form-control" value="{{ old('ongkir') }}" required>
                                    <p class="text-danger">{{ $errors->first('ongkir') }}</p>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm"><i class="fa fa-plus" ></i> Tambah</button>
                                </div>
                            </form>
                          
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Ongkir</h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                           
                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kecamatan</th>
                                            <th>Ongkir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($ongkirs as $val)
                                        <tr>
                                            <td>{{( $ongkirs->currentPage() - 1) * $ongkirs->perPage() + $loop->iteration }}</td>
                                            <td><strong>{{ $val->kecamatan }}</strong></td>
                                            <td>{{ number_format($val->ongkir) }}</td>
                                            <td>
                                              
                                                 <form action="{{ route('ongkir.destroy', $val->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE') 
                                                    <a href="{{ route('ongkir.edit', $val->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-btn fa-pencil" ></i>  Edit</a>
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-btn fa-trash" ></i>  Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {!! $ongkirs->links() !!}
                            <p>
                            Menampilkan {{ number_format((($ongkirs->currentPage() - 1) * $ongkirs->perPage()) + 1) }} - {{ $ongkirs->currentPage() == $ongkirs->lastPage() ? number_format($ongkirs->total()) : number_format($ongkirs->currentPage() * $ongkirs->perPage()) }} dari {{ number_format($ongkirs->total()) }} ongkir
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
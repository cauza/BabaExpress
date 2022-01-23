@extends('layouts.admin')

@section('title')
    <title>Driver</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Daftar Driver</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
              	
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Driver</h4>
                        </div>
                        <div class="card-body">
                          
                            <form action="{{ route('driver.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ old('email') }}" required>
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control"  required>
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Nomor HP</label>
                                    <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}" required>
                                    <p class="text-danger">{{ $errors->first('phone_number') }}</p>
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
                            <h4 class="card-title">Daftar driver</h4>
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
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Jml Antaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($drivers as $val)
                                        <tr>
                                            <td>{{( $drivers->currentPage() - 1) * $drivers->perPage() + $loop->iteration }}</td>
                                            <td><strong>{{ $val->name }}</strong></td>
                                            <td>{{ $val->email }}</td>
                                            <td></td>
                                            <td>
                                              
                                                 <form action="{{ route('driver.destroy', $val->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE') 
                                                    <a href="{{ route('driver.edit', $val->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-btn fa-pencil" ></i>  Edit</a>
                                                    <a href="{{ route('driverpass.edit', $val->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-btn fa-key" ></i>  Ganti Password</a>
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
                            {!! $drivers->links() !!}
                            <p>
                            Menampilkan {{ number_format((($drivers->currentPage() - 1) * $drivers->perPage()) + 1) }} - {{ $drivers->currentPage() == $drivers->lastPage() ? number_format($drivers->total()) : number_format($drivers->currentPage() * $drivers->perPage()) }} dari {{ number_format($drivers->total()) }} driver
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
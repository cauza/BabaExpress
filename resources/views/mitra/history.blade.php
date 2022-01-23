@extends('layouts.screen')

@section('title')
    History
@endsection

@section('link')
    <a href="{{ route('customer.dashboard') }}"><i class="fas fa-arrow-left"></i></a> 
@endsection

@section('content')
                    <div class="form-order content-left container-xl">
                        @forelse ($orders as $val)
                            <div class="card light-card">
                                <div class="card-body">
                                    {{ $val->resi }} | {!! $val->status_label !!}
                                </div>
                            </div>
                        @empty
                            <p>Tidak ada data</p>                   
                        @endforelse
                    </div>
@endsection



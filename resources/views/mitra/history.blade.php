@extends('layouts.screen')

@section('title')
    History
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



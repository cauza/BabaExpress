@extends('layouts.screen')

@section('title')
    Order History
@endsection

@section('link')
    <a href="{{ route('driver.dashboard') }}"><i class="fas fa-arrow-left"></i></a> 
@endsection

@section('content')
                    <div class="form-order content-left container-xl">
                        @forelse ($orders as $val)
                            <div class="card light-card">
                                <div class="card-body">
                                    <div class="flex-h">
                                        <div>{{ $val->order->resi }}</div><div class="links"><a href="{{ route('order.detail', $val->order->id) }}">Detail</a></div>
                                    </div>
                                    <div>
                                    {!! $val->status_label !!} - {{ $val->created_at}}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>Tidak ada data</p>                   
                        @endforelse
                        <div>
                            {{ $orders->links() }}
                        </div>
                    </div>
@endsection



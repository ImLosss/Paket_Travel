@extends('layouts.admin-layout')

@section('title')
    - Order Detail
@endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('admin.order.index') }}">Orders</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Order Detail</li>
        </ol>
        <h5 class="font-weight-bolder mb-0">Order Detail</h5>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Order</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-2 text-sm">User: <strong>{{ $data->user?->username ?? '-' }}</strong></div>
                            <div class="mb-2 text-sm">Paket: <strong>{{ $data->paket?->name ?? '-' }}</strong></div>
                            <div class="mb-2 text-sm">Quantity: <strong>{{ $data->quantity }}</strong></div>
                            <div class="mb-2 text-sm">Total: <strong>Rp {{ number_format($data->total_price) }}</strong></div>
                            <div class="mb-2 text-sm">Status: <strong>{{ $data->status }}</strong></div>
                            <div class="mb-2 text-sm">Paid: <strong>{{ $data->is_paid ? 'Yes' : 'No' }}</strong></div>
                            <div class="mb-2 text-sm">Created: <strong>{{ optional($data->created_at)->format('Y-m-d H:i') }}</strong></div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-sm mb-1">Proof of payment</div>
                            @if ($data->proof_of_payment)
                                <a href="{{ Storage::url($data->proof_of_payment) }}" target="_blank">
                                    <img src="{{ Storage::url($data->proof_of_payment) }}" alt="proof" style="width: 100%; max-width: 240px; height: 240px; object-fit: cover; border-radius: 8px;">
                                </a>
                            @else
                                <div class="text-sm text-muted">No proof uploaded.</div>
                            @endif
                        </div>
                    </div>

                    <div class="mt-3 d-flex gap-2">
                        <a href="{{ route('admin.order.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('admin.order.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

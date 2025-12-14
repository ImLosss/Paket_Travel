@extends('layouts.admin-layout')

@section('title')
    - Edit Order
@endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('admin.order.index') }}">Orders</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Order</li>
        </ol>
        <h5 class="font-weight-bolder mb-0">Edit Order</h5>
    </nav>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit Order</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="text-sm">User: <strong>{{ $data->user?->username ?? '-' }}</strong></div>
                        <div class="text-sm">Paket: <strong>{{ $data->paket?->name ?? '-' }}</strong></div>
                        <div class="text-sm">Qty: <strong>{{ $data->quantity }}</strong></div>
                        <div class="text-sm">Total: <strong>Rp {{ number_format($data->total_price) }}</strong></div>
                    </div>

                    <div class="mb-3">
                        <div class="text-sm mb-1">Proof of payment</div>
                        @if ($data->proof_of_payment)
                            <a href="{{ Storage::url($data->proof_of_payment) }}" target="_blank">
                                <img src="{{ Storage::url($data->proof_of_payment) }}" alt="proof" style="width: 140px; height: 140px; object-fit: cover; border-radius: 8px;">
                            </a>
                        @else
                            <div class="text-sm text-muted">No proof uploaded.</div>
                        @endif
                    </div>

                    <form action="{{ route('admin.order.update', $data->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="pending" {{ $data->status === 'pending' ? 'selected' : '' }}>pending</option>
                                <option value="completed" {{ $data->status === 'completed' ? 'selected' : '' }}>completed</option>
                                <option value="canceled" {{ $data->status === 'canceled' ? 'selected' : '' }}>canceled</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="is_paid">Paid</label>
                            <select name="is_paid" id="is_paid" class="form-control" required>
                                <option value="0" {{ !$data->is_paid ? 'selected' : '' }}>No</option>
                                <option value="1" {{ $data->is_paid ? 'selected' : '' }}>Yes</option>
                            </select>
                            <small class="text-muted">Tidak bisa set Paid=Yes jika proof belum diupload.</small>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Update Order</button>
                            <a href="{{ route('admin.order.index') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

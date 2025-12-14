@extends('layouts.admin-layout')

@section('title')
    - Edit Fasilitas
@endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('admin.facility.index') }}">Fasilitas</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Fasilitas</li>
        </ol>
        <h5 class="font-weight-bolder mb-0">Edit Fasilitas</h5>
    </nav>
@stop

@section('content')
<div class="col-lg mb-lg-0 mb-4">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h5 class="mb-0">{{ __('Edit Fasilitas') }}</h5>
        </div>
        <div class="card-body pt-4 p-3">
            <form action="{{ route('admin.facility.update', $data->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-validation">
                            <label class="form-control-label">{{ __('Paket') }}</label>
                            <div class="@error('paket_id')border border-danger rounded-3 @enderror">
                                <select class="form-control" name="paket_id" required>
                                    <option value="">Select Paket</option>
                                    @foreach ($pakets as $paket)
                                        <option value="{{ $paket->id }}" {{ (string) old('paket_id', $data->paket_id) === (string) $paket->id ? 'selected' : '' }}>{{ $paket->name }}</option>
                                    @endforeach
                                </select>
                                @error('paket_id')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-validation">
                            <label class="form-control-label">{{ __('Nama Fasilitas') }}</label>
                            <div class="@error('name')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" placeholder="Nama fasilitas" name="name" value="{{ old('name', $data->name) }}" autofocus>
                                @error('name')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save' }}</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

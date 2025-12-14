@extends('layouts.admin-layout')

@section('title')
    - Add Paket
@endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('admin.paket.index') }}">Paket</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Add Paket</li>
        </ol>
        <h5 class="font-weight-bolder mb-0">Paket</h5>
    </nav>
@stop

@section('content')
<div class="col-lg mb-lg-0 mb-4">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h5 class="mb-0">{{ __('Add Paket') }}</h5>
        </div>
        <div class="card-body pt-4 p-3">
            <form action="{{ route('admin.paket.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-validation">
                            <label class="form-control-label">{{ __('Category') }}</label>
                            <div class="@error('category_id')border border-danger rounded-3 @enderror">
                                <select class="form-control" name="category_id">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-validation">
                            <label class="form-control-label">{{ __('Name') }}</label>
                            <div class="@error('name')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" placeholder="Name" name="name" value="{{ old('name') }}" autofocus>
                                @error('name')
                                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group has-validation">
                            <label class="form-control-label">{{ __('Description') }}</label>
                            <div class="@error('description')border border-danger rounded-3 @enderror">
                                <textarea class="form-control" name="description" rows="4" placeholder="Description">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-validation">
                            <label class="form-control-label">{{ __('Thumbnail') }}</label>
                            <div class="@error('thumbnail')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="file" name="thumbnail" accept="image/*">
                                @error('thumbnail')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-validation">
                            <label class="form-control-label">{{ __('Price') }}</label>
                            <div class="@error('price')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="number" name="price" placeholder="Price" min="0" value="{{ old('price') }}">
                                @error('price')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-validation">
                            <label class="form-control-label">{{ __('Departure Date') }}</label>
                            <div class="@error('departure_date')border border-danger rounded-3 @enderror">
                                <input id="departure_date" class="form-control" type="datetime-local" name="departure_date" value="{{ old('departure_date') }}">
                                @error('departure_date')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group has-validation">
                            <label class="form-control-label">{{ __('Return Date') }}</label>
                            <div class="@error('return_date')border border-danger rounded-3 @enderror">
                                <input id="return_date" class="form-control" type="datetime-local" name="return_date" value="{{ old('return_date') }}">
                                @error('return_date')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-control-label">{{ __('Duration (auto)') }}</label>
                            <input id="duration" class="form-control" type="number" name="duration" value="{{ old('duration') }}" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group has-validation">
                            <label class="form-control-label">{{ __('Location') }}</label>
                            <div class="@error('location')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="text" name="location" placeholder="Location" value="{{ old('location') }}">
                                @error('location')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group has-validation">
                            <label class="form-control-label">{{ __('Rating') }}</label>
                            <div class="@error('rating')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="number" name="rating" placeholder="Rating" min="0" value="{{ old('rating') }}">
                                @error('rating')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group has-validation">
                            <label class="form-control-label">{{ __('Quota') }}</label>
                            <div class="@error('quota')border border-danger rounded-3 @enderror">
                                <input class="form-control" type="number" name="quota" placeholder="Quota" min="0" value="{{ old('quota') }}">
                                @error('quota')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Add Paket' }}</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    function recalcDuration() {
        const departure = document.getElementById('departure_date')?.value;
        const ret = document.getElementById('return_date')?.value;
        const durationInput = document.getElementById('duration');

        if (!durationInput) return;
        if (!departure || !ret) {
            durationInput.value = '';
            return;
        }

        const start = new Date(departure);
        const end = new Date(ret);

        if (isNaN(start.getTime()) || isNaN(end.getTime()) || end < start) {
            durationInput.value = '';
            return;
        }

        const dayMs = 1000 * 60 * 60 * 24;
        const diffDays = Math.floor((end - start) / dayMs);
        durationInput.value = Math.max(1, diffDays);
    }

    document.getElementById('departure_date')?.addEventListener('change', recalcDuration);
    document.getElementById('return_date')?.addEventListener('change', recalcDuration);
    recalcDuration();
</script>
@endsection

@extends('layouts.admin-layout')

@section('title')
    - Paket
@endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Paket</li>
        </ol>
        <h5 class="font-weight-bolder mb-0">Paket</h5>
    </nav>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-1 p-3">
            <div class="card-header pb-3">
                <div class="row">
                    <div class="col d-flex align-items-center">
                        <h6>All Paket</h6>
                    </div>
                    <div class="col">
                        <div class="d-flex justify-content-end flex-wrap">
                            <div>
                                <a class="btn bg-gradient-dark mb-0" href="{{ route('admin.paket.create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Paket</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    @csrf
                    <table class="table" id="dataTable3">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Thumbnail</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Category</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Location</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Departure</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Return</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Duration</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Price</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Rating</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Quota</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Fasilitas</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($pakets as $paket)
                                <tr>
                                    <td class="text-sm">{{ $loop->iteration }}</td>
                                    <td class="text-sm">
                                        @if ($paket->thumbnail)
                                            <img src="{{ asset('storage/' . $paket->thumbnail) }}" alt="{{ $paket->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 6px;">
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-sm">{{ $paket->name }}</td>
                                    <td class="text-sm">{{ $paket->category?->name ?? '-' }}</td>
                                    <td class="text-sm">{{ $paket->location }}</td>
                                    <td class="text-sm">{{ optional($paket->departure_date)->format('Y-m-d H:i') }}</td>
                                    <td class="text-sm">{{ optional($paket->return_date)->format('Y-m-d H:i') }}</td>
                                    <td class="text-sm">{{ $paket->duration }}</td>
                                    <td class="text-sm">{{ $paket->price }}</td>
                                    <td class="text-sm">{{ $paket->rating }}</td>
                                    <td class="text-sm">{{ $paket->quota }}</td>
                                    <td class="text-sm">{{ $paket->facilities?->count() ?? 0 }}</td>
                                    <td class="text-sm">
                                        <a href="{{ route('admin.paket.edit', $paket->id) }}"><i class="fa-solid fa-pen-to-square text-secondary"></i></a>
                                        <form id="form_{{ $paket->id }}" action="{{ route('admin.paket.destroy', $paket->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="cursor-pointer fas fa-trash text-danger" onclick="modalHapus({{ $paket->id }})" style="border: none; background: no-repeat;" data-bs-toggle="tooltip" data-bs-original-title="Delete Paket"></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="13" class="text-center text-sm">No paket found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>

    function submit(key) {
        $('#form_'+key).submit();
    }

    function modalHapus(id) {
        Swal.fire({
            title: "Kamu yakin?",
            text: "Kamu tidak akan bisa membatalkannya setelah ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#a1a1a1",
            confirmButtonText: "Ya, hapus saja!"
        }).then((result) => {
            if (result.isConfirmed) {
                submit(id);
            }
        });
    }
</script>
@endsection

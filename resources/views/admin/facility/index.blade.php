@extends('layouts.admin-layout')

@section('title')
    - Fasilitas
@endsection

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Fasilitas</li>
        </ol>
        <h5 class="font-weight-bolder mb-0">Fasilitas</h5>
    </nav>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-1 p-3">
            <div class="card-header pb-3">
                <div class="row">
                    <div class="col d-flex align-items-center">
                        <h6>All Fasilitas</h6>
                    </div>
                    <div class="col">
                        <div class="d-flex justify-content-end flex-wrap">
                            <div>
                                <a class="btn bg-gradient-dark mb-0" href="{{ route('admin.facility.create') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add Fasilitas</a>
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
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Paket</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Nama</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($facilities as $facility)
                                <tr>
                                    <td class="text-sm">{{ $loop->iteration }}</td>
                                    <td class="text-sm">{{ $facility->paket?->name ?? '-' }}</td>
                                    <td class="text-sm">{{ $facility->name }}</td>
                                    <td class="text-sm">
                                        <a href="{{ route('admin.facility.edit', $facility->id) }}"><i class="fa-solid fa-pen-to-square text-secondary"></i></a>
                                        <form id="form_{{ $facility->id }}" action="{{ route('admin.facility.destroy', $facility->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="cursor-pointer fas fa-trash text-danger" onclick="modalHapus({{ $facility->id }})" style="border: none; background: no-repeat;" data-bs-toggle="tooltip" data-bs-original-title="Delete Facility"></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-sm">No fasilitas found.</td>
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

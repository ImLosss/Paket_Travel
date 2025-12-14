<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Paket;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $data['facilities'] = Facility::query()
            ->with('paket')
            ->orderByDesc('id')
            ->get();

        return view('admin.facility.index', $data);
    }

    public function create(Request $request)
    {
        $data['pakets'] = Paket::query()->orderBy('name')->get();
        $data['selectedPaketId'] = $request->filled('paket_id') ? (int) $request->input('paket_id') : null;

        return view('admin.facility.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'paket_id' => ['required', 'integer', 'exists:pakets,id'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        Facility::create($validated);

        return redirect()
            ->route('admin.facility.index')
            ->with([
                'alert' => 'success',
                'message' => 'Fasilitas berhasil ditambahkan.',
            ]);
    }

    public function edit(Facility $facility)
    {
        $data['data'] = $facility->load('paket');
        $data['pakets'] = Paket::query()->orderBy('name')->get();

        return view('admin.facility.edit', $data);
    }

    public function update(Request $request, Facility $facility)
    {
        $validated = $request->validate([
            'paket_id' => ['required', 'integer', 'exists:pakets,id'],
            'name' => ['required', 'string', 'max:255'],
        ]);

        $facility->update($validated);

        return redirect()
            ->route('admin.facility.index')
            ->with([
                'alert' => 'success',
                'message' => 'Fasilitas berhasil diupdate.',
            ]);
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();

        return redirect()
            ->route('admin.facility.index')
            ->with([
                'alert' => 'success',
                'message' => 'Fasilitas berhasil dihapus.',
            ]);
    }
}

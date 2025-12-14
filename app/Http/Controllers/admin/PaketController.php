<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Paket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pakets'] = Paket::query()
            ->with(['category', 'facilities'])
            ->orderByDesc('id')
            ->get();

        return view('admin.paket.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = Category::query()->orderBy('name')->get();

        return view('admin.paket.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'thumbnail' => ['required', 'image', 'max:2048'],
            'price' => ['required', 'numeric', 'min:0'],
            'departure_date' => ['required', 'date'],
            'return_date' => ['required', 'date', 'after_or_equal:departure_date'],
            'location' => ['required', 'string', 'max:255'],
            'rating' => ['required', 'integer', 'min:0'],
            'quota' => ['required', 'integer', 'min:0'],
        ]);

        $validated['duration'] = $this->calculateDuration($validated['departure_date'], $validated['return_date']);
        $validated['thumbnail'] = $request->file('thumbnail')->store('pakets', 'public');

        Paket::create($validated);

        return redirect()
            ->route('admin.paket.index')
            ->with([
                'alert' => 'success',
                'message' => 'Paket berhasil ditambahkan.',
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paket $paket)
    {
        $data['data'] = $paket->load('facilities');
        $data['categories'] = Category::query()->orderBy('name')->get();

        return view('admin.paket.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paket $paket)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'thumbnail' => ['nullable', 'image', 'max:2048'],
            'price' => ['required', 'numeric', 'min:0'],
            'departure_date' => ['required', 'date'],
            'return_date' => ['required', 'date', 'after_or_equal:departure_date'],
            'location' => ['required', 'string', 'max:255'],
            'rating' => ['required', 'integer', 'min:0'],
            'quota' => ['required', 'integer', 'min:0'],
        ]);

        $validated['duration'] = $this->calculateDuration($validated['departure_date'], $validated['return_date']);

        if ($request->hasFile('thumbnail')) {
            if ($paket->thumbnail && Storage::disk('public')->exists($paket->thumbnail)) {
                Storage::disk('public')->delete($paket->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('pakets', 'public');
        }

        $paket->update($validated);

        return redirect()
            ->route('admin.paket.index')
            ->with([
                'alert' => 'success',
                'message' => 'Paket berhasil diupdate.',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paket $paket)
    {
        if ($paket->thumbnail && Storage::disk('public')->exists($paket->thumbnail)) {
            Storage::disk('public')->delete($paket->thumbnail);
        }

        $paket->delete();

        return redirect()
            ->route('admin.paket.index')
            ->with([
                'alert' => 'success',
                'message' => 'Paket berhasil dihapus.',
            ]);
    }

    private function calculateDuration(string $departureDate, string $returnDate): int
    {
        $departure = Carbon::parse($departureDate);
        $return = Carbon::parse($returnDate);

        if ($return->lessThan($departure)) {
            return 1;
        }

        return max(1, $departure->diffInDays($return));
    }
}

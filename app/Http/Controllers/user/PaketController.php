<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index(Request $request)
    {
        $query = Paket::query()->with('category')->orderByDesc('rating');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        if ($request->filled('kategori')) {
            $query->where('category_id', (int) $request->input('kategori'));
        }

        $data['pakets'] = $query->get();
        $data['kategori'] = Category::query()->orderBy('name')->get();
        $data['request'] = $request;

        return view('paket', $data);
    }

    public function show(Paket $paket)
    {
        $paket->load(['category', 'facilities']);

        $data['paket'] = $paket;
        $data['pakets'] = Paket::query()
            ->whereKeyNot($paket->getKey())
            ->orderByDesc('rating')
            ->take(6)
            ->get();

        return view('detail', $data);
    }
}

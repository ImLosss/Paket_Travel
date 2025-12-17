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
}

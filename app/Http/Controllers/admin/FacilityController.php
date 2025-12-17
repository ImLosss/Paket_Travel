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
}

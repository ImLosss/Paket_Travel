<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Paket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::all();
        $data['pakets'] = Paket::orderByDesc('rating')->take(5)->get();
        $data['destinations'] = Paket::query()->distinct()->orderBy('location')->pluck('location');
        $data['categories'] = Category::all();
        $data['durations'] = Paket::query()->distinct()->orderBy('duration')->pluck('duration');

        // dd($data);
        return view('home', $data);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $archive = DB::table('archives')->selectRaw("count(id) as total, kategori")->groupBy(DB::raw("kategori"))->get();
        $kategori = [];
        $label = [];
        $jumlah = 0;
        foreach ($archive as $ar) {
            $kategori[$ar->kategori] = 0;
            $label[] = $ar->kategori;
        }
        foreach ($archive as $ar) {
            $kategori[$ar->kategori] = $ar->total;
            $jumlah += $ar->total;
        }
        return view('dashboard.index', compact('kategori', 'label', 'jumlah'));
    }
}

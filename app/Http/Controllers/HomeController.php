<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Report;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $reports = Report::where('status', '=', 'approved')->paginate(3);

        return view('pages.home', ['reports' => $reports]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descriptions = Description::all();

        return view('landing.home', compact('descriptions'));
    }

    public function colombia()
    {
        $descriptions = Description::all();

        return view('landing.colombia',[
            'section1' => DB::table('descriptions')->where('section', '=', 'section1')->get(),
            'section2' => DB::table('descriptions')->where('section', '=', 'section2')->get(),
            'section3' => DB::table('descriptions')->where('section', '=', 'section3')->get(),
            'section3_1' => DB::table('descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order1'],
            ])->get(),
            'section3_2' => DB::table('descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order2'],
            ])->get(),
            'section3_3' => DB::table('descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order3'],
            ])->get(),
            // 'descriptions' => $descriptions
        ]);
    }
}

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
        return view('landing.home', [
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
        ]);
    }

    public function colombia()
    {
        return view('landing.colombia',[
            'section1' => DB::table('colombia_descriptions')->where('section', '=', 'section1')->get(),
            'section2' => DB::table('colombia_descriptions')->where('section', '=', 'section2')->get(),
            'section3' => DB::table('colombia_descriptions')->where('section', '=', 'section3')->get(),
            'section3_1' => DB::table('colombia_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order1'],
            ])->get(),
            'section3_2' => DB::table('colombia_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order2'],
            ])->get(),
            'section3_3' => DB::table('colombia_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order3'],
            ])->get(),
        ]);
    }

    public function brasil()
    {
        return view('landing.brasil',[
            'section1' => DB::table('brasil_descriptions')->where('section', '=', 'section1')->get(),
            'section2' => DB::table('brasil_descriptions')->where('section', '=', 'section2')->get(),
            'section3' => DB::table('brasil_descriptions')->where('section', '=', 'section3')->get(),
            'section3_1' => DB::table('brasil_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order1'],
            ])->get(),
            'section3_2' => DB::table('brasil_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order2'],
            ])->get(),
            'section3_3' => DB::table('brasil_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order3'],
            ])->get(),
        ]);
    }

    public function argentina()
    {
        return view('landing.argentina',[
            'section1' => DB::table('argentina_descriptions')->where('section', '=', 'section1')->get(),
            'section2' => DB::table('argentina_descriptions')->where('section', '=', 'section2')->get(),
            'section3' => DB::table('argentina_descriptions')->where('section', '=', 'section3')->get(),
            'section3_1' => DB::table('argentina_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order1'],
            ])->get(),
            'section3_2' => DB::table('argentina_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order2'],
            ])->get(),
            'section3_3' => DB::table('argentina_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order3'],
            ])->get(),
        ]);
    }

    public function chile()
    {
        return view('landing.chile',[
            'section1' => DB::table('chile_descriptions')->where('section', '=', 'section1')->get(),
            'section2' => DB::table('chile_descriptions')->where('section', '=', 'section2')->get(),
            'section3' => DB::table('chile_descriptions')->where('section', '=', 'section3')->get(),
            'section3_1' => DB::table('chile_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order1'],
            ])->get(),
            'section3_2' => DB::table('chile_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order2'],
            ])->get(),
            'section3_3' => DB::table('chile_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order3'],
            ])->get(),
        ]);
    }

    public function mexico()
    {
        return view('landing.mexico',[
            'section1' => DB::table('mexico_descriptions')->where('section', '=', 'section1')->get(),
            'section2' => DB::table('mexico_descriptions')->where('section', '=', 'section2')->get(),
            'section3' => DB::table('mexico_descriptions')->where('section', '=', 'section3')->get(),
            'section3_1' => DB::table('mexico_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order1'],
            ])->get(),
            'section3_2' => DB::table('mexico_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order2'],
            ])->get(),
            'section3_3' => DB::table('mexico_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order3'],
            ])->get(),
        ]);
    }

    public function panama()
    {
        return view('landing.panama',[
            'section1' => DB::table('panama_descriptions')->where('section', '=', 'section1')->get(),
            'section2' => DB::table('panama_descriptions')->where('section', '=', 'section2')->get(),
            'section3' => DB::table('panama_descriptions')->where('section', '=', 'section3')->get(),
            'section3_1' => DB::table('panama_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order1'],
            ])->get(),
            'section3_2' => DB::table('panama_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order2'],
            ])->get(),
            'section3_3' => DB::table('panama_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order3'],
            ])->get(),
        ]);
    }

    public function peru()
    {
        return view('landing.peru',[
            'section1' => DB::table('peru_descriptions')->where('section', '=', 'section1')->get(),
            'section2' => DB::table('peru_descriptions')->where('section', '=', 'section2')->get(),
            'section3' => DB::table('peru_descriptions')->where('section', '=', 'section3')->get(),
            'section3_1' => DB::table('peru_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order1'],
            ])->get(),
            'section3_2' => DB::table('peru_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order2'],
            ])->get(),
            'section3_3' => DB::table('peru_descriptions')->where([
                ['section', '=', 'section3'],
                ['order', '=', 'order3'],
            ])->get(),
        ]);
    }
}

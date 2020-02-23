<?php

namespace App\Http\Controllers;

use App\Exports\ArgentinaRegExport;
use App\Exports\BrasilRegExport;
use App\Exports\ChileRegExport;
use App\Exports\ColombiaRegExport;
use App\Exports\MexicoRegExport;
use App\Exports\PanamaRegExport;
use App\Exports\PeruRegExport;
use App\Exports\RegistrationsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RegistrationExport extends Controller
{
    public function export_global()
    {
        return Excel::download(new RegistrationsExport, 'registrations.xlsx');
    }

    public function export_argentina()
    {
        return Excel::download(new ArgentinaRegExport, 'ar_registrations.xlsx');
    }

    public function export_colombia()
    {
        return Excel::download(new ColombiaRegExport, 'co_registrations.xlsx');
    }

    public function export_chile()
    {
        return Excel::download(new ChileRegExport, 'ch_registrations.xlsx');
    }

    public function export_brasil()
    {
        return Excel::download(new BrasilRegExport, 'br_registrations.xlsx');
    }

    public function export_peru()
    {
        return Excel::download(new PeruRegExport, 'pe_registrations.xlsx');
    }

    public function export_panama()
    {
        return Excel::download(new PanamaRegExport, 'pa_registrations.xlsx');
    }

    public function export_mexico()
    {
        return Excel::download(new MexicoRegExport, 'mx_registrations.xlsx');
    }
}

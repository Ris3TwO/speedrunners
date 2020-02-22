<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DescriptionController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    public function index()
    {
        return view('description.index', compact('settings', 'groups', 'active'));
    }
}

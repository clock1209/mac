<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeLocation;

class TypeOfLocationController extends Controller
{
    public function edit(TypeLocation $location)
    {
        return response()->json($location);
    }
}

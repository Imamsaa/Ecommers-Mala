<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UlasanModel;

class UlasanController extends Controller
{
    function index(Request $request)
    {
        $ulasan = new UlasanModel;
        $ulasan->name = $request->name;
        $ulasan->describ = $request->describ;
        $ulasan->rating = $request->rating;
        $ulasan->product_id = $request->id;
        $ulasan->save();
        return redirect()->back();
    }
}

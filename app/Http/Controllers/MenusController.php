<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    public function index()
    {
        return view('menus.menus-index');       
    }
    public function get_data_menus(Request $request)
    {
        $data = Menus::all();
        return response()->json([
            'data'=>$data,
        ]);
    }
}

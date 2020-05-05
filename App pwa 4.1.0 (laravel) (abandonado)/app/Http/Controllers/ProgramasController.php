<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\requests;
use App\Programas;
use Illuminate\Support\Facades\Redirect;
use DB;

class ProgramasController extends Controller
{
    public function __contructor()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $programas=DB::table('programas');
            return view('programas.index',["programas"=>$programas]);
        }
    }
    public function show($id)
    {
        return view("programas.programa",["programas"=>Programas::findOrfail($id)]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cliente;

class IndexController extends Controller
{
    public function index(Request $request){

    	$deudas = DB::table('deudas0')
    		->get();

    	return view('index')
    		->with(compact('deudas'));
    	//dd($cliente);
    }
}

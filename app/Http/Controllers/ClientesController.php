<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cliente;

class ClientesController extends Controller
{
    public function clientes(Request $request){

    	$clientes = DB::table('clientes')
    		->get();

    	return view('clientes')
    		->with(compact('clientes'));
    	//dd($cliente);
    }
} 

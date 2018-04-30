<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Cliente;

class ABMController extends Controller
{   
    //vista agregar
	public function agregar()
    {
        return view('agregar');
    }

    //post cargar cliente
    public function cargar(Request $request){

    	$nombre = $request->input('nombre');
    	$correo = $request->input('email');
    	$tel = $request->input('telefono');
    	$dir = $request->input('direccion');
        $fpago = $request->input('fpago');

    	DB::table('clientes')->insert([
    		['nombre' => $nombre,
    		'direccion' => $dir, 
    		'telefono' => $tel, 
    		'email' => $correo, 
            'fpago' => $fpago,
     		]
		]);

        return "Cliente cargado";
    }

    //vista editar-cliente
    public function vistaeditar(Request $request){
        $cli = $request->input('idcli');
        $clientes = DB::table('clientes')
            ->where('id',$cli)
            ->get();

        return view('editar-cliente')
            ->with(compact('clientes'));
    }

    //post update cliente
    public function update(Request $request){

        $id = $request->input('id');
        $nombre = $request->input('nombre');
        $recibo = $request->input('recibo');
        $poli = $request->input('poliza');
        $correo = $request->input('email');
        $tel = $request->input('telefono');
        $dir = $request->input('direccion');
        $fpago = $request->input('fpago');

        try{
            $cliente = Cliente::find($id);
            $cliente->nombre = $nombre;
            $cliente->recibo = $recibo;
            $cliente->poliza = $poli;
            $cliente->email = $correo;
            $cliente->telefono = $tel;
            $cliente->direccion = $dir;
            $cliente->fpago = $fpago;
            $cliente->save();
            return "Cliente:".$nombre." editado";
        }
        catch(\Exception $e){
            // do task when error
            $error = $e->getMessage();   // insert query
            return "error:".$error;
        }

    }

    //post delete cliente
    public function delete(Request $request){
        
        $id = $request->input('clave');

        DB::table('clientes')->where('id', '=', $id)->delete();

        return "Cliente eliminado";

    }
}

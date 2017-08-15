<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use App\Concepts;

class ConceptsController extends Controller
{
    //

    public function getconcepts()
    {

      // Llamamos al método raw y le pasamos nuestra parte de consulta que queremos realizar.

       $raw = DB::table('concepts')->select('id', 'name')
       ->where('status', '1')
       ->get();


          return Datatables::of($raw)

              ->make(true);
    }

    public function store()
    {

    }

    public function edit(Request $request)
   {
       //return view('role.edit', ['role'=>$id]);

       $cambio = $request->input('tipo');


       if ($cambio=="Eliminar") {
         # code...
           $idconcept = $request->input('val_concepts');
           $idconcept = concepts::find($idconcept);
           $idconcept->status = 0;
           $idconcept->save();
       }
      else if ($cambio=="Agregar") {

          //$idprospecto = $request->input('idprospecto');

          $flight = new Concepts;
          $flight->name = $request->val_name;
          $flight->status = 1;
          $flight->save();


      }

   }

    public function create()
    {
        //return view('view.seguros.index');

    }

    public function index()
    {

       //return view('seguros.agenda');
    }

}

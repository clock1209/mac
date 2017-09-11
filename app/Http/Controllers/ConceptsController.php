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

       $concepts = Concepts::where('status', 1)->get();

       return Datatables::of($concepts)
        ->addColumn('actions', function ($concepts)
        {
            return view('concepts.partials.buttons', ['concepts' => $concepts]);
        })
        ->rawColumns(['actions'])
        ->make(true);
    }

    public function store(Request $request)
    {

          $this->validate($request, $this->rules());

          $concepts = new Concepts;
          $concepts->name = $request->name;
          $concepts->status = 1;
          $concepts->save();

          $msg = [
              'title' => 'Created!',
              'type' => 'success',
              'text' => 'Concepts created successfully.'
          ];

           return redirect('concepts')->with('message', $msg);

    }
    public function edit(Request $request)
    {

       $idconcept = $request->input('val_concepts');
       $idconcept = concepts::find($idconcept);
       $idconcept->status = 0;
       $idconcept->save();

       $msg = [
           'title' => 'Delete!',
           'type' => 'success',
           'text' => 'Concepts deleted successfully.'
       ];

       return redirect('concepts')->with('message', $msg);

   }

    public function create()
    {
        //return view('view.seguros.index');

    }

    public function index(Request $request)
    {
        if(!auth()->user())
         return abort(404);

        if ($request->ajax()) {
         return $this->getconcepts();
       }

       return view('concepts.index');
    }

    private function rules()
    {
        return [
            'name' => 'required|unique:concepts|regex:/^[\pL\s\-]+$/u'
        ];
    }

}

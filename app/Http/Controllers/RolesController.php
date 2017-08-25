<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Datatables;
use Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Entrust;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $aUser = auth()->user();
        if ($request->ajax()) {
            return $this->getBtnDatatable();
        }

        return view('roles.index', ['permisos' => Permission::all(),]);

//        if($aUser->can('see_role')){
//            return view('role.index', ['permisos' => Permission::all(),]);
//        }else{
//            return redirect('/home')->with('unauthorized', "No tiene los permisos necesarios para realizar esa acción.");
//        }

    }

    public function getBtnDatatable()
    {
        $roles = Role::select(['id', 'display_name']);
        return Datatables::of($roles)
            ->addColumn('action', function ($role) {
                return $this->botones($role);
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
    }

    function botones($role)
    {
        $aUser = auth()->user();
        $see_role = "";
        $edit_role = "";
        $delete_role = "";
        $assign_permission = "";
        if ($aUser->can('assign_permission')) {
            $assign_permission =
                '<a data-toggle="modal" rol_id="'. $role->id .'" data-target="#permisos" class="btn btn-primary get-permisos">
                     <i class="glyphicon glyphicon-list"></i>
                      <t class="hidden-xs">Permission</t>
                 </a>';
        }
        if($aUser->can('see_role')){
            $see_role =
                '<a data-toggle="modal" id_rol="'. $role->id .'" data-target="#mostrar_rol" class="btn btn-info get-rol-datos">
                     <i class="glyphicon glyphicon-info-sign"></i> 
                     <t class="hidden-xs">Show</t>
                 </a>';
        }if ($aUser->can('edit_role')) {
        $edit_role =
            '<a href="roles/'.$role->id.'/edit" class="btn btn-primary" id="btnAction">
                <i class="glyphicon glyphicon-edit"></i> 
                <t class="hidden-xs">Edit</t>
             </a>';
    }if ($aUser->can('delete_role')) {
        $delete_role =
            '<a rol_id="'. $role->id .'" class="btn btn-danger " id="btnActionDelete" data-toggle="confirmation">
                <i class="glyphicon glyphicon-remove"></i>
                 <t class="hidden-xs">Delete</t>
             </a>';
    }if($aUser->can('assign_role')){

    }

        return $assign_permission ." ". $see_role ." ". $edit_role ." ". $delete_role;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules());

        Role::create([
            'name' => $request['name'],
            'display_name' => $request['display_name'],
            'description' => $request['description'],
        ]);

        $msg = [
            'title'=>'Role Created!',
            'type'=> 'success',
            'text'=> 'Role Created successfully.',
        ];

        return redirect('roles')->with('message',$msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aUser = auth()->user();
        if($aUser->can('see_role')){
            $role = Role::find($id);

            return Response::json($role);
        }else{
            return redirect('roles.index')->with('unauthorized', "No tiene los permisos necesarios para realizar esa acción.");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aUser = auth()->user();
        if($aUser->can('edit_role')){
            $role = Role::find($id);

            return view('roles.edit', ['role'=>$role]);
        }else{
            return redirect('/roles')->with('unauthorized', "No tiene los permisos necesarios para realizar esa acción");
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules());

        $role = Role::find($id);
        $role->fill($request->all());
        $role->save();

        $msg = [
            'title'=>'Edited!',
            'type'=> 'success',
            'text'=> 'Role Edited successfully.',
        ];

        return Redirect::to('/roles')->with('message',$msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aUser = auth()->user();
        if($aUser->can('delete_role')){
            Role::find($id)->delete();
            $msg = [
                'title'=>'Role Deleted!',
                'type'=> 'success',
                'text'=> 'Role Deleted successfully.',
            ];
            return response()->json($msg);
        }else{
            return redirect('roles');
        }

    }

    private function rules()
    {
        return [
            'name'          => 'required|max:100',
            'display_name'  => 'required|max:100',
            'description'   => 'nullable|max:255',
        ];
    }
}

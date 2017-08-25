<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\RolesPermissions;
use DB;
use App\Permission;
use Illuminate\Support\Facades\Input;
use Response;
use Illuminate\Support\Facades;


class PermissionController extends Controller
{
    protected $permisos;

    public function  __construct() {
        $permisos = Permission::all();
        $this->permisos = $permisos;
    }

    public function index()
    {
        return Response::json($this->getPermisos(Input::get('id')));
    }

    private function getPermisos($id_rol){
        $permisos = array();

        $permisos['permisosAsignados'] = $this->getPermisosAsignados($id_rol);
        return $permisos;

    }

    private function getPermisosAsignados($id_rol){
        $permisosDeRol = RolesPermissions::where('role_id', '=', $id_rol)->get();
        $asignados = array();
        foreach($permisosDeRol as $p){

            foreach ($this->permisos as $key => $value){
                if($value->id == $p->permission_id){
                    $asignados[] = $value;
                }
            }
        }

        return $asignados;
    }

    public function asignar(){
        $rol = Role::find(Input::get('role_id'));
        $rol->attachPermission(Input::get('permission_id'));
        return Response::json('ok');
    }

    public function desasignar(){
        DB::table('permission_role')->where('role_id', '=', Input::get('role_id'))
            ->where('permission_id', '=', Input::get('permission_id'))->delete();

        return Response::json('ok');
    }
}

<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;
use Entrust;
use Illuminate\Support\Facades\Redirect;
use Yajra\Datatables\Facades\Datatables;

class UserController extends Controller
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
            return $this->toDatatable();
        }
        return view('users.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Role::pluck('display_name','id');
        return view('users.create',compact('data'));
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

        $user = new User($request->all());
        $user->password = bcrypt($request['password']);
        $user->signature = $request->file('signature');
        $user->save();
        $user->attachRole($request['role']);
        $msg = [
            'title' => 'Created!',
            'type' => 'success',
            'text' => 'User created successfully.'
        ];

        return redirect('users')->with('message', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User::find($id);
        $data = Role::pluck('display_name','id');
        return view('users.edit',['user'=>$user],compact('data'));
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

        $user= User::find($id);
        $user->fill($request->all());
        $user->password = bcrypt($request['password']);
        DB::table('role_user')->where('user_id',$id)->delete();
        $user->attachRole($request['role']);
        $user->save();

        $msg = [
            'title' => 'Edited!',
            'type' => 'success',
            'text' => 'User edited successfully.'
        ];

        return redirect('users')->with('message', $msg);
    }

    public function userStatus(User $user)
    {
        $user->status = ($user->status == 1) ? 0 : 1;
        $user->save();
        $msg = [
            'title' => 'Deleted!',
            'type' => 'success',
            'text' => 'User deleted successfully.'
        ];
        return response()->json($msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function toDatatable(){

        $users = DB::table('roles')
            ->join('users','users.role','=','roles.id')
            ->select('users.id','users.username','users.email','roles.display_name')
            ->where('users.status','=','1','and','users.id','!=',Auth::user()->id)
            ->get();
            return Datatables::of($users)
                ->addColumn('action', function ($users) {
                    return view('users.partials.buttons', ['users' => $users]);
                })
                ->make(true);

    }

    private function rules()
    {
        return [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirmPass' => 'required'
        ];
    }
}

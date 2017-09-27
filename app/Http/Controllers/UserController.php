<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;
use Entrust;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\Environment\Console;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
        $msgError = 'Confirm password';
        $msgErrorName = 'Username';
        return view('users.create',compact('data','msgError','msgErrorName'));
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

        $usern = User::where('username',$request['username'])
            ->where('status',1)
            ->get();
        if($usern->isEmpty()){
            $user = new User($request->all());

            if( $request->password === $request->confirmPass) {


                $user->password = bcrypt($request['password']);

                /*------------------ save img ------------------*/
                $file = $request->file('signature');
                $filename = $request['username'] . '-' . '.jpg';
                if ($file) {
                    Storage::disk('local')->put($filename, File::get($file));
                }

                $user->signature = $filename;
                $user->save();
                $user->attachRole($request['role']);
                $msg = [
                    'title' => 'Created!',
                    'type' => 'success',
                    'text' => 'User created successfully.'
                ];

                return redirect('users')->with('message', $msg);
            }else{
                $msgErrorName = 'Username';
                $msgError = 'The password doesn\'t match Confirm password';
                $data = Role::pluck('display_name','id');
                return view('users.create',compact('data','msgError','msgErrorName'));
            }
        }else {
            $msgErrorName = 'The username already in use';
            $msgError = 'Confirm passwor';
            $data = Role::pluck('display_name','id');
            return view('users.create',compact('data','msgError','msgErrorName'));

        }
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
        $msgError = 'Confirm password';
        $msgErrorName = 'Username';
        return view('users.edit',['user'=>$user],compact('data','msgError','msgErrorName'));
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
        $this->validate($request, $this->rulesEdit());

        $usern = User::where('username',$request['username'])
            ->where('status',1)
            ->where('id','!=',$id)
            ->get();
        if($usern->isEmpty()) {


            $user = User::find($id);
            $user->fill($request->all());

            if ($request['password'] == '') {
                $user->password = User::find($id)->password;
            } elseif ($request['password'] != '') {
                $user->password = bcrypt($request['password']);
            }

            DB::table('role_user')->where('user_id', $id)->delete();
            $user->attachRole($request['role']);
            /*------------------ save img ------------------*/
            $old_name = $user->username;
            $file = $request->file('signature');
            $filename = $request['username'] . '-' . '.jpg';
            $old_filename = $old_name . '-' . '.jpg';
            $update = false;
            if (Storage::disk('local')->has($old_filename)) {
                $old_file = Storage::disk('local')->get($old_filename);
                Storage::disk('local')->put($filename, $old_file);
                $update = true;
            }
            if ($file) {
                Storage::disk('local')->put($filename, File::get($file));
            }
            if ($update && $old_filename !== $filename) {
                Storage::delete($old_filename);
            }

            $user->signature = $filename;
            $user->save();

            $msg = [
                'title' => 'Edited!',
                'type' => 'success',
                'text' => 'User edited successfully.'
            ];

            return redirect('users')->with('message', $msg);
        }else {
            $user= User::find($id);
            $data = Role::pluck('display_name','id');
            $msgError = 'Confirm password';
            $msgErrorName = 'The username already in use';
            return view('users.edit',['user'=>$user],compact('data','msgError','msgErrorName'));

            }
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

    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
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
    private function rulesEdit()
    {
        return [
            'username' => 'required',
            'email' => 'required|email'
        ];
    }
}

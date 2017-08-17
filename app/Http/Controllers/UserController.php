<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        return view('users.create');
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
        $user->save();

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
        return view('users.edit',['user'=>$user]);
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

//        return Datatables::eloquent(User::query())->make(true);

        $users = User::where('status',1)->get();
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

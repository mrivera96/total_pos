<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Branch;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role->id!=1){
            redirect('/dashboard');
        }
        $title = 'Usuarios';
        $users = User::where('status', 1)->get();
        return view('users.show', compact(['title', 'users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Nuevo usuario';
        $roles = Role::all();
        $branchs = Branch::all();
        return view('users.create', compact(['title','roles', 'branchs']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        $user = new User();
        $user->name             =   $request->name;
        $user->last_name        =   $request->last_name;
        $user->username         =   $request->username;
        $user->dni              =   $request->dni;
        $user->birthday         =   $request->birthday;
        $user->register_date    = Carbon::now();
        $user->cellphone_number =   $request->cellphone_number;
        $user->address          =   $request->address;
        $user->email            =   $request->email;
        $user->password         =   bcrypt($request->password);
        $user->role_id          =   $request->role_id;
        $user->branch_id        =   $request->branch_id;

        if(isset($request->avatar) && $request->avatar!=null){
            $imageName = time().'.'.$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('img'), $imageName);
            $user->avatar      =     $imageName;
        }

        $status = 0;
        if($user->save()){
            $status = 1;
        }


        $title='Nuevo Usuario';

        return view('messages.userCreate', compact(['status', 'title']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title = 'Editar Usuario';

        return view('users.edit', compact(['title', 'user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        $user->name        =   $request->name;
        $user->last_name    =   $request->last_name;
        $user->username    =   $request->username;

        $user->dni          =   $request->dni;
        $user->birthday     =   $request->birthday;
        $user->cellphone_number    =   $request->cellphone_number;
        $user->address      =   $request->address;
        $user->email        =   $request->email;
        if(isset($request->avatar) && $request->avatar!=null){
            $imageName = time().'.'.$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('img'), $imageName);
            $user->avatar      =     $imageName;
        }

        $status = 0;
        if($user->save()){
            $status = 1;
        }


        $title='Editar Usuario';

        return view('messages.userEdit', compact(['status', 'title']));

    }

    /*public function update(Request $request, User $user)
    {

        dd($request) ;

    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $title = 'Eliminar usuario';
        $status = 0;
        if($id == 1){

        }else if($id == Auth::user()->id){
            $user=User::find($id);
            $user->status   =   0;
            $user->save();
            Auth::logout();
        }else{
            $user=User::find($id);
            $user->status   =   0;
            $user->save();
            $status = 1;
        }

        return view('messages.userDelete', compact(['title', 'status']));

    }

    public function delete($id){

    }


}

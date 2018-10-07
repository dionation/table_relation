<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
Use App\Http\Requests\UserEditValidation;
Use App\Http\Requests\UserCreateValidation;
use Illuminate\Support\Facades\Storage;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('notmember');
        $this->middleware('onlysuperadmin',['except' => ['index','create']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users-index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users-create' ,compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateValidation $request)
    {
        $path = $request->image->store('images', 'public');
        $table = new User;
        $table->name = $request->name;
        $table->email = $request->email;
        $table->password = bcrypt($request->password);
        $table->role_id = $request->role;
        $table->url = $path;
        $table->save();
        return redirect('/');
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
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('users-edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditValidation $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        if($request->image != null){
            Storage::disk('public')->delete($user->url);
            $path = $request->image->store('images', 'public'); 
            $user->url = $path;
        }
        $user->role_id = $request->role_id;
        $user->save();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::find($id);
        Storage::disk('public')->delete($item->url);
        $item->delete();
        return redirect('/admin/users');
    }
}

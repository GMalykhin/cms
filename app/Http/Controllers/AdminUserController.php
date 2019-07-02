<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use App\Image;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        $i = 1;
        // $images = Image::get();

        return view('admin.users.index', compact('users', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        $input = $request->all();

        $input['password'] = Hash::make($request->password);

        if($photo = $request->file){

            $name = time() . $photo->getClientOriginalName();

            $photo->move('images', $name);

            $photo = Image::create(['title' => $name, 'path' => "/images/$name"]);

            $input['user_photo_id'] = $photo->id;

        }


        // return $input;

        User::create($input

        //     [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'role_id' => $request->role,
        //     'is_active' => $request->is_active,
        //     'user_foto_id' => $request->file,
        // ]
        );
        // return $hash . "-----" .  $request->password . "<br>" . $request;

        return redirect()->action('AdminUserController@index');
        // return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.edit', compact('user', 'roles'));
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
        if (trim($request->password) == '') {

            $input = $request->except('password');

        } else {

            $input = $request->all();
        }

        $user = User::findOrFail($id);

        $user->update($request->all());
        // return $user;

        return redirect('/admin/users');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->action('AdminUserController@index');
    }
}

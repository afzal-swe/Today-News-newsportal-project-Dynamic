<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRoleController extends Controller
{

    public function insert()
    {
        $user = User::all();
        return view('admin.role_section.create', compact('user'));
    }
    public function store(Request $request)
    {
        $request->validate([

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required'],

        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['category'] = $request->category;
        $data['district'] = $request->district;
        $data['post'] = $request->post;
        $data['setting'] = $request->setting;
        $data['gallery'] = $request->gallery;
        $data['ads'] = $request->ads;
        $data['role'] = $request->role;
        $data['type'] = 0;

        DB::table('users')->insert($data);
        $notification = array('messege' => 'Successfully Writer Created !!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }

    public function destroy($id)
    {
        User::destroy($id);

        $notification = array('messege' => 'User Delete Successfully !', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {

        $edit = User::find($id);
        return view('admin.role_section.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {


        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['category'] = $request->category;
        $data['district'] = $request->district;
        $data['post'] = $request->post;
        $data['setting'] = $request->setting;
        $data['gallery'] = $request->gallery;
        $data['ads'] = $request->ads;
        $data['role'] = $request->role;

        DB::table('users')->where("id", $id)->update($data);

        $notification = array('messege' => 'User Update Successfully !', 'alert-type' => "success");
        return redirect()->route('writter.insert')->with($notification);
    }
}

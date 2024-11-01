<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\User;
use Hash;
use Auth;

class ManageUsersController extends Controller
{
    public function listUsers()
    {
        $users = User::select('id', 'name', 'email', 'sex', 'access_level')->orderBy('name')->paginate(10);

        return view('admin.manage_users.list_users', compact('users'));
    }

    public function addUser()
    {
        return view('admin.manage_users.add_user');
    }

    public function editUser()
    {
        $user = DB::table('users')->find(request()->id);

        return view('admin.manage_users.edit_user', compact('user'));
    }

    public function search()
    {
        $keyword = request()->keyword;

        $users = User::paginate(10);

        if (!empty($keyword)) {
            $users = User::where('name', 'LIKE', '%' . $keyword . '%')->orWhere('username', 'LIKE', '%' . $keyword . '%')->paginate(10);
            $users->appends(['keyword' => $keyword]);
        }

        return view('admin.manage_users.list_users', compact('users'));
    }

    public function updateUser(Request $request)
    {
        $array = collect($request->all());
        $array['password'] = Hash::make($request->input('password'));
        $collect = $array->except(['_token', 'id']);
        $collect = $collect->toArray();

        if (DB::table('users')->where('id', $request->input('id'))->update($collect)) {
            session()->flash('alert-success', 'User is Updated!');
            return redirect()->route('manage_users.list_users');
        }
        return redirect()->route('manage_users.edit_user', ['id' => 1]);
    }

    public function deleteUser()
    {
        DB::table('users')->where('id', request()->id)->delete();
        session()->flash('alert-success', 'User is Deleted!');
        return redirect()->route('manage_users.list_users');
    }

    public function saveUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'username' => 'required|unique:users',
        ]);

        if ($validator->fails()) {
            return redirect()->route('manage_users.add_user')->withErrors($validator)->withInput();
        }

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->phone_number = $request->input('phone_number');
        $user->sex = $request->input('sex');
        $user->identification_card = $request->input('identification_card');
        $user->religion = $request->input('religion');
        $user->address = $request->input('address');
        $user->about_me = $request->input('about_me');
        $user->access_level = $request->input('access_level');
        $user->password = Hash::make($request->input('password'));

        if ($user->save()) {
            session()->flash('alert-success', 'New User Created!');
            return redirect()->route('manage_users.list_users');
        }
        return redirect()->back();
    }
}

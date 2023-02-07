<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\user\CreateUserRequest;
use App\Http\Requests\admin\user\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = User::all();
        return view('admin.user.index', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        if ($request->hasFile('file_upload')) {
            $file = $request->file_upload;
            $ext = $file->extension();
            $file_name = time() . '-user.' . $ext;
            $file->move(public_path('uploads/images/users'), $file_name);
        }
        $request->merge(['image' => $file_name]);

        $user = User::create();
        $user->Lastname = $request->lastname;
        $user->Firstname = $request->firstname;
        $user->Gender = $request->gender;
        $user->DoB = $request->dob;
        $user->Address = $request->address;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->Position = $request->position;
        $user->Division = $request->division;
        $user->image = $request->image;
        $user->save();
        return redirect()->route('admin.user.index')->with(['type' => 'success', 'msg' => 'Thêm người dùng thành công!']);
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
        $user = User::find($id);
        return view('admin.user.form', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->Lastname = $request->lastname;
        $user->Firstname = $request->firstname;
        $user->Gender = $request->gender;
        $user->DoB = $request->dob;
        $user->Address = $request->address;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->Position = $request->position;
        $user->Division = $request->division;
        if ($request->hasFile('file_upload')) {
            $file = $request->file_upload;
            $ext = $file->extension();
            $file_name = time() . '-user.' . $ext;
            $file->move(public_path('uploads/images/users'), $file_name);
            $request->merge(['image' => $file_name]);
            $user->image = $request->image;
        }
        $user->save();
        return redirect()->route('admin.user.index')->with(['type' => 'success', 'msg' => 'Cập nhật thành công!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == 1) {
            return redirect()->route('admin.user.index')->with(['type' => 'danger', 'msg' => 'CHÚ Ý: BẠN KHÔNG THỂ XÓA ADMIN!!!']);
        }
        $user = User::find($id);
        $name = $user->Firstname;
        $user->delete();
        return redirect()->route('admin.user.index')->with(['type' => 'danger', 'msg' => 'Đã xóa người dùng ' . $name . '!']);
    }
}

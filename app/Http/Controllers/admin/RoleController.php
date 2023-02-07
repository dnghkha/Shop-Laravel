<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\role\RoleRequest;
use App\Models\Func;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = User::all();
        return view('admin.role.index', ['list' => $list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        if (auth()->user()->id !== 1) {
            return redirect()->route('admin.role.index')->with(['type' => 'danger', 'msg' => 'CHÚ Ý: PHÂN QUYỀN CHỈ ÁP DỤNG CHO ACCOUNT ADMIN!!!']);
        }
        $user = User::find($id);
        $func = Func::where('status', 1)->get();
        $role = Role::where(['status' => 1, 'user_id' => $id])->get()->keyby('func_id');
        return view('admin.role.form', ['user' => $user, 'func' => $func, 'role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        if ($id == 1) {
            return redirect()->back()->with(['type' => 'danger', 'msg' => 'CHÚ Ý: BẠN KHÔNG THỂ XÓA QUYỀN TRUY CẬP CỦA ADMIN!!!']);
        }
        Role::where('user_id', $id)->delete();
        if (!isset($request->func)) {
            return redirect()->back()->with(['type' => 'success', 'msg' => 'Cập nhật thành công!']);
        } else {
            foreach ($request->func as $f) {
                Role::insert([
                    'user_id' => $id,
                    'func_id' => $f,
                ]);
                switch ($f) {
                    case 3:
                        Role::insert([
                            'user_id' => $id,
                            'func_id' => 7,
                        ]);
                        break;
                    case 4:
                        Role::insert([
                            'user_id' => $id,
                            'func_id' => 6,
                        ]);
                        break;
                    case 10:
                        Role::insert([
                            'user_id' => $id,
                            'func_id' => 14,
                        ]);
                        break;
                    case 11:
                        Role::insert([
                            'user_id' => $id,
                            'func_id' => 13,
                        ]);
                        break;
                }
            }
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

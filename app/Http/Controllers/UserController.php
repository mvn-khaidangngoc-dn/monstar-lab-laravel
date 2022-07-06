<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // DB::table('users')->get();

        $users = User::get();
        return view('list-users',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // DB::table('users')->insert([
        //     'name' => $request->get('name'),
        //     'email' => $request->get('email'),
        //     'password' => bcrypt($request->get('password')),
        // ]);

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
        if($user) {
            return redirect()->route('user.list')->with('success','Tạo mới User thành công');
        } else {
            return redirect()->route('user.create')->with('fail','Tạo mới User thất bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
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
        // DB::table('users')->where('id',$id)->get();

        $user = User::findOrFail($id);
        return view('user-detail', compact('user'));
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
        // DB::table('users')->where('id',$id)->update([
            // 'name' => $request->get('name'),
            // 'email' => $request->get('email'),
        // ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ]);
        return redirect()->route('user.list')->with('success','Cập nhật User thành công!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('users')->where('id', $id)->delete();

        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.list')->with('success','Xóa User thành công!!!');

    }
}

<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\ChangeRequest;
use Illuminate\Support\Facades\Hash; 
use App\Models\User;
 
class UserController extends Controller
{

    public function index()
    {
        $data = DB::table('users')->orderBy('created_at', 'desc')->paginate(6);
        if ($key = request()->key) {
            $data = DB::table('users')->where('name', 'like', "%$key%")->orderBy('created_at', 'desc')->paginate(6);
        }
        // dd($data);   
        return view('admin.user.index', ['user' => $data]);
    }

    public function create()
    {
        return view('signup');
    }

    // public function store(StoreRequest $request)
    // { 
    //     $data = $request->except('_token');
    //     $data['created_at'] = new \DateTime();
    //     DB::table('users')->insert($data);
    //     return redirect()->route('admin.user.index')->with('success', 'Insert successfully');
    // }

    public function edit($id)
    {
        $data = DB::table('users')->where('id', $id)->first();
        // dd($data);
        return view('admin.user.edit', ['user' => $data]);
    }

    public function update(Request $request, $id)
    {
      
        $dataForm = $request->except('_token'); 
        $dataForm['updated_at'] = new \DateTime();
    //    dd($dataForm);
        DB::table('users')->where('id', $id)->update($dataForm);

        $data = DB::table('users')->orderBy('created_at', 'desc')->paginate(6);
        if ($key = request()->key) {
            $data = DB::table('users')->where('name', 'like', "%$key%")->orderBy('created_at', 'desc')->paginate(6);
        }
        //dd($data);
        return redirect()->route('admin.user.index', ['user' => $data])->with('success', 'Update successfully');;
    }

    // public function changePassword(ChangeRequest $request, $id)
    // {
      
    //     $data = $request->except('_token', 'password_confirmation', 'oldpass');
    //     $data['created_at'] = new \DateTime();
    //     // Hash::make($data['password'])
    //     $data['password'] = Hash::make($data['password']);
    //     // dd($data['password']);
    //     DB::table('users')->where('id', $id)->update($data);

    //     $data = DB::table('users')->orderBy('created_at', 'desc')->paginate(6);
    //     if ($key = request()->key) {
    //         $data = DB::table('users')->where('name', 'like', "%$key%")->orderBy('created_at', 'desc')->paginate(6);
    //     }
    //     //dd($data);
    //     return redirect()->route('admin.user.index', ['user' => $data])->with('success', 'Update Password successfully');;
    // }


    public function delete($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->route('admin.user.index');
    }

    public function lockUser($id)
    {
        $data = DB::table('users')->orderBy('created_at', 'desc')->paginate(6);
        if ($key = request()->key) {
            $data = DB::table('users')->where('name', 'like', "%$key%")->orderBy('created_at', 'desc')->paginate(6);
        }
        DB::table('users')->where('id', $id)->update(['status' => '1']);
        return  redirect()->route('admin.user.index', ['user' => $data])->with('success', 'Lock user successfully');
       // dd($data);
    }

    public function unlockUser($id)
    {
        $data = DB::table('users')->orderBy('created_at', 'desc')->paginate(6);
        if ($key = request()->key) {
            $data = DB::table('users')->where('name', 'like', "%$key%")->orderBy('created_at', 'desc')->paginate(6);
        }
        DB::table('users')->where('id', $id)->update(['status' => '0']);
        return  redirect()->route('admin.user.index', ['user' => $data])->with('success', 'Unlock user successfully');;
       // dd($data);
    }
}

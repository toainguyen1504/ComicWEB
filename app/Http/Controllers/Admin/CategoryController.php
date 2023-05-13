<?php

namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Category\StoreRequest;

use Illuminate\Support\Facades\DB;

 
class CategoryController extends Controller
{

    /**
     * Show all application users.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = DB::table('categories')->orderBy('created_at', 'desc')->paginate(6);
        if ($key = request()->key) {
            $data = DB::table('categories')->where('name', 'like', "%$key%")->orderBy('created_at','desc')->paginate(6);
        } 
     
        // dd($data);   
        return view('admin.category.index', ['category' => $data]);
    }
    /**
     * Show all application users.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.category.create');
    } 
 
    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();
        // $data['created_at'] = date('d/m/Y h:i:s', strtotime($data['created_at']));
        
        DB::table('categories')->insert($data);
        return redirect()->route('admin.category.index')->with('success', 'Category insert successfully');
    }

    public function edit($id)
    {
        $data = DB::table('categories')->where('id', $id)->first();

        // dd($data);   
        return view('admin.category.edit', ['category' => $data]);
    }


    public function update(StoreRequest $request, $id)
    {
        $data = $request->except('_token');
        $data['updated_at'] = new \DateTime();

        DB::table('categories')->where('id', $id)->update($data);
        return redirect()->route('admin.category.index');
    }


    public function delete($id)
    {
        DB::table('categories')->where('id', $id)->delete();
        return redirect()->route('admin.category.index');
    }
}

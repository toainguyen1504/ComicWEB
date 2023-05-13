<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\comic\StoreRequest; 

use Illuminate\Support\Facades\DB;

class ComicController extends Controller
{
    /**
     * Show all application users.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // $data = DB::table('comics')->get();
        // dd($data);
        $data = DB::table('comics')->orderBy('created_at', 'desc')->paginate(6);
        if ($key = request()->key) {
            $data = DB::table('comics')->where('name', 'like', "%$key%")->orderBy('created_at', 'desc')->paginate(6);
        }
        // dd($data);   
        $category_data = DB::table('categories')->orderBy('created_at', 'desc')->get();
        return view('admin.comic.index', ['comic' => $data], ['category' => $category_data]);
    }
    /**
     * Show all application users. 
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $data = DB::table('categories')->orderBy('created_at', 'desc')->get();
        // dd($data);
        return view('admin.comic.create', ['category' => $data]);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->old('name');
        $data = $request->old('description');
        $data = $request->old('author');
        $data = $request->old('category_id[]');
        // $category_ids = $request->category_id;
        // dd($category_ids);
        $file = $request->image;
        if (isset($file)) {
            $ext = $request->image->extension();
            $file_name = time() . '-cover.' . $ext;
            $file->move(public_path('uploads/covers'), $file_name);

            $data = $request->except('_token');
            $data['created_at'] = new \DateTime();
            $data['image'] = $file_name;
            $data['slug'] = $this->to_slug($request->name);

            DB::table('comics')->insert($data);
        }

        return redirect()->route('admin.comic.index')->with('success', 'Comic insert successfully');
    }

    public function edit($id)
    {
        $data = DB::table('comics')->where('id', $id)->first();
        // dd($data);
        //Lay name cua category
        $category_data = DB::table('categories')->get();
        // $category_first = DB::table('categories')->where('id', $data->category_id)->first();
        // dd($category_first);
        return view('admin.comic.edit', ['comic' => $data], ['category' => $category_data]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        // dd($data);
        $comic_data = DB::table('comics')->where('id', $id)->first();
        //  dd($comic_data);
        $file = $request->image;
        // dd($file);
        if (isset($file)) {
            // dd('co');
            $ext = $request->image->extension();
            $file_name = time() . '-cover.' . $ext;
            $file->move(public_path('uploads/covers'), $file_name);
            $data['image'] = $file_name;
            $data['updated_at'] = new \DateTime();
            $path_image_old = public_path() . "\uploads/covers/" . $comic_data->image;
            // dd($path_image_old);
            if (file_exists($path_image_old)) {
                unlink($path_image_old);
            }
        }
        DB::table('comics')->where('id', $id)->update($data);
        return redirect()->route('admin.comic.index')->with('success', 'Comic update successfully');
    }


    public function delete($id)
    {
        // dd($id);
        $chapter_data = DB::table('chapters')->where('comic_id', $id)->get();
        // delete images and chapters
        foreach ($chapter_data as $chap) {
            $files = DB::table('images')->where('chapter_id', $chap->id)->get();
            // dd($files);
            foreach ($files as $file) {
                $path = public_path() . "\uploads/chapters/" . $file->image;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            DB::table('images')->where('chapter_id', $chap->id)->delete();
            DB::table('chapters')->where('id', $chap->id)->delete();
        }
        //delete comic
        $comic_data = DB::table('comics')->where('id', $id)->first();
        // dd($comic_data);
        $path_cover = public_path() . "\uploads/covers/" . $comic_data->image;
        if (file_exists($path_cover)) {
            unlink($path_cover);
        }
        // dd($id);
        DB::table('comics')->where('id', $id)->delete();
        return redirect()->route('admin.comic.index');
    }

    public function to_slug($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
}

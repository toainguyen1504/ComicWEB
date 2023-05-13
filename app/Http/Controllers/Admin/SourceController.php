<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Paste;
// use Illuminate\Support\Str;

class SourceController extends Controller
{
    public function index($id)
    {
        $chapter_data = DB::table('chapters')->where('id', $id)->first();
        // image data
        $source_data = DB::table('images')
            ->leftJoin('chapters', 'chapters.id', '=', 'images.chapter_id')
            ->select('images.*')->where('chapter_id', $id)->paginate(6);
        if ($key = request()->key) {
            $source_data = DB::table('images')->where('name', 'like', "%$key%")->orderBy('created_at', 'desc')->paginate(6);
        }
        // dd($source_data);
        return view('admin.source.index',  ['chapter' => $chapter_data], ['source' => $source_data]);

        // return view('admin.source.index');
        //store thieu route ve index
    }

    public function create($id)
    {
        $chapter_data = DB::table('chapters')->where('id', $id)->first();
        // // image data
        // $source_data = DB::table('images')
        //     ->leftJoin('chapters', 'chapters.id', '=', 'images.chapter_id')
        //     ->select('images.*')->where('chapter_id', $id)->get();
        // if ($key = request()->key) {
        //     $source_data = DB::table('images')->where('name', 'like', "%$key%")->orderBy('created_at', 'desc')->paginate(6);
        // }
        // $source_data = DB::table('images')->where('chapter_id', $id)->get();
        // dd($source_data);
        // return view('admin.source.index',  ['chapter' => $chapter_data], ['source' => $source_data]);

        return view('admin.source.create', ['chapter' => $chapter_data]);
    }

    public function store(Request $request, $id)
    {
        // $count = 1;
        $files = $request->image;
        // $json_img = '';
        // dd($files);
        if (!empty($files)) {
            foreach ($files as $file) {
                $image =  time() . "-" . $file->getClientOriginalName();
                $path = public_path() . "\uploads/chapters";
                $file->move($path, $image);
                // dd($file);
                DB::table('images')->insert([
                    'chapter_id' => $id, 'image' => $image, 'created_at' => new \DateTime()
                ]);
            }

            return redirect()->route('admin.source.index', ['id' => $id])->with('success', 'Source images insert successfully');
        } else  return redirect()->route('admin.source.index', ['id' => $id])->with('success', 'No images to insert');

        return redirect()->route('admin.source.index', ['id' => $id])->with('success', 'source insert successfully');
    }

    public function edit($id)
    {
        $data = DB::table('images')->where('id', $id)->first();
        // dd($data);
        return view('admin.source.edit', ['source' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        // dd($data);
        //get images data
        $image_data = DB::table('images')->where('id', $id)->first();
        // dd($image_data);
        $file = $request->image;
        // dd($file);
        if (isset($file)) {
            // dd('co');
            $image_name =  time() . "-" . $file->getClientOriginalName();
            $file->move(public_path('uploads/chapters'), $image_name);
            $data['image'] = $image_name;
            $data['updated_at'] = new \DateTime();
            $path_image_old = public_path() . "\uploads/chapters/" . $image_data->image;
            // dd($path_image_old);
            if (file_exists($path_image_old)) {
                unlink($path_image_old);
            }

            DB::table('images')->where('id', $id)->update($data);
        }
        //get chapter data to get id
        $chapter_data = DB::table('chapters')->where('id', $image_data->chapter_id)->first();
        return redirect()->route('admin.source.index', ['id' => $chapter_data->id])->with('success', 'Image update successfully');
    }

    public function delete($id)
    {
        // dd($id); 
        //get images data
        $image_data = DB::table('images')->where('id', $id)->first();
        // dd($image_data);
        $path_image_old = public_path() . "\uploads/chapters/" . $image_data->image;
        if (file_exists($path_image_old)) {
            unlink($path_image_old);
        }
        //get chapter data to get id
        $chapter_data = DB::table('chapters')->where('id', $image_data->chapter_id)->first();
        DB::table('images')->where('id', $id)->delete();
        return redirect()->route('admin.source.index', ['id' => $chapter_data->id])->with('success', 'Delete image successfully');;
    }

    public function newCard()
    {
        return view('admin.blocks.source.newCard');
    }
}

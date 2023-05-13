<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Chapter\StoreRequest;
use Illuminate\Support\Facades\DB;

class ChapterController extends Controller
{
    public function index($id)
    {
        $comics_data = DB::table('comics')->where('id', $id)->first();

        $chapters = DB::table('chapters')
            ->leftJoin('comics', 'comics.id', '=', 'chapters.comic_id') //comic_id of chapters
            ->select('chapters.*')->where('comic_id', $id)->orderBy('chapter_name', 'asc')->paginate(6);

        if ($key = request()->key) {
            $chapters = DB::table('chapters')->where('name', 'like', "%$key%")->orderBy('created_at', 'desc')->paginate(6);
        }
        return view('admin.chapter.index', ['chapter' => $chapters], ['comic' => $comics_data]);
    }

    public function create($id)
    {
        $chapters = DB::table('chapters')
            ->leftJoin('comics', 'comics.id', '=', 'chapters.comic_id') //comic_id of chapters
            ->select('chapters.*')->where('comic_id', $id)->first();
        // dd($chapters);

        //To get ID comic to redirect index
        $comics_data = DB::table('chapters')
            ->rightJoin('comics', 'comics.id', '=', 'chapters.comic_id') //comic_id of chapters
            ->select('chapters.comic_id', 'comics.id', 'comics.name', 'comics.image')->get();
        // dd($comics_data);
        $comics_data = $comics_data->where('id', $id)->first();
        // $comics_data = $comics_data->where('id', $id)->first();
        // dd($comics_data);
        return view('admin.chapter.create', ['chapter' => $chapters], ['comic' => $comics_data]);
    }

    public function store(StoreRequest $request, $id)
    {
        //To get ID comic to redirect index
        $comics_data = DB::table('chapters')
            ->rightJoin('comics', 'comics.id', '=', 'chapters.comic_id') //comic_id of chapters
            ->select('chapters.comic_id', 'comics.*')->get();
        // dd($comics_data);
        $comics_data = $comics_data->where('id', $id)->first();
        // dd($comics_data);
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();
        $data['comic_id'] = $comics_data->id;
        $data['chapter_slug'] =$this->to_slug($request->chapter_name);
        // $data['chapter_slug'] = $comics_data->slug . '/' . $this->to_slug($request->chapter_name);
        // dd($data);
        DB::table('chapters')->insert($data);
        return redirect()->route('admin.chapter.index', ['id' => $comics_data->id])->with('success', 'Chapter insert successfully');
    }

    public function edit($id)
    {
        $data = DB::table('chapters')
            ->rightJoin('comics', 'comics.id', '=', 'chapters.comic_id') //comic_id of chapters
            ->select('chapters.*', 'comics.image')
            ->get();
        $chapters = $data->where('id', $id)->first();
        // dd($chapters);
        return view('admin.chapter.edit', ['chapter' => $chapters]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime();
        // $data['comic_id'] = $comics_data->id;
        // dd($data);
        DB::table('chapters')->where('id', $id)->update($data);

        //To get ID comic to redirect index
        $comics_data = DB::table('chapters')
            ->rightJoin('comics', 'comics.id', '=', 'chapters.comic_id') //comic_id of chapters
            ->select('chapters.comic_id', 'chapters.id', 'comics.name', 'comics.image')->get();
        $comics_data = $comics_data->where('id', $id)->first();

        return redirect()->route('admin.chapter.index', ['id' => $comics_data->comic_id])->with('success', 'Chapter Update successfully');
    }

    public function delete($id)
    {
        $chapter_data = DB::table('chapters')->where('id', $id)->first();
        // dd($chapter_data);
        $files = DB::table('images')->where('chapter_id', $id)->get();
        //  dd($files);
        foreach ($files as $file) {
            $path = public_path() . "\uploads/chapters/" . $file->image;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        DB::table('images')->where('chapter_id', $id)->delete();
        DB::table('chapters')->where('id', $id)->delete();
        return redirect()->route('admin.chapter.index', ['id' => $chapter_data->comic_id])->with('success', 'Chapter Delete successfully');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    { 
     
        $data['categories'] = DB::table('categories')->orderBy('created_at', 'desc')->get();
        $data['comics'] = DB::table('comics')->orderBy('created_at', 'desc')->paginate(12);

        if ($key = request()->key) {
            $data = DB::table('comics')->where('name', 'like', "%$key%")->orderBy('created_at', 'desc')->paginate(12);
           
        }

        $comicList = DB::table('comics')->orderBy('created_at', 'desc')-> get();
        $collection = collect($comicList);

        if(count($comicList) < 10) {
            $data['hotComic'] = $comicList;
            $data['newComic'] = $comicList;
            $data['proposeComic'] = $comicList;
        } else {
         
            $data['hotComic'] = collect($comicList)->random(10)->all();
            $data['newComic'] = $collection->take(10)->all();
            $data['proposeComic'] = $collection->slice(-10)->all();
           
        }
        // $data['role'] = 'null'; 
        if(Auth::check()) {
            // Nếu người dùng đã đăng nhập
            if(Auth::user()->level == 0) {
                // Nếu người dùng là admin
                $data['role'] = 'admin'; 
            // } else {
            //     // Nếu người dùng là user
            //     $data['role'] = 'user'; 
            // }
            if(Auth::user()->level == 1) {
                // Nếu người dùng là admin
                $data['role'] = 'user'; 
                
            } 
        } else {
            // Nếu người dùng chưa đăng nhập
            $data['role'] = 'null'; 
            $data['user'] = 0;
        }
        // dd($data['role']);
   
    }
    return view('client.pages.index', ['data' => $data]);
}

    public function userIndex($id)
    {
        // $data['user_id'] = $id;
        $data['categories'] = DB::table('categories')->orderBy('created_at', 'desc')->get();
        $data['comics'] = DB::table('comics')->orderBy('created_at', 'desc')->paginate(12);

        if ($key = request()->key) {
            $data = DB::table('comics')->where('name', 'like', "%$key%")->orderBy('created_at', 'desc')->paginate(12);
           
        }

        $comicList = DB::table('comics')->orderBy('created_at', 'desc')-> get();
        //dd($comicList);
        $collection = collect($comicList);

        if(count($comicList) < 10) {
            $data['hotComic'] = $comicList;
            $data['newComic'] = $comicList;
            $data['proposeComic'] = $comicList;
        } else {
         
            $data['hotComic'] = collect($comicList)->random(10)->all();
            $data['newComic'] = $collection->take(10)->all();
            $data['proposeComic'] = $collection->slice(-10)->all();
           
        }
        //kiem tra dang nhap
        $data['user'] = DB::table('users')->where('id', $id)->first();
        // dd( $data['user']);
        if(Auth::check()) {
            // Nếu người dùng đã đăng nhập
            if(Auth::user()->level == 0) {
                // Nếu người dùng là admin
                $data['role'] = 'admin'; 
            } else {
                // Nếu người dùng là user
                $data['role'] = 'user'; 
            }
        } else {
            // Nếu người dùng chưa đăng nhập
            return redirect()->route('index');
        }
        // dd($data['role']);
        return view('client.pages.index', ['data' => $data]);
    }

    public function detail($slug)
    {
        // dd($slug);
        $comic_id = DB::table('comics')->where('slug', $slug)->value('id');
        // dd($comic_id);
        //show list category-> navbar
        $category_data = DB::table('categories')->orderBy('created_at', 'desc')->get();
        $data['categories'] =  $category_data;
        //get data comic and total chapter
        $chapter_data = DB::table('chapters')->where('comic_id', $comic_id)->orderBy('chapter_name', 'asc')->get();
        // dd($chapter_data);
        $chapter_data_list = DB::table('chapters')->where('comic_id', $comic_id)->orderBy('chapter_name', 'desc')->get();
        // $chapter_data = DB::table('comics')
        if (sizeof($chapter_data) == 0) {
            return redirect()->route('index');
        } else {
            $comic_data = DB::table('comics')
                ->leftJoin('chapters', 'comics.id', '=', 'chapters.comic_id')
                ->select('comics.*')->where('comic_id', $comic_id)->get();
            // dd($comic_data);
            $total = count($comic_data);
            $comic_data = $comic_data->first();
            $comic_data->chapter_total = $total;
            //1 comic - 1 category +.get category
            $category_data = DB::table('categories')->where('id', $comic_data->category_id)->first();
            //data comic and category = $data[]
            //  dd($category_data);
            $data['new_chapter'] = $chapter_data[$total - 1];
            $data['comic'] = $comic_data;
            $data['category_comic'] =  $category_data;
            $data['chapter'] =  $chapter_data;
            $data['chapter_data_list'] =  $chapter_data_list;

            $data['chapter_begin'] = $chapter_data->first();
            $data['chapter_end'] = $chapter_data->last();

            $comics = DB::table('comics')->get();
            $data['comics'] = $comics;

            if(Auth::check()) {
                // Nếu người dùng đã đăng nhập
                if(Auth::user()->level == 0) {
                    // Nếu người dùng là admin
                    $data['role'] = 'admin'; 
                // } else {
                //     // Nếu người dùng là user
                //     $data['role'] = 'user'; 
                // }
                if(Auth::user()->level == 1) {
                    // Nếu người dùng là admin
                    $data['role'] = 'user'; 
                    
                } 
            } else {
                // Nếu người dùng chưa đăng nhập
                $data['role'] = 'null'; 
                $data['user'] = 0;
                }
            }

            // dd($data);
            return view('client.pages.detail', ['data' => $data]);
        }
    }

    public function chapter($co, $chap)
    {
        //show list category-> navbar
        $category_data = DB::table('categories')->orderBy('created_at', 'desc')->get();
        $data['categories'] =  $category_data;
        $comic_id = DB::table('comics')->where('slug', $co)->value('id');
        // dd($comic_id);
        $chapter_id = DB::table('chapters')->where('comic_id', $comic_id)->where('chapter_slug', $chap)->value('id');
        // dd($chapter_id);
        $image_data = DB::table('images')->where('chapter_id', $chapter_id)->orderBy('image', 'asc')->get();
    // dd($image_data);
        $chapter_name = DB::table('chapters')->where('comic_id', $comic_id)->where('chapter_slug', $chap)->value('chapter_name');
        $comic_data = DB::table('comics')->where('id', $comic_id)->first();
        $category_data = DB::table('categories')->where('id', $comic_data->id)->first();
        $chapter_data = DB::table('chapters')->where('comic_id', $comic_id)->orderBy('chapter_name', 'asc')->get();
        //$chapter_data_list = DB::table('chapters')->where('comic_id', $comic_id)->get();
        // dd($chapter_data);
        $chapter_present = DB::table('chapters')->where('comic_id', $comic_id)->where('chapter_slug', $chap)->first();

        //next chapter
        $next_chap = $chapter_present->chapter_slug;
        // dd($next_chap);
        for ($i = 0; $i < count($chapter_data) - 1; $i++) {
            $item = $chapter_data[$i];
            // dd($item->id);
            if ($item->id == $chapter_present->id) {
                $next = $chapter_data[$i + 1];
                $next_chap = $next->chapter_slug;
                break;
            }
        }
        // dd($next_chap);
        $chap_prev = $chapter_present->chapter_slug;
        for ($i = count($chapter_data) - 1; $i > 0; $i--) {
            $item = $chapter_data[$i];
            // dd($item->id);
            if ($item->id == $chapter_present->id) {
                $prev = $chapter_data[$i - 1];
                $chap_prev = $prev->chapter_slug;
                break;
            }
        }

        $data['comic'] = $comic_data;
        $data['category'] =  $category_data;
        $data['chapter_name'] =  $chapter_name;
        $data['chapter'] =  $chapter_data;
        $data['chapter_prev'] =  $chap_prev;
        $data['chapter_present'] = $chapter_present->chapter_slug;
        $data['chapter_next'] = $next_chap;
        $data['images'] =  $image_data;
        if(Auth::check()) {
            // Nếu người dùng đã đăng nhập
            if(Auth::user()->level == 0) {
                // Nếu người dùng là admin
                $data['role'] = 'admin'; 
            // } else {
            //     // Nếu người dùng là user
            //     $data['role'] = 'user'; 
            // }
            if(Auth::user()->level == 1) {
                // Nếu người dùng là admin
                $data['role'] = 'user'; 
                
            } 
        } else {
            // Nếu người dùng chưa đăng nhập
            $data['role'] = 'null'; 
            $data['user'] = 0;
            }
        }

        // insert chapter next = chapter hien tai + 1
        return view('client.pages.chapter', ['data' => $data]);
   
    }

    public function category()
    {
        $data = DB::table('comics')->orderBy('created_at', 'desc')->get();
        $category = DB::table('categories')->orderBy('created_at', 'desc')->get();
        // dd($data);
        if(Auth::check()) {
            // Nếu người dùng đã đăng nhập
            if(Auth::user()->level == 0) {
                // Nếu người dùng là admin
                $data['role'] = 'admin'; 
            // } else {
            //     // Nếu người dùng là user
            //     $data['role'] = 'user'; 
            // }
            if(Auth::user()->level == 1) {
                // Nếu người dùng là admin
                $data['role'] = 'user'; 
                
            } 
        } else {
            // Nếu người dùng chưa đăng nhập
            $data['role'] = 'null'; 
            $data['user'] = 0;
            }
        }
        return view('client.pages.category', ['category' => $category], ['comic' => $data]);
        // return  redirect()->route('category', ['comic' => $data]);
    }

    public function searchAjax(Request $request)
    {
        $search = $request->input('search');
        $comics =  DB::table('comics')->where('name', 'like', '%' . $search . '%')->get();
        // dd($comics);
        if(Auth::check()) {
            // Nếu người dùng đã đăng nhập
            if(Auth::user()->level == 0) {
                // Nếu người dùng là admin
                $data['role'] = 'admin'; 
            // } else {
            //     // Nếu người dùng là user
            //     $data['role'] = 'user'; 
            // }
            if(Auth::user()->level == 1) {
                // Nếu người dùng là admin
                $data['role'] = 'user'; 
                
            } 
        } else {
            // Nếu người dùng chưa đăng nhập
            $data['role'] = 'null'; 
            $data['user'] = 0;
            }
        }
        return view('client.pages.search', ['comics' => $comics]);
    }

    public function searchComic(Request $request)
    {
        // $search = $request->segment(2);
        $search = rawurldecode($request->fullUrl());
        $pos = strpos($search, "key");
        if ($pos !== false) {
            $search = mb_substr($search, $pos + 4);
        }
        $data['categories'] = DB::table('categories')->orderBy('created_at', 'desc')->get();
        $data['comics'] =  DB::table('comics')->where('name', 'like', '%' . $search . '%')->get();
        // dd($data);
        $data['key'] =  $search;
        //dd($data['comics'] );
        //   dd($data);
        if(Auth::check()) {
            // Nếu người dùng đã đăng nhập
            if(Auth::user()->level == 0) {
                // Nếu người dùng là admin
                $data['role'] = 'admin'; 
            // } else {
            //     // Nếu người dùng là user
            //     $data['role'] = 'user'; 
            // }
            if(Auth::user()->level == 1) {
                // Nếu người dùng là admin
                $data['role'] = 'user'; 
                
            } 
        } else {
            // Nếu người dùng chưa đăng nhập
            $data['role'] = 'null'; 
            $data['user'] = 0;
            }
        }
        return view('client.pages.search_comic', ['data' => $data]);
    }

    public function profile($id)
    { 
        $data['categories'] = DB::table('categories')->orderBy('created_at', 'desc')->get();
        // CheckUser();
        if(Auth::check()) {
            // Nếu người dùng đã đăng nhập
            if(Auth::user()->level == 0) {
                // Nếu người dùng là admin
                $data['role'] = 'admin'; 
            } else {
                // Nếu người dùng là user
                $data['role'] = 'user'; 
            }
        } else {
            // Nếu người dùng chưa đăng nhập
            $data['role'] = 'null'; 
        }

        $data['user'] = DB::table('users')->where('id', $id)->first();

        return view('client.pages.profile', ['data' => $data]);
    }
 
}

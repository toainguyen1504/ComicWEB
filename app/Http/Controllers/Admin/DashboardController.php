<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index () {

        $data['comic'] = DB::table('comics')->orderBy('created_at', 'desc')->get();
        if(count( $data['comic']) < 6) {
            $data['hotComic'] = $data['comic'];
            $data['newComic'] = $data['comic'];
        } else {
         
            $data['hotComic'] = collect($data['comic'])->random(6)->all();
            $data['newComic'] = collect($data['comic'])->take(6)->all();
        }

        $data['category'] = DB::table('categories')->orderBy('created_at', 'desc')->get();

        // dd( $data );
        return view('admin.dashboard.index', ['data' => $data]);
    }
}

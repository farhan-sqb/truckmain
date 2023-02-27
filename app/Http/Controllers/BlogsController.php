<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{



    public function blogsPage()
    {

        $blogs = DB::table('blogs')->orderBy('id', 'desc')->get();
        return view('blogs.index', compact('blogs'));
    }







    public function ParticularBlogPage($articlesno, $blogtitle)
    {
        $getBlog = DB::table('blogs')->where('id', $articlesno)->where('blogtitle', $blogtitle)->get();
        $nextBlog = DB::table('blogs')->where('id', $articlesno + 1)->get();
        return view('blogs.particular', compact('getBlog', 'nextBlog'));
    }






    public function showSpecBlog($blogdata)
    {
        if ($blogdata == 'all') {
            $get_blogs = DB::table('blogs')
                ->orderBy('id', 'desc')
                ->get();
            return $get_blogs;
        } else {
            $get_blogs = DB::table('blogs')
                ->where('blogtitle', 'like', '%' . $blogdata . '%')
                ->orWhere('author', 'like', '%' . $blogdata . '%')
                ->orderBy('id', 'desc')
                ->get();
            return $get_blogs;
        }
    }
    //
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\About;

class FrontController extends Controller
{
    public function viewHome(){
		$blog = Blog::orderBy('created_at', 'DESC')->paginate(1);
		$gallery = Gallery::orderBy('id', 'DESC')->paginate(10);
		$about = About::orderBy('id')->paginate(2);
		return view('home',compact('blog','gallery','about'));
	}
	
	public function viewBlog(){
		$data = Blog::orderBy('created_at', 'DESC')->paginate(2);
		return view('f_blog',compact('data'));
	}
	
	public function viewGallery(){
		$data = Gallery::orderBy('id', 'DESC')->paginate(10);
		return view('f_gallery',compact('data'));
	}
	
	public function viewAbout(){
		$data = About::orderBy('id')->paginate(3);
		return view('f_about',compact('data'));
	}
}

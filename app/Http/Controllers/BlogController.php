<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blog::all();
        return view('admin.blog.all_post',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.add_blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Blog();
        $data->post_title = $request->post_title;
        $data->post_details = $request->post_details;
        $image = $request->file('post_image');
        if($image){
            $image_name         = hexdec(uniqid());
            $ext                = strtolower($image->getClientOriginalExtension());//.png;.jpg;.jepg
            $image_full_name    = $image_name.'.'.$ext;//pic.png;
            $upload_path        = 'public/images/blog/';//the path where the image will be stored
            $image_url          = $upload_path.$image_full_name;
            $success            = $image->move($upload_path,$image_full_name);
            $data->post_image  = $image_url;
        }
            $data->save();
            $notification=array(
                'messege'=>'Post Inserted Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Blog::find($id);
        return view('admin.blog.edit_post',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['post_title'] = $request->post_title;
        $data['post_details'] = $request->post_details;
        $post_image=$request->file('new_image');
        if($post_image){
            $image_name         = hexdec(uniqid());
            $ext                = strtolower($post_image->getClientOriginalExtension());//.png;.jpg;.jepg
            $image_full_name    = $image_name.'.'.$ext;//pic.png;
            $upload_path        = 'public/images/blog/';//the path where the image will be stored
            $image_url          = $upload_path.$image_full_name;
            $success            = $post_image->move($upload_path,$image_full_name);
            $data['post_image']  = $image_url;
            unlink($request->old_image);
        }
            $data = Blog::where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Post Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $data = Blog::where('id',$id)->first();
        $image = $data->post_image;
        $delete = Blog::where('id',$id)->delete();
        if($delete){
            unlink($image);
            $notification=array(
                'messege'=>'Post Deleted',
                'alert-type'=>'success'
                    );
            return Redirect()->back()->with($notification);
        }
    }
}

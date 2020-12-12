<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $data = Gallery::all();
            return view('admin.gallery.all_images',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.add_gallery');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Gallery();
        $data->g_title =$request->g_title;
        $data->g_details =$request->g_details;
        $image = $request->file('g_image');
        if($image){
            $image_name         = hexdec(uniqid());
            $ext                = strtolower($image->getClientOriginalExtension());//.png;.jpg;.jepg
            $image_full_name    = $image_name.'.'.$ext;//pic.png;
            $upload_path        = 'public/images/blog/';//the path where the image will be stored
            $image_url          = $upload_path.$image_full_name;
            $success            = $image->move($upload_path,$image_full_name);
            $data->g_image  = $image_url;
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
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Gallery::find($id);
        return view('admin.gallery.edit_gallery',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['g_title'] = $request->g_title;
        $data['g_details'] = $request->g_details;
        $post_image=$request->file('new_image');
        if($post_image){
            
            $image_name         = hexdec(uniqid());
            $ext                = strtolower($post_image->getClientOriginalExtension());//.png;.jpg;.jepg
            $image_full_name    = $image_name.'.'.$ext;//pic.png;
            $upload_path        = 'public/images/';//the path where the image will be stored
            $image_url          = $upload_path.$image_full_name;
            $success            = $post_image->move($upload_path,$image_full_name);
            $data['g_image']  = $image_url;
            unlink($request->old_image);
        }
            $data = Gallery::where('id',$id)->update($data);
            $notification=array(
                'messege'=>'Gallery Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Gallery::where('id',$id)->first();
        $image = $data->g_image;
        $delete = Gallery::where('id',$id)->delete();
        if($delete){
            unlink($image);
            $notification=array(
                'messege'=>'Gallery Image Deleted',
                'alert-type'=>'success'
                    );
            return Redirect()->back()->with($notification);
        }
    }
}

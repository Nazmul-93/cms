<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $about = About::all();
        return view('admin.about.all_post',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.add_about');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new About();
        $data->a_title = $request->a_title;
        $data->a_details= $request->a_details;
        $data->save();
        $notification=array(
            'messege'=>'About Inserted Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = About::find($id);
        return view('admin.about.edit_post',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['a_title'] = $request->a_title;
        $data['a_details'] = $request->a_details;
        $update = About::where('id',$id)->update($data);
        $notification=array(
            'messege'=>'About is Updated',
            'alert-type'=>'success'
                );
        return Redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = About::where('id',$id)->delete();
        if($delete){
            $notification=array(
                'messege'=>'Post Deleted',
                'alert-type'=>'success'
                    );
            return Redirect()->back()->with($notification);
        }
    }
}

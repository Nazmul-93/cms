@extends('admin.dashboard')
@section('admin_content')
<div class="sl-mainpanel">
<div class="sl-pagebody">
    <div class="sl-page-title">
        <h5>Edit Gallery</h5>
    </div><!-- sl-page-title --> 

    <div class="card pd-20 pd-sm-40">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-lg-12  mx-auto">
                <form action="{{URL::to('admin/gallery/'.$edit->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <label>Gallery Title</label>
                                    <input type="text" class="form-control" value="{{$edit->g_title}}" name="g_title" required>
                                </div>
                            </div>
                            <br>
                            <div class="control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>New Image</label>
                                    <input type="file" class="form-control" name="new_image">
                                    Old Image:<img src="{{URL::to($edit->g_image)}}" style="height: 40px; width: 80px;">
                                    <input type="hidden" name="old_image" value="{{$edit->g_image}}">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls">
                                    <label>Post Details</label>
                                    <textarea rows="5" class="form-control" required name="g_details" >{{$edit->g_details}}</textarea>
                                </div>
                            </div>
                            <br>
                            <div id="success"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- card -->
    </div><!-- sl-pagebody -->
</div><!-- modal -->

@endsection




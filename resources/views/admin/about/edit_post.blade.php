@extends('admin.dashboard')
@section('admin_content')
    <div class="sl-mainpanel">
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Edit Post</h5>
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
                    <form action="{{URL::to('admin/about/'.$edit->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="control-group">
                                    <div class="form-group floating-label-form-group controls">
                                        <label>Post Title</label>
                                        <input type="text" class="form-control" value="{{$edit->a_title}}" name="a_title" required>
                                    </div>
                                </div>
                                <br>
                                <div class="control-group">
                                    <div class="form-group floating-label-form-group controls">
                                        <label>Post Details</label>
                                        <textarea rows="5" class="form-control" required name="a_details" >{{$edit->a_details}}</textarea>
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




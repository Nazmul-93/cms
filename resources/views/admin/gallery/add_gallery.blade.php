@extends('admin.dashboard')
@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
        <div class="sl-mainpanel">
          <div class="sl-pagebody">
            <div class="sl-page-title">
              <h5>Gallery Table</h5>
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
                      <form action="{{URL::to('admin/gallery')}}" method="post" enctype="multipart/form-data">
                       @csrf
                        <div class="control-group">
                          <div class="form-group floating-label-form-group controls">
                            <label>Image Title</label>
                            <input type="text" class="form-control" placeholder="Write Post Title" name="g_title" required>
                          </div>
                        </div>
                        <br>
                        
                        <div class="control-group">
                          <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Gallery Image</label>
                            <input type="file" class="form-control" name="g_image">
                          </div>
                        </div>
                        <div class="control-group">
                          <div class="form-group floating-label-form-group controls">
                            <label>Gallery Details</label>
                            <textarea rows="5" class="form-control" placeholder="Write Post Details" required name="g_details"></textarea>
                          
                          </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary" id="sendMessageButton">Post</button>
                          <a href="{{URL::to('admin/gallery')}}" class="btn btn-success">All Image</a>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div><!-- card -->
            </div><!-- sl-pagebody -->
          </div><!-- modal -->

@endsection
@extends('admin.dashboard')
@section('admin_content')
  <!-- ########## START: MAIN PANEL ########## -->
        <div class="sl-mainpanel">
          <div class="sl-pagebody">
            <div class="sl-page-title">
              <h5>About Table</h5>
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
                      <form action="{{URL::to('admin/about')}}" method="post">
                       @csrf
                        <div class="control-group">
                          <div class="form-group floating-label-form-group controls">
                            <label>About Title</label>
                            <input type="text" class="form-control" placeholder="Write Title" name="a_title" required>
                          </div>
                        </div>
                        <br>
                        <div class="control-group">
                          <div class="form-group floating-label-form-group controls">
                            <label>About Details</label>
                            <textarea rows="5" class="form-control" placeholder="Write Details" required name="a_details"></textarea>
                          
                          </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary" id="sendMessageButton">Post</button>
                          <a href="{{URL::to('admin/about')}}" class="btn btn-success">All Post</a>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div><!-- card -->
            </div><!-- sl-pagebody -->
          </div><!-- modal -->

@endsection
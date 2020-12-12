@extends('admin.dashboard')
@section('admin_content')
<div class="sl-mainpanel">
<div class="sl-pagebody">
	<div class="sl-page-title">
		<h5>All Post</h5>
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
						<a href="{{URL::to('admin/about/create')}}" class="btn btn-info">Write Post</a>
						<hr>
<table class="table table-responsive">
	<tr>
		<th>SL</th>
		<th>Title</th>
		<th>Details</th>
		<th >Action</th>
	</tr>
	@foreach($about as $row)
	<tr>
		<td>{{$loop->index+1}}</td>
		<td>{{$row->a_title}}</td>
		<td>{{$row->a_details}}</td>
		<td>
			<!-- <a href="" class="btn btn-sm btn-success">View</a> -->
			<a href="{{URL::to('admin/about/'.$row->id.'/edit/')}}" class="btn btn-sm btn-info">Edit</a>
			<!-- <form action="{{URL::to('admin/about/'.$row->id)}}" method="post">
			@csrf
			@method('DELETE')
			<button type="submit" class="btn btn-sm btn-danger" id="delete">Delete</button>
			</form> -->
			<a href="{{route('delete_about',$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
					</td>
				</tr>
				@endforeach
</table>
					</div>
				</div>
			</div>
		</div><!-- card -->
	</div><!-- sl-pagebody -->
</div><!-- modal -->

@endsection
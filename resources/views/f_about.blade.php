@extends('welcome')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/blog_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/blog_responsive.css') }}">

<div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('public/frontend/images/shop_background.jpg') }}"></div>
	<div class="home_overlay"></div>
	<div class="home_content d-flex flex-column align-items-center justify-content-center">
		<h2 class="home_title"></h2>
	</div>
</div>

<!-- Blog -->

<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($data as $row)
        <div class="post-preview">
            <h5 class="post-title" style="text-align: justify;">
              {{$row->a_title}}
            </h5>
          <p>{{$row->a_details}}</p>
        </div>
        <hr>
        @endforeach

        <!-- Pager -->
        <div class="clearfix">
            {{$data->links()}}
        </div>
        
      </div>
    </div>

@endsection



 
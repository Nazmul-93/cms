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
          <a href="post.html">
            <img src="{{URL::to($row->post_image)}}" style="height: 200px; width: 400px;">
            <h2 class="post-title">
              {{$row->post_title}}
            </h2>
          </a>
          <p>{{$row->post_details}}</p>
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



 
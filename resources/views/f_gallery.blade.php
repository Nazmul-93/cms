@extends('welcome')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/blog_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/blog_responsive.css') }}">
<style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>

<div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('public/frontend/images/shop_background.jpg') }}"></div>
	<div class="home_overlay"></div>
	<div class="home_content d-flex flex-column align-items-center justify-content-center">
		<h2 class="home_title"></h2>
	</div>
</div>

<!-- Blog -->

<div class="row">
      <div class="col-lg-12 col-md-12 ">
        @foreach($data as $row)
        <div class="gallery">
          <a target="_blank">
            <img src="{{URL::to($row->g_image)}}" style="height: 120px; width: 120px;" alt="Cinque Terre" >
          </a>
          <div class="desc">{{$row->g_details}}</div>
        </div>
        @endforeach
        </div>
        <!-- Pager -->
        <div class="clearfix">
            {{$data->links()}}
        </div>
      
    </div>

@endsection



 
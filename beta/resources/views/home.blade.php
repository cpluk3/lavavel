@extends('app')

@section('content')
<!-- bxSlider Javascript file -->
<script src="js/jquery.bxslider/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="js/jquery.bxslider/jquery.bxslider.css" rel="stylesheet" />
<link href="css/home.css" rel="stylesheet" />
<div id="home">
<ul class="bxslider">
@foreach ($features as $feature)
  <li><a href="product?item={{$feature->item_id}}"><img src="pic/item/{{$feature->item_id}}.jpg" /></a></li>
@endforeach
</ul>
</div>
<script>
$(document).ready(function(){
  $('.bxslider').bxSlider({
  	minSlides: 3,
	maxSlides: 4,
	slideWidth: 250,
	slideMargin: 0 
  });
});
</script>
@stop

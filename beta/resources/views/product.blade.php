<?php
$ITEM_PER_ROW = 4;
?>
@extends('app')
@section('content')
<link href="css/product.css" rel="stylesheet" />
<div id="product">
	<div id="main-menu">
		<h4>Product Categories</h4>
		<ul>
			@foreach ($maincats as $maincat)
			<li><a href="product?main={{$maincat->name}}#product">-{{$maincat->name}}</a></li>
			@endforeach
		</ul>
	</div> <!-- end of main-menu -->

	<?php if(!empty($subcats)) { ?>
	<div id="sub-menu">
		<ul>
			@foreach ($subcats as $subcat)
			<li><a href="product?main={{$main}}&sub={{$subcat->name}}#product">{{$subcat->name}}</a></li>
			@endforeach
		</ul>
	</div>
	<?php } ?>
	<!-- end of sub-menu -->

	<div id="item-list">
	<!-- load the item data -->
	<?php 
		if($item_detail == ''){ 
			$item_count = 0;
	?>
			@foreach ($items as $item)
			<?php if($item_count % $ITEM_PER_ROW == 0){ ?>
			<div class="item-row">
			<?php } ?>
				<div class="item">
					<a href="product?main={{$main}}&sub={{$sub}}&item={{$item->id}}#product">
						<img src="pic/item/{{$item->id}}.jpg">
						<span>{{$item->name}}</span>
					</a>
				</div>
			<?php 
				$item_count++;	
				if($item_count % $ITEM_PER_ROW == 0){ ?>
			</div>
			<?php } ?>
			@endforeach
			<?php //if last count != 3, echo end of div
				if($item_count % $ITEM_PER_ROW !== 0){
			?>
				</div>
			<?php
				}
			?>
		<?php } else { ?>
				<div id="item-details">
					<div id="item-pic">
						<img src="pic/item/{{$item_detail->id}}.jpg">
						<div id="item-nav">
							<ul>
								<?php if($item_previous_id != '') { ?>
								<li><a href="product?main={{$main}}&sub={{$sub}}&item={{$item_previous_id}}#product"><img src="pic/arrow-left.png"></a></li>
								<?php } else { ?>
								<li><img src="pic/arrow-left-white.png"></li>
								<?php } ?>
								<?php if($item_next_id != '') { ?>
								<li><a href="product?main={{$main}}&sub={{$sub}}&item={{$item_next_id}}#product"><img src="pic/arrow-right.png"></a></li>
								<?php } else { ?>
								<li><img src="pic/arrow-right-white.png"></li>
								<?php } ?>
								<li><a href="product?main={{$main}}&sub={{$sub}}#product"><img src="pic/arrow-return.png"></a></li>
							<ul>
						</div>
					</div>
					<div id="item-info">
						<div id="item-text">
							<p>Item No.: {{$item_detail->number}}</p>
						</div>
						<div id="item-text">
							<p>Item Name: {{$item_detail->name}}</p>
						</div>
						<div id="item-text">
							<p>Description: {{$item_detail->description}} </p>
						</div>
					</div>
				</div>
		<?php } ?>

		<div id="pagination">
		<?php
			if(empty($item_detail)){
				echo $items->appends(['main'=>$main, 'sub'=>$sub])->fragment('product')->render();
			}
		?>
		</div><!--end of pagination-->
	</div><!--- end of itemlist-->
</div><!-- end of product-->
@stop

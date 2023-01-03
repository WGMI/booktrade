@extends('layouts.master')
@section('content')

<section id="featured-books">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

			<div class="section-header align-center">
				<h2 class="section-title">Library</h2>
			</div>

			<div class="product-list" data-aos="fade-up">
				<div class="row" id="search-items">
					@foreach($books as $b)
					<div class="col-md-3 book">
						<figure class="product-style">
							@php
							$url = (str_contains(Request::path(),'offer')) ? 'offer/'.request()->route('id') : 'book/works/'.$b->open_lib_work_id;
							@endphp
							
							<a href="{{url($url)}}"><img src="{{$b->cover_url}}" onerror="this.src='{{asset("images/product-item1.jpg")}}'" alt="Cover image" class="product-item"></a>
							<figcaption>
								<div class="titletext">
									<div class="book-details">
										<span class="book-title">{{$b->title}}</span>
										<br>
										<span>{{$b->author}}</span>
									</div>
									<span class="tooltiptext">{{$b->title}} by {{$b->author}}</span>
								</div>
							</figcaption>
						</figure>
					</div>
					@endforeach
			    </div><!--ft-books-slider-->	
				<div class="more-results">
					<h4 id="moreheading" style="display:none;">More Results</h4>
					<ul id="more-results-area">
					</ul>
				</div>			
			</div><!--grid-->


			</div><!--inner-content-->
		</div>
		
		<!-- <div class="row">
			<div class="col-md-12">

				
			</div>		
		</div> -->
	</div>
</section>

<script>


</script>

@endsection
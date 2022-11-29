@extends('layouts.master')
@section('content')

<section id="featured-books">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

			<div class="section-header align-center">
				<h2 class="section-title">Featured Books</h2>
			</div>

			<div class="product-list" data-aos="fade-up">
				<div class="row">

					<div class="col-md-3">
						<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/product-item1.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Simple way of piece life</h3>
								<p>Armor Ramsey</p>
							</figcaption>
						</figure>
					</div>
				
					<div class="col-md-3">
						<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/product-item2.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Great travel at desert</h3>
								<p>Sanchit Howdy</p>
							</figcaption>
						</figure>
					</div>

					<div class="col-md-3">
						<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/product-item3.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>The lady beauty Scarlett</h3>
								<p>Arthur Doyle</p>
							</figcaption>
						</figure>
					</div>
									
					<div class="col-md-3">
						<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/product-item4.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Once upon a time</h3>
								<p>Klien Marry</p>
							</figcaption>
						</figure>
					</div>

			    </div><!--ft-books-slider-->				
			</div><!--grid-->


			</div><!--inner-content-->
		</div>
		
		<div class="row">
			<div class="col-md-12">

				<div class="btn-wrap align-right">
					<a href="#" class="btn-accent-arrow">More <i class="icon icon-ns-arrow-right"></i></a>
				</div>
				
			</div>		
		</div>
	</div>
</section>

<section id="popular-books" class="bookshelf">
	<div class="container">
	<div class="row">
		<div class="col-md-12">

			<div class="section-header align-center">
				<div class="title">
					<span>Some quality items</span>
				</div>
				<h2 class="section-title">Popular Books</h2>
			</div>
   
			<ul class="tabs">
			  <li data-tab-target="#all-genre" class="active tab">All Genre</li>
			  <li data-tab-target="#business" class="tab">Business</li>
			  <li data-tab-target="#technology" class="tab">Technology</li>
			  <li data-tab-target="#romantic" class="tab">Romantic</li>
			  <li data-tab-target="#adventure" class="tab">Adventure</li>
			  <li data-tab-target="#fictional" class="tab">Fictional</li>
			</ul>

			<div class="tab-content">
			  <div id="all-genre" data-tab-content class="active">
			  	<div class="row">

				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item1.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Portrait photography</h3>
								<p>Adam Silber</p>
							</figcaption>
						</figure>
					</div>

				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item2.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Once upon a time</h3>
								<p>Klien Marry</p>
							</figcaption>
						</figure>
					</div>

				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item3.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Tips of simple lifestyle</h3>
								<p>Bratt Smith</p>
							</figcaption>
						</figure>
					</div>

				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item4.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Just felt from outside</h3>
								<p>Nicole Wilson</p>
							</figcaption>
						</figure>
					</div>

				</div>
				<div class="row">

				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item5.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Peaceful Enlightment</h3>
								<p>Marmik Lama</p>
							</figcaption>
						</figure>
					</div>

				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item6.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Great travel at desert</h3>
								<p>Sanchit Howdy</p>
							</figcaption>
						</figure>
					</div>

				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item7.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Life among the pirates</h3>
								<p>Armor Ramsey</p>
							</figcaption>
						</figure>
					</div>

				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item8.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Simple way of piece life</h3>
								<p>Armor Ramsey</p>
							</figcaption>
						</figure>
					</div>

		    	</div>

			  </div>
			  <div id="business" data-tab-content>
			  	<div class="row">
				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item2.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Peaceful Enlightment</h3>
								<p>Marmik Lama</p>
							</figcaption>
						</figure>
					</div>

				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item4.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Great travel at desert</h3>
								<p>Sanchit Howdy</p>
							</figcaption>
						</figure>
					</div>

				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item6.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Life among the pirates</h3>
								<p>Armor Ramsey</p>
							</figcaption>
						</figure>
					</div>

				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item8.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Simple way of piece life</h3>
								<p>Armor Ramsey</p>
							</figcaption>
						</figure>
					</div>

		    	 </div>
			  </div>

			  <div id="technology" data-tab-content>
			  	<div class="row">
				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item1.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Peaceful Enlightment</h3>
								<p>Marmik Lama</p>
							</figcaption>
						</figure>
					</div>

				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item3.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Great travel at desert</h3>
								<p>Sanchit Howdy</p>
							</figcaption>
						</figure>
					</div>

				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item5.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Life among the pirates</h3>
								<p>Armor Ramsey</p>
							</figcaption>
						</figure>
					</div>

				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item7.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Simple way of piece life</h3>
								<p>Armor Ramsey</p>
							</figcaption>
						</figure>
					</div>
		    	 </div>
			  </div>

			  <div id="romantic" data-tab-content>
			  	<div class="row">
		    	  <div class="col-md-3">
			    	  <figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item1.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Peaceful Enlightment</h3>
								<p>Marmik Lama</p>
							</figcaption>
						</figure>
					</div>

				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item3.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Great travel at desert</h3>
								<p>Sanchit Howdy</p>
							</figcaption>
						</figure>
					</div>

				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item5.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Life among the pirates</h3>
								<p>Armor Ramsey</p>
							</figcaption>
						</figure>
					</div>

				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item7.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Simple way of piece life</h3>
								<p>Armor Ramsey</p>
							</figcaption>
						</figure>
					</div>
		    	 </div>
			  </div>

			  <div id="adventure" data-tab-content>
			  	<div class="row">
				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item5.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Life among the pirates</h3>
								<p>Armor Ramsey</p>
							</figcaption>
						</figure>
					</div>

				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item7.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Simple way of piece life</h3>
								<p>Armor Ramsey</p>
							</figcaption>
						</figure>
					</div>
		    	 </div>
			  </div>

			  <div id="fictional" data-tab-content>
			  	<div class="row">
				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item5.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Life among the pirates</h3>
								<p>Armor Ramsey</p>
							</figcaption>
						</figure>
					</div>

				  	<div class="col-md-3">
					  	<figure class="product-style">
							<a href="{{url('book/1')}}"><img src="images/tab-item7.jpg" alt="Books" class="product-item"></a>
							<figcaption>
								<h3>Simple way of piece life</h3>
								<p>Armor Ramsey</p>
							</figcaption>
						</figure>
					</div>
		    	 </div>
			  </div>

			</div>

		</div><!--inner-tabs-->
			
		</div>
	</div>
</section>

<!-- <section id="quotation" class="align-center">
	<div class="inner-content">
		<h2 class="section-title divider">Quote of the day</h2>
		<blockquote data-aos="fade-up">
			<q>“The more that you read, the more things you will know. The more that you learn, the more places you’ll go.”</q>
			<div class="author-name">Dr. Seuss</div>			
		</blockquote>
	</div>		
</section> -->

<section id="subscribe">
	<div class="container">
		<div class="row">

			<div class="col-md-8 col-md-offset-2">
				<div class="row">

					<div class="col-md-6">

						<div class="title-element">
							<h2 class="section-title divider">Subscribe to our newsletter</h2>
						</div>

					</div>
					<div class="col-md-6">

						<div class="subscribe-content" data-aos="fade-up">
							<p>Sed eu feugiat amet, libero ipsum enim pharetra hac dolor sit amet, consectetur. Elit adipiscing enim pharetra hac.</p>
							<form id="form">
								<input type="text" name="email" placeholder="Enter your email addresss here">
								<button class="btn-subscribe">
									<span>send</span> 
									<i class="icon icon-send"></i>
								</button>
							</form>
						</div>

					</div>
					
				</div>
			</div>
			
		</div>
	</div>
</section>

<section id="latest-blog">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<div class="section-header align-center">
					<div class="title">
						<span>Read our articles</span>
					</div>
					<h2 class="section-title">Latest Articles</h2>
				</div>

				<div class="row">

					<div class="col-md-4">

						<article class="column" data-aos="fade-up">

							<figure>
								<a href="#" class="image-hvr-effect">
									<img src="images/post-img1.jpg" alt="post" class="post-image">			
								</a>
							</figure>

							<div class="post-item">	
								<div class="meta-date">Mar 30, 2021</div>			
							    <h3><a href="#">Reading books always makes the moments happy</a></h3>

							    <div class="links-element">
								    <div class="categories">inspiration</div>
								    <div class="social-links">
										<ul>
											<li>
												<a href="#"><i class="icon icon-facebook"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-twitter"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-behance-square"></i></a>
											</li>
										</ul>
									</div>
								</div><!--links-element-->

							</div>
						</article>
						
					</div>
					<div class="col-md-4">

						<article class="column" data-aos="fade-down">
							<figure>
								<a href="#" class="image-hvr-effect">
									<img src="images/post-img2.jpg" alt="post" class="post-image">
								</a>
							</figure>
							<div class="post-item">	
								<div class="meta-date">Mar 29, 2021</div>			
							    <h3><a href="#">Reading books always makes the moments happy</a></h3>

							    <div class="links-element">
								    <div class="categories">inspiration</div>
								    <div class="social-links">
										<ul>
											<li>
												<a href="#"><i class="icon icon-facebook"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-twitter"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-behance-square"></i></a>
											</li>
										</ul>
									</div>
								</div><!--links-element-->

							</div>
						</article>
						
					</div>
					<div class="col-md-4">

						<article class="column" data-aos="fade-up">
							<figure>
								<a href="#" class="image-hvr-effect">
									<img src="images/post-img3.jpg" alt="post" class="post-image">
								</a>
							</figure>
							<div class="post-item">		
								<div class="meta-date">Feb 27, 2021</div>			
							    <h3><a href="#">Reading books always makes the moments happy</a></h3>

							    <div class="links-element">
								    <div class="categories">inspiration</div>
								    <div class="social-links">
										<ul>
											<li>
												<a href="#"><i class="icon icon-facebook"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-twitter"></i></a>
											</li>
											<li>
												<a href="#"><i class="icon icon-behance-square"></i></a>
											</li>
										</ul>
									</div>
								</div><!--links-element-->

							</div>
						</article>
						
					</div>

				</div>

				<div class="row">

					<div class="btn-wrap align-center">
						<a href="#" class="btn btn-outline-accent btn-accent-arrow" tabindex="0">Read All Articles<i class="icon icon-ns-arrow-right"></i></a>
					</div>
				</div>

			</div>	
		</div>
	</div>
</section>

@endsection
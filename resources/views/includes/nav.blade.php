<nav id="navbar">
	<div class="main-menu stellarnav">
		<ul class="menu-list">
			<li class="menu-item"><a href="{{url('/')}}" data-effect="Home">Home</a></li>
			<li class="menu-item">
				<a href="{{url('orders')}}" data-effect="Home">
					Orders 
					@auth
					@if(sizeof(auth()->user()->orders) + sizeof(\App\Models\Order::where('owner_id',auth()->user()->id)->get()))
					<span style="background-color:blue;color:white;padding-left:2px;padding-right:2px;border-radius:5px">{{sizeof(auth()->user()->orders) + sizeof(\App\Models\Order::where('owner_id',auth()->user()->id)->get())}}</span>
					@endif
					@endauth
				</a>
			</li>
			<li class="menu-item"><a href="#about" class="nav-link" data-effect="About">About</a></li>
			<!-- <li class="menu-item has-sub">
				<a href="#pages" class="nav-link" data-effect="Pages">Pages</a>

				<ul>
					<li class="active"><a href="index.html">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="styles.html">Styles</a></li>
					<li><a href="blog.html">Blog</a></li>
					<li><a href="single-post.html">Post Single</a></li>
					<li><a href="shop.html">Our Store</a></li>
					<li><a href="single-product.html">Product Single</a></li>
					<li><a href="contact.html">Contact</a></li>
					<li><a href="thank-you.html">Thank You</a></li>
					</ul>

			</li> -->
			<!-- <li class="menu-item"><a href="#popular-books" class="nav-link" data-effect="Shop">Shop</a></li> 
			<li class=  "menu-item"><a href="#latest-blog" class="nav-link" data-effect="Articles">Articles</a></li>-->
			<li class="menu-item"><a href="#contact" class="nav-link" data-effect="Contact">Contact</a></li>
		</ul>

		<div class="hamburger">
			<span class="bar"></span>
			<span class="bar"></span>
			<span class="bar"></span>
		</div>

	</div>
</nav>
<div id="header-wrap">
	
	<div class="top-content">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="social-links">
						<ul>
							<li>
								<a href="#"><i class="icon icon-facebook"></i></a>
							</li>
							<li>
								<a href="#"><i class="icon icon-twitter"></i></a>
							</li>
							<li>
								<a href="#"><i class="icon icon-youtube-play"></i></a>
							</li>
							<li>
								<a href="#"><i class="icon icon-behance-square"></i></a>
							</li>
						</ul>
					</div><!--social-links-->
				</div>
				<div class="col-md-6">
					<div class="right-element">
                        <div class="action-menu">
                            <div class="search-bar">
                                <a href="#" class="search-button search-toggle" data-selector="#header-wrap">
                                    <i class="icon icon-search"></i>
                                </a>
                                <form action="{{url('search')}}" role="search" method="get" class="search-box">
                                    <input class="search-field text search-input" placeholder="Books, Author, ISBN, Users" type="search">
                                </form>
                            </div>
                        </div>
                        <a href="#" class="user-account for-buy"><i class="icon icon-user"></i></a>
                        <a href="#" class="cart for-buy"><i class="icon icon-clipboard"></i>&nbsp<span>Cart</span></a>
					</div><!--top-right-->
				</div>
				
			</div>
		</div>
	</div><!--top-content-->

	<header id="header">
		<div class="container">
			<div class="row">

				<div class="col-md-2">
					<div class="main-logo">
						<a href="index.html" style="text-decoration:none;"><span style="font-family:'Prata', Georgia, serif; font-size:40px; font-weight:700;">Book</span><span style="font-family:'Prata', Georgia, serif; font-size:40px;">Trade</span></a>
					</div>

				</div>

				<div class="col-md-10">
					@include('includes.nav')
				</div>

			</div>
		</div>
	</header>
		
</div><!--header-wrap-->
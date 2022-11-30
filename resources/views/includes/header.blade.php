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
                                    <input name="query" class="search-field text search-input" placeholder="Books, Author, ISBN, Users" type="search">
                                </form>
                            </div>
                        </div>
                        <a href="#" class="cart for-buy"><i class="icon icon-clipboard"></i>&nbsp<span>Cart</span></a>
                        <a href="#" class="user-account for-buy" data-bs-toggle="modal" data-bs-target="#login-form">
							<i class="icon icon-user"></i>
						</a>

						<div class="modal fade" id="login-form" tabindex="-1" aria-labelledby="login-formLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="login-formLabel">Login</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form action="{{route('login')}}" method="post">
											@csrf
											<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
											@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror

											<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

											@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror

											<input type="submit" class="btn btn-outline-dark btn-pill btn-xlarge btn-full" value="Login">
											<button class="btn btn-outline-dark btn-pill btn-xlarge btn-full"><i class="fa fa-google" style="font-size:24px;"></i> Login With Google</button>
											<a href="" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#registration-form" style="text-decoration:underline;">New Here? Join Now.</a>
										</form>
									</div>
								</div>
							</div>
						</div>

						<div class="modal fade" id="registration-form" tabindex="-1" aria-labelledby="registration-formLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="registration-formLabel">Register</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form action="{{route('login')}}" method="post">
											@csrf
											<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
											@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror

											<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

											@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror

											<input type="submit" class="btn btn-outline-dark btn-pill btn-xlarge btn-full" value="Login">
											<button class="btn btn-outline-dark btn-pill btn-xlarge btn-full"><i class="fa fa-google" style="font-size:24px;"></i> Login With Google</button>
											<a href="" data-bs-toggle="modal" data-bs-target="#registration-form" style="text-decoration:underline;">New Here? Join Now.</a>
										</form>
									</div>
								</div>
							</div>
						</div>
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
						<a href="{{url('/')}}" style="text-decoration:none;"><span style="font-family:'Prata', Georgia, serif; font-size:40px; font-weight:700;">Book</span><span style="font-family:'Prata', Georgia, serif; font-size:40px;">Trade</span></a>
					</div>					
				</div>

				<div class="col-md-10">
					@include('includes.nav')
				</div>
				@error('email')
					<span style="color:red; border: 1px solid; border-color:red;" role="alert">
						{{ $message }}
					</span>
				@enderror
				@error('password')
					<span style="color:red; border: 1px; border-color:red;" role="alert">
						{{ $message }}
					</span>
				@enderror
			</div>
		</div>
	</header>
		
</div><!--header-wrap-->
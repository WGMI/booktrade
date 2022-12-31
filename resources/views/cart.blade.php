@extends('layouts.master')

@section('content')

<section class="bg-sand padding-small">
	<div class="container">
		<div id="message" class="" role="alert">
		</div>
		<div class="row">
			@if(Cart::count())
			<div class="section-header align-center">
				<h2 class="section-title">Your Order</h2>
			</div>

			@foreach(Cart::content() as $book)
			<div class="col-md-3">
				<img src="{{\App\Models\Book::where('open_lib_work_id',$book->id)->first()->cover_url}}" alt="Cover" id="cover" onerror="this.src='images/main-banner2.jpg'" style="object-fit:fill; max-height:200px;">
			</div>
			<div class="col-md-8 pl-4">
				<div class="product-detail">
					<h2 id="title">{{$book->name}}</h1>
					<p id="author">{{\App\Models\Book::where('open_lib_work_id',$book->id)->first()->condition}}</p>
					<a href="#" onclick="remove()" style="text-decoration:none;color:red;">Remove from cart</a>
					<input id="remove-url" type="hidden" value="{{url('/remove')}}">
				</div>
			</div> 

			<hr>

			<div class="row">
				<div class="col-md-4 order-md-2 mb-4">
				<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-muted">Price</span>
					<span class="badge badge-secondary badge-pill">3</span>
				</h4>
				<ul class="list-group mb-3">
					<li class="list-group-item d-flex justify-content-between lh-condensed">
					<div>
						<h6 class="my-0">Title</h6>
						<small class="text-muted">{{$book->name}}</small>
					</div>
					<!-- <span class="text-muted">$12</span> -->
					</li>
					<li class="list-group-item d-flex justify-content-between lh-condensed">
					<div>
						<h6 class="my-0"></h6>
						<small class="text-muted">Trading Fee</small>
					</div>
					<span class="text-muted">10/-</span>
					</li>
					<li class="list-group-item d-flex justify-content-between">
					<span>Total</span>
					<strong>10/-</strong>
					</li>
				</ul>

				</div>
				<div class="col-md-8 order-md-1">
				<h4 class="mb-3">Details</h4>
				<form class="needs-validation" action="{{url('order')}}" method="POST">
					@csrf
					<div class="row">

					<input type="hidden" name="owner_id" value="{{\App\Models\Book::where('open_lib_work_id',$book->id)->first()->user_id}}">
					<input type="hidden" name="ordered_book_id" value="{{\App\Models\Book::where('open_lib_work_id',$book->id)->first()->id}}">
					<div class="mb-2">
						<label for="offered_book_id">Book to trade</label>
						<span>You can skip this and let the owner pick a book from your library.</span>
						<select class="custom-select d-block w-100" id="offered_book_id" name="offered_book_id">
							<option value="">Select</option>
							@foreach(\App\Models\Book::where('user_id',auth()->user()->id)->get() as $b)
							<option value="{{$b->id}}">{{$b->title}}</option>
							@endforeach
						</select>
					</div>

					<div class="mb-2">
					<label for="notes">Notes (Optional)</label>
					<input type="text" class="form-control" id="notes" name="notes">
					</div>
					
					<!-- <div class="mb-2">
					<label for="phone">Phone Number <span class="text-muted">(Optional)</span></label>
					<input type="text" class="form-control" id="phone" name="phone">
					</div>

					<div class="mb-2">
					<label for="address">Address</label>
					<input type="text" class="form-control" id="address" name="address" required>
					</div>

					<div class="mb-2">
						<label for="county">County</label>
						<select class="custom-select d-block w-100" id="county" name="county" required>
						<option value="">Select</option>
						<option value="Mombasa">Mombasa</option>
						<option value="Kwale">Kwale</option>
						<option value="Kilifi">Kilifi</option>
						<option value="Tana River">Tana River</option>
						<option value="Lamu">Lamu</option>
						<option value="Taita–Taveta">Taita–Taveta</option>
						<option value="Garissa">Garissa</option>
						<option value="Wajir">Wajir</option>
						<option value="Mandera">Mandera</option>
						<option value="Marsabit">Marsabit</option>
						<option value="Isiolo">Isiolo</option>
						<option value="Meru">Meru</option>
						<option value="Tharaka-Nithi">Tharaka-Nithi</option>
						<option value="Embu">Embu</option>
						<option value="Kitui">Kitui</option>
						<option value="Machakos">Machakos</option>
						<option value="Makueni">Makueni</option>
						<option value="Nyandarua">Nyandarua</option>
						<option value="Nyeri">Nyeri</option>
						<option value="Kirinyaga">Kirinyaga</option>
						<option value="Muranga">Muranga</option>
						<option value="Kiambu">Kiambu</option>
						<option value="Turkana">Turkana</option>
						<option value="West Pokot">West Pokot</option>
						<option value="Samburu">Samburu</option>
						<option value="Trans-Nzoia">Trans-Nzoia</option>
						<option value="Uasin Gishu">Uasin Gishu</option>
						<option value="Elgeyo-Marakwet">Elgeyo-Marakwet</option>
						<option value="Nandi">Nandi</option>
						<option value="Baringo">Baringo</option>
						<option value="Laikipia">Laikipia</option>
						<option value="Nakuru">Nakuru</option>
						<option value="Narok">Narok</option>
						<option value="Kajiado">Kajiado</option>
						<option value="Kericho">Kericho</option>
						<option value="Bomet">Bomet</option>
						<option value="Kakamega">Kakamega</option>
						<option value="Vihiga">Vihiga</option>
						<option value="Bungoma">Bungoma</option>
						<option value="Busia">Busia</option>
						<option value="Siaya">Siaya</option>
						<option value="Kisumu">Kisumu</option>
						<option value="Homa Bay">Homa Bay</option>
						<option value="Migori">Migori</option>
						<option value="Kisii">Kisii</option>
						<option value="Nyamira">Nyamira</option>
						<option value="Nairobi">Nairobi</option>
						</select>
					</div> -->

					<!-- <div class="col-md-5 mb-3">
						<label for="method">Payment Method</label>
						<select class="custom-select d-block w-100" id="method" name="method" required>
						<option value="" disabled>Select</option>
						<option value="Mpesa">Mpesa</option>
						<option value="Cash">Cash</option>
						</select>
					</div> -->
					
					<hr class="mb-4">
					<input type="submit" value="Offer Trade">
				</form>
				</div>
			</div>

			@endforeach
			@else
			<div class="section-header align-center">
				<h2 class="section-title">Your Cart Is Empty</h2>
			</div>
			@endif

		</div>
	</div>
</section>

<script>

const remove = () => {
	axios.post(document.getElementById('remove-url').value,null)
	.then(res => window.location.reload())
	.catch(err => console.log(err))
}

</script>

@endsection

@extends('layouts.master')

@section('content')
<section class="bg-sand padding-small">
	<div class="container">
		<div id="message" class="" role="alert">
		</div>
		<div class="row">
			<input id="workid" type="hidden" value="{{$id}}">

			<div class="col-md-4">
				<img alt="Cover" id="cover" onerror="this.src='{{asset("images/product-item1.jpg")}}'" style="object-fit:fill;">
			</div>

			<div class="col-md-8 pl-5">
				<div class="book-controls">
					@if(!$ownedbook)
					<a href="#" data-bs-toggle="modal" 
						@auth
						data-bs-target="#owner-modal"
						@else 
						data-bs-target="#login-form"
						@endauth>
						I own this book
					</a>
					@else
					<a href="#" data-bs-toggle="modal" 
						@auth
						data-bs-target="#owner-modal"
						@else 
						data-bs-target="#login-form"
						@endauth>
						Edit details
					</a>
					@endif
					@if(!$ownedbook)
					<a href="#" data-bs-toggle="modal" 
						@auth
						onclick="addbooktowishlist()"
						@else 
						data-bs-target="#login-form"
						@endauth>
						I want this book
					</a>
					@endif
					<input type="hidden" id="new-wish-url" value="{{url('wish')}}">
				</div>
				<div class="product-detail">
					<h1 id="title">...</h1>
					<p id="author">...</p>

					<p id="desc">
					</p>
					
				</div>
			</div> 

			<div class="modal fade" id="owner-modal" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5">Tell us about the book</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form id="add-book" name="add-book">
								<input type="hidden" id="new-book-url" value="{{url('book')}}">
								<label for="condition">Book Condition</label>
								<select name="condition" class="form-select" id="condition">
									<option value="Brand New" {{($ownedbook && $ownedbook->condition == 'Brand New') ? 'selected' : ''}}>Brand New</option>
									<option value="Excellent" {{($ownedbook && $ownedbook->condition == 'Excellent') ? 'selected' : ''}}>Excellent</option>
									<option value="Good" {{($ownedbook && $ownedbook->condition == 'Good') ? 'selected' : ''}}>Good</option>
									<option value="Satisfactory" {{($ownedbook && $ownedbook->condition == 'Satisfactory') ? 'selected' : ''}}>Satisfactory</option>
								</select>
								<label for="information">Any important information</label>
								<textarea name="information" id="information" style="width: 100%; max-width: 100%;" rows="10">{{$ownedbook->information ?? ''}}</textarea>
								<input class="btn btn-outline-dark btn-pill btn-xlarge btn-full" data-bs-dismiss="modal" onclick="addbooktolibrary({{$ownedbook->id ?? ''}})" type="button" value="{{$ownedbook ? 'EDIT BOOK':'ADD BOOK'}}" style="font-weight:bold;">
								<input class="btn btn-outline-dark btn-pill btn-xlarge btn-full" data-bs-dismiss="modal" onclick="remove({{$ownedbook->id ?? ''}})" type="button" value="REMOVE  FROM LIBRARY" style="font-weight:bold;">
							</form>
						</div>
					</div>
				</div>
			</div>

			@if(sizeof($ownedbooks))
			<div>
				<h3>Offers</h3>
			</div>
			@endif

			<input type="hidden" id="cart-url" value="{{url('cart')}}">

			@foreach($ownedbooks as $b)
			<ul class="list-group">
				<li class="list-group-item d-flex justify-content-between align-items-center">
					<div class="offeruser">
						<img src="{{App\Models\User::find($b->user_id)->avatar ?? asset('images/avatar.png')}}" alt="Image" class="mr-3" style="width: 50px; height: 50px; border-radius: 50%; margin: 10px" referrerpolicy="no-referrer">
						<h4>{{App\Models\User::find($b->user_id)->name}}</h4>
					</div>
					<div class="offer-condition">
						<h3>{{$b->condition}}</h3>
						<p>Added on: {{Carbon\Carbon::parse($b->created_at)->format('d, M, Y')}}</p>
					</div>
					<div class="offer-condition">
						<p>{{$b->information}}</p>
					</div>
					@auth
					@if(App\Models\User::find($b->user_id)->id == auth()->user()->id)
					@else
					<div>
						<button 
						@auth
						onclick="addbooktocart({{$b->id}})"
						@else 
						data-bs-toggle="modal" 
						data-bs-target="#login-form"
						@endauth>Order</button>
					</div>
					@endif
					@else
					<div>
						<button 
						@auth
						onclick="addbooktocart({{$b->id}})"
						@else 
						data-bs-toggle="modal" 
						data-bs-target="#login-form"
						@endauth>Order</button>
					</div>
					@endauth
				</li>
				<p 
				id="added-msg-{{$b->id}}" 
				style="
				display:none;
				background-color:#C5A992;
				color:white;
				font-weight:bold;
				padding-left:20px;
				padding:5px;
				border-radius:5px;
				">Added to cart</p>
			</ul>
			@endforeach

			@if(sizeof($wishes))
			<div>
				<h3>Users Who Want This Book</h3>
			</div>
			@endif

			<ul>
			@foreach($wishes as $w)
				<li><a href="">{{App\Models\User::find($b->user_id)->name}}</a></li>
			@endforeach
			</u>

		</div>
	</div>
</section>

<script>

let title = document.getElementById('title')
let description = document.getElementById('desc')
let cover = document.getElementById('cover')
let author = document.getElementById('author')
let date = document.getElementById('date')
let workid = document.getElementById('workid').value

window.addEventListener("load",(e) => {
	queryBook(workid)
})

const queryBook = (workid) => {
	axios.get(`https://openlibrary.org/works/${workid}.json`)
	.then(res => {
		work = res.data
		title.innerHTML = work.title
		description.innerHTML = (work.description) ? (work.description) : `No description. Do you own this book? <a href="#">Add a description.</a>`
		// date.innerHTML = work.subject_times
		getauthor(work.authors[0].author.key)

		let key 
		let value 

		if(work.covers){
			key = 'id'
			value = work.covers[0]
		}

		imageurl = `https://covers.openlibrary.org/b/${key}/${value}-L.jpg?default=false`
		cover.src = imageurl
	})
	.catch(err => {
		console.log(err)
	})
}

const getauthor = (key) => {
	axios.get(`https://openlibrary.org${key}.json`)
	.then(res => {
		name = res.data.personal_name
		author.innerHTML = (name)
	})
	.catch(err => {
		console.log(err)
	})
}

const addbooktowishlist = () => {
	const url = document.getElementById('new-wish-url').value
	axios.post(url,{
		title: title.innerHTML,
		open_lib_work_id: workid
	})
	.then(res => {
		if (res.data == 1){
			showmessage(`${title.innerHTML} is now in your wish list.`,'success')
		}else if (res.data == 0){
			showmessage(`${title.innerHTML} is already in your wish list.`,'success')
		}else{
			showmessage('Something went wrong. Please try again.','error')
		}
		
	})
	.catch(err => {
		console.log(err)
		showmessage('Something went wrong. Please try again.','error')
	})
}

const addbooktolibrary = (id) => {
	let data = new FormData(document.getElementById('add-book'))
	let url = document.getElementById('new-book-url').value
	url = (id) ? url + '/' + id : url
	data.append('title',work.title)
	data.append('author',name)
	data.append('open_lib_work_id',workid)
	data.append('imageurl',imageurl+'.jpg')
	axios.post(url,data)
	.then(res => {
		if(res.data == 2){
			window.location.reload()
		}else if (res.data == 1){
			showmessage(`${title.innerHTML} is now in your library.`,'success')
		}else if (res.data == 0){
			showmessage(`${title.innerHTML} is already in your library.`,'success')
		}else{
			showmessage('Something went wrong. Please try again.','error')
		}
	})
	.catch(err => {
		showmessage('Something went wrong. Please try again.','error')
	})
}

const remove = (id) => {
	let url = document.getElementById('new-book-url').value + '/delete/' + id
	console.log(url)
	axios.post(url,null)
	.then(res => window.location.reload())
	.catch(err => console.log(err))
}

const addbooktocart = (offerid) => {
	let url = document.getElementById('cart-url').value
	let data = {
		id: workid,
		name: work.title
	}
	axios.post(url,data)
	.then(res => {
		if (res.data == 1){
			console.log(res.data)
			// document.getElementById('cart-badge').style.display = 'inline';
			document.getElementById(`added-msg-${offerid}`).style.display = 'inline';
			setTimeout(() => {
				document.getElementById(`added-msg-${offerid}`).style.display = 'none';
			}, 3000);
		}else{
			console.log(res.data)
			document.getElementById(`added-msg-${offerid}`).innerHTML = 'A book is already in your cart. You must complete that checkout first.';
			document.getElementById(`added-msg-${offerid}`).style.display = 'inline';
			setTimeout(() => {
				document.getElementById(`added-msg-${offerid}`).style.display = 'none';
			}, 4500);
		}
	})
	.catch(err => {
		console.log(res.data)
	})
}

const showmessage = (msg,type) => {
	const flash = document.getElementById('message')
	flash.classList.add('alert')
	flash.classList.add((type == 'success') ? 'alert-success' : 'alert-danger')
	flash.innerHTML = msg
	setTimeout(() => {
		flash.className = ''
		flash.innerHTML = ''
	}, 3000);
}

</script>

@endsection
@extends('layouts.master')

@section('content')
<section class="bg-sand padding-small">
	<div class="container">
		<div id="message" class="" role="alert">
		</div>
		<div class="row">
			<input id="workid" type="hidden" value="{{$id}}">

			<div class="col-md-4">
				<img alt="Cover" id="cover" onerror="this.src='images/main-banner2.jpg'" style="object-fit:fill;">
			</div>

			 <div class="col-md-8 pl-5">
				<div class="book-controls">
					<a href="#" data-bs-toggle="modal" 
						@auth
						data-bs-target="#owner-modal"
						@else 
						data-bs-target="#login-form"
						@endauth>
						I own this book
					</a>
					<a href="#"
						@auth
						onclick="addbooktowishlist()"
						@else 
						data-bs-target="#login-form"
						@endauth>
						I want this book
					</a>
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
									<option value="Brand New">Brand New</option>
									<option value="Excellent">Excellent</option>
									<option value="Good">Good</option>
									<option value="Satisfactory">Satisfactory</option>
								</select>
								<label for="information">Any important information</label>
								<textarea name="information" id="information" style="width: 100%; max-width: 100%;" rows="10"></textarea>
								<input class="btn btn-outline-dark btn-pill btn-xlarge btn-full" data-bs-dismiss="modal" onclick="addbooktolibrary()" type="button" value="ADD BOOK" style="font-weight:bold;">
							</form>
						</div>
					</div>
				</div>
			</div>

			@if($ownedbooks)
			<div>
				<h3>Offers</h3>
			</div>
			@endif

			@foreach($ownedbooks as $b)
			<ul class="list-group">
				<li class="list-group-item d-flex justify-content-between align-items-center">
					<div class="offeruser">
						<img src="{{App\Models\User::find($b->user_id)->avatar ?? asset('images/avatar.png')}}" alt="Image" class="mr-3" style="width: 50px; height: 50px; border-radius: 50%; margin: 10px">
						<h4>{{App\Models\User::find($b->user_id)->name}}</h4>
					</div>
					<div class="offer-condition">
						<h3>{{$b->condition}}</h3>
						<p>Added on: {{Carbon\Carbon::parse($b->created_at)->format('d, M, Y')}}</p>
					</div>
					<div class="offer-condition">
						<p>{{$b->information}}</p>
					</div>
					<div>
						<button>Order</button>
					</div>
				</li>
			</ul>
			@endforeach

			

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
		description.innerHTML = (work.description) ? work.description : `No description. Do you own this book? <a href="#">Add a description.</a>`
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
		showmessage(`${title.innerHTML} is now in your wish list.`,'success')
	})
	.catch(err => {
		console.log(err)
		showmessage('Something went wrong. Please try again.','error')
	})
}

const addbooktolibrary = () => {
	let data = new FormData(document.getElementById('add-book'))
	const url = document.getElementById('new-book-url').value
	data.append('title',work.title)
	data.append('author',name)
	data.append('open_lib_work_id',workid)
	data.append('imageurl',imageurl+'.jpg')
	axios.post(url,data)
	.then(res => {
		console.log(res.data)
		if (res.data == 1){
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
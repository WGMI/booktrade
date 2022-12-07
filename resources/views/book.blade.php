@extends('layouts.master')

@section('content')

<section class="bg-sand padding-small">
	<div class="container">
		<div class="row">
			<input id="workid" type="hidden" value="{{$id}}">

			<div class="col-md-4">
				<img alt="Cover" id="cover" onerror="this.src='images/main-banner2.jpg'" style="object-fit:fill;">
			</div>

			<div class="col-md-8 pl-5">
				<div class="book-controls">
					<a href="#" data-bs-toggle="modal" data-bs-target="#owner-modal">I own this book</a>
					<a href="">I want this book</a>
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
							<form id="add-book">
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
								<input class="btn btn-outline-dark btn-pill btn-xlarge btn-full" type="submit" onclick="addbook()" value="Add Book">
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

<script>

let title = document.getElementById('title')
let description = document.getElementById('desc')
let cover = document.getElementById('cover')
let author = document.getElementById('author')
let date = document.getElementById('date')

window.addEventListener("load",(e) => {
	let workid = document.getElementById('workid').value
	queryBook(workid)
})

const queryBook = (work) => {
	axios.get(`https://openlibrary.org/works/${work}.json`)
	.then(res => {
		let data = res.data
		title.innerHTML = data.title
		description.innerHTML = (data.description) ? data.description : `No description. Do you own this book? <a href="">Add a description.</a>`
		// date.innerHTML = data.subject_times
		getauthor(data.authors[0].author.key)

		let key 
		let value 

		if(data.covers){
			key = 'id'
			value = data.covers[0]
		}

		cover.src = `https://covers.openlibrary.org/b/${key}/${value}-L.jpg?default=false`
	})
	.catch(err => {
		console.log(err)
	})
}

const getauthor = (key) => {
	axios.get(`https://openlibrary.org${key}.json`)
	.then(res => {
		author.innerHTML = (res.data.personal_name)
	})
	.catch(err => {
		console.log(err)
	})
}

const addbook = () => {
	let data = new FormData(document.getElementById('add-book'))
	const url = document.getElementById('new-book-url').value
	console.log(url)
	axios.get('/test',{test:'test'})
	.then(res => console.log(res.data))
	.catch(err => console.log('Err:',err))
}

</script>

@endsection
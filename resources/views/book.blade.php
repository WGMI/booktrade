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
				<div class="product-detail">
					<h1 id="title">...</h1>
					<!-- <p>Fiction</p> -->
					<!-- <span class="price colored">$45.00</span> -->

					<p id="desc">
					</p>
					<button type="submit" name="add-to-cart" value="27545" class="button">Add to cart</button>
					
				</div>
			</div>

		</div>
	</div>
</section>

<script>

let title = document.getElementById('title')
let description = document.getElementById('desc')
let cover = document.getElementById('cover')

window.addEventListener("load",(e) => {
	let workid = document.getElementById('workid').value
	queryBook(workid)
})

const queryBook = (work) => {
	axios.get(`https://openlibrary.org/works/${work}.json`)
	.then(res => {
		let data = res.data
		title.innerHTML = data.title
		description.innerHTML = data.description

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

</script>

@endsection
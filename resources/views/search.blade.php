@extends('layouts.master')
@section('content')

<section id="featured-books">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

			<div class="search-bar">
				<form>
					<input type="text" id="search" placeholder="Search" class="big-search" value="{{$q}}">
					<button class="search-btn"><i class="icon icon-search"></i></button>
				</form>
			</div>

			<div class="product-list" data-aos="fade-up">
				<div class="row" id="search-items">
					
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

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>

window.addEventListener("load",(e) => {
	let query = document.getElementById('search').value
	queryLibrary(query)
})

const results = document.getElementById('search-items')

const queryLibrary = (query) => {
	axios.get(`http://openlibrary.org/search.json?q=${query}`)
	.then((res) => {
		let data = res.data.docs
		data.forEach(el => {
			console.log(el)
			let book = document.createElement('div')
			book.setAttribute('class','col-md-2 book')
			book.innerHTML = `
			<figure class="product-style">
				<a href=""><img src="images/product-item1.jpg" alt="Books" class="product-item"></a>
				<figcaption>
					<div class="titletext">
						<h4>${shorten(el.title,18)}</h4>
						<p>${shorten(el.author_name[0],16)}</p>
						<span class="tooltiptext">${el.title} by ${el.author_name[0]}</span>
					</div>
				</figcaption>
			</figure>
			`
			results.appendChild(book) 
		});
	})
	.catch((err) => {
		console.log(err)
	})
}

const shorten = (text,length) => {
	if(text.length > length){
		return text.substring(0,length - 3) + '...'
	}
	return text
}

</script>

@endsection
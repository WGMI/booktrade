@extends('layouts.master')
@section('content')

<section id="featured-books">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

			<div class="search-bar">
				<form action="{{url('search')}}" method="get">
					<input name="query" type="text" id="search" placeholder="Search" class="big-search" value="{{$q}}">
					<input type="submit" value="search">
					<!-- <button class="search-btn" type="submit"><i class="icon icon-search"></i></button> -->
				</form>
			</div>

			<div id="loading" class="loading">Loading...</div>

			<div class="product-list" data-aos="fade-up">
				<div class="row" id="search-items">
					
			    </div><!--ft-books-slider-->	
				<div class="more-results">
					<h4 id="moreheading" style="display:none;">More Results</h4>
					<ul id="more-results-area">
					</ul>
				</div>			
			</div><!--grid-->


			</div><!--inner-content-->
		</div>
		
		<!-- <div class="row">
			<div class="col-md-12">

				
			</div>		
		</div> -->
	</div>
</section>
<script>

window.addEventListener("load",(e) => {
	let query = document.getElementById('search').value
	queryLibrary(query)
})

const loading = document.getElementById('loading')
const results = document.getElementById('search-items')
const moreheading = document.getElementById('moreheading')
const moreresults = document.getElementById('more-results-area')

const queryLibrary = (query) => {
	const limit = 12
	axios.get(`http://openlibrary.org/search.json?q=${query}`)
	.then((res) => {
		loading.style.display = 'none';
		let data = res.data.docs
		moreheading.style.display = (data.length > limit) ? 'inline' : 'none'
		data.every((el,index) => {
			console.log(el.key)

			let author = el.author_name == null ? 'Unknown' : el.author_name[0]
			if(index < limit){
				let key 
				let value 

				if(el.cover_i){
					key = 'id'
					value = el.cover_i
				}else if(el.isbn){
					key = 'isbn'
					value = el.isbn[0]
				}

				let imageurl = `https://covers.openlibrary.org/b/${key}/${value}-M.jpg?default=false`
				let book = document.createElement('div')
				book.setAttribute('class','col-md-2 book')
				book.innerHTML = `
				<figure class="product-style">
					<a href="book${el.key}"><img src="${imageurl}" onerror="this.src='{{asset("images/product-item1.jpg")}}'" alt="Cover image" class="product-item"></a>
					<figcaption>
						<div class="titletext">
							<div class="book-details">
								<span class="book-title">${(el.title)}</span>
								<br>
								<span>${(author)}</span>
							</div>
							<span class="tooltiptext">${el.title} by ${author}</span>
						</div>
					</figcaption>
				</figure>
				`
				results.appendChild(book) 
			}else{
				let listitem = document.createElement('li')
				listitem.innerHTML = `<a href="#">${el.title} by ${author}</a>`
				moreresults.appendChild(listitem)
			}
			
			return true
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
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

			<div style="margin-left: auto; margin-right: auto; width:100%; background-color:red; display:block;">test</div>
			<div class="loader" id="loader"></div>

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

const results = document.getElementById('search-items')
const moreheading = document.getElementById('moreheading')
const moreresults = document.getElementById('more-results-area')

const queryLibrary = (query) => {
	const limit = 12
	axios.get(`http://openlibrary.org/search.json?q=${query}`)
	.then((res) => {
		let data = res.data.docs
		moreheading.style.display = (data.length > limit) ? 'inline' : 'none'
		data.every((el,index) => {
			let author = el.author_name == null ? 'Unknown' : el.author_name[0]
			if(index < limit){
				let book = document.createElement('div')
				book.setAttribute('class','col-md-2 book')
				book.innerHTML = `
				<figure class="product-style">
					<a href=""><img src="images/product-item1.jpg" alt="Books" class="product-item"></a>
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
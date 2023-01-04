@extends('layouts.master')
@section('content')

<section id="featured-books">
	<div class="container">

    @if(session()->has('success'))
		<div id="message" class="alert alert-success" role="alert">{{session('success')}} <a href="#" onclick="document.getElementById('message').innerHTML = '';document.getElementById('message').classList = ''">Close</a></div>
	@endif

		<div class="row">
			<div class="col-md-12">
                <div class="section-header align-center">
                    <h2 class="section-title">Orders</h2>
                    <h3>{{sizeof($orders)}} @choice('Order|Orders',sizeof($orders)) and {{sizeof($offers)}} @choice('Offer|Offers',sizeof($offers))</h3>
                </div>

                @if(sizeof($orders))
                <h3>Your Orders</h3>
                @endif

                <input id="remove-url" type="hidden" value="{{url('/order')}}">
                @foreach($orders as $o)
                <div class="row" id="search-items">
                    @php 
                    $ordered_book = \App\Models\Book::find($o->ordered_book_id);
                    $offered_book = \App\Models\Book::find($o->offered_book_id);
                    @endphp
    
                    @if($offered_book)
                    <p>{{$ordered_book->title}} for {{$offered_book->title}}</p>
                    @else
                    <p><a href="{{url('library/offer/'.$o->id)}}">Select a book</a> from your library to trade for {{$ordered_book->title}}</p>
                    @endif

                    <a href="{{url('library/offer/'.$o->id)}}">Edit Order</a>
                    <a href="#" onclick="remove({{$o->id}})" style="text-decoration:none;color:red;">Remove Order</a>

                    <div class="col-md-3">
                        <figure class="product-style">
                            <a href="{{url('book/works/'.$ordered_book->open_lib_work_id)}}"><img src="{{$ordered_book->cover_url}}" onerror="this.src='{{asset("images/product-item1.jpg")}}'" alt="Books" class="product-item"></a>
                            <figcaption>
                                <h3>{{$ordered_book->title}}</h3>
                                <p>{{$ordered_book->author}}</p>
                            </figcaption>
                        </figure>
                    </div>

                    @if($o->offered_book_id)
                    <div class="col-md-3">
                        <figure class="product-style">
                            <a href="{{url('book/works/'.$offered_book->open_lib_work_id)}}"><img src="{{$offered_book->cover_url}}" onerror="this.src='{{asset("images/product-item1.jpg")}}'" alt="Books" class="product-item"></a>
                            <figcaption>
                                <h3>{{$offered_book->title}}</h3>
                                <p>{{$offered_book->author}}</p>
                            </figcaption>
                        </figure>
                    </div>
                    @else
                    <div class="col-md-3">
                        <figure class="product-style">
                            <a href="#"><img src="{{asset('images/blank.jpg')}}" alt="Books" class="product-item"></a>
                            <figcaption>
                                <h3>Not Chosen</h3>
                                <p>Select from their library</p>
                            </figcaption>
                        </figure>
                    </div>
                    @endif

                    <hr style="border: 1px solid;">
                    
                    @endforeach
                </div>

                @if(sizeof($offers))
                <h3>Offers From Other Booktraders</h3>
                @endif

                @foreach($offers as $o)
                <div class="row" id="search-items">
                    @php 
                    $offered_book = \App\Models\Book::find($o->offered_book_id);
                    $ordered_book = \App\Models\Book::find($o->ordered_book_id);
                    @endphp
    
                    @if($offered_book)
                    <p>{{$ordered_book->title}} for {{$offered_book->title}}</p>
                    @else
                    <p><a href="{{url('library/select/'.$o->id.'/'.$o->user_id)}}">Select a book</a> from {{\App\Models\User::find($o->user_id)->name}}'s library to trade for {{$ordered_book->title}}</p>
                    @endif

                    <a href="{{url('/offer/'.$o->id.'/accept')}}">Accept Offer</a>

                    <div class="col-md-3">
                        <figure class="product-style">
                            <a href="{{url('book/works/'.$ordered_book->open_lib_work_id)}}"><img src="{{$ordered_book->cover_url}}" onerror="this.src='{{asset("images/product-item1.jpg")}}'" alt="Books" class="product-item"></a>
                            <figcaption>
                                <h3>{{$ordered_book->title}}</h3>
                                <p>{{$ordered_book->author}}</p>
                            </figcaption>
                        </figure>
                    </div>

                    @if($o->offered_book_id)
                    <div class="col-md-3">
                        <figure class="product-style">
                            <a href="{{url('book/works/'.$offered_book->open_lib_work_id)}}"><img src="{{$offered_book->cover_url}}" onerror="this.src='{{asset("images/product-item1.jpg")}}'" alt="Books" class="product-item"></a>
                            <figcaption>
                                <h3>{{$offered_book->title}}</h3>
                                <p>{{$offered_book->author}}</p>
                            </figcaption>
                        </figure>
                    </div>
                    @else
                    <div class="col-md-3">
                        <figure class="product-style">
                            <a href="#"><img src="{{asset('images/blank.jpg')}}" alt="Books" class="product-item"></a>
                            <figcaption>
                                <h3>Not Chosen</h3>
                                <p>Select from their library</p>
                            </figcaption>
                        </figure>
                    </div>
                    @endif
                    
                    <hr style="border: 1px solid;">
                    
                    @endforeach
                </div>
            </div>
        </div>
	</div>
</section>

<script>

const remove = (id) => {
	axios.post(document.getElementById('remove-url').value + '/' + id,null)
	.then(res => window.location.reload())
	.catch(err => console.log(err))
}

</script>

@endsection
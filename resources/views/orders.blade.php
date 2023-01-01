@extends('layouts.master')
@section('content')

<section id="featured-books">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

                <div class="section-header align-center">
                    <h2 class="section-title">Orders</h2>
                </div>

                @if(sizeof($orders))
                <h3>Orders</h3>
                @endif

                @foreach($orders as $o)
                @php 
                $book = \App\Models\Book::find($o->ordered_book_id);
                $offered_book = \App\Models\Book::find($o->offered_book_id);
                @endphp
                @if($offered_book)
                <p>{{$book->title}} for {{$offered_book->title}}</p>
                @else
                <p>Select a book from your library to trade for {{$book->title}}</p>
                @endif
                <div class="col-md-3">
                    <figure class="product-style">
                        <a href="{{url('book/works/'.$book->open_lib_work_id)}}"><img src="{{$book->cover_url}}" onerror="this.src='images/product-item1.jpg'" alt="Books" class="product-item"></a>
                        <figcaption>
                            <h3>{{$book->title}}</h3>
                            <p>{{$book->author}}</p>
                        </figcaption>
                    </figure>
                </div>

                @if($o->offered_book_id)
                <div class="col-md-3">
                    <figure class="product-style">
                        <a href="{{url('book/works/'.$offered_book->open_lib_work_id)}}"><img src="{{$offered_book->cover_url}}" onerror="this.src='images/product-item1.jpg'" alt="Books" class="product-item"></a>
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
                            <p>Select from your library</p>
                        </figcaption>
                    </figure>
                </div>
                @endif
                @endforeach              

                @if(sizeof($offers))
                <h3>Offers</h3>
                @endif

                @foreach($offers as $o)
                @php 
                $book = \App\Models\Book::find($o->offered_book_id);
                $ordered_book = \App\Models\Book::find($o->ordered_book_id);
                @endphp
                
                @if($book)
                <p>{{$ordered_book->title}} for {{$book->title}}</p>
                @else
                <p>Select a book from {{\App\Models\User::find($o->user_id)->first()->name}}'s library to trade for {{$ordered_book->title}}</p>
                @endif
                @endforeach
                <div class="col-md-3">
                    <figure class="product-style">
                        <a href="{{url('book/works/'.$ordered_book->open_lib_work_id)}}"><img src="{{$ordered_book->cover_url}}" onerror="this.src='images/product-item1.jpg'" alt="Books" class="product-item"></a>
                        <figcaption>
                            <h3>{{$ordered_book->title}}</h3>
                            <p>{{$ordered_book->author}}</p>
                        </figcaption>
                    </figure>
                </div>

                @if($o->offered_book_id)
                <div class="col-md-3">
                    <figure class="product-style">
                        <a href="{{url('book/works/'.$offered_book->open_lib_work_id)}}"><img src="{{$offered_book->cover_url}}" onerror="this.src='images/product-item1.jpg'" alt="Books" class="product-item"></a>
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
            </div>

        </div>
	</div>
</section>

<script>


</script>

@endsection
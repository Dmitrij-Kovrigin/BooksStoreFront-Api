@extends('layouts.front')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>{{$outfit->type}}</h1>



                </div>
                <div class="card-body">
                    <div class="row justify-content-center">

                        <div class="col-md-12">
                            <div class="book">

                                {{-- <div class="book__title">
                            <a href="{{route('books_store_show_book', $book->id)}}"> {{$book->title}}</a>

                            </div> --}}

                            <div class="book__images">

                                @forelse($outfit->photos as $photo)

                                <div class="book__images__img">
                                    <img src="{{$photo->photo}}">
                                </div>
                                @empty
                                <div class="book__images__img">
                                    <img src="{{asset('img/noimage.png')}}">

                                </div>

                                @endforelse
                                {{-- <img src="{{$book->photo ?? asset('img/noimage.png')}}"> --}}

                            </div>


                            {{-- <div class="book__author">
                                {{$outfit->pages}}
                        </div> --}}
                        <div class="book__info">

                            Brand name: {{$outfit->brand}}
                        </div><br>
                        <div class="book__tags">
                            @forelse($outfit->tags as $tag)
                            <div class="book__tags__tag">

                                <span class="badge rounded-pill badge-warning" style="color:black;"> {{$tag->name}}</span>

                            </div>
                            @empty
                            <h3>No tags </h3>
                            @endforelse
                        </div>

                        <div class="book__info">
                            <div>Price: {{$outfit->price}}</div><br>

                            <div>Discount: {{$outfit->discount}}</div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection

@extends('layouts.front')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Books</h1>
                    {{-- <div class="front-sort">
                        <form action="{{route('books')}}" method="get">
                    <div class="form-group">
                        <label>Sort by:</label>
                        <select class="form-control" name="sort">
                            <option value="title">Title</option>
                            <option value="price_asc" @if ('price_asc'==$select) selected @endif>Price start from lowest</option>
                            <option value="price_desc" @if ('price_desc'==$select) selected @endif>Price start from highest</option>
                        </select>
                        <button type="submit" class="btn-sm btn-warning mt-2">Sort</button>
                        <a href="{{route('books')}}" class="btn-sm btn-secondary mt-2 p-2">Reset</a>
                    </div>
                    </form>
                </div> --}}
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    @foreach($books as $book)
                    <div class="col-md-4">
                        <div class="book">
                            {{-- <div class="book__cat">
                                    {{$book->cat}}
                        </div> --}}
                        <div class="book__title">
                            <a href="{{route('books_store_show_book', $book->id)}}"> {{$book->title}}</a>

                        </div>
                        {{-- <div class="book__image">
                                    <img src="{{$book->img}}">
                    </div> --}}
                    <div class="book__image">
                        <div class="book__image__img">

                            <img src="{{$book->photo ?? asset('img/noimage.png')}}">
                        </div>
                    </div>


                    <div class="book__author">
                        {{$book->author}}
                    </div>
                    <div class="book__about">
                        {{$book->about}}
                    </div>
                    <div class="book__info">
                        <div>Pages: {{$book->pages}}</div><br>
                        <div>Isbn: {{$book->isbn}}</div>
                    </div>


                    {{-- <div class="book__price">
                        <span> {{$book->price}} Eur</span>
                    <button class="btn btn-primary mt-2">Buy</button>
                </div> --}}
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
</div>
</div>
</div>
@endsection

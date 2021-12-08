@extends('layouts.app')

@section('content')
<div class="authors_panel_page">
    <div class="authors_panel_block">
        <div class="books_h4">
            <h2>Панель автора</h2>
        </div>
        <div class="authors-books">
            <div class="book_add">
                <a href="{{ url('/add-book') }}">Добавить книгу</a>
            </div>
            <div class="authors_books_show">
                <div class="books_h4">
                    <h4>Ваши книги:</h4>
                </div>
                <div class="book_show_block">
                    @if (!$books->isEmpty())
                        <div class="books_block_display">
                            @foreach ($books as $book)
                            <div class="book_show">
                                @php
                                    $shortTitle = Str::limit($book->title, 20, '...')
                                @endphp
                                <h5><a class="book_show_a" href="{{ url('/book/'.$book->slug) }}">{{ $shortTitle }}</h5></a>
                                <a href="{{ url('/book/'.$book->slug) }}"><img src="{{ asset('img/books/' . $book->image) }}" alt="kartinka"></a>
                                
                                <div class="book_link_block">
                                    <a href="{{ url('/edit-book', $book->slug) }}">Редактировать</a>
                                    <a href="{{ '/chapters-panel/'. $book->slug}}">Панель глав</a>
                                    <a  href="{{ url('/delete-book/'. $book->slug) }}">Удалить книгу</a>
                                </div>
                            </div>
                        @endforeach</div>
                        <div class="book_links">
                            {{ $books->links('vendor.pagination.custom') }}
                            
                        </div>
                    @else
                        <h5>У вас пока нет книг</h5>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection

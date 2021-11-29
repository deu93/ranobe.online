@extends('layouts.app')

@section('content')
<div class="authors_panel_page">
    <div class="authors_panel_block">
        <h2>Панель автора</h2>
        
        <div class="authors-books">
            <div class="book-add">
                <a href="{{ url('/add-book') }}">Добавить книгу</a>
            </div>
            <div class="authors_books_show">
                <div class="books_h2">
                    <h4>Ваши книги:</h4>
                </div>
                <div class="book_show_block">
                    @if (!$books->isEmpty())
                        <div class="books_block_display">
                            @foreach ($books as $book)
                            <div class="book_show">
                                @php
                                    $shortTitle = Str::limit($book->title, 25, '...')
                                @endphp
                                <h5>{{ $shortTitle }}</h5>
                                <img src="{{ asset('img/books/' . $book->image) }}" alt="kartinka">
                                <a href="#">Редактировать</a>
                                <a href="#">Добавить главу</a>
                                <a href="#">Удалить книгу</a>
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

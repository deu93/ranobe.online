@extends('layouts.app')
@section('content')
<div class="moderate_page">
    <div class="moderate_block">
        <h2>Вы действительно хотите удалить книгу <br> {{ $book->title }}?</h2>
        <div class="table_block">
           <form action="{{ url('/book-delete/' . $book->slug) }}" method="POST">
            @csrf
            <div class="tlp12">
                <button type="submit">Удалить</button>
            </div>
        </form>
        </div>
            
    </div>
    
</div>
@endsection
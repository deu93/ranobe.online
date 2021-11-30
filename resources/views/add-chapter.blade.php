@extends('layouts.app')
@section('content')
<div class="add_book_page">
    <div class="add_chapter_block">
        <h2>Добавить главу</h2>
        <form action="{{ url('/add-chapter') }}" method="POST">
            @csrf
            <div class="add_chapter_item">
                <input type="text" name="chapter_name" id="chapter_name" placeholder="Название книги" value="">
            </div>
            <div class="add_chapter_item">
                <textarea  name="chapter_text" id="editor"  placeholder="Описание"></textarea>
                
                
            </div>

            <div class="add_chapter_item_button">
                <button type="submit">Добавить</button>
            </div>
        </form>
    </div>
    
</div>
@endsection
@section('scripts')
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
@extends('layouts.app')
@section('titles')
<h2 class="description_title">{{ $book->title }}</h2>
@endsection
@section('content')
<div class="moderate_page">
    <div class="moderate_block">
        
        <div class="table_block">
            <div class="table_block_border">
                @if ($chapters->count())
                <h2>Редактирование глав</h2>
                <div id="scroll_bar" class="table_block_scroll">
                    <table>
                        
                        <tr><th class="chapters-title">Глава</th><th>Редактировать</th><th>Удалить</th></tr>
                        @foreach ($chapters as $chapter)
                        <tr><td>{{ $chapter->chapter_name }}</td><td><a class="post_accept" href="{{ url('/edit-chapter/'.$chapter->id) }}"><i class="fas fa-edit"></i></a></td>
                        <td><a class="post_delete" href="{{ url('/delete-chapter/'.$chapter->id) }}"><i class="fas fa-times"></i></a></td></tr>
                        @endforeach
                        
                        
                    </table>
                </div>
                @else
                <div class="moderate_no_chapters">
                    <h3>Нет глав</h3>
                </div>
                @endif
                
                {{-- <div class="book_links">
                    @if ($chapters->links('vendor.pagination.custom'))
                    {{ $chapters->links('vendor.pagination.custom') }}
                    @endif
                </div> --}}
                
            </div>
            <div class="book_add">
                <a href="{{ url('/add-chapter/'. $book->slug) }}">Добавить главу</a>
            </div>
        </div>
            
    </div>
    
</div>
@endsection
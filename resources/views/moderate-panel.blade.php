@extends('layouts.app')
@section('content')
<div class="moderate_page">
    <div class="moderate_block">
        <h2>Панель модерирования комментариев</h2>
        <div class="table_block">
            <div class="table_block_border">
                @if ($posts->count())
                <table>
                        
                    <tr><th>Пользователь</th><th>Комментарий</th><th>Книга</th><th>Пропустить</th><th>Удалить</th></tr>
                    @foreach ($posts as $post)
                    <tr><td>{{ $post->name }}</td><td>{{ $post->body }}</td><td>{{ $post->title }}</td><td><a class="post_accept" href="{{ url('/moderate/accept/'.$post->id) }}"><i class="fas fa-check"></i></a></td>
                    <td><a class="post_delete" href="{{ url('/moderate/delete/'.$post->id) }}"><i class="fas fa-times"></i></a></td></tr>
                    @endforeach
                    
                    
                </table>
                @else
                <div class="moderate_no_chapters">
                    <h3>Нет новых комментариев</h3>
                </div>
                @endif
                
            </div>
        </div>
            
    </div>
    
</div>
@endsection
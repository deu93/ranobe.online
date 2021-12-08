@extends('layouts.app')
@section('content')
@php
    $shuffled = $books->shuffle();
    $shuffled->all();
@endphp
    <div  class="middle_column">
        <div id="content" class="view_change_style standart">
            @if ($books->count())
            @foreach ($shuffled as $book)
            <div class="middle_column_content">
                <div class="left_content">
                    <img class="left_content_img" src="{{ asset('img/books/' . $book->image) }}" alt="">
                    <a class="left_content_link" href="{{ url('/book/' . $book->slug) }}">Читать</a>
                </div>
                <div class="right_content">
                    <a href="{{ url('/book/' . $book->slug) }}">
                        <h2>{{ $book->title }}</h2>
                    </a>
                    <div class="last_chapter">
                            @if ($book->chapter->last())
                                <a href="{{ url('/'.$book->slug.'/'.$book->chapter->last()->slug) }}">
                            <h4>
                                
                            @if ($book->chapter->last())
                                {{ $book->chapter->last()->chapter_name }}
                            @endif
                            </h4>
                        </a> 
                            @endif
                       
                    </div>
                    @php
                        $shortDescription = Str::limit($book->description, 250, '...')
                    @endphp
                    <p class="book_description">
                       {{ $shortDescription }}
                    </p>  
                    <div class="section_likes">
                        <p class="last_update">
                            @if ($book->chapter->last())
                            {{ $book->chapter->last()->updated_at->diffForHumans() }}
                            @endif
                        </p>
                        <div class="likes">
                              <form action="{{ route('book.likes', $book->id) }}" method="POST">
                                  @csrf
                                <button class="btn_like">
                                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 109.37"><defs><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style></defs><title>playing-card-heart-shape</title><path class="cls-1" d="M61.44,19.23A41.21,41.21,0,0,1,71.25,7.29C90.05-8,117.34,1.91,122.25,26A28.34,28.34,0,0,1,122,39.11c-2.28,8.31-9.89,16.72-18,24.42-3.89,3.69-7.64,7.13-11.32,10.56-11.45,10.73-22.72,22-31.18,35.28C53,96.07,41.71,84.82,30.25,74.09c-3.67-3.43-7.42-6.87-11.31-10.56-8.15-7.7-15.75-16.11-18-24.42A28.34,28.34,0,0,1,.63,26c4.91-24.11,32.2-34,51-18.73a41.24,41.24,0,0,1,9.82,11.94Z"/></svg>
                                </button>
                              </form>
                            <p class="likes_count">
                               {{ $book->likes->count() }}
                            </p>
                            <form action="{{ route('book.dislikes', $book->id) }}" method="POST">
                                @csrf
                                <button class="btn_dislike">
                                    <?xml version="1.0" encoding="utf-8"?><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 101.54" style="enable-background:new 0 0 122.88 101.54" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M66.45,11.99C72.23,6,77.7,1.31,87.33,0.21c22.83-2.62,43.82,20.75,32.29,43.76 c-3.28,6.56-9.96,14.35-17.35,21.99c-8.11,8.4-17.08,16.62-23.37,22.86l-6.8,6.74l-7.34-10.34l8.57-12.08l-7.09-6.45l5.89-7.76 l-8.17-11.52l8.17-11.52l-5.89-7.76l7.09-6.45L66.45,11.99L66.45,11.99z M55.81,101.54l-10.04-9.67 C28.73,75.46,0.94,54.8,0.02,29.21C-0.62,11.28,13.53-0.21,29.8,0c13.84,0.18,20.05,6.74,28.77,15.31l3.49,4.92l-2.02,1.83 l-0.01-0.01l-0.65,0.61l-4.54,4.13l0.06,0.08l-0.05,0.04l2.64,3.47l1.65,2.24l0.03-0.03l2.39,3.15l-8,11.28l-0.07,0.06l0.01,0.02 l-0.01,0.02l0.07,0.06l8,11.28l-2.39,3.15l-0.03-0.03l-1.64,2.23l-2.64,3.48l0.05,0.04l-0.06,0.08l4.54,4.13l0.65,0.61l0.01-0.01 l2.02,1.83l-7.73,10.89l0.05,0.05l-0.05,0.05l7.73,10.89l-2.02,1.83l-0.01-0.01l-0.65,0.61L55.81,101.54L55.81,101.54z"/></g></svg>
                                </button>
                            </form>
                            <p class="dislikes_count">
                                {{ $book->dislikes->count() }}
                            </p>
                        </div>
                    </div>     
                </div>
            </div>
            @endforeach
            @else
                <div class="no_finished">
                    <h3 class="">Нет законченных книг</h3>
                </div>
            @endif
            <div class="book_links">
                @if ($books->links('vendor.pagination.custom'))
                {{ $books->links('vendor.pagination.custom') }}
                @endif
            </div>
        </div>
    </div>
    <div class="mobile">
        <div id="content" class="view_change_style standart">
            @if ($books->count())
              @foreach ($shuffled as $book)
            
            <div class="middle_column_content">
                <div class="left_content">
                    <a href="{{ url('/book/' . $book->slug) }}">
                        <h2>{{ $book->title }}</h2>
                    </a>
                    <p class="last_update">
                        @if ($book->chapter->last())
                            {{ $book->chapter->last()->updated_at->diffForHumans() }}
                        @endif
                    </p>
                    <img class="left_content_img" src="{{ asset('img/books/' . $book->image) }}" alt="">
                    <div class="last_chapter">
                            @if ($book->chapter->last())
                            <a href="{{ url('/'.$book->slug.'/'.$book->chapter->last()->slug) }}">
                             <h4>
                                
                            @if ($book->chapter->last())
                                {{ $book->chapter->last()->chapter_name }}
                            @endif
                            </h4>
                              </a> 
                            @endif
                    </div>
                    <a class="left_content_link" href="{{ url('/book/' . $book->slug) }}">Читать</a>
                    <div class="section_likes">
                        <div class="likes">
                            <form action="{{ route('book.likes', $book->id) }}" method="POST">
                                @csrf
                              <button class="btn_like">
                                  <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 109.37"><defs><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style></defs><title>playing-card-heart-shape</title><path class="cls-1" d="M61.44,19.23A41.21,41.21,0,0,1,71.25,7.29C90.05-8,117.34,1.91,122.25,26A28.34,28.34,0,0,1,122,39.11c-2.28,8.31-9.89,16.72-18,24.42-3.89,3.69-7.64,7.13-11.32,10.56-11.45,10.73-22.72,22-31.18,35.28C53,96.07,41.71,84.82,30.25,74.09c-3.67-3.43-7.42-6.87-11.31-10.56-8.15-7.7-15.75-16.11-18-24.42A28.34,28.34,0,0,1,.63,26c4.91-24.11,32.2-34,51-18.73a41.24,41.24,0,0,1,9.82,11.94Z"/></svg>
                              </button>
                            </form>
                          <p class="likes_count">
                             {{ $book->likes->count() }}
                          </p>
                          <form action="{{ route('book.dislikes', $book->id) }}" method="POST">
                              @csrf
                              <button class="btn_dislike">
                                  <?xml version="1.0" encoding="utf-8"?><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 101.54" style="enable-background:new 0 0 122.88 101.54" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M66.45,11.99C72.23,6,77.7,1.31,87.33,0.21c22.83-2.62,43.82,20.75,32.29,43.76 c-3.28,6.56-9.96,14.35-17.35,21.99c-8.11,8.4-17.08,16.62-23.37,22.86l-6.8,6.74l-7.34-10.34l8.57-12.08l-7.09-6.45l5.89-7.76 l-8.17-11.52l8.17-11.52l-5.89-7.76l7.09-6.45L66.45,11.99L66.45,11.99z M55.81,101.54l-10.04-9.67 C28.73,75.46,0.94,54.8,0.02,29.21C-0.62,11.28,13.53-0.21,29.8,0c13.84,0.18,20.05,6.74,28.77,15.31l3.49,4.92l-2.02,1.83 l-0.01-0.01l-0.65,0.61l-4.54,4.13l0.06,0.08l-0.05,0.04l2.64,3.47l1.65,2.24l0.03-0.03l2.39,3.15l-8,11.28l-0.07,0.06l0.01,0.02 l-0.01,0.02l0.07,0.06l8,11.28l-2.39,3.15l-0.03-0.03l-1.64,2.23l-2.64,3.48l0.05,0.04l-0.06,0.08l4.54,4.13l0.65,0.61l0.01-0.01 l2.02,1.83l-7.73,10.89l0.05,0.05l-0.05,0.05l7.73,10.89l-2.02,1.83l-0.01-0.01l-0.65,0.61L55.81,101.54L55.81,101.54z"/></g></svg>
                              </button>
                          </form>
                          <p class="dislikes_count">
                              {{ $book->dislikes->count() }}
                          </p>
                      </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="no_finished">
                <h3 class="">Нет законченных книг</h3>
            </div>  
            @endif
            
            <div class="book_links">
                @if ($books->links('vendor.pagination.custom'))
                {{ $books->links('vendor.pagination.custom') }}
                @endif
            </div>
        </div>
    </div>

@endsection
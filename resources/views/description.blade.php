@extends('layouts.app')
@section('title')
{{ $book->title . " — "}} 
@endsection
@section('titles')
<h2 class="description_title">{{ $book->title }}</h2>
@auth
    @if (auth()->user()->role == 5)
    <h3 class="description_title"> Просмотров {{ $book_views->views }}</h3>
    @endif
@endauth
@endsection
@section('content')
<div  class="middle_column">
    <div class="content_left">
        <img src="{{ asset('img/books/' . $book->image) }}" alt="" class="content_left_img">
        @if ($book->chapter->count())
        <a class="content_left_link" href="{{ '/reader/'. $book->slug . '/'.$book->chapter->first()->slug }}">Начать читать</a>
            
        @endif
        @auth
            @if ((auth()->user()->role == 2 and $book->user_id == auth()->user()->id) or auth()->user()->role > 3)
            <div class="tlp">
                <a class="" href="{{ '/edit-book/'. $book->slug }}">Редактировать книгу</a>
            </div>
            <div class="tlp1">
                <a class="" href="{{  '/chapters-panel/'. $book->slug}}">Панель глав</a>
            </div>
            @if (auth()->user()->role == 5)
            <div class="tlp3">
             <a class="" href="{{  '/add-chapters/'. $book->slug}}">Панель добавления</a>
         </div>
            <div class="tlp5">
             <a class="" href="{{  '/status_change/'. $book->slug}}">Книга закончена</a>
         </div>
            @endif
            <div class="tlp4">
                <a class="" href="{{ '/book-delete/'. $book->slug }}">Удалить книгу</a>
            </div>
            @endif
        @endauth
    </div>

    <div class="content_right">
        <div class="content_right_top">
            <div class="content_right_leftside">
                <div class="content_right_block">
                    <div class="svg_bg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="cont">
                        <h4>Опубликовано: </h4>
                        <p>{{ $book->created_at->toDateString() }}</p>
                    </div>
                </div>
                <div class="content_right_block">
                    <div class="svg_bg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " viewBox="0 0 20 20" fill="currentColor"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
                    </div>
                    <div class="cont">
                        <h4>Автор: </h4>
                        <p>{{ $book->author }}</p>
                    </div>
                </div>
                <div class="content_right_block">
                    <div class="svg_bg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="cont">
                        <h4>Жанры: </h4>
                        <div class="cont_genres">
                            <div class="textContainer_Truncate1">
                                @foreach ($arr_gen as $item )
                                @if ($item != end($arr_gen))
                                
                                    <p>{{ $item }}, </p>
                                @else
                                <p>{{ $item }} </p>
                                @endif
                            @endforeach
                            </div>
                                
                                
                        </div>
                    </div>
                </div>
            </div>
            <div class="content_right_rightside">
                <div class="content_right_block">
                    <div class="svg_bg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="cont">
                        <h4>Рейтинг книги:</h4>
                        <div class="ratings">
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
                <div class="content_right_block">
                    <div class="svg_bg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="cont">
                        <h4>Страна: </h4>
                        <p>{{ $book->country }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="content_right_bot">
            <div class="tab">
                <button  class="tablinks" onclick="openCity(event, 'description')" id="defaultOpen">Описание</button>
                <button class="tablinks" onclick="openCity(event, 'about')">О книге</button>
                
              </div>
            <div class="right_description">
                <div id="description" class="tabcontent">
                    <div id="select_text" class="textContainer_Truncate">
                        <p>{{ $book->description }}</p>
                    </div>
                  </div>

                  <div id="about" class="tabcontent">
                    <p class="about"><pre>{{ $book->about }}</pre>
                  </div>
                
            </div>
        </div>
    </div>
</div>

<div class="mobile">
    <div class="middle_column_content">
        <div class="left_content">
            
            <a href="{{ url('/book/' . $book->slug) }}">
                <h2>{{ $book->title }}</h2>
            </a>
            
            <img class="left_content_img" src="{{ asset('img/books/' . $book->image) }}" alt="">
            @if($book->chapter->count())
            <a class="left_content_link description_link" href="{{ url('/reader/' . $book->slug . '/' . $book->chapter->first()->slug) }}">Начать читать</a>
            @endif
            @auth
            @if ((auth()->user()->role == 2 and $book->user_id == auth()->user()->id) or auth()->user()->role > 3)
            <div class="tlp">
                <a class="" href="{{ '/edit-book/'. $book->slug }}">Редактировать книгу</a>
            </div>
            <div class="tlp1">
                <a class="" href="{{  '/chapters-panel/'. $book->slug}}">Панель глав</a>
            </div>
            <div class="tlp2">
                <a class="" href="{{ '/book-delete/'. $book->slug }}">Удалить книгу</a>
            </div>
            @endif
        @endauth
             <div class="description_content">
                <div class="content_right_block">
                    <div class="svg_bg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="cont">
                        <h4>Рейтинг книги:</h4>
                        <div class="ratings">
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
                <div class="content_right_block">
                    <div class="svg_bg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="cont">
                        <h4>Жанры: </h4>
                        <div class="cont_genres">
                            <div class="textContainer_Truncate1">
                                @foreach ($arr_gen as $item )
                                @if ($item != end($arr_gen))
                                
                                    <p>{{ $item }}, </p>
                                @else
                                <p>{{ $item }} </p>
                                @endif
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
             </div>
             
             <div class="content_right_bot">
                <div class="tab">
                    <button  class="tablinks1" onclick="openCity1(event, 'description1')" id="defaultOpen1">Описание</button>
                    <button class="tablinks1" onclick="openCity1(event, 'about1')">О книге</button>
                    
                  </div>
                <div class="content_right_description">
                    <div id="description1" class="tabcontent1">
                        <div id="select_text" class="textContainer_Truncate">
                            <p>{{ $book->description }}</p>
                        </div>
                      </div>
    
                      <div id="about1" class="tabcontent1">
                        <p class="about"><pre>{{ $book->about }}</pre>
                      </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="chapters">
    <div class="chapters_info">
        <div class="chapters_list">
            <div class="hearder_chapters_list">
                Список глав
            </div>
           <div id="scroll_bar" class="chapter_block">
           @foreach ($chapters as $chapter )
               <div class="chapter">
                    <a href="{{url('/reader/'.$book->slug.'/'.$chapter->slug)}}">{{ $chapter->chapter_name }}</a>
                </div>
           @endforeach
            
           </div>
        </div>
        
    </div>
    
</div>
<div class="comments">
    @if ($posts->count())
        <h2>Комментарии {{ $count_posts->count() }}</h2>
    @else
        <h2>Комментариев нет</h2>
    @endif
    
    @auth
    <div class="add_comment">
        <form action="{{ url('/add-post/'. $book->slug) }}" method="POST">
            @csrf
            <textarea name="body" placeholder="Написать комментарий" class="@error('body') error  @enderror" ></textarea>
            @error('body')
                <div class="error_text">
                    Поле не может быть пустым.
                </div>
            @enderror
            <button class="add_comment_btn" type="submit">	
                &#10140;</button>
        </form>
    </div>
    @endauth
    <div class="comments_block">
        @foreach ($posts as $post)
        @if ($post->moderated == '1')
        <div class="comment">
            <div class="profile_block">
                <div class="profile_img">
                    {{ $post->name[0] }}
                </div>
                <div class="com_block">
                    <h3>{{ $post->name }}</h3>
                    <small>{{  Carbon\Carbon::parse($post->created_at)->format('Y-m-d') }}</small>
                </div>
            </div>
            
            <p>
                {{ $post->body }}
            </p>
        </div>
        
        @endif
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('/js/main.js') }}"
type="text/javascript" charset="utf-8" ></script>
@endsection
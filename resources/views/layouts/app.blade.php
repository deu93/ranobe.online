<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,600;0,800;1,400;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7YG7V8LL5H"></script>
    
    <title>@yield('title') Читать ранобэ онлайн</title>
    <meta name="description" content="Читайте ранобэ у нас! Все ранобэ бесплатно и без регистрации! Переводы популярных ранобэ на русском языке. Присоединяйтесь!
"/>
    <meta name="keywords" content=" ранобэ, ранобэ онлайн, читать ранобэ, читать ранобэ онлайн, ранобэ бесплатно, ранобэ романтика, ранобэ по жанрам, ранобэ про любовь, ранобэ русская, ранобэ на русском, перевод ранобэ, лучшая ранобэ, топ ранобэ, каталог ранобэ, популярная ранобэ
"/>
    <title>Ranobe.online</title>
</head>
<body>
<section>
    @php
        if(!isset($admin)){
                $inner_content = 'inner_content' ;
                $vbt = 'vbt' ;
                $view_button = 'view_button';
                $container = 'container';
                $container_content = 'container_content';
                $sticky_column = 'sticky_column';
            
            }else{
                $container = 'container_admin';
                $container_content = 'container_content_admin';
                $inner_content = 'inner_content_admin';
                $vbt = 'vbt_admin';
                $view_button = 'view_button_admin';
                $sticky_column = 'sticky_column_admin';
            } 
             @endphp
    <div class="{{ $container }}">
        <div class="{{ $container_content }}">
            <div class="{{ $sticky_column }}">
                <div class="logo">
                    <a href="/"><img src="{{ asset('img/letter_r_PNG93944.png') }}" alt=""></a>
                </div>
                <div class="sticky_column_cont">
                    <div class="menu">
                        <div class="dropdown">
                            <button onclick="myFunction()" class="dropbtn"><i class="fas fa-bars"></i></button>
                            <div id="myDropdown" class="dropdown-content">
                                <a href="{{ url('/all-books') }}">Все книги</a>
                                
                                <a href="{{ url('/finished-books') }}">Законченные</a>
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="auth">
                        <div class="auth_block">
                            <div class="auth-dropdown">
                                <button onclick="authDropdown()" class="auth-dropbtn btn"><i class="fas fa-user-alt"></i></button>
                                <div id="authDropdown" class="dropdown-content">
                                  @guest
                                  <a href="{{ url('/login') }}">Войти</a>
                                  <a href="{{ url('/register') }}">Зарегистрироваться</a>
                                  @endguest
                                  @auth
                                      <a href="{{ url('/profile') }}">{{ auth()->user()->name }}</a>
                                      @if (auth()->user()->role > 1)
                                      <a href="{{ url('/authors-panel') }}">Панель автора</a>
                                      @endif
                                      @if (auth()->user()->role == 1 or auth()->user()->role > 2 )
                                      <a href="{{ url('/moderate-panel') }}">Панель модерации</a>
                                      @endif
                                      @if (auth()->user()->role == 5)
                                      <a href="{{ url('/admin-panel') }}">Панель администратора</a>
                                      @endif
                                      <form action="{{ url('/logout') }}" method="POST">
                                          @csrf
                                          <div class="logout_btn">
                                                <button type="submit" >Выйти</button>  
                                          </div>
                                          
                                      </form>
                                  @endauth
                                </div>
                              </div>
                        </div>
                    </div>
                    
                        @if(!isset($menu))
                    <div class="search">
                        <a href="{{ url('/search') }}">
                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 119.828 122.88" enable-background="new 0 0 119.828 122.88" xml:space="preserve"><g><path d="M48.319,0C61.662,0,73.74,5.408,82.484,14.152c8.744,8.744,14.152,20.823,14.152,34.166 c0,12.809-4.984,24.451-13.117,33.098c0.148,0.109,0.291,0.23,0.426,0.364l34.785,34.737c1.457,1.449,1.465,3.807,0.014,5.265 c-1.449,1.458-3.807,1.464-5.264,0.015L78.695,87.06c-0.221-0.22-0.408-0.46-0.563-0.715c-8.213,6.447-18.564,10.292-29.814,10.292 c-13.343,0-25.423-5.408-34.167-14.152C5.408,73.741,0,61.661,0,48.318s5.408-25.422,14.152-34.166C22.896,5.409,34.976,0,48.319,0 L48.319,0z M77.082,19.555c-7.361-7.361-17.53-11.914-28.763-11.914c-11.233,0-21.403,4.553-28.764,11.914 C12.194,26.916,7.641,37.085,7.641,48.318c0,11.233,4.553,21.403,11.914,28.764c7.36,7.361,17.53,11.914,28.764,11.914 c11.233,0,21.402-4.553,28.763-11.914c7.361-7.36,11.914-17.53,11.914-28.764C88.996,37.085,84.443,26.916,77.082,19.555 L77.082,19.555z"/></g></svg></a>
                    </div>
                    @else
                    <div class="menu_styles">
                        <div class="menu_styles_block">
                            <div class="menu_styles_dropdown">
                                <button onclick="menuStyles()" class="menu_styles_btn"><i class="fas fa-cog"></i></button>
                                <div id="menuStyles" class="dropdown-content menu_drp">
                                 <div class="menu_styles_item_block">
                                    
                                    <div class="menu_styles_item">
                                        <span>Шрифт</span> 
                                        <div class="menu_styles_item_btns">
                                            <button id="fontDecrem" class="button_style">-</button>
                                            <div id="fontCurrent"  class="display_style_block">0</div>
                                            <button id="fontIncrem"  class="button_style">+</button>
                                        </div>   
                                    </div>
                                    <div class="menu_styles_item">
                                        <span>Высота строк</span> 
                                        <div class="menu_styles_item_btns">
                                            <button id="lhDecrem" class="button_style">-</button>
                                            <div id="lhCurrent"  class="display_style_block">0</div>
                                            <button id="lhIncrem"  class="button_style">+</button>
                                        </div>   
                                    </div>
                                    <div class="menu_styles_item">
                                        <span>Сбросить настройки</span> 
                                        <div class="menu_styles_item_btns">
                                            <button id="clearLS" class="button_style">X</button>
                                          
                                        </div>   
                                    </div>
                                </div>
                                  
                                </div>
                              </div>
                        </div>
                    </div>
                    @endif
                </div>
             </div>
             
             @php
             if(!isset($admin)){
                 $inner_content = 'inner_content' ;
                 }else{
                     $inner_content = 'inner_content_admin';
                 }
             @endphp
            <div class=" {{ $inner_content }}">
                <div class="content">
                    <div class="left_side_content">
                        
                        <div class="{{ $vbt }}">
                            <div class="{{ $view_button }}">
                                @yield('titles')
                            </div>
                            <div class="view">
                                @yield('content')
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            @if(!isset($admin))
            <div class="right_side">
                <div class="ads">
                    @yield('ads')
                </div>
            </div>
            @endif
        </div>
        <div class="footer">
            <div class="footer_left_side">
                {{-- <div class="footer_links">
                    <a href="/">Политика возврата</a>
                    <a href="/">Обратная связь</a>
                    <a href="/">Пользовательское соглашение</a>
                </div> --}}
                <div class="footer_social">
                    <div class="copyright">
                        <p>
                            © 2021 Ранобэ.онлайн
                        </p>
                    </div>
                    {{-- <div class="social_links">
                        <a href="#"><i class="fab fa-discord"></i></a>
                        <a href="#"><i class="fab fa-vk"></i></a>
                        <a href="#"><i class="fab fa-telegram-plane"></i></a>
                    </div> --}}
                </div>
            </div>
            <div class="footer_right_side">

            </div>
            
        </div>
    </div>
</section>
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    @if (session('status'))
        <script>
            swal("{{ session('status') }}")
        </script>
    @endif
  @yield('scripts')
</body>
</html>
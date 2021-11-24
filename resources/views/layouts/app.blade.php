<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,600;0,800;1,400;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-7YG7V8LL5H"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-7YG7V8LL5H');
    </script>
    <title>Ранобэ. Читать ранобэ онлайн на русском. Ранобэ онлайн!</title>
    <meta name="description" content="Ранобэ, Ранобэ онлайн! У нас всё ранобэ бесплатно и без регистрации! Читать ранобэ! ранобэ на русском языке, переводы ранобэ, популярнае ранобэ!
"/>
    <meta name="keywords" content=" ранобэ, ранобэ онлайн, читать ранобэ, читать ранобэ онлайн, ранобэ бесплатно, ранобэ романтика, ранобэ по жанрам, ранобэ про любовь, ранобэ русская, ранобэ на русском, перевод ранобэ, лучшая ранобэ, топ ранобэ, каталог ранобэ, популярная ранобэ
"/>
    <title>Ranobe.online</title>
</head>
<body>
<section>
    <div class="container">
        <div class="sticky_column">
            <div class="logo">
                <a href="/"><img src="{{ asset('img/letter_r_PNG93944.png') }}" alt=""></a>
            </div>
            <div class="sticky_column_cont">
                <div class="menu">
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn"><i class="fas fa-bars"></i></button>
                        <div id="myDropdown" class="dropdown-content">
                          <a href="/all-books">Все книги</a>
                          <a href="/by-genre">По жанрам</a>
                          <a href="/finished">Законченные</a>
                        </div>
                        
                      </div>
                    <!-- <button></button> -->
                </div>
                <div class="auth">
                    <div class="auth-dropdown">
                        <button onclick="authDropdown()" class="auth-dropbtn btn"><i class="fas fa-user-alt"></i></button>
                        <div id="authDropdown" class="dropdown-content">
                          <a href="/register">Зарегистрироваться</a>
                          <a href="/login">Войти</a>
                        </div>
                      </div>
                </div>
                <div class="search">
                    <a href="#">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="100px" viewBox="0 0 119.828 122.88" enable-background="new 0 0 119.828 122.88" xml:space="preserve"><g><path d="M48.319,0C61.662,0,73.74,5.408,82.484,14.152c8.744,8.744,14.152,20.823,14.152,34.166 c0,12.809-4.984,24.451-13.117,33.098c0.148,0.109,0.291,0.23,0.426,0.364l34.785,34.737c1.457,1.449,1.465,3.807,0.014,5.265 c-1.449,1.458-3.807,1.464-5.264,0.015L78.695,87.06c-0.221-0.22-0.408-0.46-0.563-0.715c-8.213,6.447-18.564,10.292-29.814,10.292 c-13.343,0-25.423-5.408-34.167-14.152C5.408,73.741,0,61.661,0,48.318s5.408-25.422,14.152-34.166C22.896,5.409,34.976,0,48.319,0 L48.319,0z M77.082,19.555c-7.361-7.361-17.53-11.914-28.763-11.914c-11.233,0-21.403,4.553-28.764,11.914 C12.194,26.916,7.641,37.085,7.641,48.318c0,11.233,4.553,21.403,11.914,28.764c7.36,7.361,17.53,11.914,28.764,11.914 c11.233,0,21.402-4.553,28.763-11.914c7.361-7.36,11.914-17.53,11.914-28.764C88.996,37.085,84.443,26.916,77.082,19.555 L77.082,19.555z"/></g></svg></a>
                </div>
            </div>
        </div>
        <div class="inner_content">
            <div class="content">
            
                
                <div class="left_side_content">
                    <div class="view_button">
                        @yield('titles')
                    </div>
                    <div class="view">
                        @yield('content')
                    </div>
                    
                </div>

                <div class="right_side">
                    <div class="ads">

                    </div>
                </div>
                
               </div>
               <div class="footer">
                <div class="footer_left_side">
                    <div class="footer_links">
                    <a href="">Политика возврата</a>
                    <a href="">Обратная связь</a>
                    <a href="">Пользовательское соглашение</a>
                </div>
                <div class="footer_social">
                    <div class="copyright">
                        <p>
                            © 2021 Ранобэ.онлайн
                        </p>
                    </div>
                    <div class="social_links">
                        <a href="#"><i class="fab fa-discord"></i></a>
                        <a href="#"><i class="fab fa-vk"></i></a>
                        <a href="#"><i class="fab fa-telegram-plane"></i></a>
                    </div>
                </div>
                </div>
                <div class="footer_right_side">

                </div>
                
           </div>
        </div>
        
      
       
    </div>
</section>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script src="{{ asset('js/index.js') }}"></script>
</body>
</html>
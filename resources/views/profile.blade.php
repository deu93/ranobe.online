@extends('layouts.app')
@section('content')
<div class="profile_page">
    <div class="profile_info_block">
        <div class="profile_name_block">
            <div class="profile_img">
                A
            </div>
            <div class="profile_name">
                <h3>Alex</h3>
            </div>
        </div>
        <div class="books_block">
            <div class="bookmarks">
                <h3 class=>Закладки</h3>
            </div>
            <div class="bookmars_block">
                <div class="bookmars_block_cont">
                    <div class="tab">
                        <button  class="tablinks" onclick="openCity(event, 'wanted')" id="defaultOpen">Хочу прочесть</button>
                        <button class="tablinks" onclick="openCity(event, 'readingnow')">Читаю</button>
                        <button class="tablinks" onclick="openCity(event, 'done')">Прочитано</button>
                        <button class="tablinks" onclick="openCity(event, 'abandoned')">Заброшено</button>
                        
                      </div>
                </div>
                <div class="content_right_description">
                    <div id="wanted" class="tabcontent">
                        <div class="content_wanted">
                            <div class="tab_content_block">
                                <h4>Культивация Онлайн</h4>
                                <img src="{{ asset('img/image.jpg') }}" alt="">
                            </div>
                            <div class="tab_content_block">
                                <h4>Культивация Онлайн</h4>
                                <img src="{{ asset('img/image.jpg') }}" alt="">
                            </div>
                            <div class="tab_content_block">
                                <h4>Культивация Онлайн</h4>
                                <img src="{{ asset('img/image.jpg') }}" alt="">
                            </div>
                            <div class="tab_content_block">
                                <h4>Культивация Онлайн</h4>
                                <img src="{{ asset('img/image.jpg') }}" alt="">
                            </div>
                            
                        </div>
                      </div>

                      <div id="readingnow" class="tabcontent">
                        <div class="tab_content_block">
                            <h4></h4>
                            <img src="" alt="">
                        </div>
                      </div>
                      <div id="done" class="tabcontent">
                        <div class="tab_content_block">
                            <h4>Культивация Онлайн</h4>
                            <img src="{{ asset('img/image (1).jpg') }}" alt="">
                        </div>
                      </div>
                      <div id="abandoned" class="tabcontent">
                        <div class="tab_content_block">
                            <h4>Культивация Онлайн</h4>
                            <img src="image.webp" alt="">
                        </div>
                      </div>
                    
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection
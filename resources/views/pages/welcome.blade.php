@extends('layouts.main')
@section('description', '| Lietuvos virtualių medžiotojų svetainės puslapis. Svetainė skirta tikriems žaidėjams. Bendrauk, dalyvauk ir laimėk!')

@section('body_class', ' main_fullscreen_page main_overflow_hidden')

@if(count($posts) >= 2)
@section('simple-menu')
    <div class="main_navigation_container">
        <div class="main_prev_slide_button">
            <div class="main_prev_thumb_cont"></div>
            <div class="main_prev_button_fader"></div>
        </div>
        <div class="main_pause_button"></div>
        <div class="main_next_slide_button">
            <div class="main_next_thumb_cont"></div>
            <div class="main_next_button_fader"></div>
        </div>
    </div>
@endsection
@endif

@section('content')
    <!-- Content -->
    <div class="main_album_fullscreen">
        <div class="main_gallery_container galleery_fullscreen effect_fade">
            <ul class="main_gallery effect_fade">

                @foreach ($posts as $key => $post)
                    <li class="preview-img" style="background: url( {{ url('../img/posts/' . $post->image) }} );" data-number="{{ $key+1 }}" data-link="blog/{{$post->slug}}"
                        data-title="{{ $post->title }}" data-position="{{ $post->bg_position }}">
                    </li>
                @endforeach
            </ul>
            <div class="clear"></div>
        </div>
    </div>

@endsection

@section('bottom-footer-info')
    {{--<div class="main_fullscreen_toggler"></div>--}}
    <div class="main_slides_title_and_likes_container welcome_title">
        <div class="main_slide_title_wrapper"></div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{  url('js\template.js') }}"></script> {{--Template main script, bet ne Single info--}}
@endsection
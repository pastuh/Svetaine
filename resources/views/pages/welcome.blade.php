@extends('layouts.main')

@section('body_class', 'pm_dark_type album_fullscreen_page pm_overflow_hidden')

@section('simple-menu')
        <div class="pm_navigation_container">
            <div class="pm_prev_slide_button">
                <div class="pm_prev_thumb_cont"></div>
                <div class="pm_prev_button_fader"></div>
            </div>
            <div class="pm_pause_button"></div>
            <div class="pm_next_slide_button">
                <div class="pm_next_thumb_cont"></div>
                <div class="pm_next_button_fader"></div>
            </div>
        </div>
@endsection

@section('content')
    <!-- Content -->
    <div class="pm_album_fullscreen">
        <div class="pm_gallery_container galleery_fullscreen effect_fade">
            <ul class="pm_gallery effect_fade">

                @foreach ($posts as $key => $post)
                    <li style="background: url( {{ url('../img/posts/' . $post->image) }} );" data-number="{{ $key+1 }}" data-link="blog/{{$post->slug}}"
                        data-title="{{ $post->title }}" data-thumbnail="{{ asset('img/posts/' . $post->image_thumb) }}">
                    </li>
                @endforeach
            </ul>
            <div class="clear"></div>
        </div>
    </div>

@endsection

@section('bottom-footer-info')
        {{--<div class="pm_fullscreen_toggler"></div>--}}
        <div class="pm_slides_title_and_likes_container welcome_title">
            <div class="pm_slide_title_wrapper"></div>
        </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{  url('js\template.js') }}"></script> {{--Template main script, bet ne Single info--}}
@endsection
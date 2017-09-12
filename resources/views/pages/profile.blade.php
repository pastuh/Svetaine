@extends('layouts.main')
@section('title', '| Profilis')

@section('body_class', 'pm_dark_type single-post background-info2')

@section('content')
    <div class="pm_wrapper pm_container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pm_content_standard">
                    <div class="row">
                        <div class="col-lg-2 col-lg-offset-5 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <br>
                            <a href="{{ route('manage.dashboard') }}"
                                    class="pm_send_comment_button pm_load_more stilius_mygtukas">
                                <i class="pm_likes_icon fa fa-tachometer fa-lg"></i>
                                <span class="pm_likes_counter">Medžiotojo profilis</span>
                            </a>
                        </div>
                    </div><!-- row -->
                </div><!-- standard -->
            </div><!-- col12 -->
        </div><!-- row -->
    </div><!-- wrapper -->

@endsection

@section('bottom-footer-left-menu')
    <ul class="nav navbar-nav short-menu">
        <li>
            <a href="{{ route('manage.dashboard') }}">
                <i class="fa fa-tachometer fa-lg"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('contact.index') }}">
                <i class="fa fa-envelope fa-lg"></i>
            </a>
        </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="pm_slide_title_wrapper pm_simple_title">
        Profilis
    </div>
@endsection
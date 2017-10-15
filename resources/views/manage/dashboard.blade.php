@extends('layouts.manage')
@section('title', '| Svetainės valdymas')

@section('body_class', ' single-post main_overflow_visible background-info2')

@section('content')
    <div class="main_wrapper main_container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main_content_standard">
                    <div class="row">
                        <br>
                        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <div class="col-xs-12 control-margin">
                                <span>Šiame skyriuje gali peržiūrėti svarbiausią svetainės informaciją.</span><br>
                            </div>
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
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               aria-label="Atsijungti">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <i class="fa fa-power-off fa-lg"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('profile') }}" aria-label="Atšaukti redagavimą">
                <div class="main_add_like_button like-post">
                    <i class="main_likes_icon fa fa-reply fa-lg"></i>
                </div>
            </a>
        </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title">
        Svetainės valdymas
    </div>
@endsection
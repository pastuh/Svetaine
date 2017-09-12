@extends('layouts.manage')
@section('title', '| Svetainės valdymas')

@section('body_class', 'pm_dark_type single-post pm_overflow_visible background-info2')

@section('content')
    <div class="pm_wrapper pm_container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pm_content_standard">
                    <div class="row">
                        <br>
                        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <div class="col-xs-12 control-margin">
                                <span>Sveikas {{ Auth::user()->name }}</span><br><br>
                                <span>Svetainėje esi užfiksuotas kaip:</span><br>
                                @foreach(Auth::user()->roles as $role)
                                    <span>{{ $role->display_name }}</span><br>
                                @endforeach
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
                <div class="pm_add_like_button like-post">
                    <i class="pm_likes_icon fa fa-reply fa-lg"></i>
                </div>
            </a>
        </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="pm_slide_title_wrapper pm_simple_title">
        Svetainės valdymas
    </div>
@endsection
@extends('layouts.main')
@section('title', '| Profilis')

@section('stylesheet')
    <link href="{{  url('css\info.css') }}" rel="stylesheet" type="text/css" media="all">
@endsection

@section('body_class', 'pm_dark_type single-post background-info2')

@section('content')
    <div class="pm_wrapper pm_container">

        <div class="container">
            <div class="row">
                <div class="fix-padding col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                    <div class="block__header">
                        <h2 class="heading heading--medium" style="font-size: 50px;">
                            {{ Auth::user()->name }}
                            <img src="
                            @if(Auth::user()->avatar !== NULL)
                            {{ Auth::user()->avatar }}
                            @else
                            {{ asset('img/default-avatar.png') }}
                            @endif
                            "
                                 border="0"
                                 alt="Medžiotojo avataras" style="margin-bottom: 18px;padding-left: 10px;height: 70px;"
                                 class="img-fluid"></h2>
                    </div>
                    <div class="block__location">
                        <p class="block__location-text">
                            @foreach(Auth::user()->roles as $role)
                                <tr>
                                    <td class="role-visible">Tavo rolė: {{ $role->display_name }}</td>
                                </tr>
                            @endforeach</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="pm_content_standard">
                    <div class="row">

                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">

                            <div class="panel-body">

                                <div class="col-lg-3 col-lg-offset-2 col-md-3 col-md-offset-3">
                                    <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="basic-addon1" rel="tooltip"
                                                      title="Komentarų skaičius"><span
                                                            class="fa fa-comments"
                                                            style="width: 30px;"></span></span>
                                        <input type="text" class="form-control info-perziura"
                                               value="{{ Auth::user()->comments->count() }}"
                                               readonly>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-lg-push-2 col-md-3 col-md-offset-0">
                                    <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="basic-addon1" rel="tooltip"
                                                      title="Įrašų skaičius"><span
                                                            class="fa fa-file-text"
                                                            style="width: 30px;"></span></span>
                                        <input type="text" class="form-control info-perziura"
                                               value="{{ Auth::user()->posts->count() }}"
                                               readonly>
                                    </div>
                                </div>


                                <div class="col-lg-8 col-lg-offset-2 col-md-6 col-md-offset-3">
                                    <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="basic-addon1" rel="tooltip"
                                                      title="Steam ID <br> <i>(Ateityje bus naudojama)</i>"><span
                                                            class="fa fa-steam-square fa-lg"
                                                            style="width: 30px;"></span></span>
                                        <input id="status" type="text" class="form-control info-perziura" name="steam"
                                               value=
                                       @if(is_numeric(Auth::user()->steamid))
                                               "{{ Auth::user()->steamid }}"
                                        @else
                                            "-"
                                        @endif
                                        readonly>
                                        @if(!is_numeric(Auth::user()->steamid))
                                            <a href="{{ route('link.steam') }}" class="steam-link-image"><img
                                                        src="{{ asset('img/navigation/steam_large.png') }}" border="0"
                                                        alt="Link Steam"></a>
                                        @endif
                                    </div>

                                </div>


                                <div class="clearfix"></div>
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
            <a href="{{ route('manage.dashboard') }}">
                <i class="fa fa-tachometer fa-lg"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('contact.index') }}" style="color:#4f4f4f;">
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
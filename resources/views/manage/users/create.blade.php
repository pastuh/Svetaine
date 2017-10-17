@extends('layouts.manage')
@section('title', '| Naujas vartotojas')

@section('body_class', ' single-post background-info2')

@section('content')
    <div class="main_wrapper main_container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main_content_standard">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <div class="panel-body">
                                <form id="main-form" method="POST"
                                      action="{{ route('users.store') }}"
                                      class="form-horizontal">

                                    <div class="col-md-6 col-md-offset-3">

                                        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="basic-addon1"><span
                                                            class="fa fa-address-card"
                                                            style="width: 30px;"></span></span>
                                                <input id="name" type="text" class="form-control" name="name"
                                                       placeholder="Vardas"
                                                       value="{{ old('name') }}" required autofocus
                                                       maxlength="255">
                                            </div>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                {{ $errors->first('name') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-md-offset-3">

                                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="basic-addon1"><span
                                                        class="fa fa-envelope" style="width: 30px;"></span></span>
                                                <input id="email" type="email" class="form-control" name="email"
                                                       placeholder="E-paštas"
                                                       value="{{ old('email') }}" required maxlength="255">
                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                {{ $errors->first('email') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-md-offset-3">

                                        <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="basic-addon1"><span
                                                        class="fa fa-lock fa-lg" style="width: 30px;"></span></span>
                                                <input id="password" type="password" class="form-control"
                                                       name="password" placeholder="Slaptažodis"
                                                       value="{{ old('password') }}" required autocomplete="off"
                                                       minlength="6">
                                            </div>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                        {{ $errors->first('password') }}
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{ csrf_field() }}

                                </form>
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
        @if(Auth::check() and Auth::user()->hasPermission('create-users'))
            <li rel="tooltip" title="Išsaugoti">
                <a href="javascript:void(0)" id="submit-button" aria-label="Išsaugoti vartotoją">
                    <i class="fa fa-check-circle fa-lg"></i>
                </a>
            </li>
        @endif
        <li rel="tooltip" title="Atšaukti">
            <a href="{{ route('users.index') }}" aria-label="Atšaukti vartotojo kūrimą">
                <i class="main_likes_icon fa fa-reply"></i>
            </a>
        </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title">
        Naujo vartotojo kūrimas
    </div>
@endsection
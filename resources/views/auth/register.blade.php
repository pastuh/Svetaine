@extends('layouts.main')
@section('title', '| Registracijos puslapis')
@section('description', '| Įstok į Lietuvos virtualių medžiotojų klubą jau dabar!' )

@section('body_class', ' single-post main_overflow_visible background-info2')

@section('content')
    <div class="main_wrapper main_container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main_content_standard">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <div class="panel-body">
                                <form id="main-form" class="form-horizontal" role="form" method="POST"
                                      action="{{ route('register') }}" autocomplete="off">
                                    {{ csrf_field() }}

                                    <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="basic-addon1"><span
                                                        class="fa fa-address-card" style="width: 30px;"></span></span>
                                            <input id="name" type="text" class="form-control" name="name"
                                                   placeholder="Vardas"
                                                   value="{{ old('name') }}" required autofocus maxlength="255">
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                {{ $errors->first('name') }}
                                                </span>
                                        @endif
                                    </div>

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

                                    <div class="{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="basic-addon1"><span
                                                        class="fa fa-lock fa-lg" style="width: 30px;"></span></span>
                                            <input id="password" type="password" class="form-control" name="password"
                                                   placeholder="Slaptažodis"
                                                   required autocomplete="off" minlength="6">
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                {{ $errors->first('password') }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon" id="basic-addon1"><span
                                                    class="fa fa-lock fa-lg" style="width: 30px;"></span></span>
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" placeholder="Slaptažodžio pakartojimas"
                                               required>
                                    </div>

                                    <div class="col-xs-12 control-margin">
                                        <span>theHunter.LT Lietuvos virtualių medžiotojų klubas</span>
                                    </div>
                                    {!! NoCaptcha::display(['data-theme' => 'light','style' => 'transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;float: left;']) !!}
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
        <li rel="tooltip" title="Registruotis">
            <a href="javascript:void(0)" id="submit-button" aria-label="Registruotis prie svetainės">
                <i class="fa fa-check-circle fa-lg"></i>
            </a>
        </li>
        <li rel="tooltip" title="Prisijungimas">
            <a href="{{ url('login') }}" aria-label="Prisijungti prie svetainės">
                <i class="fa fa-sign-in fa-lg"></i>
            </a>
        </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title">
        Registracijos puslapis
    </div>
@endsection
@extends('layouts.main')
@section('title', '| Slaptažodžio priminimas')

@section('body_class', 'pm_dark_type single-post pm_overflow_visible background-info2')

@section('content')
    <div class="pm_wrapper pm_container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pm_content_standard">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <div class="panel-body">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form id="main-form" class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}" autocomplete="off">
                                    {{ csrf_field() }}

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="basic-addon1"><span
                                                        class="fa fa-envelope" style="width: 30px;"></span></span>
                                            <input id="email" type="email" class="form-control" name="email" placeholder="E-paštas"
                                                   value="{{ $email or old('email') }}" required autofocus>
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
                                            <input id="password" type="password" class="form-control" name="password" placeholder="Slaptažodis"
                                                   required autocomplete="off" minlength="6">
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                {{ $errors->first('password') }}
                                            </span>
                                        @endif
                                    </div>


                                    <div class="{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="basic-addon1"><span
                                                        class="fa fa-lock fa-lg" style="width: 30px;"></span></span>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Slaptažodis"
                                                   required autocomplete="off" minlength="6">
                                        </div>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                {{ $errors->first('password_confirmation') }}
                                            </span>
                                        @endif
                                    </div>
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
        <li>
            <a href="javascript:void(0)" id="submit-button" aria-label="Siūsti slaptažodį">
                <i class="fa fa-check-circle fa-lg"></i>
            </a>
        </li>
        <li>
            <a href="{{ url('register') }}" aria-label="Registruotis">
                <i class="fa fa-user-plus fa-lg"></i>
            </a>
        </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="pm_slide_title_wrapper pm_simple_title">
        Slaptažodžio priminimo zona
    </div>
@endsection
@extends('layouts.main')
@section('title', '| Prisijungimo puslapis')
@section('description', '| Prisijunk prie Lietuvos virtualių medžiotojų klubo jau dabar!' )

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
                                      action="{{ route('login') }}"
                                      autocomplete="off">
                                    {{ csrf_field() }}

                                    <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="basic-addon1"><span
                                                        class="fa fa-envelope" style="width: 30px;"></span></span>
                                            <input id="email" type="email" class="form-control" name="email" placeholder="E-paštas"
                                                   value="{{ old('email') }}" required autofocus>
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
                                                   required autocomplete="off">
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                {{ $errors->first('password') }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="text-left col-xs-12 control-margin" style="padding: 10px;">
                                        <div class="checkbox">
                                            <label class="control control-checkbox">
                                                Prisiminti
                                                <input type="checkbox"
                                                       name="remember" {{ old('remember') ? 'checked' : '' }} />
                                                <div class="control_indicator"></div>
                                            </label>
                                            <span><a class="btn-link pull-right" href="{{ route('password.request') }}">
                                                Užmiršai slaptažodį?
                                            </a></span>
                                        </div>
                                    </div>
                                    <div class="g-recaptcha" data-theme="light" data-sitekey="{{ config('app.secret_key') }}" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;float: left;"></div>
                                    {!! app('captcha')->display() !!}
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
        <li rel="tooltip" title="Jungtis">
            <a href="javascript:void(0)" id="submit-button" aria-label="Jungtis prie svetainės">
                <i class="fa fa-check-circle fa-lg"></i>
            </a>
        </li>
        <li rel="tooltip" title="Registracija">
            <a href="{{ url('register') }}" aria-label="Registruotis">
                <i class="fa fa-user-plus fa-lg"></i>
            </a>
        </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title">
        Prisijungimo puslapis
    </div>
@endsection

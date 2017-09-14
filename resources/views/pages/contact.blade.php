@extends('layouts.main')
@section('title', '| Kontaktai')

@section('body_class', 'pm_dark_type single-post pm_overflow_visible background-info2')

@section('content')
    <div class="pm_wrapper pm_container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pm_content_standard">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                            <div class="panel-body">
                                <form id="main-form" method="POST"
                                      action="{{ route('contact.store') }}"
                                      class="form-horizontal" role="form">
                                    {{ csrf_field() }}

                                    <div class="{{ $errors->has('subject') ? ' has-error' : '' }}">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="basic-addon1"><span
                                                        class="fa fa-font" style="width: 30px;"></span></span>
                                            <input id="subject" type="text" class="form-control" name="subject" placeholder="Temos pavadinimas"
                                                   value="{{ old('subject') }}" required autofocus minlength="8" maxlength="255">
                                        </div>
                                        @if ($errors->has('subject'))
                                            <span class="help-block">
                                                {{ $errors->first('subject') }}
                                                </span>
                                        @endif
                                    </div>

                                    <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon" id="basic-addon1"><span
                                                    class="fa fa-envelope" style="width: 30px;"></span></span>
                                        <input id="email" type="email" class="form-control" name="email" placeholder="E-paštas"
                                               value="{{ old('email') }}" required minlength="8" maxlength="100">
                                    </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                {{ $errors->first('email') }}
                                                </span>
                                        @endif
                                    </div>


                                        <div class="{{ $errors->has('message') ? ' has-error' : '' }}">
                                        <textarea id="message" class="form-control" name="message" rows="5" cols="45"
                                                  required
                                                  minlength="20">{{ old('message') }}</textarea>
                                            @if ($errors->has('message'))
                                                <span class="help-block">
                                                {{ $errors->first('message') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-xs-12 control-margin">
                                            <span>Į laiškus neatsakoma, bet Jūsų pasiūlymai ir rastos klaidos bus peržiūrėtos</span>
                                        </div>
                                    {{--<div class="g-recaptcha" data-sitekey="6Lc26ywUAAAAAKqZDK2SrFVoJZTk9rG_GAq1rLpJ" data-theme="dark" ></div>--}}
                                    <div class="g-recaptcha" data-theme="light" data-sitekey="{{-- {{env('NOCAPTCHA_SITEKEY')}}--}}" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
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
        <li>
            <a href="javascript:void(0)" id="submit-button" aria-label="Siūsti pranešimą">
                <i class="fa fa-check-circle fa-lg"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('profile') }}" aria-label="Atšaukti">
                <i class="fa fa-reply fa-lg"></i>
            </a>
        </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="pm_slide_title_wrapper pm_simple_title">
        Kontaktai
    </div>
@endsection
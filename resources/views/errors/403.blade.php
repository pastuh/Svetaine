@extends('layouts.main')
@section('title', '| Puslapis nerastas')

@section('body_class', ' single-post main_overflow_visible background-info2')

@section('content')
    <div class="main_wrapper main_container" style="padding-top: 200px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="main_content_standard">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <div class="control-margin">
                                <span>KLAIDA: Puslapis nerastas</span>
                            </div>
                        </div>
                    </div><!-- row -->
                </div><!-- standard -->
            </div><!-- col12 -->
        </div><!-- row -->
    </div><!-- wrapper -->
@endsection


@section('bottom-footer-left-menu')
    @if(Auth::check())
        <ul class="nav navbar-nav short-menu">
            <li rel="tooltip" title="Kontaktai">
                <a href="{{ route('contact.index') }}" aria-label="Kontaktai" style="color:#4f4f4f;">
                    <i class="fa fa-envelope fa-lg"></i>
                </a>
            </li>
        </ul>
    @endif
@endsection
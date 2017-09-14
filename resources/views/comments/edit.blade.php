@extends('layouts.main')
@section('title', "| " . htmlspecialchars($comment->user->name) . " komentaro redagavimas")

@section('stylesheet')
    <link href="{{  url('css\parsley.css') }}" rel="stylesheet" type="text/css" media="all">
@endsection

@section('body_class', 'pm_dark_type single-post background-info2')

@section('content')
    <div class="pm_wrapper pm_container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pm_content_standard">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                            <div class="panel-body">
                                <form id="main-form" data-parsley-validate method="POST"
                                      action="{{ route('comments.update', $comment->id) }}"
                                      class="form-horizontal">
                                    <div class="form-group">
                                        <textarea id="body" class="form-control" name="comment" rows="5" cols="45"
                                                  required
                                                  minlength="5"
                                                  maxlength="2000">{{ old('comment', $comment->comment) }}</textarea>
                                        <div class="col-xs-12 control-margin">
                                            <span>Autorius: {{ $comment->user->name }} </span>
                                        </div>
                                    </div>

                                    {{ method_field('PUT') }}
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
        <li>
            <a href="javascript:void(0)" id="submit-button" aria-label="Išsaugoti redagavimą">
                <i class="fa fa-check-circle fa-lg"></i>
            </a>
        </li>
        <li>
            <a href="/blog/{{ $comment->post->slug }}" aria-label="Atšaukti redagavimą">
                <i class="fa fa-reply fa-lg"></i>
            </a>
        </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="pm_slide_title_wrapper pm_simple_title">
        Komentaro redagavimas
    </div>
@endsection

@section('script')
    {{--Tikrina ar suvestas tekstas teisingas--}}
    <script type="text/javascript" src="{{  url('js\parsley.js') }}"></script>
@endsection
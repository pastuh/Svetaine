@extends('layouts.manage')
@section('title', "| " . htmlspecialchars($tag->name) . " žymos redagavimas")

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
                                      action="{{ route('tags.update', $tag->id) }}">

                                    <div class="col-md-6 col-md-offset-3">

                                        <div class="{{ $errors->has('tag') ? ' has-error' : '' }}">
                                            <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="basic-addon1"><span
                                                        class="fa fa-font" style="width: 30px;"></span></span>
                                                <input id="tag" type="text" class="form-control" name="tag" placeholder="Pavadinimas"
                                                       value="{{ old('tag', $tag->name) }}" required autofocus minlength="3" maxlength="90">
                                            </div>
                                            @if ($errors->has('tag'))
                                                <span class="help-block">
                                                {{ $errors->first('tag') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-md-offset-3">

                                        <div class="{{ $errors->has('slug') ? ' has-error' : '' }}">
                                            <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="basic-addon1"><span
                                                        class="fa fa-link" style="width: 30px;"></span></span>
                                                <input id="slug" type="text" class="form-control" name="slug" placeholder="URL"
                                                       value="{{ old('slug', $tag->slug) }}" required readonly minlength="3" maxlength="90">
                                            </div>
                                            @if ($errors->has('slug'))
                                                <span class="help-block">
                                                {{ $errors->first('slug') }}
                                                </span>
                                            @endif
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
        @if(Auth::check() and Auth::user()->hasPermission('update-tags'))
            <li>
                <a href="javascript:void(0)" id="submit-button" aria-label="Išsaugoti redagavimą">
                    <i class="fa fa-check-circle fa-lg"></i>
                </a>
            </li>
        @endif
        <li>
            <a href="{{ route('tags.show', $tag->slug) }}" aria-label="Atšaukti redagavimą">
                <i class="main_likes_icon fa fa-reply"></i>
            </a>
        </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title">
        {{ $tag->name }} žymos redagavimas
    </div>
@endsection

@section('script')
    {{--Teksta pavercia i slug--}}
    <script type="text/javascript" src="{{  url('js\slug.js') }}"></script>
    <script>
        $('#slug').slugify('#tag');
        $('#slug').keydown(function () {
            $('#slug').attr('readonly', 'readonly');
            return false;
        });
    </script>
@endsection
@extends('layouts.main')
@section('title', '| ' . htmlspecialchars($post->title) . " įrašo redagavimas")

@section('stylesheet')
    <link href="{{  url('js\selectbox\css\select2.min.css') }}" rel="stylesheet" type="text/css" media="all">
    <script type="text/javascript" src="{{  url('js\tinymce\tinymce.min.js') }}"></script>

    @include('components._tinymce')

@endsection

@section('body_class', 'pm_dark_type')

@section('body_style', 'background: url("/img/posts/' . htmlspecialchars($post->image_blured) . '") no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;')

@section('content')
    <div class="pm_wrapper pm_container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pm_content_standard">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                            <div class="panel-body">
                                <form id="main-form" method="POST"
                                      action="{{ route('posts.update', $post->id) }}"
                                      class="form-horizontal" enctype="multipart/form-data">

                                        <div class="col-lg-6">

                                            <div class="{{ $errors->has('title') ? ' has-error' : '' }}">
                                                <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="basic-addon1"><span
                                                            class="fa fa-font" style="width: 30px;"></span></span>
                                                    <input id="title" type="text" class="form-control" name="title"
                                                           placeholder="Pavadinimas"
                                                           value="{{ old('title', $post->title) }}" required autofocus
                                                           minlength="16" maxlength="90">
                                                </div>
                                                @if ($errors->has('title'))
                                                    <span class="help-block">
                                                {{ $errors->first('title') }}
                                                </span>
                                                @endif
                                            </div>

                                            <div class="{{ $errors->has('slug') ? ' has-error' : '' }}">
                                                <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="basic-addon1"><span
                                                            class="fa fa-link" style="width: 30px;"></span></span>
                                                    <input id="slug" type="text" class="form-control" name="slug"
                                                           value="{{ old('slug', $post->slug) }}" required minlength="12"
                                                           maxlength="90" readonly>
                                                </div>
                                                @if ($errors->has('slug'))
                                                    <span class="help-block">
                                                {{ $errors->first('slug') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-5 col-lg-push-1">
                                            <div class="{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                                <select required id="category" class="select2-single"
                                                        title="Pasirink kategoriją"
                                                        name="category_id">
                                                    <option value="" disabled="disabled"></option>
                                                    @foreach($categories as $category)
                                                        <option {{ ($category->id == $post->category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('category_id'))
                                                    <span class="help-block">
                                                {{ $errors->first('category_id') }}
                                                </span>
                                                @endif
                                            </div>

                                            <div class="{{ $errors->has('featured_image') ? ' has-error' : '' }}">
                                            <input type="file" class="filestyle" name="featured_image" id="image_src" data-badge="false" data-iconName="fa fa-upload" data-buttonBefore="true" data-placeholder="..." data-buttonText="Paveiksliukas" />
                                                @if ($errors->has('featured_image'))
                                                    <span class="help-block">
                                                {{ $errors->first('featured_image') }}
                                                </span>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="{{ $errors->has('body') ? ' has-error' : '' }}">
                                                    <textarea id="body" class="form-control" name="body" rows="5"
                                                              cols="45">{{ old('body', $post->body) }}</textarea>
                                                    @if ($errors->has('body'))
                                                        <span class="help-block">
                                                    {{ $errors->first('body') }}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-lg-12">
                                            <div class="{{ $errors->has('tags') ? ' has-error' : '' }}">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1"><span
                                                                class="fa fa-tags" style="width: 38px;"></span></span>
                                                    <select id="tags" class="select2-multi" multiple="multiple"
                                                            title="Pasirink žymą"
                                                            name="tags[]">
                                                        @foreach($tags as $tag)
                                                            <option
                                                                    @foreach($post->tags as $real_tag)
                                                                    {{ ($real_tag->id == $tag->id) ? 'selected="selected"' : '' }}
                                                                    @endforeach
                                                                    value="{{ $tag->id }}">{{ $tag->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('tags'))
                                                    <span class="help-block">
                                                    {{ $errors->first('tags') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                        <div class="col-xs-12 control-margin" style="margin-top: 10px;">

                                            <label class="control control-checkbox">
                                                Patvirtinu, kad įrašas pilnai užpildytas ir administratorius gali jį paskelbti.
                                                <input id="status_check" type="checkbox" name="status_check"
                                                       value="true" {{ $post->status ? 'checked' : '' }} />
                                                <div class="control_indicator"></div>
                                            </label>
                                            <br>
                                            @if(Auth::user()->hasRole('editor|administrator|superadministrator'))
                                                <label class="control control-checkbox">
                                                    Publikuoti įrašą?
                                                    <input id="published_check" type="checkbox" name="published_check"
                                                           value="true" {{ $post->published ? 'checked' : '' }} />
                                                    <div class="control_indicator"></div>
                                                </label>
                                            @endif

                                        </div>

                                    {{ method_field('PUT') }}
                                    {{ csrf_field() }}

                                </form>
                            </div>
                    </div>
                </div>
            </div>
            </div><!-- pm_row -->
        </div><!-- pm_wrapper -->
    </div>
@endsection

@section('bottom-footer-left-menu')
    <ul class="nav navbar-nav short-menu">
        <li>
            <a href="javascript:void(0)" id="submit-button" aria-label="Išsaugoti redagavimą">
                <i class="fa fa-check-circle fa-lg"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('posts.show', $post->id) }}" aria-label="Atšaukti redagavimą">
                <i class="pm_likes_icon fa fa-reply"></i>
            </a>
        </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="pm_slide_title_wrapper pm_simple_title">
        Įrašo redagavimas
    </div>
@endsection

@section('script')
    {{--Teksta pavercia i slug--}}
    <script type="text/javascript" src="{{  url('js\slug.js') }}"></script>
    <script>
        $('#slug').slugify('#title');
        $('#slug').keydown(function () {
            $('#slug').attr('readonly', 'readonly');
            return false;
        });
    </script>

    {{--Geresnis selectbox--}}
    <script type="text/javascript" src="{{  url('js\selectbox\js\select2.min.js') }}"></script>
    <script>
        $('.select2-single').select2();
        $('.select2-multi').select2();
    </script>

    {{--Grazesnis failo parinkimas ir uploud--}}
    <script type="text/javascript" src="{{  url('js\filestyle\bootstrap-filestyle.min.js') }}"></script>
@endsection
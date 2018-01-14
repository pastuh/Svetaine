@extends('layouts.main')
@section('title', '| ' . htmlspecialchars($map->title) . " vietovės redagavimas")

@section('stylesheet')
    <link href="{{  url('js\selectbox\css\select2.min.css') }}" rel="stylesheet" type="text/css" media="all">
    <script type="text/javascript" src="{{  url('js\tinymce\tinymce.min.js') }}"></script>

    @include('components._tinymce')

@endsection

@section('body_class', ' background-info2')

@section('content')
    <div class="main_wrapper main_container">
        <div class="row">
            <div class="col-lg-12">
                <div id="app" class="main_content_standard">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                            <div class="panel-body">
                                <form id="main-form" method="POST"
                                      action="{{ route('maps.update', $map->id) }}"
                                      class="form-horizontal" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-md-6 text-center"
                                             style="background: rgba(0, 0, 0, 0.75)">
                                            <input v-model="visible" id="toggle-aprasymas" class="toggle"
                                                   value="aprasymas" type="radio">
                                            <label for="toggle-aprasymas" class="btn">Aprašymas</label>
                                        </div>
                                        <div class="col-md-6 text-center" style="background: rgba(0, 0, 0, 0.75)">
                                            <input v-model="visible" id="toggle-info" class="toggle"
                                                   value="info" type="radio">
                                            <label for="toggle-info" class="btn">Informacija</label>
                                        </div>
                                    </div>


                                    <div class="col-lg-5" v-model="visible" v-show="visible == 'aprasymas'">

                                        <div class="{{ $errors->has('title') ? ' has-error' : '' }}">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="basic-addon1"><span
                                                            class="fa fa-font" style="width: 30px;"></span></span>
                                                <input id="title" type="text" class="form-control" name="title"
                                                       placeholder="EN pavadinimas"
                                                       value="{{ old('title', $map->title) }}" required autofocus
                                                       minlength="2" maxlength="90">
                                            </div>
                                            @if ($errors->has('title'))
                                                <span class="help-block">
                                                {{ $errors->first('title') }}
                                                </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-lg-5 col-lg-push-2" v-model="visible"
                                         v-show="visible == 'aprasymas'">

                                        <div class="{{ $errors->has('sub_title') ? ' has-error' : '' }}">
                                            <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="basic-addon1"><span
                                                            class="fa fa-bold" style="width: 30px;"></span></span>
                                                <input type="text" class="form-control" name="sub_title"
                                                       placeholder="LT pavadinimas"
                                                       value="{{ old('sub_title', $map->sub_title) }}" required
                                                       minlength="2" maxlength="90">
                                            </div>
                                            @if ($errors->has('sub_title'))
                                                <span class="help-block">
                                                {{ $errors->first('sub_title') }}
                                                </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="row" v-model="visible" v-show="visible == 'aprasymas'">
                                        <div class="col-lg-12">
                                            <div class="{{ $errors->has('body') ? ' has-error' : '' }}">
                                                <textarea id="body" class="form-control" name="body" rows="5"
                                                          cols="45">{{ old('body', $map->body) }}</textarea>
                                                @if ($errors->has('body'))
                                                    <span class="help-block">
                                                    {{ $errors->first('body') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" v-model="visible" v-show="visible == 'aprasymas'" style="margin-top: 10px">
                                        <div class="col-lg-12">
                                            <div class="{{ $errors->has('animals') ? ' has-error' : '' }}">
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1"><span
                                                                class="fa fa-paw" style="width: 38px;"></span></span>
                                                    <select id="animals" class="select2-multi" multiple="multiple"
                                                            title="Pasirink žymą"
                                                            name="animals[]">
                                                        @foreach($animals as $animal)
                                                            <option
                                                                    @foreach($map->animals as $real_animal)
                                                                    {{ ($real_animal->id == $animal->id) ? 'selected="selected"' : '' }}
                                                                    @endforeach
                                                                    value="{{ $animal->id }}">{{ $animal->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('animals'))
                                                    <span class="help-block">
                                                    {{ $errors->first('animals') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" v-model="visible" v-show="visible == 'info'">

                                        <div class="col-lg-6">
                                            <div class="{{ $errors->has('main_image') ? ' has-error' : '' }}">
                                                <input type="file" class="filestyle" name="main_image" id="image_src"
                                                       data-badge="false" data-iconName="fa fa-upload"
                                                       data-buttonBefore="true" data-placeholder="..."
                                                       data-buttonText="Paveiksliukas"/>
                                                @if ($errors->has('main_image'))
                                                    <span class="help-block">
                                                    {{ $errors->first('main_image') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-5 col-lg-offset-1">
                                            <div class="{{ $errors->has('bg_position') ? ' has-error' : '' }}">
                                                <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="basic-addon1"><span
                                                            class="fa fa-bold" style="width: 30px;"></span></span>
                                                    <input type="text" class="form-control" name="bg_position"
                                                           placeholder="BG pozicija"
                                                           value="{{ old('bg_position', $map->bg_position) }}" required
                                                           minlength="1" maxlength="5">
                                                </div>
                                                @if ($errors->has('bg_position'))
                                                    <span class="help-block">
                                                {{ $errors->first('bg_position') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="{{ $errors->has('info_image') ? ' has-error' : '' }}">
                                                <input type="file" class="filestyle" name="info_image" id="image_src2"
                                                       data-badge="false" data-iconName="fa fa-upload"
                                                       data-buttonBefore="true" data-placeholder="..."
                                                       data-buttonText="#2 paveiksliukas"/>
                                                @if ($errors->has('info_image'))
                                                    <span class="help-block">
                                                        {{ $errors->first('info_image') }}
                                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-5 col-lg-offset-1">
                                            <div class="{{ $errors->has('small_image') ? ' has-error' : '' }}">
                                                <input type="file" class="filestyle" name="small_image" id="image_src3"
                                                       data-badge="false" data-iconName="fa fa-upload"
                                                       data-buttonBefore="true" data-placeholder="..."
                                                       data-buttonText="Žemėlapio icon"/>
                                                @if ($errors->has('small_image'))
                                                    <span class="help-block">
                                                        {{ $errors->first('small_image') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="col-lg-12">
                                            <div class="{{ $errors->has('body_2') ? ' has-error' : '' }}">
                                                <textarea id="body_2" class="form-control" name="body_2" rows="5"
                                                          cols="45">{{ old('body_2', $map->body_2) }}</textarea>
                                                @if ($errors->has('body_2'))
                                                    <span class="help-block">
                                                    {{ $errors->first('body_2') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-xs-12 control-margin" style="margin-top: 10px;">
                                            <label class="control control-checkbox">
                                                Patvirtinu, kad įrašas pilnai užpildytas.
                                                <input id="status_check" type="checkbox" name="status_check"
                                                       value="true" {{ $map->status ? 'checked' : '' }} />
                                                <div class="control_indicator"></div>
                                            </label>
                                            <br>
                                            @if(Auth::user()->hasRole('editor|administrator|superadministrator'))
                                                <label class="control control-checkbox">
                                                    Publikuoti įrašą?
                                                    <input id="published_check" type="checkbox" name="published_check"
                                                           value="true" {{ $map->published ? 'checked' : '' }} />
                                                    <div class="control_indicator"></div>
                                                </label>
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
        <li rel="tooltip" title="Išsaugoti">
            <a href="javascript:void(0)" id="submit-button" aria-label="Išsaugoti vietovę">
                <i class="fa fa-check-circle fa-lg"></i>
            </a>
        </li>
        <li rel="tooltip" title="Atšaukti">
            <a href="{{ route('maps.index') }}" aria-label="Atšaukti vietovės redagavimą">
                <i class="main_likes_icon fa fa-reply"></i>
            </a>
        </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title">
        Naujos vietovės kūrimas
    </div>
@endsection

@section('script')

    @include('components._vue-init')

    {{--Geresnis selectbox--}}
    <script type="text/javascript" src="{{  url('js\selectbox\js\select2.min.js') }}"></script>
    <script>
        $('.select2-single').select2();
        $('.select2-multi').select2();
    </script>

    {{--Grazesnis failo parinkimas ir uploud--}}
    <script type="text/javascript" src="{{  url('js\filestyle\bootstrap-filestyle.min.js') }}"></script>

@endsection
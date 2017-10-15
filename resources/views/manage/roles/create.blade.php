@extends('layouts.manage')
@section('title', '| Nauja rolė')

@section('body_class', ' single-post background-info2')

@section('content')
    <div class="main_wrapper main_container">
        <div class="row">
            <div class="col-lg-12">
                <div id="app" class="main_content_standard">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <div class="panel-body">
                                <form id="main-form" method="POST" action="{{ route('roles.store') }}">

                                    <div class="col-md-6 col-md-offset-3">

                                        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="basic-addon1"><span
                                                        class="fa fa-font" style="width: 30px;"></span></span>
                                                <input id="name" type="text" class="form-control" name="name" placeholder="Pavadinimas"
                                                       value="{{ old('name') }}" required autofocus minlength="3" maxlength="255">
                                            </div>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                {{ $errors->first('name') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-md-offset-3">

                                        <div class="{{ $errors->has('description') ? ' has-error' : '' }}">
                                            <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="basic-addon1"><span
                                                        class="fa fa-align-left" style="width: 30px;"></span></span>
                                                <input id="description" type="text" class="form-control" name="description" placeholder="Aprašymas"
                                                       value="{{ old('description') }}" required autofocus minlength="3" maxlength="255">
                                            </div>
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                {{ $errors->first('description') }}
                                                </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="basic-addon1"><span
                                                        class="fa fa-link" style="width: 30px;"></span></span>
                                            <input id="slug" type="text" class="form-control info-perziura" name="slug"
                                                   placeholder="URL"
                                                   value="{{ old('slug') }}"
                                                   readonly>
                                        </div>

                                        <input type="hidden" :value="permissionsSelected" name="permissions">

                                    </div>
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">

                            <div class="col-xs-12 control-margin text-left fake-table" style="padding: 0;">
                                @foreach($permissions as $permission)
                                    <div class="row" style="font-weight: normal;">
                                        <label class="control control-checkbox">
                                            {{ $permission->display_name }}
                                            <input v-model="permissionsSelected" type="checkbox" value="{{$permission->id}}" />
                                            <div class="control_indicator"></div>
                                        </label> <span style="float:right; width: 50%;">{{ $permission->description }}</span>
                                    </div>
                                @endforeach
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
        @if(Auth::check() and Auth::user()->hasPermission('create-acl'))
            <li>
                <a href="javascript:void(0)" id="submit-button" aria-label="Išsaugoti rolę">
                    <i class="fa fa-check-circle fa-lg"></i>
                </a>
            </li>
        @endif
        <li>
            <a href="{{ route('roles.index') }}" aria-label="Atšaukti rolės kūrimą">
                <i class="main_likes_icon fa fa-reply"></i>
            </a>
        </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title">
        Naujos rolės kūrimas
    </div>
@endsection

@section('script')
    {{--Teksta pavercia i slug--}}
    <script type="text/javascript" src="{{  url('js\slug.js') }}"></script>
    <script>
        $('#slug').slugify('#name');
        $('#slug').keydown(function () {
            $('#slug').attr('readonly', 'readonly');
            return false;
        });
    </script>

    <script src="{{  url('js/vue.min.js') }}" type="text/javascript"></script> {{-- VUE --}}
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                permissionsSelected: []
            }
        });
    </script>
@endsection
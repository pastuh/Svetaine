@extends('layouts.manage')
@section('title', '| ' . htmlspecialchars($role->description) . ' rolės redagavimas')

@section('body_class', 'pm_dark_type single-post pm_overflow_visible background-info2')

@section('content')
    <div class="pm_wrapper pm_container">
        <div class="row">
            <div class="col-lg-12">
                <div id="app" class="pm_content_standard">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <div class="panel-body">
                                <form id="main-form" method="POST" action="{{ route('roles.update', $role->id) }}">

                                    <div class="col-md-6 col-md-offset-3">

                                        <div class="{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="basic-addon1"><span
                                                        class="fa fa-font" style="width: 30px;"></span></span>
                                                <input id="name" type="text" class="form-control" name="name" placeholder="Pavadinimas"
                                                       value="{{ old('name', $role->display_name) }}" required autofocus minlength="3" maxlength="255">
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
                                                       value="{{ old('description', $role->description) }}" required autofocus minlength="3" maxlength="255">
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
                                                   value="{{ $role->name }}"
                                                   readonly>
                                        </div>

                                        <input type="hidden" :value="permissionsSelected" name="permissions">

                                    </div>

                                    {{ method_field('PUT') }}
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
        @if(Auth::check() and Auth::user()->hasPermission('update-acl'))
            <li>
                <a href="javascript:void(0)" id="submit-button" aria-label="Išsaugoti redagavimą">
                    <i class="fa fa-check-circle fa-lg"></i>
                </a>
            </li>
        @endif
        <li>
            <a href="{{ route('roles.show', $role->id) }}" aria-label="Atšaukti redagavimą">
                <i class="pm_likes_icon fa fa-reply"></i>
            </a>
        </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="pm_slide_title_wrapper pm_simple_title">
        {{ $role->display_name }} rolės redagavimas
    </div>
@endsection

@section('script')
    <script src="https://unpkg.com/vue"></script>

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                permissionsSelected: {!! $role->permissions->pluck('id') !!}
            }
        });
    </script>
@endsection
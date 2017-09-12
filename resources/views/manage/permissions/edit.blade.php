@extends('layouts.manage')
@section('title', "| " . htmlspecialchars($permission->display_name) . " leidimo redagavimas")

@section('body_class', 'pm_dark_type single-post background-info2')

@section('content')
    <div class="pm_wrapper pm_container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pm_content_standard">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <div class="panel-body">
                                <form id="main-form" data-parsley-validate method="POST"
                                      action="{{ route('permissions.update', $permission->id) }}">

                                    <div class="col-md-6 col-md-offset-3">

                                        <div class="{{ $errors->has('display_name') ? ' has-error' : '' }}">
                                            <div class="input-group input-group-lg">
                                                    <span class="input-group-addon" id="basic-addon1"><span
                                                                class="fa fa-font" style="width: 30px;"></span></span>
                                                <input id="display_name" type="text" class="form-control" name="display_name"
                                                       placeholder="Pavadinimas"
                                                       value="{{ old('display_name', $permission->display_name) }}" required autofocus maxlength="255">
                                            </div>
                                            @if ($errors->has('display_name'))
                                                <span class="help-block">
                                                {{ $errors->first('display_name') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-md-offset-3">

                                        <div class="{{ $errors->has('description') ? ' has-error' : '' }}">
                                            <div class="input-group input-group-lg">
                                                    <span class="input-group-addon" id="basic-addon1"><span
                                                                class="fa fa-align-left" style="width: 30px;"></span></span>
                                                <input id="description" type="text" class="form-control" name="description"
                                                       placeholder="Aprašymas"
                                                       value="{{ old('description', $permission->description) }}" required maxlength="255">
                                            </div>
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                {{ $errors->first('description') }}
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
        @if(Auth::check() and Auth::user()->hasPermission('update-acl'))
            <li>
                <a href="javascript:void(0)" id="submit-button" aria-label="Išsaugoti redagavimą">
                    <i class="fa fa-check-circle fa-lg"></i>
                </a>
            </li>
        @endif
        <li>
            <a href="{{ route('permissions.show', $permission->slug) }}" aria-label="Atšaukti redagavimą">
                <i class="pm_likes_icon fa fa-reply"></i>
            </a>
        </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="pm_slide_title_wrapper pm_simple_title">
        {{ $permission->display_name }} leidimo redagavimas
    </div>
@endsection
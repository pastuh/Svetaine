@extends('layouts.manage')
@section('title', '| Leidimas: ' . htmlspecialchars($permission->description))

@section('body_class', ' single-post background-info2')

@section('content')
    <div class="main_wrapper main_container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main_content_standard">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <div class="panel-body">
                                <div class="col-md-6 col-md-offset-3">
                                    <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="basic-addon1"><span
                                                            class="fa fa-font"
                                                            style="width: 30px;"></span></span>
                                        <input id="name" type="text" class="form-control info-perziura" name="name"
                                               placeholder="Pavadinimas"
                                               value="{{ $permission->display_name }}"
                                               readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 col-md-offset-3">
                                    <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="basic-addon1"><span
                                                            class="fa fa-align-left" style="width: 30px;"></span></span>
                                        <input id="description" type="text" class="form-control info-perziura" name="description"
                                               placeholder="Aprašymas"
                                               value="{{ $permission->description }}"
                                               readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 col-md-offset-3">
                                    <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="basic-addon1"><span
                                                            class="fa fa-link" style="width: 30px;"></span></span>
                                        <input id="slug" type="text" class="form-control info-perziura" name="slug"
                                               placeholder="URL"
                                               value="{{ $permission->name }}"
                                               readonly>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div><!-- row -->
                </div><!-- standard -->
            </div><!-- col12 -->
        </div><!-- row -->
    </div><!-- wrapper -->
@endsection

@section('bottom-footer-left-menu')
    @if(Auth::check() and Auth::user()->hasPermission('update-acl'))
        <ul class="nav navbar-nav short-menu">
            <li rel="tooltip" title="Redaguoti">
                <a href="{{ route('permissions.edit', $permission->id ) }}" aria-label="Redaguoti leidimą">
                    <i class="fa fa-pencil-square fa-lg">
                    </i>
                </a>
            </li>
        </ul>
    @endif
@endsection

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title">
        Leidimas: {{ $permission->display_name }}
    </div>
@endsection
@extends('layouts.manage')
@section('title', '| Naujas leidimas')

@section('stylesheet')
    <link href="{{  url('js\table\bootstrap-table.css') }}" rel="stylesheet" type="text/css" media="all">
@endsection

@section('body_class', ' single-post background-info2')

@section('content')
    <div class="main_wrapper main_container">
        <div class="row">
            <div class="col-lg-12">
                <div id="app" class="main_content_standard">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <div class="panel-body">
                                <form id="main-form" data-parsley-validate method="POST"
                                      action="{{ route('permissions.store') }}"
                                      class="form-horizontal">

                                    <div class="row">
                                        <div class="col-md-3 col-lg-offset-3 text-center" style="background: rgba(0, 0, 0, 0.75)">
                                            <input v-model="permissionType" id="toggle-on" class="toggle toggle-left" name="permission_type" value="basic" type="radio">
                                            <label for="toggle-on" class="btn">Basic</label>
                                        </div>
                                        <div class="col-md-3 text-center" style="background: rgba(0, 0, 0, 0.75)">
                                            <input v-model="permissionType" id="toggle-off" class="toggle toggle-right" name="permission_type" value="crud" type="radio">
                                            <label for="toggle-off" class="btn">CRUD</label>
                                        </div>
                                    </div>

                                    <div v-if="permissionType == 'basic'" class="col-md-6 col-md-offset-3">

                                        <div class="{{ $errors->has('display_name') ? ' has-error' : '' }}">
                                            <div class="input-group input-group-lg">
                                                    <span class="input-group-addon" id="basic-addon1"><span
                                                                class="fa fa-font" style="width: 30px;"></span></span>
                                                <input id="display_name" type="text" class="form-control" name="display_name"
                                                       placeholder="Pavadinimas"
                                                       value="{{ old('display_name') }}" required autofocus maxlength="255">
                                            </div>
                                            @if ($errors->has('display_name'))
                                                <span class="help-block">
                                                {{ $errors->first('display_name') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div v-if="permissionType == 'basic'" class="col-md-6 col-md-offset-3">

                                        <div class="{{ $errors->has('description') ? ' has-error' : '' }}">
                                            <div class="input-group input-group-lg">
                                                    <span class="input-group-addon" id="basic-addon1"><span
                                                                class="fa fa-align-left" style="width: 30px;"></span></span>
                                                <input id="description" type="text" class="form-control" name="description"
                                                       placeholder="Aprašymas"
                                                       value="{{ old('description') }}" required maxlength="255">
                                            </div>
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                {{ $errors->first('description') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div v-if="permissionType == 'basic'" class="col-md-6 col-md-offset-3">

                                        <div class="{{ $errors->has('slug') ? ' has-error' : '' }}">
                                            <div class="input-group input-group-lg">
                                                    <span class="input-group-addon" id="basic-addon1"><span
                                                                class="fa fa-link" style="width: 30px;"></span></span>
                                                <input id="slug" type="text" class="form-control" name="slug"
                                                       placeholder="URL"
                                                       value="{{ old('slug') }}" required readonly maxlength="255">
                                            </div>
                                            @if ($errors->has('slug'))
                                                <span class="help-block">
                                                {{ $errors->first('slug') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div v-if="permissionType == 'crud'" class="col-md-6 col-md-offset-3">

                                        <div class="{{ $errors->has('resource') ? ' has-error' : '' }}">
                                            <div class="input-group input-group-lg">
                                                    <span class="input-group-addon" id="basic-addon1"><span
                                                                class="fa fa-font" style="width: 30px;"></span></span>
                                                <input v-model="resource" id="resource" type="text" class="form-control" name="resource"
                                                       placeholder="Pavadinimas"
                                                       value="{{ old('resource') }}" required maxlength="255">
                                            </div>
                                            @if ($errors->has('resource'))
                                                <span class="help-block">
                                                {{ $errors->first('resource') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-12">

                                        <table v-if="permissionType == 'crud'" class="simple-table table">
                                            <thead>
                                            <th>Pavadinimas</th>
                                            <th>URL</th>
                                            <th>Aprašymas</th>
                                            </thead>
                                            <tbody v-if="resource.length >= 3" style="border-top: 5px solid #ffc500;">
                                            <tr v-for="item in crudSelected">
                                                <td v-text="crudName(item)"></td>
                                                <td v-text="crudSlug(item)"></td>
                                                <td v-text="crudDescription(item)"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div v-if="permissionType == 'crud'" class="text-center">

                                            <div class="col-xs-12 control-margin">

                                                <label class="control control-checkbox">
                                                    C
                                                    <input v-model="crudSelected" type="checkbox" value="create" />
                                                    <div class="control_indicator"></div>
                                                </label>
                                                <label class="control control-checkbox">
                                                    R
                                                    <input v-model="crudSelected" type="checkbox" value="read" />
                                                    <div class="control_indicator"></div>
                                                </label>
                                                <label class="control control-checkbox">
                                                    U
                                                    <input v-model="crudSelected" type="checkbox" value="update" />
                                                    <div class="control_indicator"></div>
                                                </label>
                                                <label class="control control-checkbox">
                                                    D
                                                    <input v-model="crudSelected" type="checkbox" value="delete" />
                                                    <div class="control_indicator"></div>
                                                </label>
                                            </div>
                                        </div>

                                        <input type="hidden" name="crud_selected" :value="crudSelected">

                                    </div>


                                    {{ csrf_field() }}

                                </form>
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- standard -->
            </div><!-- row -->
        </div><!-- wrapper -->
    </div>
@endsection

@section('bottom-footer-left-menu')
    <ul class="nav navbar-nav short-menu">
        @if(Auth::check() and Auth::user()->hasPermission('create-acl'))
            <li>
                <a href="javascript:void(0)" id="submit-button" aria-label="Išsaugoti įrašą">
                    <i class="fa fa-check-circle fa-lg"></i>
                </a>
            </li>
        @endif
        <li>
            <a href="{{ route('permissions.index') }}" aria-label="Atšaukti leidimo kūrimą">
                <i class="main_likes_icon fa fa-reply"></i>
            </a>
        </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title">
        Naujo leidimo kūrimas
    </div>
@endsection

@section('script')
    {{--Teksta pavercia i slug--}}
    <script type="text/javascript" src="{{  url('js\slug.js') }}"></script>
    <script>
        $('#slug').slugify('#display_name');
        $('#slug').keydown(function () {
            $('#slug').attr('readonly', 'readonly');
            return false;
        });
    </script>

    {{--Bootstrap table sortinimas--}}
    <script type="text/javascript" src="{{  url('js\bootstrap-table.js') }}"></script>

    <script src="{{  url('js/vue.min.js') }}" type="text/javascript"></script> {{-- VUE --}}
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                permissionType: 'basic',
                resource: '',
                crudSelected: ['create', 'read', 'update', 'delete']
            },
            methods: {
                crudName: function (item) {
                    return item.substr(0, 1).toUpperCase() + item.substr(1) + " " + app.resource.substr(0, 1).toUpperCase() + app.resource.substr(1);
                },
                crudSlug: function (item) {
                    return item.toLowerCase() + '-' + app.resource.toLowerCase();
                },
                crudDescription: function (item) {
                    return "Allow a User to " + item.toUpperCase() + " a " + app.resource.substr(0, 1).toUpperCase() + app.resource.substr(1);
                }
            }
        })
    </script>
@endsection
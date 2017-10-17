@extends('layouts.manage')
@section('title', '| Rolė: ' . htmlspecialchars($role->description))

@section('stylesheet')
    <link href="{{  url('js\table\bootstrap-table.css') }}" rel="stylesheet" type="text/css" media="all">
@endsection

@section('body_class', ' single-post main_overflow_visible background-info2')

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
                                               value="{{ $role->display_name }}"
                                               readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <table data-search="true" data-toggle="table" data-striped="true"
                                   data-pagination="true" data-page-size="10"
                                   class="table borderless">
                                <thead>
                                <tr>
                                    <th data-sortable="true" data-field="name" >Pavadinimas</th>
                                    <th data-sortable="true" data-field="description" >Aprašymas</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($role->permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->display_name }}</td>
                                        <td>{{ $permission->description }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="col-xs-12 control-margin">
                                <span>{{ $role->description }}</span>
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
                <a href="{{ route('roles.edit', $role->id ) }}" aria-label="Redaguoti rolę">
                    <i class="fa fa-pencil-square fa-lg">
                    </i>
                </a>
            </li>
        </ul>
    @endif
@endsection

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title">
        Rolė: {{ $role->display_name }}
    </div>
@endsection

@section('script')
    {{--Bootstrap table sortinimas--}}
    <script type="text/javascript" src="{{  url('js\bootstrap-table.js') }}"></script>
@endsection
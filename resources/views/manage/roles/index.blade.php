@extends('layouts.manage')
@section('title', '| Rolės')

@section('stylesheet')
    <link href="{{  url('js\table\bootstrap-table.css') }}" rel="stylesheet" type="text/css" media="all">
@endsection

@section('body_class', 'pm_dark_type single-post pm_overflow_visible background-info2')

@section('content')
    <div class="pm_wrapper pm_container">
        <div class="row">
            <div class="col-lg-12">
                <div class="pm_content_standard">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                            <table data-search="true" data-show-columns="true" data-toggle="table" data-striped="true"
                                   data-pagination="true" data-page-size="5"
                                   class="table borderless">
                                <thead>
                                <tr>
                                    <th data-switchable="false" data-sortable="true" data-field="id" >#</th>
                                    <th data-sortable="true" data-field="name" >Pavadinimas</th>
                                    <th data-sortable="true" data-field="slug">URL</th>
                                    <th data-sortable="true" data-field="description" >Aprašymas</th>
                                </tr>
                                </thead>
                                <tbody style="border-top: 5px solid #ffc500;">
                                @foreach($roles as $role)
                                    <tr>
                                        <td><a href="{{ route('roles.show', $role->id ) }}"><i class="fa fa-external-link-square fa-lg icon-color" aria-hidden="true"></i></a>
                                            {{ $role->id }}</td>
                                        <td>{{ $role->display_name }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->description }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div><!-- row -->
                </div><!-- standard -->
            </div><!-- col12 -->
        </div><!-- row -->
    </div><!-- wrapper -->
@endsection

@section('bottom-footer-left-menu')
    @if(Auth::check() and Auth::user()->hasPermission('create-acl'))
        <ul class="nav navbar-nav short-menu">
            <li>
                <a href="{{ route('roles.create') }}" aria-label="Sukurti rolę">
                    <i class="fa fa-plus-square fa-lg"></i>
                </a>
            </li>
        </ul>
    @endif
@endsection

@section('bottom-footer-info')
    <div class="pm_slide_title_wrapper pm_simple_title">
        Rolės ({{ $roles->count() }})
    </div>
@endsection

@section('script')
    {{--Bootstrap table sortinimas--}}
    <script type="text/javascript" src="{{  url('js\bootstrap-table.js') }}"></script>
@endsection
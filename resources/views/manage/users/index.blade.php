@extends('layouts.manage')
@section('title', '| Vartotojai')

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
                                    <th data-sortable="true" data-field="name" >Vardas</th>
                                    <th data-sortable="true" data-field="email" >E-paštas</th>
                                    <th data-sortable="true" data-field="status" >Status</th>
                                    <th data-sortable="true" data-field="date">Užregistruotas</th>
                                </tr>
                                </thead>
                                <tbody style="border-top: 5px solid #ffc500;">
                                @foreach($users as $user)
                                    <tr>
                                        <td><a href="{{ route('users.show', $user->id ) }}"><i class="fa fa-external-link-square fa-lg icon-color" aria-hidden="true"></i></a>
                                            {{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->status }}</td>
                                        <td>{{ date('Y-m-d', strtotime($user->created_at)) }}</td>
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
    @if(Auth::check() and Auth::user()->hasPermission('create-users'))
        <ul class="nav navbar-nav short-menu">
            <li>
                <a href="{{ route('users.create') }}" aria-label="Sukurti vartotoją">
                    <i class="fa fa-plus-square fa-lg"></i>
                </a>
            </li>
        </ul>
    @endif
@endsection

@section('bottom-footer-info')
    <div class="pm_slide_title_wrapper pm_simple_title">
        Vartotojai ({{ $users->count() }})
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{  url('js\table\bootstrap-table.js') }}"></script>
    <script type="text/javascript" src="{{  url('js\table\bootstrap-table-en-US.js') }}"></script>
@endsection
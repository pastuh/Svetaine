@extends('layouts.manage')
@section('title', '| ' . htmlspecialchars($user->name) . ' vartotojo redagavimas')

@section('stylesheet')
    <link href="{{  url('js\table\bootstrap-table.css') }}" rel="stylesheet" type="text/css" media="all">
@endsection

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
                                                            class="fa fa-address-card"
                                                            style="width: 30px;"></span></span>
                                        <input id="name" type="text" class="form-control info-perziura" name="name"
                                               placeholder="Vardas"
                                               value="{{ $user->name }}"
                                               readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 col-md-offset-3">
                                    <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="basic-addon1"><span
                                                            class="fa fa-envelope" style="width: 30px;"></span></span>
                                        <input id="email" type="email" class="form-control info-perziura" name="email"
                                               placeholder="E-paštas"
                                               value="{{ $user->email }}"
                                               readonly>
                                    </div>
                                </div>

                                <div class="col-md-6 col-md-offset-3">
                                    <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="basic-addon1"><span
                                                            class="fa fa-crosshairs fa-lg" style="width: 30px;"></span></span>
                                        <input id="status" type="text" class="form-control info-perziura" name="status"
                                               placeholder="Statusas"
                                               value="{{ $user->status ? 'Aktyvus' : 'Užbanintas' }}"
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
                                    <th data-sortable="true" data-field="name">Rolė</th>
                                    <th data-sortable="true" data-field="description" >Aprašymas</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($user->roles->count() == 0)
                                    <tr>
                                        <td></td>
                                        <td>Šis registruotas narys neturi jokių rolių</td>
                                    </tr>
                                @endif
                                @foreach($user->roles as $role)
                                    <tr>
                                        <td class="role-visible">{{ $role->display_name }}</td>
                                        <td>{{ $role->description }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="row">
                                <div class="col-md-4 col-lg-offset-4">
                                    <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="basic-addon1"><span
                                                            class="fa fa-comments"
                                                            style="width: 30px;"></span></span>
                                        <input type="text" class="form-control info-perziura"
                                               value="{{ $user->comments->count() }}"
                                               readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-offset-4">
                                    <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="basic-addon1"><span
                                                            class="fa fa-file-text"
                                                            style="width: 30px;"></span></span>
                                        <input type="text" class="form-control info-perziura"
                                               value="{{ $user->posts->count() }}"
                                               readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-lg-offset-4">
                                    <div class="input-group input-group-lg">
                                                <span class="input-group-addon" id="basic-addon1"><span
                                                            class="fa fa-steam-square"
                                                            style="width: 30px;"></span></span>
                                        <input type="text" class="form-control info-perziura"
                                               value="{{ $user->steamid }}"
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
    @if(Auth::check() and Auth::user()->hasPermission('update-users'))
        <ul class="nav navbar-nav short-menu">
            <li rel="tooltip" title="Redaguoti">
                <a href="{{ route('users.edit', $user->id ) }}" aria-label="Redaguoti vartotoją">
                    <i class="fa fa-pencil-square fa-lg">
                    </i>
                </a>
            </li>
        </ul>
    @endif
@endsection

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title">
        Vartotojas: {{ $user->name }}
    </div>
@endsection

@section('script')
    {{--Bootstrap table sortinimas--}}
    <script type="text/javascript" src="{{  url('js\bootstrap-table.js') }}"></script>
@endsection
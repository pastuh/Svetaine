@extends('layouts.manage')
@section('title', '| Žymos')

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
                                @if(Auth::check() and Auth::user()->hasPermission('create-tags'))
                                    <form id="main-form" data-parsley-validate method="POST"
                                          action="{{ route('tags.store') }}">

                                        <div class="col-md-6 col-md-offset-3">

                                            <div class="{{ $errors->has('tag') ? ' has-error' : '' }}">
                                                <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="basic-addon1"><span
                                                        class="fa fa-font" style="width: 30px;"></span></span>
                                                    <input id="tag" type="text" class="form-control" name="tag" placeholder="Pavadinimas"
                                                           value="{{ old('tag') }}" required autofocus minlength="3" maxlength="90">
                                                </div>
                                                @if ($errors->has('tag'))
                                                    <span class="help-block">
                                                {{ $errors->first('tag') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-md-offset-3">

                                            <div class="{{ $errors->has('slug') ? ' has-error' : '' }}">
                                                <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="basic-addon1"><span
                                                        class="fa fa-link" style="width: 30px;"></span></span>
                                                    <input id="slug" type="text" class="form-control" name="slug" placeholder="URL"
                                                           value="{{ old('slug') }}" required readonly minlength="3" maxlength="90">
                                                </div>
                                                @if ($errors->has('slug'))
                                                    <span class="help-block">
                                                {{ $errors->first('slug') }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        {{ csrf_field() }}
                                    </form>
                                @endif
                                <table data-toggle="table" data-striped="true"
                                       class="table borderless">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th data-sortable="true" data-field="name" >Pavadinimas</th>
                                        <th data-sortable="true" data-field="count" ><i class="fa fa-eye" aria-hidden="true"></i></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tags as $key=>$tag)
                                        <tr>
                                            <td><a href="{{ route('tags.slug', $tag->slug ) }}"><i
                                                            class="fa fa-external-link-square fa-lg icon-color"
                                                            aria-hidden="true"></i></a>
                                                {{ $key+1 }}</td>
                                            <td>{{ $tag->name }}</td>
                                            <td>@if($tag->posts()->where('published', '1')->count() > 0)
                                                    {{ $tag->posts()->where('published', '1')->count() }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- row -->
                </div><!-- standard -->
            </div><!-- col12 -->
        </div><!-- row -->
    </div><!-- wrapper -->
@endsection

@section('bottom-footer-left-menu')
    @if(Auth::check() and Auth::user()->hasPermission('create-tags'))
        <ul class="nav navbar-nav short-menu">
            <li>
                <a href="javascript:void(0)" id="submit-button" aria-label="Išsaugoti kategoriją">
                    <i class="fa fa-check-circle fa-lg"></i>
                </a>
            </li>
        </ul>
    @endif
@endsection

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title">
        Žymos ({{ $tags->count() }})
    </div>
@endsection

@section('script')
    {{--Teksta pavercia i slug--}}
    <script type="text/javascript" src="{{  url('js\slug.js') }}"></script>
    <script>
        $('#slug').slugify('#tag');
        $('#slug').keydown(function () {
            $('#slug').attr('readonly', 'readonly');
            return false;
        });
    </script>

    {{--Bootstrap table sortinimas--}}
    <script type="text/javascript" src="{{  url('js\bootstrap-table.js') }}"></script>

@endsection
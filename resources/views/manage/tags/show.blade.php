@extends('layouts.manage')
@section('title', "| Žyma: " . htmlspecialchars($tag->name))

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
                        <div class="col-lg-6 col-lg-offset-3">
                            <table data-search="true" data-show-columns="true" data-toggle="table" data-striped="true"
                                   data-pagination="true" data-page-size="5"
                                   class="table borderless">
                                <thead>
                                <tr>
                                    <th data-switchable="false" data-sortable="true" data-field="id" >#</th>
                                    <th data-sortable="true" data-field="name" >Įrašo pavadinimas</th>
                                    <th data-sortable="true" data-field="date" >Data</th>
                                    <th data-sortable="true" data-field="tags" >Visos žymos</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($postai as $key=>$post)
                                    <tr>
                                        <td><a href="{{ route('blog.slug', $post->slug ) }}"><i
                                                        class="fa fa-external-link-square fa-lg icon-color"
                                                        aria-hidden="true"></i></a>
                                            {{ $key+1 }}
                                        </td>
                                        <td>
                                            {{ $post->title }}
                                        </td>
                                        <td>
                                            {{ date('Y-m-d H:i', strtotime($post->created_at)) }}
                                        </td>
                                        <td>
                                            @foreach($post->tags as $real_tag)
                                                @if($tag->name !== $real_tag->name)
                                                    <a href="{{ route('tags.slug', $real_tag->slug) }}">
                                                        <span class="info-tiny">{{ $real_tag->name }}</span>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{--Tago sunaikinimo forma--}}
                        <form id="main-form" class="hidden" method="POST" action="{{ route('tags.destroy', $tag->id) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                        </form>

                    </div><!-- row -->
                </div><!-- standard -->
            </div><!-- col12 -->
        </div><!-- row -->
    </div><!-- wrapper -->
@endsection

@section('bottom-footer-left-menu')
    <ul class="nav navbar-nav short-menu">
        @if(Auth::check() and Auth::user()->hasPermission('update-tags'))
            <li>
                <a href="{{ route('tags.edit', $tag->slug ) }}" aria-label="Redaguoti žymą">
                    <i class="fa fa-pencil-square fa-lg">
                    </i>
                </a>
            </li>
        @endif
        @if(Auth::check() and Auth::user()->hasPermission('delete-tags'))
            <li class="post-delete-confirm">
                <a href="javascript:void(0)" aria-label="Naikinti žymą">
                    <i class="fa fa-trash-o fa-lg"></i>
                </a>
            </li>
            <li id="submit-button" class="hidden">
                <a href="javascript:void(0)" aria-label="Patvirtinu žymos naikinimą" style="color: #a21515;">
                    <i class="fa fa-trash-o fa-lg"></i>
                </a>
            </li>
        @endif
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title">
        Žyma: {{ $tag->name }} ({{ $tag->posts()->where('published', '1')->count() }})
    </div>
@endsection

@section('script')
    {{--Bootstrap table sortinimas--}}
    <script type="text/javascript" src="{{  url('js\bootstrap-table.js') }}"></script>

    <script type="text/javascript">
        //Confirm tag trynima
        $(".post-delete-confirm").click(function () {
            $(this).hide();
            $('#submit-button').removeClass('hidden');
        });
    </script>
@endsection
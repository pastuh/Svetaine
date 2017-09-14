@extends('layouts.manage')
@section('title', "| Kategorija: " . htmlspecialchars($category->name))

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
                        <div class="col-lg-6 col-lg-offset-3">
                            <table data-search="true" data-show-columns="true" data-toggle="table" data-striped="true"
                                   data-pagination="true" data-page-size="5"
                                   class="table borderless">
                                <thead>
                                <tr>
                                    <th data-switchable="false" data-sortable="true" data-field="id" >#</th>
                                    <th data-sortable="true" data-field="name" >Pavadinimas</th>
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
                                            @foreach($post->tags as $tag)
                                                <a href="{{ route('tags.slug', $tag->slug) }}">
                                                    <span class="info-tiny">{{ $tag->name }}</span>
                                                </a>
                                            @endforeach
                                        </td>
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
    @if(Auth::check() and Auth::user()->hasPermission('update-categories'))
        <ul class="nav navbar-nav short-menu">
            <li>
                <a href="{{ route('categories.edit', $category->slug ) }}" aria-label="Redaguoti kategoriją">
                    <i class="fa fa-pencil-square fa-lg">
                    </i>
                </a>
            </li>
        </ul>
    @endif
@endsection

@section('bottom-footer-info')
    <div class="pm_slide_title_wrapper pm_simple_title">
        Kategorija: {{ $category->name }} ({{ $category->posts()->where('published', '1')->count() }})
    </div>
@endsection

@section('script')
    {{--Bootstrap table sortinimas--}}
    <script type="text/javascript" src="{{  url('js\bootstrap-table.js') }}"></script>
@endsection
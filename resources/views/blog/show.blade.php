@extends('layouts.main')
@section('title', '| ' . htmlspecialchars($post->title) )

@section('stylesheet')
    <link href="{{  url('css\parsley.css') }}" rel="stylesheet" type="text/css" media="all">
@endsection

@section('body_class', 'pm_dark_type single-post pm_overflow_visible')

@section('body_style', 'background: url("../img/posts/' . htmlspecialchars($post->image_blured) . '") no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
position: absolute;
top: 10%;
width: 100%;')

@section('content')
    <!--SVG navigacijai -->
    <div class="svg-wrap" style="display: none;">
        <svg width="64" height="64" viewBox="0 0 64 64">
            <path id="arrow-left-1"
                  d="M46.077 55.738c0.858 0.867 0.858 2.266 0 3.133s-2.243 0.867-3.101 0l-25.056-25.302c-0.858-0.867-0.858-2.269 0-3.133l25.056-25.306c0.858-0.867 2.243-0.867 3.101 0s0.858 2.266 0 3.133l-22.848 23.738 22.848 23.738z"/>
        </svg>
        <svg width="64" height="64" viewBox="0 0 64 64">
            <path id="arrow-right-1"
                  d="M17.919 55.738c-0.858 0.867-0.858 2.266 0 3.133s2.243 0.867 3.101 0l25.056-25.302c0.858-0.867 0.858-2.269 0-3.133l-25.056-25.306c-0.858-0.867-2.243-0.867-3.101 0s-0.858 2.266 0 3.133l22.848 23.738-22.848 23.738z"/>
        </svg>
    </div>

    <div id="post-page{{ $post->id }}" class="pm_wrapper pm_container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                        <div class="pm_content_standard">
                            <div class="post-short-intro" style="float:left;">
                                <a href="{{ route('categories.slug', $post->category->slug) }}">
                                    @include('components._posticon')
                                </a>
                                <span class="info-tiny"><i
                                            class="pm_load_more_back fa fa-clock-o fa-lg"></i> {{ date('Y-m-d H:i', strtotime($post->created_at)) }}
                                </span>
                            </div>
                            <div class="clearfix"></div>

                            <div class="post-body">
                                {!! $post->body !!}
                                <div class="pm_post_meta_standard">
                                    <span><i class="icon fa fa-tags fa-lg"></i></span>
                                    @foreach($post->tags as $tag)
                                        {{ $loop->first ? '' : '&nbsp;' }}
                                        <a href="{{ route('tags.slug', $tag->slug) }}">
                                            <span class="info-tiny">{{ $tag->name }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div> <!-- col -->
                </div><!-- info row -->

                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                        <div class="pm_post_comments_standard pm_simple_layout hidden">
                            <div class="pm_comments_wrapper">
                                <div id="results-wrapper">
                                    <div id="pagination-wrapper">
                                        {{ $links }}
                                    </div>
                                    <div class="clearfix"></div>
                                    <ul class="pm_comments_list">
                                        @foreach($comments as $comment)
                                            <li class="comment">
                                                <div class="pm_comment_container">
                                                    <div class="pm_comment_wrapper">
                                                        <div class="pm_comment_avatar">
                                                            <img class="avatar"
                                                                 src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim("vpastuh@gmail.com"))) }}"
                                                                 alt="">
                                                        </div>

                                                        <div class="pm_comment_info">
                                                        <span class="pm_comment_author">
                                                                @if($comment->user->hasRole('superadministrator'))
                                                                <span style="color: #84a970;">{{ $comment->user->name }}</span>
                                                            @else
                                                                {{ $comment->user->name }}
                                                            @endif
                                                        </span>
                                                            <span class="pm_comment_date">{{ date('Y-m-d H:i', strtotime($comment->updated_at)) }}</span>

                                                            {{-- LEISTI REDAGUOTI KOMENTARA, JEIGU: --}}
                                                            {{--Useriui priklauso komentaras ir nepraejo 5 min--}}
                                                            {{--Arba Useris su spec teisemis--}}
                                                            @if(Auth::check() and Auth::user()->canAndOwns('update-comments', $comment) and (abs(time() - strtotime($comment->created_at)) < 300) or Auth::check() and Auth::user()->hasRole('editor|administrator|superadministrator'))
                                                                <span class="admin_editor">
                                                            <a href="{{ route('comments.edit', $comment->id) }}"
                                                               aria-label="Edit">
                                                                <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                                            </a>
                                                        </span>
                                                            @endif

                                                            {{-- LEISTI TRINTI KOMENTARA, JEIGU: --}}
                                                            {{--Useriui priklauso komentaras ir nepraejo 5 min--}}
                                                            {{--Arba Useris su spec teisemis--}}
                                                            @if(Auth::check() and Auth::user()->canAndOwns('delete-comments', $comment) and (abs(time() - strtotime($comment->created_at)) < 300) or Auth::check() and Auth::user()->hasRole('editor|administrator|superadministrator'))
                                                                <span class="admin_options">
                                                            <button class="btn-link btn-xs button-link delete-button"
                                                                    type="submit">
                                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                            </button>

                                                            <form data-parsley-group="first" method="POST"
                                                                  action="{{ route('comments.destroy', $comment->id) }}">
                                                                <button class="btn-link btn-xs button-link delete-confirm hidden"
                                                                        type="submit">
                                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                </button>
                                                                {{ method_field('DELETE') }}
                                                                {{ csrf_field() }}
                                                            </form>
                                                        </span>
                                                            @endif
                                                        </div>
                                                        <div class="pm_comment_text">
                                                            <p>{{ $comment->comment }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div id="pagination-wrapper">
                                        {{ $links }}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </div><!-- pm_comments_wrapper -->

                            @if(Auth::check() and Auth::user()->hasPermission('create-comments'))
                                <div class="comment-respond">
                                    <form id="main-form" data-parsley-validate
                                          action="{{ route('comments.store', $post->id) }}" method="POST"
                                          class="comment-form">
                                        <div class="pm_comment_input_wrapper">
                                        <textarea class="pm_comment_respond_field form-control" name="comment"
                                                  rows="1" cols="45" required
                                                  minlength="5" maxlength="2000">{{ old('comment') }}</textarea>
                                        </div>
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            @endif

                        </div><!-- comments_standard -->
                        <div class="clearfix"></div>
                    </div> <!-- comments col -->
                </div> <!-- comments row -->




            </div><!-- col_12 -->
        </div><!-- row -->
    </div><!-- wrapper -->
@endsection

@section('bottom-footer-left-menu')

    <nav class="nav-slit">
        @if($next_post)
            <a class="prev simple-next" href="{{$next_post->slug}}">
                        <span class="icon-wrap"><svg class="icon" width="22" height="22" viewBox="0 0 64 64"><use
                                        xlink:href="#arrow-left-1"></svg></span>
                <div>
                    <h3>{{ str_limit($next_post->title, $limit= 22, $end="...") }}</h3>
                    <img src="{{ url('img/posts/' . $next_post->image_thumb) }}" alt="Next thumb"/>
                </div>
            </a>
        @endif
        @if($previous_post)
            <a class="next simple-next" href="{{$previous_post->slug}}">
                        <span class="icon-wrap"><svg class="icon" width="22" height="22" viewBox="0 0 64 64"><use
                                        xlink:href="#arrow-right-1"></svg></span>
                <div>
                    <h3>{{ str_limit($previous_post->title, $limit= 22, $end="...") }}</h3>
                    <img src="{{ url('img/posts/' . $previous_post->image_thumb) }}" alt="Next thumb"/>
                </div>
            </a>
        @endif
    </nav>

    <ul class="nav navbar-nav short-menu">
        <li>
            <a href="javascript:void(0)" class="comment-post">
                <i class="fa fa-comments fa-lg">
                    <span class="menu-simple-text">{{ $post->comments()->count() }}</span>
                </i>
            </a>
        </li>
        @if(Auth::check() and Auth::user()->hasPermission('create-comments'))
            <li class="hidden" id="submit-button">
                <a href="javascript:void(0)">
                    <i class="fa fa-check-circle fa-lg"></i>
                </a>
            </li>
            <li class="comment-timer hidden">
                <a href="javascript:void(0)">
                    <span id="timer"></span>
                </a>
            </li>
        @endif
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="pm_slide_title_wrapper pm_simple_title">
        {{ $post->title }}
    </div>
@endsection

@section('script')
    {{--Tikrina ar suvestas tekstas teisingas--}}
    <script type="text/javascript" src="{{  url('js\parsley.js') }}"></script>

    {{--Postams priedai--}}
    <script type="text/javascript" src="{{  url('js\post-addon.js') }}"></script>

    @include('components._time')
    @include('components._comsystem')

@endsection
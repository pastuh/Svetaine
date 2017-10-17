@extends('layouts.main')
@section('title', '| ' . htmlspecialchars($post->title) )

@section('stylesheet')
    <link href="{{  url('css\parsley.css') }}" rel="stylesheet" type="text/css" media="all">
@endsection

@section('body_class', ' single-post main_overflow_hidden')

@section('body_style', 'background: url("../img/posts/' . htmlspecialchars($post->image_blured) . '") no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
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

    <div {{--id="post-page{{ $post->id }}"--}} class="main_wrapper main_container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                        <div class="main_content_standard">
                            <div class="post-body">

                                <div class="post-short-info">

                                    <a href="{{ route('categories.slug', $post->category->slug) }}">
                                        @include('components._posticon')
                                    </a>
                                    <span class="info-time">
                                        <i class="main_load_more_back fa fa-clock-o fa-lg"></i>
                                        {{ date('Y-m-d H:i', strtotime($post->created_at)) }}
                                    </span>

                                </div>
                                <div class="clearfix"></div>
                                {{--Body startas--}}
                                <div class="main-text">
                                    {!! $post->body !!}
                                </div>
                                <div class="main_data_meta_standard">
                                    <span><i id="tag-zyma" class="icon fa fa-tags fa-lg" style="margin-left: 6px;"></i></span>
                                    @foreach($post->tags as $tag)
                                        {{ $loop->first ? '' : '&nbsp;' }}
                                        <a href="{{ route('tags.slug', $tag->slug) }}" class="tags-list"
                                           style="visibility: hidden;">
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
                        <div class="main_post_comments_standard main_simple_layout hidden">
                            <div class="main_comments_wrapper">
                                <div id="results-wrapper">
                                    <div id="pagination-wrapper">
                                        {{ $links }}
                                    </div>
                                    <div class="clearfix"></div>
                                    <ul class="main_comments_list">
                                        @foreach($comments as $comment)
                                            {{-- Tikrinu ar useris egzistuoja --}}
                                            @if($comment->user !== NULL and $comment->user->status == 1 )
                                                <li class="comment">
                                                    <div class="main_comment_container">
                                                        <div class="main_comment_wrapper">
                                                            <div class="main_comment_avatar">
                                                                <img class="avatar"
                                                                     src=
                                                                     "
                                                                 @if($comment->user->avatar)
                                                                     {{ $comment->user->avatar }}
                                                                     @else
                                                                     {{ asset('img/default-avatar.png') }}
                                                                     @endif
                                                                             "
                                                                     alt="">
                                                            </div>

                                                            <div class="main_comment_info">
                                                        <span class="main_comment_author">
                                                                @if($comment->user->hasRole('superadministrator'))
                                                                <span style="color: #84a970;">{{ $comment->user->name }}</span>
                                                            @else
                                                                {{ $comment->user->name }}
                                                            @endif
                                                        </span>
                                                                <span class="main_comment_date">{{ date('Y-m-d H:i', strtotime($comment->updated_at)) }}</span>

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
                                                            <div class="main_comment_text">
                                                                <p>{{ $comment->comment }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <div id="pagination-wrapper">
                                        {{ $links }}
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </div><!-- main_comments_wrapper -->

                            @if(Auth::check() and Auth::user()->hasPermission('create-comments'))
                                <div class="comment-respond">
                                    <form id="main-form" data-parsley-validate
                                          action="{{ route('comments.store', $post->id) }}" method="POST"
                                          class="comment-form">
                                        <div class="main_comment_input_wrapper">
                                        <textarea class="main_comment_respond_field form-control" name="comment"
                                                  rows="1" cols="45" required
                                                  minlength="5" maxlength="2000">{{ old('comment') }}</textarea>
                                        </div>
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            @endif
                            @if(!Auth::check() or Auth::user()->hasRole('lurker'))
                                <div class="info-perziura" style="text-align: center;">
                                    <a href="{{ route('profile') }}">Norėdami komentuoti privalote prisijungti prie STEAM (Profilio puslapyje)</a>
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
        <li rel="tooltip" title="Peržiūra">
            <a href="javascript:void(0)" class="short-info slide-info-block">
                <i class="fa fa-info-circle fa-lg"></i>
            </a>
        </li>
        <li rel="tooltip" title="Komentarai">
            <a href="javascript:void(0)" class="comment-post">
                <i class="fa fa-comments fa-lg">
                    <span class="menu-simple-text">{{ $comments->count() }}</span>
                </i>
            </a>
        </li>
        @if(Auth::check() and Auth::user()->hasPermission('create-comments'))
            <li rel="tooltip" title="Rašyti" class="hidden" id="submit-button">
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
        <li rel="tooltip" title="Paveiksliukas" class="show-image">
            <a class="fluidbox fluid-image-fix" href="{{ asset('/img/posts/' . $post->image) }}">
                <img src="{{ asset('/img/posts/' . $post->image) }}" class="fluid-image-fix" height="0px" width="1px"
                     style="margin-right: -6px;"/>
                <i class="fa fa-picture-o fa-lg"></i>
            </a>
        </li>
    </ul>
@endsection

@section('bottom-footer-info')
    <div class="main_slide_title_wrapper main_simple_title">
        {{ $post->title }}
    </div>
@endsection

@section('script')
    {{--Tikrina ar suvestas tekstas teisingas--}}
    <script type="text/javascript" src="{{  url('js\parsley.js') }}"></script>

    {{--Postams priedai--}}
    <script type="text/javascript" src="{{  url('js\post-addon.js') }}"></script>

    {{--IMG preview--}}
    <script type="text/javascript" src="{{  url('js\throttle-debounce.min.js') }}"></script>

    @include('components._time')
    @include('components._comsystem')

    {{--Image preview--}}
    <script type="text/javascript">
        $(document).ready(function () {
            $('.fluidbox').fluidbox();
        });
    </script>

    <script>
    {{--Mobilaus uzslepimas nereikalingu mygtuku--}}
    $(".short-info").click(function () {
        $(".main_simple_title").slideToggle("slow", function () {
            $(".nav-slit a, .show-image, .comment-post").slideToggle("slow", function () {

            });
        });
    });
    </script>
@endsection
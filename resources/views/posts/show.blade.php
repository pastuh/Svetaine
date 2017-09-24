@extends('layouts.main')
@section('title', '| ' . htmlspecialchars($post->title))

@section('body_class', 'pm_dark_type single-post pm_overflow_visible')

@section('body_style', "background: url('/img/posts/" . htmlspecialchars($post->image_blured) . "') no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
width: 100%;")

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

    <div {{--id="post-page{{ $post->id }}"--}} class="pm_wrapper pm_container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                        <div class="pm_content_standard">
                            <div class="post-body">

                                <div class="post-short-info" >

                                    <a href="{{ route('categories.slug', $post->category->slug) }}">
                                        @include('components._posticon')
                                    </a>
                                    <span class="info-time">
                                        <i class="pm_load_more_back fa fa-clock-o fa-lg"></i>
                                        {{ date('Y-m-d H:i', strtotime($post->created_at)) }}
                                    </span>

                                </div>
                                <div class="clearfix"></div>
                                {{--Body startas--}}
                                <div class="main-text">
                                    {!! $post->body !!}
                                </div>
                                <div class="pm_post_meta_standard">
                                    <span><i id="tag-zyma" class="icon fa fa-tags fa-lg" style="margin-left: 6px;"></i></span>
                                    @foreach($post->tags as $tag)
                                        {{ $loop->first ? '' : '&nbsp;' }}
                                        <a href="{{ route('tags.slug', $tag->slug) }}" class="tags-list" style="visibility: hidden;">
                                            <span class="info-tiny">{{ $tag->name }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div> <!-- col -->
                </div><!-- info row -->

                {{--Posto sunaikinimo forma--}}
                <form id="main-form" class="hidden" method="POST" action="{{ route('posts.destroy', $post->id) }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                </form>
            </div><!-- col12 -->
        </div><!-- row -->
    </div><!-- wrapper -->
@endsection

@section('bottom-footer-left-menu')
    <nav class="nav-slit">
        @if($next_post)
            <a class="prev simple-next" href="{{$next_post->id}}">
                        <span class="icon-wrap"><svg class="icon" width="22" height="22" viewBox="0 0 64 64"><use
                                        xlink:href="#arrow-left-1"></svg></span>
                <div>
                    <h3>{{ str_limit($next_post->title, $limit= 22, $end="...") }}</h3>
                    <img src="{{ url('img/posts/' . $next_post->image_thumb) }}" alt="Next thumb"/>
                </div>
            </a>
        @endif
        @if($previous_post)
            <a class="next simple-next" href="{{$previous_post->id}}">
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
        {{--Jeigu postas nepatvirtintas, Autorius gali redaguoti posta--}}
        @if($post->published == 0)
            <li>
                <a href="{{ route('posts.show', $post->id, 'Nepaskelbta') }}" aria-label="Nepaskelbtas įrašas">
                    <i class="fa fa-eye-slash fa-lg">
                    </i>
                </a>
            </li>
            <li>
                <a href="{{ route('posts.edit', $post->id, 'Edit') }}" aria-label="Redaguoti įrašą">
                    <i class="fa fa-pencil-square fa-lg">
                    </i>
                </a>
            </li>
        @else
            <li>
                <a href="{{ route('blog.slug', $post->slug, 'Preview') }}" aria-label="Peržiūrėti įrašą">
                    <i class="fa fa-eye fa-lg">
                    </i>
                </a>
            </li>
        @endif
        {{--Jeigu postas patvirtintas, Useris su spec Role gali redaguoti posta--}}
        @if($post->published == 1 and Auth::user()->hasRole('editor|administrator|superadministrator'))
            <li>
                <a href="{{ route('posts.edit', $post->id, 'Edit') }}" aria-label="Redaguoti įrašą">
                    <i class="fa fa-pencil-square fa-lg">
                    </i>
                </a>
            </li>
        @endif
        @if(Auth::user()->hasPermission('delete-posts'))
            <li class="post-delete-confirm">
                <a href="javascript:void(0)" aria-label="Naikinti įrašą">
                    <i class="fa fa-trash-o fa-lg"></i>
                </a>
            </li>
            <li id="submit-button" class="hidden">
                <a href="javascript:void(0)" aria-label="Patvirtinu įrašo naikinimą" style="color: #a21515;">
                    <i class="fa fa-trash-o fa-lg"></i>
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
    {{--Postams priedai--}}
    <script type="text/javascript" src="{{  url('js\post-addon.js') }}"></script>

    <script type="text/javascript">
        //Confirm post trynima
        $(".post-delete-confirm").click(function () {
            $(this).hide();
            $('#submit-button').removeClass('hidden');
        });
    </script>
@endsection
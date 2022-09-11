@extends('layouts.page')
@section('content')
<div class="row container" id="wrapper">
            <div class="halim-panel-filter">
                <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs">
                            <span>
                                <span>
                                    <a href="{{route('category',$movie->category->slug)}}">{{$movie->category->title}}</a> » 
                                    <span>
                                        <a href="{{route('country',$movie->country->slug)}}">{{$movie->country->title}}</a> » 
                                        <span class="breadcrumb_last" aria-current="page">{{$movie->title}}</span>
                                    </span>
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
                </div>
                <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
                </div>
            </div>
            <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
                <section id="content" class="test">
                <div class="clearfix wrap-content">
                    <!-- <iframe width="100%" height="500" src="https://www.youtube.com/embed/r958O404e4U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                    <style type="text/css">
                        .iframe_phim iframe{
                            width: 100%;
                            height:800;
                        }
                    </style>
                    <div class="iframe_phim">
                        {!! $episode->linkphim !!}
                    </div>
                    <div class="button-watch">
                        @php
                            $current_url=Request::url();
                        @endphp
                        <ul class="halim-social-plugin col-xs-4 hidden-xs">
                            <li class="fb-like" data-href="{{$current_url}}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></li>
                            <li class="fb-save" data-uri="{{$current_url}}" data-size="small"></li>
                        </ul>
                        <ul class="col-xs-12 col-md-8">
                            <div id="autonext" class="btn-cs autonext">
                            <i class="icon-autonext-sm"></i>
                            <span><i class="hl-next"></i> Autonext: <span id="autonext-status">On</span></span>
                            </div>
                            <div id="explayer" class="hidden-xs"><i class="hl-resize-full"></i>
                            Expand 
                            </div>
                            <div id="toggle-light"><i class="fa-solid fa-lightbulb"></i>
                            Light Off 
                            </div>
                            <div id="report" class="halim-switch"><i class="hl-attention"></i> Report</div>
                            <div class="luotxem"><i class="fa-regular fa-eye"></i>
                            <span>
                                @if($movie->view > 999999)
                                    {{floor($movie->view / 1000000)}}M
                                @elseif($movie->view > 999)
                                    {{floor($movie->view / 1000)}}K
                                @else
                                    {{$movie->view}}
                                @endif
                            </span> lượt xem 
                            </div>
                            <div class="luotxem">
                            <a class="visible-xs-inline" data-toggle="collapse" href="#moretool" aria-expanded="false" aria-controls="moretool"><i class="hl-forward"></i> Share</a>
                            </div>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="clearfix"></div>
                    <div class="title-block">
                        <!-- <a href="javascript:;" data-toggle="tooltip" title="Add to bookmark">
                            <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="37976"><i class="fa-regular fa-bookmark"></i>
                            <div class="halim-pulse-ring"></div>
                            </div>
                        </a>
                        <div class="title-wrapper-xem full">
                            
                        </div> -->
                        <h1 class="entry-title" style="font-size:22px"><a href="#" title="{{$movie->title}}" class="tl">{{$movie->title}}</a> 
                            <span>
                                @if($movie->sotap > 1)
                                    Tập {{$episode->episode}}
                                @else
                                    Tập Full
                                @endif
                            </span>
                        </h1>
                        <h2 class="entry-title"style="font-size:16px"><a href="#" title="{{$movie->name_eng}}" class="tl">{{$movie->name_eng}}({{$movie->year}})</a></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix collapse" id="expand-post-content">
                        <article id="post-37976" class="item-content post-37976"></article>
                    </div>
                    <div class="clearfix"></div>
                    <div class="text-center">
                        <div id="halim-ajax-list-server"></div>
                    </div>
                    <div id="halim-list-server">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active server-1"><a href="#server-0" aria-controls="server-0" role="tab" data-toggle="tab"><i class="animate-spin fa-solid fa-atom"></i>  Vietsub</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active server-1" id="server-0">
                            <div class="halim-server">
                                <ul class="halim-list-eps">
                                    @foreach ($movie->episode as $key => $ep)
                                        @if($movie->sotap > 1)
                                            <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$ep->episode)}}">
                                        @else
                                            <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.'full')}}">
                                        @endif
                                        <li class="halim-episode">
                                            <span 
                                                class="halim-btn halim-btn-2 {{ $ep->episode==$episode->episode ? 'active':''}} halim-info-1-1 box-shadow" 
                                                data-post-id="37976" data-server="1" data-episode="1" data-position="first" 
                                                data-embed="0" data-title="Xem phim {{$movie->title}} - Tập {{$ep->episode}} - {{$movie->name_eng}} - vietsub + Thuyết Minh" 
                                                data-h1="T{{$movie->title}} - tập {{$ep->episode}}">
                                                @if($movie->sotap > 1)
                                                    Tập {{$ep->episode}}
                                                        @if($ep->episode == $movie->sotap)
                                                            - Tập cuối
                                                        @endif
                                                @else
                                                    Tập Full
                                                @endif
                                            </span>
                                        </li>  
                                    </a> 
                                    @endforeach                              
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="htmlwrap clearfix">
                        <div id="lightout"></div>
                    </div>
                    <!-- Bình luận -->
                    <div class="section-bar clearfix">
                        <h2 class="section-title"><span style="color:#ffed4d">Bình luận</span></h2>
                    </div>
                    <div class="entry-content htmlwrap clearfix">
                        <div class="video-item halim-entry-box">
                            <article id="post-38424" class="item-content" style="background: #ffffff">
                                <!-- Lấy đường dẫn của phim -->
                                @php
                                    $current_url=Request::url();
                                @endphp
                                <div class="fb-comments" data-href="{{$current_url}}" data-width="100%" data-numposts="5"></div>
                            </article>
                        </div>
                    </div>
                </section>
                <section class="related-movies">
                    <div id="halim_related_movies-2xx" class="wrap-slider">
                        <!-- phim liên quan -->
                        <div class="section-bar clearfix">
                            <h3 class="section-title"><span>CÓ THỂ BẠN MUỐN XEM</span></h3>
                        </div>
                        <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                        @foreach($related as $key => $rela)
                        <article class="thumb grid-item post-38498">
                            <div class="halim-item">
                                <a class="halim-thumb" href="{{route('movie',$rela->slug)}}" title="{{$rela->title}}">
                                    <figure><img class="lazy img-responsive" src="{{asset('uploads/movies')}}/{{$rela->image}}" alt="{{$rela->title}}" title="{{$rela->title}}"></figure>
                                    <span class="status">HD</span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>Vietsub</span> 
                                    <div class="icon_overlay"></div>
                                    <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                        <p class="entry-title">{{$rela->title}}</p>
                                        <p class="original_title">{{$rela->title}}</p>
                                    </div>
                                    </div>
                                </a>
                            </div>
                        </article>
                        @endforeach
                        </div>
                        <script>
                        $(document).ready(function($) {				
                        var owl = $('#halim_related_movies-2');
                        owl.owlCarousel({
                            loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,
                            navText: ['<i class="fa-solid fa-angle-left"></i>', '<i class="fa-solid fa-angle-right"></i>'],
                            responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 5}}})});
                        </script>
                    </div>
                </section>
            </main>
    <!-- sidebar -->
    @include('include.sidebar')
</div>
@endsection
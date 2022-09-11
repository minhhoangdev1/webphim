@extends('layouts.page')
@section('content')
<div class="row container" id="wrapper">
   <div class="halim-panel-filter">
      <div class="panel-heading">
         <div class="row">
            <div class="col-xs-6">
               <div class="yoast_breadcrumb hidden-xs"><span><span><a href="{{route('category',$movie->category->slug)}}">{{$movie->category->title}}</a> » <span><a href="{{route('category',$movie->country->slug)}}">{{$movie->country->title}}</a> » <span class="breadcrumb_last" aria-current="page">{{$movie->title}}</span></span></span></span></div>
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
            <div class="halim-movie-wrapper">
               <!-- <div class="title-block">
                  <div id="bookmark" class="bookmark-img-animation primary_ribbon" data-id="38424">
                     <div class="halim-pulse-ring"></div>
                  </div>
                  <div class="title-wrapper" style="font-weight: bold;">
                     Bookmark
                  </div>
               </div> -->
               <style type="text/css">
                  .btn-align {
                     text-align: center;margin-top: 22px;
                  }
               </style>
               <div class="movie_info col-xs-12">
                  <div class="movie-poster col-md-3">
                     <img class="movie-thumb" src="{{asset('uploads/movies')}}/{{$movie->image}}" alt="{{$movie->title}}">
                     @if($movie->status!=0)
                        <div class="bwa-content">
                           <div class="loader"></div>
                           @if($movie->sotap <= 1)
                              <a href="{{url('xem-phim/'.$movie->slug.'/tap-full')}}" class="bwac-btn">
                           @else
                              <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$episode_first->episode)}}" class="bwac-btn">
                           @endif
                                 <i class="fa fa-play"></i>
                              </a>
                        </div>
                        <div class="btn-align">
                           @if($movie->sotap <= 1)
                              <a href="{{url('xem-phim/'.$movie->slug.'/tap-full')}}" class="btn btn-danger" style="width:45%;">Xem phim</a>
                           @else
                              <a href="{{url('xem-phim/'.$movie->slug.'/tap-'.$episode_first->episode)}}" class="btn btn-danger" style="width:45%;">Xem phim</a>
                           @endif
                     @else
                        <div class="btn-align">
                     @endif
                     @if($movie->trailer!=null)
                           <a href="#xem_trailer" class="btn btn-primary trailer" style="width:45%;">Trailer</a>
                     @endif
                        </div>
                  </div>
                  <div class="film-poster col-md-9">
                     <h1 class="movie-title title-1" style="display:block;line-height:35px;margin-bottom: -14px;color: #ffed4d;text-transform: uppercase;font-size: 18px;">{{$movie->title}}</h1>
                     <h2 class="movie-title title-2" style="font-size: 12px;">{{$movie->name_eng}} ({{$movie->year}})</h2>
                     <ul class="list-info-group">
                        <li class="list-info-group-item"><span>Trạng Thái</span> : 
                           @if($movie->status == 1)
                              <span class="quality">
                                 @switch($movie->resolution)
                                       @case(0)
                                          HD
                                          @break
                                       @case(1)
                                          SD
                                          @break
                                       @case(2)
                                          HDCam
                                          @break
                                       @case(3)
                                          Cam
                                          @break
                                       @default
                                          FullHD
                                          @break
                                 @endswitch
                              </span>
                              <span class="episode">
                                 @if($movie->phude==1)
                                    Thuyết Minh
                                 @else
                                    Vietsub
                                 @endif
                              </span>
                           @else
                              <span class="episode">Phim sắp chiếu</span>
                           @endif
                        </li>
                        <li class="list-info-group-item"><span>Điểm IMDb</span> : <span class="imdb">{{$movie->point_imdb}}</span></li>
                        <li class="list-info-group-item"><span>Thời lượng</span> :  {{$movie->movie_duration}}</li>
                        @if($movie->sotap > 1)
                        <li class="list-info-group-item"><span>Số tập</span> : {{$count_episode}}/{{$movie->sotap}}</li>
                        <li class="list-info-group-item"><span>Tập mới nhất</span> : 
                           @foreach($episode as $key => $ep)
                              <a href="{{url('xem-phim/'.$ep->movie->slug.'/tap-'.$ep->episode)}}" rel="tag"><span class="episode">Tập {{$ep->episode}}
                                 @if($ep->episode == $movie->sotap)
                                    - Tập cuối
                                 @endif
                              </span>
                              </a>
                           @endforeach
                        </li>
                        @endif
                        <li class="list-info-group-item"><span>Năm sản xuất</span> : {{$movie->year}}</li>
                        <li class="list-info-group-item"><span>Thể loại</span> : 
                           @foreach($movie->movie_genre as $gen)
                              <a href="{{route('genre',$gen->slug)}}" rel="category tag">{{$gen->title}}</a>{{$loop->last ? '':','}}
                           @endforeach
                        </li>
                        <li class="list-info-group-item"><span>Quốc gia</span> : <a href="{{route('country',$movie->country->slug)}}" rel="tag">{{$movie->country->title}}</a></li>
                        <li class="list-info-group-item">
                           <span>Đạo diễn</span> : 
                           @foreach($movie->movie_dir_act->where('type','DIR') as $dir)
                              <a class="director" rel="nofollow" href="{{route('director_actor',['dao-dien',$dir->name,$dir->id])}}" title="{{$dir->name}}">{{$dir->name}}</a>{{$loop->last ? '':','}} 
                           @endforeach
                        </li>
                        <li class="list-info-group-item last-item" style="-overflow: hidden;-display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-flex: 1;-webkit-box-orient: vertical;">
                           <span>Diễn viên</span> : 
                           @foreach($movie->movie_dir_act->where('type','ACT') as $act)
                              <a href="{{route('director_actor',['dien-vien',$act->name,$act->id])}}" rel="nofollow" title="{{$act->name}}">{{$act->name}}</a>{{$loop->last ? '':','}} 
                           @endforeach
                        </li>
                     </ul>
                     <ul class="list-info-group" style="margin-top:-8px">
                        <div class="col">
                           @php
                              $current_url=Request::url();
                           @endphp
                           <div style="max-width: 150px;float:left" class="fb-like" data-href="{{$current_url}}" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                           <div style="margin: -2px 10px 0 0;overflow: hidden;max-width: 150px;height: 24px;" class="fb-save" data-uri="{{$current_url}}" data-size="small"></div>
                        </div>
                        <div class="col">
                           <div class='rating-stars text-center' style="width: 257px;float: left;">
                              <!-- <div id="stars">
                                 <img src="{{asset('images/star-off.png')}}" alt="1">
                                 <img src="{{asset('images/star-off.png')}}" alt="2">
                                 <img src="{{asset('images/star-off.png')}}" alt="3">
                                 <img src="{{asset('images/star-off.png')}}" alt="4">
                                 <img src="{{asset('images/star-off.png')}}" alt="5">
                                 <img src="{{asset('images/star-off.png')}}" alt="6">
                                 <img src="{{asset('images/star-off.png')}}" alt="7">
                                 <img src="{{asset('images/star-off.png')}}" alt="8">
                                 <img src="{{asset('images/star-off.png')}}" alt="9">
                                 <img src="{{asset('images/star-off.png')}}" alt="10">
                              </div> -->
                              <ul id='stars'>
                                 <li class='star' title='1/10' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                 </li>
                                 <li class='star' title='2/10' data-value='2'>
                                    <i class='fa fa-star fa-fw'></i>
                                 </li>
                                 <li class='star' title='3/10' data-value='3'>
                                    <i class='fa fa-star fa-fw'></i>
                                 </li>
                                 <li class='star' title='4/10' data-value='4'>
                                    <i class='fa fa-star fa-fw'></i>
                                 </li>
                                 <li class='star' title='5/10' data-value='5'>
                                    <i class='fa fa-star fa-fw'></i>
                                 </li>
                                 <li class='star' title='6/10' data-value='6'>
                                    <i class='fa fa-star fa-fw'></i>
                                 </li>
                                 <li class='star' title='7/10' data-value='7'>
                                    <i class='fa fa-star fa-fw'></i>
                                 </li>
                                 <li class='star' title='8/10' data-value='8'>
                                    <i class='fa fa-star fa-fw'></i>
                                 </li>
                                 <li class='star' title='9/10' data-value='9'>
                                    <i class='fa fa-star fa-fw'></i>
                                 </li>
                                 <li class='star' title='10/10' data-value='10'>
                                    <i class='fa fa-star fa-fw'></i>
                                 </li>
                              </ul>
                           </div>
                           <div>
                              <span id="dataRating" style="font-size:10px;margin-left: 15px;display: none;"> 6/10 </span>
                              <span id="rating"></span>
                           </div>
                        </div> 
                     </ul>
                     <div class="movie-trailer hidden"></div>
                  </div>
                  <div class="film-poster col-md-9"> 
                  </div>
               </div>
            </div>
            <div class="clearfix"></div>
            <div id="halim_trailer"></div>
            <div class="clearfix"></div>
            <!-- nội dung phim -->
            <div class="section-bar clearfix">
               <h2 class="section-title"><span style="color:#ffed4d">Nội dung phim</span></h2>
            </div>
            <div class="entry-content htmlwrap clearfix">
               <div class="video-item halim-entry-box">
                  <article id="post-38424" class="item-content">
                     {!!$movie->description!!}
                  </article>
               </div>
            </div>
            @if($movie->trailer!=null)
            <div class="section-bar clearfix" id="xem_trailer">
               <h2 class="section-title"><span style="color:#ffed4d">Trailer</span></h2>
            </div>
            <div class="entry-content htmlwrap clearfix">
               <div class="video-item halim-entry-box">
                  <article id="post-38424" class="item-content">
                     <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{$movie->trailer}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </article>
               </div>
            </div>
            @endif
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
            <!-- Tags -->
            <div class="section-bar clearfix">
               <h2 class="section-title"><span style="color:#ffed4d">Tags</span></h2>
            </div>
            <div class="entry-content htmlwrap clearfix">
               <div class="video-item halim-entry-box">
                  <article id="post-38424" class="item-content">
                     @if($movie->tags!=NULL)
                        @php
                           $tags=array();
                           $tags=explode(",",$movie->tags);
                        @endphp
                        @foreach($tags as $key => $tag)
                           <a href="{{route('tag',$tag)}}">{{$tag}}</a>
                        @endforeach
                     @else
                        Không có từ khóa cho phim
                     @endif
                  </article>
               </div>
            </div>
         </div>
      </section>
      <section class="related-movies">
         <div id="halim_related_movies-2xx" class="wrap-slider">
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

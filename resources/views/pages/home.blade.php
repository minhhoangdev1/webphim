@extends('layouts.page')
@section('content')
<div class="row container" id="wrapper">
   <div class="halim-panel-filter">
      <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
         <div class="ajax"></div>
      </div>
   </div>
   <div id="halim_related_movies-2xx" class="wrap-slider">
      <div class="section-bar clearfix">
         <h3 class="section-title"><span>Phim Hot</span></h3>
      </div>
      <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
         @foreach($phim_hot as $key => $phim)
            @if($phim->episode->count()!=0)
               <article class="thumb grid-item post-38498">
                  <div class="halim-item">
                     <a class="halim-thumb" href="{{route('movie',$phim->slug)}}" title="{{$phim->title}}">
                        <figure><img class="lazy img-responsive" src="{{asset('uploads/movies')}}/{{$phim->image}}" alt="{{$phim->title}}" title="{{$phim->title}}"></figure>
                        <span class="status">
                           @if($phim->sotap <=1)
                              @switch($phim->resolution)
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
                              @endswitch
                           @else
                              @php
                                 $tap=0;
                              @endphp
                              @foreach($phim->episode as $ph)
                                 @php
                                       $tap=$ph->episode;
                                 @endphp
                              @endforeach
                              @if($tap==$phim->sotap)
                                 Full
                              @else
                                 Tập
                              @endif
                              {{$tap}}/{{$phim->sotap}}
                           @endif
                        </span>
                        @if($phim->resolution!=5)
                        <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                           @if($phim->phude==1)
                              Thuyết Minh
                           @else
                              Vietsub
                           @endif
                           @if($phim->session!=null)
                              - Session: {{$phim->session}}
                           @endif
                        </span> 
                        @endif
                        <div class="icon_overlay"></div>
                        <div class="halim-post-title-box">
                           <div class="halim-post-title ">
                              <p class="entry-title">{{$phim->title}}</p>
                              <p class="original_title">{{$phim->name_eng}}</p>
                           </div>
                        </div>
                     </a>
                  </div>
               </article>
            @endif
         @endforeach
      </div>
   </div>
   <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
      @foreach($category as $key => $home_cate)
      <section id="halim-advanced-widget-2">
         <div class="section-heading">
            <a href="{{route('category',$home_cate->slug)}}" title="{{$home_cate->title}}">
               <span class="h-text">{{$home_cate->title}}</span>
            </a>
         </div>
         <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
            @foreach($home_cate->movie->take(10) as $key => $mov)
               @if($mov->episode->count()!=0)
                  <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                     <div class="halim-item">
                        <a class="halim-thumb" href="{{route('movie',$mov->slug)}}">
                           <figure><img class="lazy img-responsive" src="{{asset('uploads/movies')}}/{{$mov->image}}" alt="{{$mov->title}}" title="{{$mov->title}}"></figure>
                           <span class="status">
                              @if($mov->sotap <=1)
                                    @switch($mov->resolution)
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
                                    @endswitch
                                 @else
                                    @php
                                       $tap=0;
                                    @endphp
                                    @foreach($mov->episode as $ph)
                                    @php
                                          $tap=$ph->episode;
                                    @endphp
                                    @endforeach
                                    @if($tap==$mov->sotap)
                                       Full
                                    @else
                                       Tập
                                    @endif
                                    {{$tap}}/{{$mov->sotap}}
                                 @endif
                           </span>
                           @if($mov->resolution!=5)
                           <span class="episode"><i class="fa fa-play" aria-hidden="true"></i>
                              @if($mov->phude==1)
                                 Thuyết Minh
                              @else
                                 Vietsub
                              @endif
                              @if($mov->session!=null)
                                 - Session: {{$phim->session}}
                              @endif
                           </span> 
                           @endif
                           <div class="icon_overlay"></div>
                           <div class="halim-post-title-box">
                              <div class="halim-post-title ">
                                 <p class="entry-title">{{$mov->title}}</p>
                                 <p class="original_title">{{$mov->name_eng}}</p>
                              </div>
                           </div>
                        </a>
                     </div>
                  </article>
               @endif
            @endforeach
         </div>
      </section>
      <div class="clearfix"></div>
      @endforeach
   </main>
   <!-- sidebar -->
   @include('include.sidebar')
</div>
@endsection

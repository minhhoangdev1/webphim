@extends('layouts.page')
@section('content')
<div class="row container" id="wrapper">
   <div class="halim-panel-filter">
      <!-- <div class="panel-heading">
         <div class="row">
            <div class="col-xs-6">
               <div class="yoast_breadcrumb hidden-xs"><span><span><a href="">{{$slug_cate=='' ? 'Phim Mới' : $slug_cate->title}}</a> » <span class="breadcrumb_last" aria-current="page">2020</span></span></span></div>
            </div>
         </div>
      </div> -->
      <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
         <div class="ajax"></div>
      </div>
   </div>
   <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
      <section>
         <div class="section-bar clearfix">
            <h1 class="section-title"><span>{{$slug_cate=='' ? 'Phim Mới' : $slug_cate->title}}</span></h1>
         </div>
         <div class="halim_box">
            @foreach($movies as $key => $mov)
               @if($mov->episode->count()!=0)
                  <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                     <div class="halim-item">
                        <a class="halim-thumb" href="{{route('movie',$mov->slug)}}" title="{{ucwords($mov->title)}}">
                           <figure><img class="lazy img-responsive" src="{{asset('uploads/movies')}}/{{$mov->image}}" alt="{{ucwords($mov->title)}}" title="{{ucwords($mov->title)}}"></figure>
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
                           </span>
                           @endif 
                           <div class="icon_overlay"></div>
                           <div class="halim-post-title-box">
                              <div class="halim-post-title ">
                                 <p class="entry-title">{{ucwords($mov->title)}}</p>
                                 <p class="original_title">{{ucwords($mov->title)}}</p>
                              </div>
                           </div>
                        </a>
                     </div>
                  </article>
               @endif
            @endforeach
         </div>
         <div class="clearfix"></div>
         <div class="text-center">
            <!-- <ul class='page-numbers'>
               <li><span aria-current="page" class="page-numbers current">1</span></li>
               <li><a class="page-numbers" href="">2</a></li>
               <li><a class="page-numbers" href="">3</a></li>
               <li><span class="page-numbers dots">&hellip;</span></li>
               <li><a class="page-numbers" href="">55</a></li>
               <li><a class="next page-numbers" href=""><i class="hl-down-open rotate-right"></i></a></li>
            </ul> -->
            {!! $movies->links("pagination::bootstrap-4") !!}
         </div>
      </section>
   </main>
   <!-- sidebar -->
   @include('include.sidebar')
</div>
@endsection

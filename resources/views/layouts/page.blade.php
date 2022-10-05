<!DOCTYPE html>
<html lang="vi">
   <head>
      <meta charset="utf-8" />
      <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
      <meta name="theme-color" content="#234556">
      <meta http-equiv="Content-Language" content="vi" />
      <meta content="VN" name="geo.region" />
      <meta name="DC.language" scheme="utf-8" content="vi" />
      <meta name="language" content="Việt Nam">
      <link rel="shortcut icon" href="https://www.pngkey.com/png/detail/360-3601772_your-logo-here-your-company-logo-here-png.png" type="image/x-icon" />
      <meta name="revisit-after" content="1 days" />
      <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
      <title>{{$title}}</title>
      <meta name="description" content="{{$title}}" />
      <link rel="canonical" href="">
      <link rel="next" href="" />
      <meta property="og:locale" content="vi_VN" />
      <meta property="og:title" content="{{$title}}" />
      <meta property="og:description" content="{{$title}}" />
      <meta property="og:url" content="" />
      <meta property="og:site_name" content="{{$title}}" />
      <meta property="og:image" content="" />
      <meta property="og:image:width" content="300" />
      <meta property="og:image:height" content="55" />
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel='dns-prefetch' href='//s.w.org' />
      <link rel='stylesheet' id='bootstrap-css' href='{{asset('css/bootstrap.min.css?ver=5.7.2')}}' media='all' />
      <link rel='stylesheet' id='style-css' href='{{asset('css/style.css?ver=5.7.2')}}' media='all' />
      <link rel='stylesheet' id='wp-block-library-css' href='{{asset('css/style.min.css?ver=5.7.2')}}' media='all' />
      <script type='text/javascript' src='{{asset('js/jquery.min.js?ver=5.7.2')}}' id='halim-jquery-js'></script>
      <style type="text/css" id="wp-custom-css">
         .textwidget p a img {
            width: 100%;
         }
         /* Rating Star Widgets Style */
         .rating-stars ul {
            list-style-type:none;
            padding:0;
            
            -moz-user-select:none;
            -webkit-user-select:none;
         }
         .rating-stars ul > li.star {
            display:inline-block;
         }

         /* Idle State of the stars */
         .rating-stars ul > li.star > i.fa {
            font-size:1.2em; /* Change the size of the stars */
            color:#ccc; /* Color on idle state */
         }

         /* Hover state of the stars */
         .rating-stars ul > li.star.hover > i.fa {
            color:#FFCC36;
         }

         /* Selected state of the stars */
         .rating-stars ul > li.star.selected > i.fa {
            color:#FF912C;
         }
      </style>
      <style>#header .site-title {background: url(https://www.pngkey.com/png/detail/360-3601772_your-logo-here-your-company-logo-here-png.png) no-repeat top left;background-size: contain;text-indent: -9999px;}</style>
   </head>
   <body class="home blog halimthemes halimmovies" data-masonry="">
      <header id="header">
         <div class="container">
            <div class="row" id="headwrap">
               <div class="col-md-3 col-sm-6 slogan">
                  <p class="site-title"><a class="logo" href="{{route('index')}}" title="phim hay ">Phim Hay</p>
                  </a>
               </div>
               <div class="col-md-5 col-sm-6 halim-search-form hidden-xs">
                  <div class="header-nav">
                     <div class="col-xs-12">
                        <style type="text/css">
                           ul#result{
                              position:absolute;
                              z-index: 9999;
                              background:#1b2d3c;
                              width:94%;
                              padding:10px;
                              margin:1px;
                           }
                           .bookmarkCount{
                              background: #f11b1b;
                              padding: 3px 6px;
                              color: #fff;
                              font-size: 13px;
                              border-radius: 20px;
                              margin-left: 10px;
                           }
                        </style>
                        <div class="form-group form-search">
                           <div class="input-group col-xs-12">
                             <form action="{{route('search')}}" method="GET">
                                 <input id="search" type="text" name="q" class="form-control" placeholder="Tìm kiếm..." autocomplete="off">
                                 <i class="animate-spin hl-spin4 hidden"></i>
                                 <!-- <i class="animate-spin fa-solid fa-atom"></i> -->
                             </form>
                           </div>
                        </div>
                        <ul class="list-group" id="result" style="display:none"></ul>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 hidden-xs">
                  <div id="get-bookmark" class="box-shadow"><a href="{{route('home')}}"> Admin Home</a></div>
                  <!-- <div id="get-bookmark" class="box-shadow"><span> Bookmarks</span><span class="bookmarkCount">4</span></div> -->
                  <!-- <div id="bookmark-list" class="hidden bookmark-list-on-pc">
                     <ul style="margin: 0;"></ul>
                  </div> -->
               </div>
            </div>
         </div>
      </header>
      <div class="navbar-container">
         <div class="container">
            <nav class="navbar halim-navbar main-navigation" role="navigation" data-dropdown-hover="1">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#halim" aria-expanded="false">
                     <span class="sr-only">Menu</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                  </button>
                  <div class="navbar-toggle collapsed pull-right get-bookmark-on-mobile"><a href="{{route('home')}}"> Admin Home</a></div>
                  <!-- <button type="button" class="navbar-toggle collapsed pull-right expand-search-form" data-toggle="collapse" data-target="#search-form" aria-expanded="false">
                     <span class="hl-search" aria-hidden="true"></span>
                  </button> -->
                  <!-- <button type="button" class="navbar-toggle collapsed pull-right get-bookmark-on-mobile">
                     Bookmarks
                     <span class="bookmarkCount">4</span>
                  </button> -->
                  <!-- <button type="button" class="navbar-toggle collapsed pull-right get-locphim-on-mobile">
                     <a href="javascript:;" id="expand-ajax-filter" style="color: #ffed4d;">Lọc <i class="fas fa-filter"></i></a>
                  </button> -->
               </div>
               <div class="collapse navbar-collapse" id="halim">
                  <style type="text/css">
                     .active-nav{
                        border-bottom: 2px solid lightsalmon;
                     }
                  </style>
                  <div class="menu-menu_1-container">
                     <ul id="menu-menu_1" class="nav navbar-nav navbar-left">
                        @php
                           $currentUrl=Request::path();
                           $subUrl=substr($currentUrl,0,8);
                        @endphp
                        <li class="current-menu-item {{($currentUrl=='/') ? 'active active-nav': ''}}"><a title="Trang Chủ" href="{{route('index')}}">Trang Chủ</a></li>
                        <li class="current-menu-item {{($currentUrl=='danh-muc/phim-moi') ? 'active active-nav': ''}}"><a title="Phim mới" href="{{route('category','phim-moi')}}">Phim mới</a></li>
                        @foreach($category_home as $key => $cate)
                        <li class="current-menu-item {{($cate->slug=='phim-bo' && $currentUrl=='danh-muc/phim-bo') ||  ($cate->slug=='phim-le' && $currentUrl=='danh-muc/phim-le') || ($cate->slug=='phim-chieu-rap' && $currentUrl=='danh-muc/phim-chieu-rap')? 'active active-nav': ''}}"><a title="{{$cate->title}}" href="{{route('category',$cate->slug)}}">{{$cate->title}}</a></li>
                        @endforeach
                        <li class="mega dropdown {{($subUrl=='the-loai') ? 'active active-nav': ''}}">
                           <a title="Thể Loại" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Thể Loại <span class="caret"></span></a>
                           <ul role="menu" class=" dropdown-menu">
                              @foreach($genre_home as $key => $gen)
                              <li><a title="{{$gen->title}}" href="{{route('genre',$gen->slug)}}">{{$gen->title}}</a></li>
                              @endforeach
                           </ul>
                        </li>
                        <li class="mega dropdown {{($subUrl=='quoc-gia') ? 'active active-nav': ''}}">
                           <a title="Quốc Gia" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Quốc Gia <span class="caret"></span></a>
                           <ul role="menu" class=" dropdown-menu">
                              @foreach($country_home as $key => $cou)
                              <li><a title="{{$cou->title}}" href="{{route('country',$cou->slug)}}">{{$cou->title}}</a></li>
                              @endforeach
                           </ul>
                        </li>
                     </ul>
                  </div>
                  <!-- <ul class="nav navbar-nav navbar-left" style="background:#000;">
                     <li><a href="#" onclick="locphim()" style="color: #ffed4d;">Lọc Phim</a></li>
                  </ul> -->
               </div>
            </nav>
            <div class="collapse navbar-collapse" id="search-form">
               <div id="mobile-search-form" class="halim-search-form"></div>
            </div>
            <div class="collapse navbar-collapse" id="user-info">
               <div id="mobile-user-login"></div>
            </div>
         </div>
      </div>
 
      <div class="container">
         <div class="row fullwith-slider"></div>
      </div>
      <div class="container">
         @yield('content')
      </div>
      <div class="clearfix"></div>
      <footer id="footer" class="clearfix">
         <div class="container footer-columns">
            <div class="row container">
               <div class="widget about col-xs-12 col-sm-4 col-md-4">
                  <div class="footer-logo">
                     <img class="img-responsive" src="https://img.favpng.com/9/23/19/movie-logo-png-favpng-nRr1DmYq3SNYSLN8571CHQTEG.jpg" alt="Phim hay 2021- Xem phim hay nhất" />
                  </div>
                  Liên hệ QC: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e5958d8c888d849ccb868aa58288848c89cb868a88">[email&#160;protected]</a>
               </div>
            </div>
         </div>
      </footer>
      <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0&appId=1194702440937819&autoLogAppEvents=1" nonce="ugWfyAW3"></script>
      <div id='easy-top'></div>
      <script type='text/javascript' src='{{ asset('js/bootstrap.min.js?ver=5.7.2')}}' id='bootstrap-js'></script>
      <script type='text/javascript' src='{{ asset('js/owl.carousel.min.js?ver=5.7.2')}}' id='carousel-js'></script>
      <script type='text/javascript' src='{{ asset('js/halimtheme-core.min.js?ver=1626273138')}}' id='halim-init-js'></script>
      <script type='text/javascript'>
         // tìm kiếm phim
         $(document).ready(function(){
            $('#search').keyup(function(){
               $('#result').html('');
               var search=$('#search').val();
               if(search!=''){
                  $('#result').css('display', 'inherit');
                  var expression=new RegExp(search,"i");
                  $.getJSON('/json/movie.json',function(data){
                     $.each(data,function(key,value){
                        if(value.title.search(expression) !=-1){
                           $('#result').append(`<li class="list-group-item" style="cursor:pointer;list-style: none;"><img height="40" width="40" src="/uploads/movies/`+value.image+`"/> `+value.title+`</li>`);
                        }
                     })
                  })
               }else{
                  $('#result').css('display', 'none');
               }
            });
            $('#result').on('click','li',function(){
               var click_text=$(this).text().split('|');
               $('#search').val($.trim(click_text[0]));
               $('#result').html='';
               $('#result').css('display', 'none');
            });
         })

         //scroll xem trailer
         $(".trailer").click(function(e) {
            e.preventDefault();
            var aid = $(this).attr("href");
            $('html,body').animate({scrollTop: $(aid).offset().top},'slow');
         });

         //sidebar: hiển thị top phim theo ngày tuần tháng
         $(document).ready(function(){
            var top_view=0;
            $.ajax({
               url:"{{route('filter_sidebar')}}",
               method:"GET",
               data:{top_view:top_view},
               success:function(data){
                  $('#show0').html(data);
               },
               error:function(a,b,c){
                  console.log(a)
               }
            })
            
            //owlCarousel
            var owl = $('#halim_related_movies-2');
            owl.owlCarousel({
               loop: true,margin: 4,autoplay: true,autoplayTimeout: 4000,autoplayHoverPause: true,nav: true,
               navText: ['<i class="fa-solid fa-angle-left"></i>', '<i class="fa-solid fa-angle-right"></i>'],
               responsiveClass: true,responsive: {0: {items:2},480: {items:3}, 600: {items:4},1000: {items: 5}}
            })
         })
         $('.filter-sidebar').click(function(){
            var href=$(this).attr('href');
            if(href=='#ngay'){
               var top_view=0;
            }else if(href=='#tuan'){
               var top_view=1;
            }else{
               var top_view=2;
            }
            $.ajax({
               url:"{{route('filter_sidebar')}}",
               method:"GET",
               data:{top_view:top_view},
               success:function(data){
                  $('#show'+top_view).html(data);
               }
            })
         })
         $(document).ready(function(){
            visitWebsite();
            var stars=document.getElementById('stars');
            if(stars){
               var ratingMovie={{isset($review) ? $review->rating : 0}};
               var review={{isset($review) ? $review->review : 0}};
               getRatingMovie(ratingMovie,review);
               var movie_id='{{isset($movie) ?  $movie->id: 0}}'
               var rating = sessionStorage.getItem('_'+movie_id);
               if(!rating){
                  $('#stars').on('mouseover',function(){
                     $(this).css('cursor','pointer')
                     $('#dataRating').css('display', 'inline-block');
                  }).on('mouseout', function(){
                     $('#dataRating').css('display', 'none');
                     getRatingMovie(ratingMovie,review);
                  });
                  /* 1. Visualizing things on Hover - See next part for action on click */
                  $('#stars li').on('mouseover', function(){
                     var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
                     var stars = $(this).parent().children('li.star');
                     for (i = 0; i < stars.length; i++) {
                        $(stars[i]).removeClass('selected');
                     }
                     // Now highlight all the stars that's not after the current hovered star
                     $(this).parent().children('li.star').each(function(e){
                        if (e < onStar) {
                           $('#dataRating').text(e+1+'/10');
                           $(this).addClass('hover');
                        }
                        else {
                           $(this).removeClass('hover');
                        }
                     });
                     
                  }).on('mouseout', function(){
                     $(this).parent().children('li.star').each(function(e){
                        $(this).removeClass('hover');
                     });
                  });
                  /* 2. Action to perform on click */
                  $('#stars li').on('click', function(){
                     sessionStorage.setItem('_'+movie_id, true);
                     rating = sessionStorage.getItem('_'+movie_id);
                     var onStar = parseInt($(this).data('value'), 10); // The star currently selected
                     var stars = $(this).parent().children('li.star');
                     
                     for (i = 0; i < onStar; i++) {
                        $(stars[i]).addClass('selected');
                     }
                     var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
                     $.ajax({
                        url:"{{route('ratingMovie')}}",
                        method:"GET",
                        data:{movie_id:movie_id,ratingValue:ratingValue},
                        success:function(data){
                           console.log(data);
                           review=data.review;
                           ratingMovie=data.rating;
                           getRatingMovie(ratingMovie,review);
                           
                           setTimeout(function(){
                              $('#stars').off();
                              $('#stars li').off();
                           },1000)
                        },
                        error:function(a,b,c){
                           console.log(a)
                        }
                     })
                  }); 
               }
            }            
         });
         function getRatingMovie(ratingMovie,review){
            var stars = $('#stars li').parent().children('li.star');
           
            for (i = 0; i < stars.length; i++) {
               $(stars[i]).removeClass('selected');
            }  
            if(ratingMovie==0){
               $('#rating').text('(Chưa có lượt đánh giá)');
            }else{
               $('#rating').text('( '+ratingMovie+' điểm / '+review+' lượt )');
               for (i = 0; i <= ratingMovie-1; i++) {
                  $(stars[i]).addClass('selected');
               }
            }
           
         }
         function visitWebsite(){
            var hasVisited = sessionStorage.getItem('welcome');

            if ( ! hasVisited ) {
               $.ajax({
                  url:"{{route('visitWebsite')}}",
                  method:"GET",
                  success: function(data){
                     sessionStorage.setItem('welcome', true);
                  }
               })
            }
         }
      </script>
      <style>#overlay_mb{position:fixed;display:none;width:100%;height:100%;top:0;left:0;right:0;bottom:0;background-color:rgba(0, 0, 0, 0.7);z-index:99999;cursor:pointer}#overlay_mb .overlay_mb_content{position:relative;height:100%}.overlay_mb_block{display:inline-block;position:relative}#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:600px;height:auto;position:relative;left:50%;top:50%;transform:translate(-50%, -50%);text-align:center}#overlay_mb .overlay_mb_content .cls_ov{color:#fff;text-align:center;cursor:pointer;position:absolute;top:5px;right:5px;z-index:999999;font-size:14px;padding:4px 10px;border:1px solid #aeaeae;background-color:rgba(0, 0, 0, 0.7)}#overlay_mb img{position:relative;z-index:999}@media only screen and (max-width: 768px){#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:400px;top:3%;transform:translate(-50%, 3%)}}@media only screen and (max-width: 400px){#overlay_mb .overlay_mb_content .overlay_mb_wrapper{width:310px;top:3%;transform:translate(-50%, 3%)}}</style>
      <style>
         #overlay_pc {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 99999;
            cursor: pointer;
         }
         #overlay_pc .overlay_pc_content {
            position: relative;
            height: 100%;
         }
         .overlay_pc_block {
            display: inline-block;
            position: relative;
         }
         #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
            width: 600px;
            height: auto;
            position: relative;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
         }
         #overlay_pc .overlay_pc_content .cls_ov {
            color: #fff;
            text-align: center;
            cursor: pointer;
            position: absolute;
            top: 5px;
            right: 5px;
            z-index: 999999;
            font-size: 14px;
            padding: 4px 10px;
            border: 1px solid #aeaeae;
            background-color: rgba(0, 0, 0, 0.7);
         }
         #overlay_pc img {
            position: relative;
            z-index: 999;
         }
         @media only screen and (max-width: 768px) {
            #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
               width: 400px;
               top: 3%;
               transform: translate(-50%, 3%);
            }
         }
         @media only screen and (max-width: 400px) {
            #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
               width: 310px;
               top: 3%;
               transform: translate(-50%, 3%);
            }
         }
      </style>
      <style>
         .float-ck { position: fixed; bottom: 0px; z-index: 9}
         * html .float-ck /* IE6 position fixed Bottom */{position:absolute;bottom:auto;top:expression(eval (document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0))) ;}
         #hide_float_left a {background: #0098D2;padding: 5px 15px 5px 15px;color: #FFF;font-weight: 700;float: left;}
         #hide_float_left_m a {background: #0098D2;padding: 5px 15px 5px 15px;color: #FFF;font-weight: 700;}
         span.bannermobi2 img {height: 70px;width: 300px;}
         #hide_float_right a { background: #01AEF0; padding: 5px 5px 1px 5px; color: #FFF;float: left;}
      </style>
   </body>
</html>
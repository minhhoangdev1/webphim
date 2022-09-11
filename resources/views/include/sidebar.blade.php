   <!-- thống kê phim -->
   <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
      <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
         <div class="section-bar clearfix">
            <div class="section-title">
               <span>Trending</span>
               <ul class="halim-popular-tab" id="pills-tab" role="tablist">
                  <li class="nav-item active">
                     <a class="nav-link filter-sidebar active" id="pills-home-tab" data-toggle="pill" href="#ngay" role="tab" aria-controls="pills-home" aria-selected="false">Ngày</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link filter-sidebar" id="pills-profile-tab" data-toggle="pill" href="#tuan" role="tab" aria-controls="pills-profile" aria-selected="false">Tuần</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link filter-sidebar" id="pills-contact-tab" data-toggle="pill" href="#thang" role="tab" aria-controls="pills-contact" aria-selected="false">Tháng</a>
                  </li>
               </ul>
            </div>
         </div>
         <section class="tab-content">
            <div class="tab-content" id="pills-tabContent">
               <div class="tab-pane fade active in" id="ngay" role="tabpanel" aria-labelledby="pills-home-tab">
                  <div id="halim-ajax-popular-post" class="popular-post">
                     <span id="show0"></span>
                  </div>
               </div>
               <div class="tab-pane fade" id="tuan" role="tabpanel" aria-labelledby="pills-profile-tab">
                  <div id="halim-ajax-popular-post" class="popular-post">
                     <span id="show1"></span>
                  </div>
               </div>
               <div class="tab-pane fade" id="thang" role="tabpanel" aria-labelledby="pills-contact-tab">
                  <div id="halim-ajax-popular-post" class="popular-post">
                     <span id="show2"></span>
                  </div>
               </div>
            </div>
         </section>
         <div class="clearfix"></div>
      </div>
   </aside>
   <!-- phim sắp chiếu -->
   @if($phim_sap_chieu->count() > 0)
   <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
      <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
         <div class="section-bar clearfix">
            <div class="section-title">
               <span>Phim sắp chiếu</span>
            </div>
         </div>
         <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
               <div class="halim-ajax-popular-post-loading hidden"></div>
               <div id="halim-ajax-popular-post" class="popular-post">
                  @foreach($phim_sap_chieu as $key => $phim)
                  <div class="item post-37176">
                     <a href="{{route('movie',$phim->slug)}}" title="{{$phim->title}}">
                        <div class="item-link">
                           <img src="{{asset('uploads/movies')}}/{{$phim->image}}" class="lazy post-thumb" alt="{{$phim->title}}" title="{{$phim->title}}" />
                           <span class="is_trailer">
                           Trailer
                           </span>
                        </div>
                        <p class="title">{{$phim->title}}</p>
                     </a>
                     <!-- <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div> -->
                     <div style="float: left;">
                        <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
                        <span style="width: 0%"></span>
                        </span>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </section>
         <div class="clearfix"></div>
      </div>
   </aside>
   @endif
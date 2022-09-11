@extends('layouts.admin')
@section('content')
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
   <!-- ============================================================== -->
   <!-- Bread crumb and right sidebar toggle -->
   <!-- ============================================================== -->
   <div class="page-breadcrumb">
      <div class="row">
         <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Dashboard</h4>
            <div class="ms-auto text-end">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">
                        @php
                           $ip=Request::ip();
                        @endphp
                        Dashboard {{$ip}}
                     </li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
   <!-- ============================================================== -->
   <!-- End Bread crumb and right sidebar toggle -->
   <!-- ============================================================== -->
   <!-- ============================================================== -->
   <!-- Container fluid  -->
   <!-- ============================================================== -->
   <div class="container-fluid">
      <!-- ============================================================== -->
      <!-- Sales Cards  -->
      <!-- ============================================================== -->
      <!-- <div class="row">
         <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
               <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                     <i class="mdi mdi-movie"></i>
                  </h1>
                  <h5 class="text-white">{{$totals['movies']}}</h5>
                  <h6 class="text-white">Tổng phim</h6>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
               <div class="box bg-warning text-center">
                  <h1 class="font-light text-white">
                     <i class="mdi mdi-collage"></i>
                  </h1>
                  <h5 class="text-white">{{$totals['categories']}}</h5>
                  <h6 class="text-white">Tổng danh mục</h6>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
               <div class="box bg-success text-center">
                  <h1 class="font-light text-white">
                     <i class="mdi mdi-earth"></i>
                  </h1>
                  <h5 class="text-white">{{$totals['countries']}}</h5>
                  <h6 class="text-white">Tổng quốc gia</h6>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
               <div class="box bg-danger text-center">
                  <h1 class="font-light text-white">
                     <i class="mdi mdi-view-column"></i>
                  </h1>
                  <h5 class="text-white">{{$totals['genres']}}</h5>
                  <h6 class="text-white">Tổng thể loại</h6>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
               <div class="box bg-info text-center">
                  <h1 class="font-light text-white">
                     <i class="mdi mdi-view-column"></i>
                  </h1>
                  <h5 class="text-white">0</h5>
                  <h6 class="text-white">Tổng Users</h6>
               </div>
            </div>
         </div>
         <div class="col-md-6 col-lg-2 col-xlg-3">
            <div class="card card-hover">
               <div class="box bg-cyan text-center">
                  <h1 class="font-light text-white">
                     <i class="mdi mdi-view-column"></i>
                  </h1>
                  <h5 class="text-white">0</h5>
                  <h6 class="text-white">Rating</h6>
               </div>
            </div>
         </div>
      </div> -->
      <!-- ============================================================== -->
      <!-- Sales chart -->
      <!-- ============================================================== -->
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <div class="d-md-flex align-items-center">
                     <div>
                        <h4 class="card-title">Thống kê </h4>
                        <h5 class="card-subtitle">Trong 7 ngày qua</h5>
                     </div>
                  </div>
                  <div class="row">
                     <!-- column -->
                     <div class="col-lg-9">
                        <canvas id="myChart"></canvas>
                     </div>
                     <div class="col-lg-3">
                        <div class="row">
                           <div class="col-6">
                              <div class="card card-hover">
                                 <div class="bg-cyan p-10 text-white text-center">
                                    <i class="mdi mdi-movie fs-3 font-16"></i>
                                    <h5 class="mb-0 mt-1">{{$totals['movies']}}</h5>
                                    <small class="font-light">Tổng phim</small>
                                 </div>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="card card-hover">
                                 <div class="bg-warning p-10 text-white text-center">
                                    <i class="mdi mdi-collage fs-3 font-16"></i>
                                    <h5 class="mb-0 mt-1">{{$totals['categories']}}</h5>
                                    <small class="font-light">Tổng danh mục</small>
                                 </div>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="card card-hover">
                                 <div class="bg-success p-10 text-white text-center">
                                    <i class="mdi mdi-earth fs-3 font-16"></i>
                                    <h5 class="mb-0 mt-1">{{$totals['countries']}}</h5>
                                    <small class="font-light">Tổng quốc gia</small>
                                 </div>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="card card-hover">
                                 <div class="bg-danger p-10 text-white text-center">
                                    <i class="mdi mdi-view-column fs-3 font-16"></i>
                                    <h5 class="mb-0 mt-1">{{$totals['genres']}}</h5>
                                    <small class="font-light">Tổng thể loại</small>
                                 </div>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="card card-hover">
                                 <div class="bg-info p-10 text-white text-center">
                                    <i class="mdi mdi-collage fs-3 font-16"></i>
                                    <h5 class="mb-0 mt-1">0</h5>
                                    <small class="font-light">Tổng Users</small>
                                 </div>
                              </div>
                           </div>
                           <div class="col-6">
                              <div class="card card-hover">
                                 <div class="bg-cyan p-10 text-white text-center">
                                    <i class="mdi mdi-collage fs-3 font-16"></i>
                                    <h5 class="mb-0 mt-1">0</h5>
                                    <small class="font-light">Rating</small>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- column -->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- ============================================================== -->
      <!-- Sales chart -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Recent comment and chats -->
      <!-- ============================================================== -->
      <div class="row">
         <!-- column -->
         <div class="col-lg-6">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Phim Trending</h4>
               </div>
               <div class="comment-widgets scrollable">
                  <div>
                     <!-- Nav tabs -->
                     <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                           <a
                              class="nav-link active"
                              data-bs-toggle="tab"
                              href="#day"
                              role="tab"
                              ><span class="hidden-sm-up"></span>
                           <span class="hidden-xs-down">Ngày</span></a
                              >
                        </li>
                        <li class="nav-item">
                           <a
                              class="nav-link"
                              data-bs-toggle="tab"
                              href="#week"
                              role="tab"
                              ><span class="hidden-sm-up"></span>
                           <span class="hidden-xs-down">Tuần</span></a
                              >
                        </li>
                        <li class="nav-item">
                           <a
                              class="nav-link"
                              data-bs-toggle="tab"
                              href="#month"
                              role="tab"
                              ><span class="hidden-sm-up"></span>
                           <span class="hidden-xs-down">Tháng</span></a
                              >
                        </li>
                     </ul>
                     <!-- Tab panes -->
                     <div class="tab-content tabcontent-border">
                        <div class="tab-pane scrollable  active" id="day" role="tabpanel" style="height: 490px"></div>
                        <div class="tab-pane p-20 scrollable " id="week" role="tabpanel" style="height: 490px"></div>
                        <div class="tab-pane p-20 scrollable " id="month" role="tabpanel" style="height: 490px"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- column -->
         <div class="col-lg-6">
            <!-- card -->
            <div class="card">
               <div class="card-body">
                  <h4 class="col-sm-3">Danh sách phim </h4>
                  <div class="form-group row">
                     <label
                        for="fname"
                        class="col-sm-2 text-end control-label col-form-label"
                        >Tìm kiếm</i></label
                     >
                     <div class="col-sm-4">
                        <input
                           type="text"
                           class="form-control"
                           id="search_movie"
                           name="search"
                           placeholder="Nhập thông tin..."
                        />
                     </div>
                     <label class="col-sm-2 text-end control-label col-form-label">Sắp xếp</label>
                     <div class="col-md-4">
                        <select
                        class="select2 form-select shadow-none"
                        style="width: 100%; height: 36px"
                        name="status"
                        id="sortMovie"
                        >
                           <option value="newMovie" >Mới nhất</option>
                           <option value="oldMovie" >Củ nhất</option>
                           <option value="highView" >Lượt xem cao nhất</option>
                           <option value="lowView" >Lượt xem thấp nhất</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div
                  class="comment-widgets scrollable"
                  style="height: 475px"
                  id="list_movie">
               </div>
            </div>
         </div>
      </div>
      <!-- ============================================================== -->
      <!-- Recent comment and chats -->
      <!-- ============================================================== -->
   </div>
   <!-- ============================================================== -->
   <!-- End Container fluid  -->
   <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
@endsection
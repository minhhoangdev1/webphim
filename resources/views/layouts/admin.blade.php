<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta
         name="keywords"
         content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
         />
      <meta
         name="description"
         content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
         />
      <meta name="robots" content="noindex,nofollow" />
      <title>Admin Movie</title>
      <!-- Favicon icon -->
      <link
         rel="icon"
         type="image/png"
         sizes="16x16"
         href="{{asset('admin/assets/images/favicon.png')}}"
         />
      <!-- Custom CSS -->
      <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/extra-libs/multicheck/multicheck.css')}}"/>
      <link href="{{asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}"   rel="stylesheet"/>
      <link
         rel="stylesheet"
         type="text/css"
         href="{{asset('admin/assets/libs/select2/dist/css/select2.min.css')}}"
      />
      <link
         rel="stylesheet"
         type="text/css"
         href="{{asset('admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}"
      />
      <link href="{{asset('admin/dist/css/style.min.css')}}" rel="stylesheet" />
      <link href="{{asset('admin/assets/libs/toastr/build/toastr.min.css')}}" rel="stylesheet" />

      <!-- css toast message -->
      <style type="text/css">
         .toast1{
            position: fixed;
            top: 68px;
            right: 30px;
            border-radius: 12px;
            background: #fff;
            padding: 20px 35px 20px 25px;
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
            border-left: 6px solid #2cb559;
            overflow: hidden;
            transform: translateX(calc(100% + 30px));
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.35);
            z-index: 999999;
         }

         .toast1.active{
            transform: translateX(0%);
         }

         .toast1 .toast1-content{
            display: flex;
            align-items: center;
            height:10px;
            width: 300px;
         }

         .toast1-content .check{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 20px;
            width: 20px;
            background-color: #2cb559;
            color: #fff;
            font-size: 12px;
            border-radius: 50%;
         }

         .toast1-content .message{
            display: flex;
            flex-direction: column;
            margin: 0 20px;
         }

         .message .text{
            font-size: 12px;
            font-weight: 400;;
            color: #666666;
         }

         .message .text.text-1{
            font-weight: 600;
            color: #333;
         }

         .toast1 .close{
            position: absolute;
            top: 10px;
            right: 15px;
            padding: 5px;
            cursor: pointer;
            opacity: 0.7;
         }

         .toast1 .close:hover{
            opacity: 1;
         }

         .icon-page{
            color:#586179;
            font-size:20px
         }
         .none_icondelete{
            display:none;
         }
         .btn-submit{
            border: 0px;
            background-color: #00000000;
            font-size: 20px;
         }
      </style>
      <!-- end css toast message -->
   </head>
   <body>
     

      <!-- ============================================================== -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================== -->
      <div class="preloader">
         <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
         </div>
      </div>
      <!-- ============================================================== -->
      <!-- Main wrapper - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <div
         id="main-wrapper"
         data-layout="vertical"
         data-navbarbg="skin5"
         data-sidebartype="full"
         data-sidebar-position="absolute"
         data-header-position="absolute"
         data-boxed-layout="full"
         >
         <!-- ============================================================== -->
         <!-- Topbar header - style you can find in pages.scss -->
         <!-- ============================================================== -->
         <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
               <div class="navbar-header" data-logobg="skin5">
                  <!-- ============================================================== -->
                  <!-- Logo -->
                  <!-- ============================================================== -->
                  <a class="navbar-brand" href="{{route('home')}}">
                     <!-- Logo icon -->
                     <b class="logo-icon ps-2">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img
                           src="{{asset('admin/assets/images/logo-icon.png')}}"
                           alt="homepage"
                           class="light-logo"
                           width="25"
                           />
                     </b>
                     <!--End Logo icon -->
                     <!-- Logo text -->
                     <span class="logo-text ms-2">
                        <!-- dark Logo text -->
                        <img
                           src="{{asset('admin/assets/images/logo-text.png')}}"
                           alt="homepage"
                           class="light-logo"
                           />
                     </span>
                     <!-- Logo icon -->
                     <!-- <b class="logo-icon"> -->
                     <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                     <!-- Dark Logo icon -->
                     <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                     <!-- </b> -->
                     <!--End Logo icon -->
                  </a>
                  <!-- ============================================================== -->
                  <!-- End Logo -->
                  <!-- ============================================================== -->
                  <!-- ============================================================== -->
                  <!-- Toggle which is visible on mobile only -->
                  <!-- ============================================================== -->
                  <a
                     class="nav-toggler waves-effect waves-light d-block d-md-none"
                     href="javascript:void(0)"
                     ><i class="ti-menu ti-close"></i
                     ></a>
               </div>
               <!-- ============================================================== -->
               <!-- End Logo -->
               <!-- ============================================================== -->
               <div
                  class="navbar-collapse collapse"
                  id="navbarSupportedContent"
                  data-navbarbg="skin5"
                  >
                  <!-- ============================================================== -->
                  <!-- toggle and nav items -->
                  <!-- ============================================================== -->
                  <ul class="navbar-nav float-start me-auto">
                     <li class="nav-item d-none d-lg-block">
                        <a
                           class="nav-link sidebartoggler waves-effect waves-light"
                           href="javascript:void(0)"
                           data-sidebartype="mini-sidebar"
                           ><i class="mdi mdi-menu font-24"></i
                           ></a>
                     </li>
                     <!-- ============================================================== -->
                     <!-- create new -->
                     <!-- ============================================================== -->
                     <li class="nav-item dropdown">
                        <a
                           class="nav-link dropdown-toggle"
                           href="#"
                           id="navbarDropdown"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false"
                           >
                        <span class="d-none d-md-block"
                           >Tạo mới <i class="fa fa-angle-down"></i
                           ></span>
                        <span class="d-block d-md-none"
                           ><i class="fa fa-plus"></i
                           ></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <li><a class="dropdown-item" href="{{route('country.create')}}">Quốc gia</a></li>
                           <li><a class="dropdown-item" href="{{route('category.create')}}">Danh mục</a></li>
                           <li><a class="dropdown-item" href="{{route('genre.create')}}">Thể loại</a></li>
                           <li><a class="dropdown-item" href="{{route('movie.create')}}">Phim</a></li>
                           <!-- <li>
                              <hr class="dropdown-divider" />
                           </li> -->
                        </ul>
                     </li>
                     <!-- ============================================================== -->
                     <!-- Search -->
                     <!-- ============================================================== -->
                     <li class="nav-item search-box">
                        <a
                           class="nav-link waves-effect waves-dark"
                           href="javascript:void(0)"
                           ><i class="mdi mdi-magnify fs-4"></i
                           ></a>
                        <form class="app-search position-absolute">
                           <input
                              type="text"
                              class="form-control"
                              placeholder="Search &amp; enter"
                              />
                           <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                        </form>
                     </li>
                  </ul>
                  <!-- ============================================================== -->
                  <!-- Right side toggle and nav items -->
                  <!-- ============================================================== -->
                  <ul class="navbar-nav float-end">
                     <!-- ============================================================== -->
                     <!-- Comment -->
                     <!-- ============================================================== -->
                     <li class="nav-item dropdown">
                        <a
                           class="nav-link dropdown-toggle waves-effect waves-dark"
                           href="{{route('index')}}"
                           target="_blank"
                           title="Web Phim"
                           role="button">
                        <i class="font-24 mdi mdi-web"></i>
                        </a>
                     </li>
                     <li class="nav-item dropdown">
                        <a
                           class="nav-link dropdown-toggle"
                           href="#"
                           id="navbarDropdown"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false"
                           >
                        <i class="mdi mdi-bell font-24"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <li><a class="dropdown-item" href="#">Action</a></li>
                           <li><a class="dropdown-item" href="#">Another action</a></li>
                           <li>
                              <hr class="dropdown-divider" />
                           </li>
                           <li>
                              <a class="dropdown-item" href="#">Something else here</a>
                           </li>
                        </ul>
                     </li>
                     <!-- ============================================================== -->
                     <!-- End Comment -->
                     <!-- ============================================================== -->
                     <!-- ============================================================== -->
                     <!-- Messages -->
                     <!-- ============================================================== -->
                     <li class="nav-item dropdown">
                        <a
                           class="nav-link dropdown-toggle waves-effect waves-dark"
                           href="#"
                           id="2"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false"
                           >
                        <i class="font-24 mdi mdi-comment-processing"></i>
                        </a>
                        <ul
                           class="
                           dropdown-menu dropdown-menu-end
                           mailbox
                           animated
                           bounceInDown
                           "
                           aria-labelledby="2"
                           >
                           <ul class="list-style-none">
                              <li>
                                 <div class="">
                                    <!-- Message -->
                                    <a href="javascript:void(0)" class="link border-top">
                                       <div class="d-flex no-block align-items-center p-10">
                                          <span
                                             class="
                                             btn btn-success btn-circle
                                             d-flex
                                             align-items-center
                                             justify-content-center
                                             "
                                             ><i class="mdi mdi-calendar text-white fs-4"></i
                                             ></span>
                                          <div class="ms-2">
                                             <h5 class="mb-0">Event today</h5>
                                             <span class="mail-desc"
                                                >Just a reminder that event</span
                                                >
                                          </div>
                                       </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)" class="link border-top">
                                       <div class="d-flex no-block align-items-center p-10">
                                          <span
                                             class="
                                             btn btn-info btn-circle
                                             d-flex
                                             align-items-center
                                             justify-content-center
                                             "
                                             ><i class="mdi mdi-settings fs-4"></i
                                             ></span>
                                          <div class="ms-2">
                                             <h5 class="mb-0">Settings</h5>
                                             <span class="mail-desc"
                                                >You can customize this template</span
                                                >
                                          </div>
                                       </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)" class="link border-top">
                                       <div class="d-flex no-block align-items-center p-10">
                                          <span
                                             class="
                                             btn btn-primary btn-circle
                                             d-flex
                                             align-items-center
                                             justify-content-center
                                             "
                                             ><i class="mdi mdi-account fs-4"></i
                                             ></span>
                                          <div class="ms-2">
                                             <h5 class="mb-0">Pavan kumar</h5>
                                             <span class="mail-desc"
                                                >Just see the my admin!</span
                                                >
                                          </div>
                                       </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)" class="link border-top">
                                       <div class="d-flex no-block align-items-center p-10">
                                          <span
                                             class="
                                             btn btn-danger btn-circle
                                             d-flex
                                             align-items-center
                                             justify-content-center
                                             "
                                             ><i class="mdi mdi-link fs-4"></i
                                             ></span>
                                          <div class="ms-2">
                                             <h5 class="mb-0">Luanch Admin</h5>
                                             <span class="mail-desc"
                                                >Just see the my new admin!</span
                                                >
                                          </div>
                                       </div>
                                    </a>
                                 </div>
                              </li>
                           </ul>
                        </ul>
                     </li>
                     <!-- ============================================================== -->
                     <!-- End Messages -->
                     <!-- ============================================================== -->
                     <!-- ============================================================== -->
                     <!-- User profile and search -->
                     <!-- ============================================================== -->
                     <li class="nav-item dropdown">
                        <a
                           class="
                           nav-link
                           dropdown-toggle
                           text-muted
                           waves-effect waves-dark
                           pro-pic
                           "
                           href="#"
                           id="navbarDropdown"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false"
                           >
                        <img
                           src="{{asset('admin/assets/images/users/1.jpg')}}"
                           alt="user"
                           class="rounded-circle"
                           width="31"
                           />
                        </a>
                        <ul
                           class="dropdown-menu dropdown-menu-end user-dd animated"
                           aria-labelledby="navbarDropdown"
                           >
                           <a class="dropdown-item" href="javascript:void(0)"
                              ><i class="mdi mdi-account me-1 ms-1"></i> My Profile</a
                              >
                           <a class="dropdown-item" href="javascript:void(0)"
                              ><i class="mdi mdi-wallet me-1 ms-1"></i> My Balance</a
                              >
                           <a class="dropdown-item" href="javascript:void(0)"
                              ><i class="mdi mdi-email me-1 ms-1"></i> Inbox</a
                              >
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="javascript:void(0)"
                              ><i class="mdi mdi-settings me-1 ms-1"></i> Account
                           Setting</a
                              >
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="{{route('logout')}}"  
                              onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-power-off me-1 ms-1"></i> Logout</a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                           </form>
                           <div class="dropdown-divider"></div>
                           <div class="ps-4 p-10">
                              <a
                                 href="javascript:void(0)"
                                 class="btn btn-sm btn-success btn-rounded text-white"
                                 >View Profile</a
                                 >
                           </div>
                        </ul>
                     </li>
                     <!-- ============================================================== -->
                     <!-- User profile and search -->
                     <!-- ============================================================== -->
                  </ul>
               </div>
            </nav>
         </header>
         <!-- ============================================================== -->
         <!-- End Topbar header -->
         <!-- ============================================================== -->
         <!-- ============================================================== -->
         <!-- Left Sidebar - style you can find in sidebar.scss  -->
         <!-- ============================================================== -->
         <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
               <!-- Sidebar navigation-->
               <nav class="sidebar-nav">
                  <ul id="sidebarnav" class="pt-4">
                     <li class="sidebar-item">
                        <a
                           class="sidebar-link waves-effect waves-dark sidebar-link"
                           href="{{route('home')}}"
                           aria-expanded="false"
                           ><i class="mdi mdi-view-dashboard"></i
                           ><span class="hide-menu">Dashboard</span></a
                           >
                     </li>
                     <li class="sidebar-item">
                        <a
                           class="sidebar-link waves-effect waves-dark sidebar-link"
                           href="{{route('country.index')}}"
                           aria-expanded="false"
                           ><i class="mdi mdi-earth"></i
                           ><span class="hide-menu">Quốc gia</span></a
                           >
                     </li>
                     <li class="sidebar-item">
                        <a
                           class="sidebar-link waves-effect waves-dark sidebar-link"
                           href="{{route('category.index')}}"
                           aria-expanded="false"
                           ><i class="mdi mdi-collage"></i
                           ><span class="hide-menu">Danh mục</span></a
                           >
                     </li>
                     <li class="sidebar-item">
                        <a
                           class="sidebar-link waves-effect waves-dark sidebar-link"
                           href="{{route('genre.index')}}"
                           aria-expanded="false"
                           ><i class="mdi mdi-view-column"></i
                           ><span class="hide-menu">Thể loại</span></a
                           >
                     </li>
                     <li class="sidebar-item">
                        <a
                           class="sidebar-link has-arrow waves-effect waves-dark"
                           href="javascript:void(0)"
                           aria-expanded="false"
                           ><i class="mdi mdi-movie"></i
                           ><span class="hide-menu">Phim</span></a
                           >
                        <ul aria-expanded="false" class="collapse first-level">
                           <li class="sidebar-item">
                              <a href="{{route('movie.index')}}" class="sidebar-link"
                                 ><i class="mdi mdi-view-list"></i
                                 ><span class="hide-menu"> Danh sách phim </span></a
                                 >
                           </li>
                           <li class="sidebar-item">
                              <a href="{{route('episode.index')}}" class="sidebar-link"
                                 ><i class="mdi mdi-codepen"></i
                                 ><span class="hide-menu">QL tập phim</span></a
                                 >
                           </li>
                           <li class="sidebar-item">
                              <a href="{{route('director_actor.index')}}" class="sidebar-link"
                                 ><i class="mdi mdi-codepen"></i
                                 ><span class="hide-menu">Đạo diễn - Diễn viên</span></a
                                 >
                           </li>
                        </ul>
                     </li>
                  </ul>
               </nav>
               <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
         </aside>
         <!-- ============================================================== -->
         <!-- End Left Sidebar - style you can find in sidebar.scss  -->
         <!-- ============================================================== -->

         @yield('content')

      </div>
      <!-- ============================================================== -->
      <!-- End Wrapper -->
      <!-- ============================================================== -->
      <!-- Toast message -->
      <div class="toast1">
         <div class="toast1-content">
               <i class="fas fa-solid fa-check check"></i>
               <div class="message">
                  <span class="text text-1">Success</span>
                  <span class="text text-2"></span>
               </div>
         </div>
         <i class="mdi mdi-close-circle close"></i>
      </div>
      
      <!-- end toast message -->
      <!-- ============================================================== -->
      <!-- All Jquery -->
      <!-- ============================================================== -->
      <script src="{{asset('admin/assets/libs/jquery/dist/jquery.min.js')}}"></script>
      <!-- Bootstrap tether Core JavaScript -->
      <script src="{{asset('admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
      <script src="{{asset('admin/assets/extra-libs/sparkline/sparkline.js')}}"></script>
      <!--Wave Effects -->
      <script src="{{asset('admin/dist/js/waves.js')}}"></script>
      <!--Menu sidebar -->
      <script src="{{asset('admin/dist/js/sidebarmenu.js')}}"></script>
      <!--Custom JavaScript -->
      <script src="{{asset('admin/dist/js/custom.min.js')}}"></script>
      <!--This page JavaScript -->
      <script src="{{asset('admin/assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
      <script src="{{asset('admin/dist/js/pages/mask/mask.init.js')}}"></script>
      <script src="{{asset('admin/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
      <script src="{{asset('admin/assets/libs/select2/dist/js/select2.min.js')}}"></script>
      <script src="{{asset('admin/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
      <script src="{{asset('admin/assets/libs/toastr/build/toastr.min.js')}}"></script>
      <!-- Table JS -->
      <script src="{{asset('admin/assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
      <script src="{{asset('admin/assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
      <script src="{{asset('admin/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
      <!-- ckeditor -->
      <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
      <!-- chart js -->
      <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.2/dist/chart.min.js"></script>
      <script type="text/javascript">

         //chartJs dashboard thống kê số phim 
         let idChart=document.getElementById('myChart');
         if(idChart){
            const labels = [];
            const value=[];
            const valueVisit=[];

            @if(isset($date_array))
               @for($i=0;$i<count($date_array);$i++)
                  labels.push('{{$date_array[$i]['date']}}');
                  value.push('{{$date_array[$i]['total_movie']}}');
                  valueVisit.push('{{$date_array[$i]['visitWebsite']}}');
               @endfor
            @endif
         
        

            const data = {
               labels: labels,
               datasets: [
                  {
                     label: 'Số phim được xem',
                     backgroundColor: 'rgb(255, 99, 132)',
                     borderColor: 'rgb(255, 99, 132)',
                     data: value,
                  },
                  {
                     label: 'Truy cập website',
                     backgroundColor: 'rgb(248, 221, 140)',
                     borderColor: 'rgb(248, 221, 140)',
                     data: valueVisit,
                  }
               ]
            };
            const config = {
               type: 'line',
               data: data,
               options: {}
            };
            
            const myChart = new Chart(
               idChart,
               config
            );
         }

         //ckeditor
         var id_ckeditor =document.getElementById('summary-ckeditor');
         if(id_ckeditor){
            CKEDITOR.replace( 'summary-ckeditor' );
         }
      
         /****************************************
          *       Basic Table                   *
          ****************************************/
         $("#zero_config").DataTable({
            order: [[3, 'desc']],
         });
         $("#table_dir").DataTable({
            order: [[2, 'desc']],
         });
         $("#table_act").DataTable({
            order: [[2, 'desc']],
         });

         //***********************************//
         // For select 2
         //***********************************//
         $(".select2").select2();

         /*datwpicker*/
         jQuery(".mydatepicker").datepicker();
         jQuery("#datepicker-autoclose").datepicker({
            autoclose: true,
            todayHighlight: true,
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years",
         });

         // xem ảnh trước khi uploads
         function preview() {
            img_pre.src=URL.createObjectURL(event.target.files[0]);
         }
         
         //chuyển đổi slug cho tiêu đề phim
         $('#movie_title').keyup(function(){
            var value = $(this).val(); 
            $.ajax({
                url:"{{route('change_slug')}}", 
                method: "GET",
                data:{value:value},
                success: function(data){
                    $('#movie_slug').val(data);
                }
            })
         })
         
         //chọn tập phim 
         $('#movie_id').change(function() {
            $('#linkphim').val('');
            var movie_id=$(this).val();
            $.ajax({
                url:"{{route('select_episode')}}",
                method:"GET",
                data:{movie_id:movie_id},
                success:function(data){
                   $('#episode').html(data);
                }
            })
         })

        //lấy dữ liệu linkphim
         $('#episode').change(function(){
            var episode=$(this).val();
            var movie_id=$('#movie_id').val();
            $.ajax({
                url:"{{route('getDataEpisode')}}",
                method:"GET",
                data:{movie_id:movie_id,episode:episode},
                success:function(data){
                   $('#linkphim').val(data);
                }
            })
         });
         //click icon thêm đạo diễn
         $('#iconAddDir').click(function(){
            $('#addDir').css('display','block');
         });
         //click icon thêm diễn viên
         $('#iconAddActor').click(function(){
               $('#addActor').css('display','block');
         });
         //click icon exit input đạo diễn
         $('.iconExitDir').click(function(){
               $('#addDir').css('display','none');
               $('#name_dir').removeClass('is-invalid');
               $('#name_dir').val('');
         })
         //click icon exit input diễn viên
         $('.iconExitActor').click(function(){
               $('#addActor').css('display','none');
               $('#name_actor').removeClass('is-invalid');
               $('#name_actor').val('');
         })
         //keyup input đạo diễn
         $('#name_dir').keyup(function(){
            $(this).removeClass('is-invalid');
         })
         //keyup input diễn viên
         $('#name_actor').keyup(function(){
            $(this).removeClass('is-invalid');
         })
         //ajax thêm đạo diễn
         $('#ajax_AddDir').click(function(){
            var name_dir=$('#name_dir').val();
            if(name_dir==''){
               $('#name_dir').addClass('is-invalid');
               $('#error_name_dir').text('The nameDir field is required');
            }else{
               var type="DIR";
               $.ajax({
                  headers: {
                     'X-CSRF-TOKEN': "{{csrf_token()}}",
                  },
                  url:"{{route('director_actor.store')}}",
                  method:"POST",
                  data:{name:name_dir,type:type,ajax:1},
                  success:function(data){
                     $('#select_dir').append('<option value="'+data+'">'+name_dir+'</option>');
                     $('#name_dir').val('');
                     $.fn.toast('Thêm đạo diễn '+name_dir+' thành công !');
                  }
               })
            }
         })
         //ajax thêm diễn viên
         $('#ajax_AddActor').click(function(){
            var name_actor=$('#name_actor').val();
            if(name_actor==''){
               $('#name_actor').addClass('is-invalid');
               $('#error_name_actor').text('The nameActor field is required');
            }else{
               var type="ACT";
               $.ajax({
                  headers: {
                     'X-CSRF-TOKEN': "{{csrf_token()}}",
                  },
                  url:"{{route('director_actor.store')}}",
                  method:"POST",
                  data:{name:name_actor,type:type,ajax:1},
                  success:function(data){
                     $('#select_actor').append('<option value="'+data+'">'+name_actor+'</option>');
                     $('#name_actor').val('');
                     //gọi function toast
                     $.fn.toast('Thêm diễn viên '+name_actor+' thành công !');
                  }
               })
            }
         })

         $('#mainCheckbox').change(function() {
            if($('#mainCheckbox').is(':checked')==true) {
               $('#icondelete').removeClass('none_icondelete')
            }else {
               $('#icondelete').addClass('none_icondelete')
            }
         })
         $('.listCheckbox').change(function() {
            if($('.listCheckbox').is(':checked')==true) {
               $('#icondelete').removeClass('none_icondelete')
            }else {
               $('#icondelete').addClass('none_icondelete')
            }
         })
         $('#mainCheckbox1').change(function() {
            if($('#mainCheckbox1').is(':checked')==true) {
               $('#icondelete1').removeClass('none_icondelete')
            }else {
               $('#icondelete1').addClass('none_icondelete')
            }
         })
         $('.listCheckbox1').change(function() {
            if($('.listCheckbox1').is(':checked')==true) {
               $('#icondelete1').removeClass('none_icondelete')
            }else {
               $('#icondelete1').addClass('none_icondelete')
            }
         })

         //search movie in dashboard 
         $('#search_movie').keyup(function(){
               $('#list_movie').html('');
               var search=$('#search_movie').val();
               if(search!=''){
                  var expression=new RegExp(search,"i");
                  $.getJSON('/json/movie.json',function(data){
                     $.each(data,function(key,value){
                        if(value.title.search(expression) !=-1 || value.name_eng.search(expression) !=-1){
                           htmlListMovie(value)
                        }
                     })
                  })
               }else{
                  getListMovie()
               }
         });
         function htmlListMovie(value){
            var id=value.id
            var urlEdit = "{{ route('movie.edit', ":id") }}";
            var urlDelete = "{{ route('movie.destroy', ":id") }}";
            urlEdit = urlEdit.replace(':id', id);
            urlDelete = urlDelete.replace(':id', id);
            var typeMovie='';
            var data=id+'-'+value.hide_or_show
            if(value.sotap==1){
               typeMovie='Phim lẻ'
            }else{
               typeMovie='Phim bộ'
            }
            var a=''
            var b='';
            if(value.hide_or_show==1){
               a='secondary'
               b='Ẩn'
            }else{
               a='success'
               b='Hiển thị'
            }
            var status='';
            if(value.status==0){
               status=' (Trailer)'
            }
            var view=0;
            if(value.view > 999999){
               view=Math.floor(value.view / 1000000)+'M'
            }else if(value.view > 999){
               view=Math.floor(value.view / 1000)+'K'
            }else{
               view=value.view
            }
            $('#list_movie').append(`
               <div class="d-flex flex-row comment-row mt-0">
                  <div class="p-2">
                     <img
                        src="/uploads/movies/`+value.image+`"
                        alt="user"
                        width="50"
                        class="rounded-circle"
                        />
                  </div>
                  <div class="comment-text w-100">
                     <h6 class="font-medium">`+value.title+status+`</h6>
                     <span class="mb-3 d-block">
                        `+value.name_eng+` - `+value.year+` - `+typeMovie+`
                     </span>
                     <div class="comment-footer">
                        <span class="text-muted float-end"><i class="mdi mdi-eye"></i>
                          `+view+`
                        </span>
                        <a
                           href="`+urlEdit+`"
                           class="btn btn-cyan btn-sm text-white"
                           >
                        Cập nhật
                        </a>
                        <a
                           onclick=" hideOrShow(event,this)"
                           href="#"
                           class="btn btn-`+a+` btn-sm text-white"
                           data="`+data+`"
                           >
                           `+b+`
                        </a>
                        <form action="`+urlDelete+`" onclick="return confirm('Xóa hay không ?')" method="POST" style="display: inline-block;">
                           @method('DELETE')
                           @csrf
                              <button type="submit" class="btn btn-danger btn-sm text-white">Xóa</i></button>
                        </form> 
                     </div>
                  </div>
               </div>`);
         }
         function getListMovie(){
            $.getJSON('/json/movie.json',function(data){
               $.each(data,function(key,value){
                  htmlListMovie(value);
               })
            })
         }
         //select sort movie
         $('#sortMovie').change(function(){
            var sort=$(this).find(':selected').val();
            sortMovie(sort);
         })
         //sort movie
         function sortMovie(sort){
            $('#list_movie').html('');
            $.getJSON('/json/movie.json',function(data){
               var result=data.sort(function (a, b) {
                  var dateA = new Date(a.date_created), dateB = new Date(b.date_created)
                  if(sort=='newMovie'){
                     return  dateB-dateA
                  }
                  if(sort=='oldMovie'){
                     return  dateA-dateB
                  }
	               if(sort=='highView'){
                     return  b.view-a.view
                  }
                  if(sort=='lowView'){
                     return  a.view-b.view
                  }
               });
               $.each(result,function(key,value){
                  htmlListMovie(value);
               })
            })
         }

         //ajax xóa nhiều danh mục / thể loại / phim / quốc gia cùng lúc
         $('#icondelete').click(function(e){
            e.preventDefault();
            if(confirm('Xóa hay không ?')){
               let data=$(this).attr('data');
               var url="";
               if(data=='country'){
                  url="{{route('deleteManyCountry')}}"
               }else if(data=='category'){
                  url="{{route('deleteManyCategory')}}"
               }else if(data=='genre'){
                  url="{{route('deleteManyGenre')}}"
               }else if(data=='movie'){
                  url="{{route('deleteManyMovie')}}"
               }else{
                  url="{{route('deleteManyDirACt')}}"
               }
               var id=[];
               $('.listCheckbox:checked').each(function(){
                  id.push($(this).val());
               })
               $.ajax({
                  headers: {
                     'X-CSRF-TOKEN': "{{csrf_token()}}",
                  },
                  url:url,
                  method:"DELETE",
                  data:{id:id},
                  success:function(data){
                     let a=window.location.reload();
                  },
                  error:function(){
                  }
               })
            }
         })
         $('#icondelete1').click(function(e){
            e.preventDefault();
            if(confirm('Xóa hay không ?')){
               let data=$(this).attr('data');
               var url="";
               url="{{route('deleteManyDirACt')}}"
               var id=[];
               $('.listCheckbox1:checked').each(function(){
                  id.push($(this).val());
               })
               $.ajax({
                  headers: {
                     'X-CSRF-TOKEN': "{{csrf_token()}}",
                  },
                  url:url,
                  method:"DELETE",
                  data:{id:id},
                  success:function(data){
                     let a=window.location.reload();
                  },
                  error:function(){
                  }
               })
            }
         })
  
         //ready function
         $(document).ready(() =>{
            getListMovie();
            $.fn.hideOrShow = (e) =>{ 
               e.preventDefault();
            }
            //function toast 
            $.fn.toast = (text) =>{ 
               $('.toast1').addClass('active')
               $('.text-2').text(text)
               let time=setTimeout( () => { 
                  $('.toast1').removeClass('active')
               },2000);

               $('.close').click(() =>{
                  $('.toast1').removeClass('active');
                  clearTimeout(time);
               })
            }
         

            //gọi function toast khi thêm mới/ cập nhật /xóa thành công
            var message ={{Session::has('message') ? 'true' : 'false'}};
            var status ="{{Session::has('message') ? Session::get('message')['status'] : false}}"
            var type ="{{Session::has('message') ? Session::get('message')['type'] : false}}"
            var title ="{{Session::has('message') ? Session::get('message')['title'] : false}}"
            if(message === true) {
               $.fn.toast(title);
            }

            //mặc định trending phim(ngày) 
            var top_view=0;
            $.ajax({
               url:"{{route('filterMovieTrending')}}",
               method:"GET",
               data:{top_view:top_view},
               success:function(data){
                  $('#day').html(data);
               },
               error:function(a,b,c){
                  console.log(a)
               }
            })
         });
         //ajax trending phim 
         $('.nav-link').click(function(){
            var href=$(this).attr('href');
            if(href=='#day'){
               var top_view=0;
            }else if(href=='#week'){
               var top_view=1;
            }else{
               var top_view=2;
            }
            var html_id=href.slice(1, href.length)
            $.ajax({
               url:"{{route('filterMovieTrending')}}",
               method:"GET",
               data:{top_view:top_view},
               success:function(data){
                  $('#'+html_id).html(data);
               }
            })
         })

         //ajax hiển thị / ẩn phim
         function hideOrShow(e,t){
            e.preventDefault();
            var data=t.getAttribute('data')
            $.ajax({
               url:"{{route('hideOrShow')}}",
               method:"GET",
               data:{data:data},
               success:function(data){
                  t.removeAttribute('class')
                  t.removeAttribute('data')
                  if(data.status==1){
                        t.setAttribute('data',data.id+'-'+0)
                        t.setAttribute('class','btn btn-success btn-sm text-white')
                        t.textContent = 'Hiển thị'
                  }else{
                        t.setAttribute('data',data.id+'-'+1)
                        t.setAttribute('class','btn btn-secondary btn-sm text-white');
                        t.textContent = 'Ẩn'
                  }
               },
               error:function(a,b,c){
                  console.log(a)
               }
            })
         }
         
         
      </script>
      <!-- Charts js Files -->
      <script src="{{asset('admin/assets/libs/flot/excanvas.js')}}"></script>
      <script src="{{asset('admin/assets/libs/flot/jquery.flot.js')}}"></script>
      <script src="{{asset('admin/assets/libs/flot/jquery.flot.pie.js')}}"></script>
      <script src="{{asset('admin/assets/libs/flot/jquery.flot.time.js')}}"></script>
      <script src="{{asset('admin/assets/libs/flot/jquery.flot.stack.js')}}"></script>
      <script src="{{asset('admin/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
      <script src="{{asset('admin/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
      <script src="{{asset('admin/dist/js/pages/chart/chart-page-init.js')}}"></script>
   </body>
</html>
<!-- https://stackoverflow.com/questions/59896017/laravel-get-website-unique-visitor-count -->
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
              <h4 class="page-title">Phim</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Phim
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
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <a href="{{route('movie.create')}}" class="icon-page" title="Thêm phim"><i class="fas fa-plus-circle"></i></a>
                  <a href="#" id="icondelete" class="icon-page none_icondelete" data="movie" title="Xóa phim đã chọn"><i class="mdi mdi-delete"></i></a>
                  <div class="table-responsive">
                    <table
                      id="zero_config"
                      class="table table-striped table-bordered"
                    >
                      <thead>
                        <tr>
                          <th>
                            <label class="customcheckbox mb-3">
                              <input type="checkbox" id="mainCheckbox" />
                              <span class="checkmark"></span>
                            </label>
                          </th>
                          <th>Tiêu đề</th>
                          <th>Trạng thái</th>
                          <th>Ẩn / Hiện</th>
                          <th>Hình ảnh</th>
                          <th>Năm</th>
                          <th>Thể loại</th>
                          <th>Danh mục</th>
                          <th>Quốc gia</th>
                          <th>Hành động</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($movies as $key => $movie)
                        <tr id="movie_{{$movie->id}}">
                          <th>
                            <label class="customcheckbox">
                                <input type="checkbox" class="listCheckbox" />
                                <span class="checkmark"></span>
                            </label>
                          </th>
                          <td id="title_movie{{$movie->id}}">{{$movie->title}}</td>
                          <td>
                              @if($movie->status == 0)
                                Phim sắp chiếu
                              @else
                                @if($movie->sotap > 1 )
                                  Phim bộ ({{$movie->sotap}} tập)
                                @else
                                  Phim lẻ
                                @endif
                              @endif
                          </td>
                          <td>
                            @if($movie->hide_or_show ==0)
                              Ẩn
                            @else
                              Hiện
                            @endif
                          </td>
                          <td>
                          <img src="{{asset('uploads/movies')}}/{{$movie->image}}" alt="" height="100"  width="80">
                          </td>
                          <td>{{$movie->year}}</td>
                          <td>
                            @foreach($movie->movie_genre as $genre)
                              <span class="badge bg-secondary">{{$genre->title}}</span>
                            @endforeach
                          </td>
                          <td>{{$movie->category->title}}</td>
                          <td>{{$movie->country->title}}</td>
                          <td>
                            <div style="display:flex">
                              <a href="{{route('movie.edit',$movie->id)}}" title="Cập nhật" class="icon-page"><i class="mdi mdi-tooltip-edit"></i></a>
                              <form action="{{ route('movie.destroy',$movie->id) }}" onclick="return confirm('Xóa hay không ?')" method="POST">
                                @method('DELETE')
                                  <button type="submit" class="btn-submit"><i class="mdi mdi-delete"></i></button>
                                @csrf
                              </form> 
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <!-- <tfoot>
                        <tr>
                          <th>Tiêu đề</th>
                          <th>Trạng thái</th>
                          <th>Hình ảnh</th>
                          <th>Năm</th>
                          <th>Thể loại</th>
                          <th>Danh mục</th>
                          <th>Quốc gia</th>
                          <th>Hành động</th>
                        </tr>
                      </tfoot> -->
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
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
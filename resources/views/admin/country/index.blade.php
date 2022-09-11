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
              <h4 class="page-title">Quốc gia</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Quốc gia
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
                  <a href="{{route('country.create')}}" class="icon-page" title="Thêm quốc gia"><i class="fas fa-plus-circle"></i></a>
                  <a href="#" id="icondelete" class="icon-page none_icondelete" data="country" title="Xóa quốc gia đã chọn"><i class="mdi mdi-delete"></i></a>
                </div>
                <div class="table-responsive">
                  <table class="table"  id="zero_config">
                    <thead class="thead-light">
                      <tr>
                        <th>
                          <label class="customcheckbox mb-3">
                            <input type="checkbox" id="mainCheckbox"/>
                            <span class="checkmark"></span>
                          </label>
                        </th>
                        <th scope="col">Tiêu đề</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                      </tr>
                    </thead>
                    <tbody class="customtable">
                        @foreach ($countries as $country)
                        <tr id="country_{{$country->id}}">
                            <th>
                              <label class="customcheckbox">
                                  <input type="checkbox" class="listCheckbox" value="{{$country->id}}"/>
                                  <span class="checkmark"></span>
                              </label>
                            </th>
                            <td id="title_country{{$country->id}}">{{$country->title}}</td>
                            <td>{{$country->slug}}</td>
                            <td>
                                @if($country->status == 1)
                                    <span class="badge bg-success">hiển thị</span>
                                @else
                                    <span class="badge bg-secondary">Ẩn</span>
                                @endif
                            </td>
                            <td style="display:flex">
                                <a href="{{route('country.edit',$country->id)}}" title="Cập nhật" class="icon-page"><i class="mdi mdi-tooltip-edit"></i></a>
                                <form action="{{ route('country.destroy',$country->id) }}" onclick="return confirm('Xóa hay không ?')" method="POST">
                                  @method('DELETE')
                                    <button type="submit" class="btn-submit"><i class="mdi mdi-delete"></i></button>
                                  @csrf
                                </form> 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>              
                </div>
                <!--  -->
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
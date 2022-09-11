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
              <h4 class="page-title">Đạo diễn - Diễn viên</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Đạo diễn - Diễn viên
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
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <a href="{{route('director_actor.create')}}" class="icon-page" title="Thêm đạo diễn"><i class="fas fa-plus-circle"></i></a>
                  <a href="#" id="icondelete" class="icon-page none_icondelete" data="director" title="Xóa đạo diễn đã chọn"><i class="mdi mdi-delete"></i></a>
                </div>
                <div class="table-responsive">
                  <table class="table" id="table_dir">
                    <thead class="thead-light">
                      <tr>
                        <th>
                          <label class="customcheckbox mb-3">
                            <input type="checkbox" id="mainCheckbox"/>
                            <span class="checkmark"></span>
                          </label>
                        </th>
                        <th scope="col">Tên đạo diễn</th>
                        <th>Hành động</th>
                      </tr>
                    </thead>
                    <tbody class="customtable">
                        @foreach ($list_director_actor as $dir)
                            @if($dir->type == "DIR")
                                <tr id="dir_{{$dir->id}}">
                                    <th>
                                    <label class="customcheckbox">
                                        <input type="checkbox" class="listCheckbox" value="{{$dir->id}}"/>
                                        <span class="checkmark"></span>
                                    </label>
                                    </th>
                                    <td id="name_dir{{$dir->id}}">{{$dir->name}}</td>
                                    <td style="display:flex">
                                        <a href="{{route('director_actor.edit',$dir->id)}}" title="Cập nhật" class="icon-page"><i class="mdi mdi-tooltip-edit"></i></a>
                                        <form action="{{ route('director_actor.destroy',$dir->id) }}" onclick="return confirm('Xóa hay không ?')" method="POST">
                                        @method('DELETE')
                                            <button type="submit" class="btn-submit"><i class="mdi mdi-delete"></i></button>
                                        @csrf
                                        </form> 
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                  </table>              
                </div>
                <!--  -->
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <a href="{{route('director_actor.create')}}" class="icon-page" title="Thêm diễn viên"><i class="fas fa-plus-circle"></i></a>
                  <a href="#" id="icondelete1" class="icon-page none_icondelete" data="actor" title="Xóa diễn viên đã chọn"><i class="mdi mdi-delete"></i></a>
                </div>
                <div class="table-responsive">
                  <table class="table" id="table_act">
                    <thead class="thead-light">
                      <tr>
                        <th>
                          <label class="customcheckbox mb-3">
                            <input type="checkbox" id="mainCheckbox1"/>
                            <span class="checkmark"></span>
                          </label>
                        </th>
                        <th scope="col">Tên  diễn viên</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody class="customtable">
                        @foreach ($list_director_actor as $act)
                            @if($act->type == "ACT")
                                <tr id="act_{{$act->id}}">
                                    <th>
                                    <label class="customcheckbox">
                                        <input type="checkbox" class="listCheckbox1" value="{{$act->id}}"/>
                                        <span class="checkmark"></span>
                                    </label>
                                    </th>
                                    <td id="name_act{{$act->id}}">{{$act->name}}</td>
                                    <td style="display:flex">
                                        <a href="{{route('director_actor.edit',$act->id)}}" title="Cập nhật" class="icon-page"><i class="mdi mdi-tooltip-edit"></i></a>
                                        <form action="{{ route('director_actor.destroy',$act->id) }}" onclick="return confirm('Xóa hay không ?')" method="POST">
                                        @method('DELETE')
                                            <button type="submit" class="btn-submit"><i class="mdi mdi-delete"></i></button>
                                        @csrf
                                        </form> 
                                    </td>
                                </tr>
                            @endif
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
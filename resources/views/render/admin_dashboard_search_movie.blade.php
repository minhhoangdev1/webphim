@foreach($listMovie as $movie)
  <div class="d-flex flex-row comment-row mt-0">
     <div class="p-2">
        <img
           src="{{asset('uploads/movies')}}/{{$movie->image}}"
           alt="user"
           width="50"
           class="rounded-circle"
           />
     </div>
     <div class="comment-text w-100">
        <h6 class="font-medium">{{$movie->title}}</h6>
        <span class="mb-3 d-block">
           {{$movie->name_eng}} - {{$movie->year}} - 
           @if ($movie->sotap==1)
              Phim lẻ
           @else
              Phim bộ
           @endif
        </span>
        <div class="comment-footer">
           <span class="text-muted float-end"><i class="mdi mdi-eye"></i>
              @if($movie->view->sum('view') > 999999)
                 {{floor($movie->view->sum('view') / 1000000)}}M
              @elseif($movie->view->sum('view') > 999)
                 {{floor($movie->view->sum('view') / 1000)}}K
              @else
                 {{$movie->view->sum('view')}}
              @endif
           </span>
           <a
              href="{{route('movie.edit',$movie->id)}}"
              class="btn btn-cyan btn-sm text-white"
              >
           Cập nhật
           </a>
           <a
              onclick=" hideOrShow(event,this)"
              href="#"
              class="btn btn-{{($movie->hide_or_show == 1) ? 'secondary' : 'success'}} btn-sm text-white"
              data="{{$movie->id.'-'.$movie->hide_or_show}}"
              >
           {{($movie->hide_or_show == 1) ? 'Ẩn' : 'Hiển thị'}}
           </a>
           <form action="{{ route('movie.destroy',$movie->id) }}" onclick="return confirm('Xóa hay không ?')" method="POST" style="display: inline-block;">
              @method('DELETE')
              @csrf
                 <button type="submit" class="btn btn-danger btn-sm text-white">Xóa</i></button>
           </form> 
        </div>
     </div>
  </div>
@endforeach
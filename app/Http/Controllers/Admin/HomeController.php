<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use Carbon\Carbon;
use App\Models\Date_View;
use App\Models\Visits_Website;
use App\Models\View;
use App\Http\Controllers\MovieTrendingController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $movies=Movie::with('category','country','movie_genre')->orderBy('id','DESC')->get();

        $path=public_path()."/json/";       // tạo đường dẫn từ thư mục public
        if(!is_dir($path)){                 //nếu không tồn tại path
            mkdir($path, 0777, true);       //tạo path với toàn quyền (0777: toàn quyền thêm xóa sửa)
        }
 
        File::put($path.'movie.json',json_encode($movies)); //tạo file movie.json với data từ list

        $totals=[
            'movies'=>Movie::count(),
            'categories'=>Category::count(),
            'genres'=>Genre::count(),
            'countries'=>Country::count(),
        ];
        
        for($i = 6; $i >= 0; $i--){
            $date = Carbon::today()->subDays($i)->format('Y-m-d');
            $date_view=Date_View::where('date',$date)->first();
            if($date_view!=null){
                $date_id=$date_view->id;
            }else{
                $date_id=0;
            }
            $visitsWebsite=Visits_Website::where('date',$date)->first();
            if($visitsWebsite!=null){
                $visit=$visitsWebsite->visit;
            }else{
                $visit=0;
            }
            $count=View::where('date_view_id',$date_id)->count();
            $date_array[]=['date'=>$date,'total_movie'=>$count,'visitWebsite'=>$visit];
        }
        
        $listMovie=Movie::with('view')->orderBy('date_created','DESC')->get();
        return view('admin.dashboard.index',compact('totals','listMovie','date_array'));
    }

    public function filterMovieTrending(Request $request){
        return (new MovieTrendingController)->filter_sidebar($request);
    }
    public function hideOrShow(Request $request){
        $data=explode('-',$request->data);
        $id=$data[0];
        $status=$data[1];
        $movie=Movie::findOrFail($id);
        if($status==1){
            $movie->hide_or_show=0;
        }else{
            $movie->hide_or_show=1;
        }
        $movie->save();

        $message=[
            'id'=>$id,
            'status'=>$status
        ];

        return  $message;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Movie_Genre;
use App\Models\Directors_Actors;
use App\Models\Movie_Dir_Act;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Date_View;
use App\Models\View;

class MovieTrendingController extends Controller
{
    public function filter_sidebar(Request $request){
        $output[]='';
        if($request->top_view==0){
            $now=Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            $date_view=Date_View::with('view')->where('date',$now)->first();
            if($date_view!==null){
                foreach($date_view->view->take(10) as $key=>$v){
                    $movie=Movie::where('id',$v->movie_id)->first();
                    switch($movie->resolution){
                        case(0):
                            $resolution='HD';
                            break;
                        case(1):
                            $resolution='SD';
                            break;
                        case(2):
                            $resolution='HDCam';
                            break;
                        case(3):
                            $resolution='Cam';
                            break;
                        case(4):
                            $resolution='FullHD';
                    }
    
                    if($v->view > 999999){
                        $totalView=floor($v->view / 1000000).'M';
                    }
                    elseif($v->view > 999){
                        $totalView=floor($v->view / 1000).'K';
                    }else{
                        $totalView=$v->view;
                    }
    
                    $data[]=[
                        'movies'=>$movie,
                        'resolution' =>$resolution,
                        'totalView' =>$totalView
                    ];
                }
                $output = view('render.movie_trending',compact('data'))->render();
            }
            
        }elseif($request->top_view==2){
            // $month_now=Carbon::now('Asia/Ho_Chi_Minh')->format('m');
            // $year_now=Carbon::now('Asia/Ho_Chi_Minh')->format('Y');
            // $date_views=Date_View::whereMonth('date',$month_now)->whereYear('date',$year_now)->get();
            $now=Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            $day = Carbon::today('Asia/Ho_Chi_Minh')->subDays(30)->format('Y-m-d');
            $date_views=Date_View::whereBetween('date',[$day,$now])->get();
            if(!$date_views->isEmpty()){
                foreach($date_views as $date){
                    $arr[]=$date->id;
                }
                $views=View::whereIn('date_view_id',$arr)->orderBy('view','DESC')->get();
                $list_id_movies=[];
                foreach($views as $v){
                    if(!in_array($v->movie_id,$list_id_movies)){
                        $list_id_movies[]=$v->movie_id;
                    }            
                }
                $dem=0;
                foreach($list_id_movies as $list){
                    $dem++;
                    if($dem < 11){
                        $movie=Movie::where('id',$list)->first();
                        $number_view=View::where('movie_id',$movie->id)->whereIn('date_view_id',$arr)->sum('view');
                        switch($movie->resolution){
                            case(0):
                                $resolution='HD';
                                break;
                            case(1):
                                $resolution='SD';
                                break;
                            case(2):
                                $resolution='HDCam';
                                break;
                            case(3):
                                $resolution='Cam';
                                break;
                            case(4):
                                $resolution='FullHD';
                        }
                        if($number_view > 999999){
                            $totalView=floor($number_view / 1000000).'M';
                        }
                        elseif($number_view > 999){
                            $totalView=floor($number_view / 1000).'K';
                        }else{
                            $totalView=$number_view;
                        }
                        $data[]=[
                            'movies'=>$movie,
                            'resolution' =>$resolution,
                            'totalView' =>$totalView
                        ];
                    }
                }
                $output = view('render.movie_trending',compact('data'))->render();
            }
        }else{
            $now=Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            $day = Carbon::today()->subDays(7)->format('Y-m-d');
            $date_views=Date_View::whereBetween('date',[$day,$now])->get();
            // $startOfWeek=Carbon::now()->startOfWeek()->format('Y-m-d');
            // $endOfWeek=Carbon::now()->endOfWeek()->format('Y-m-d');
            // $date_views=Date_View::whereBetween('date',[$startOfWeek,$endOfWeek])->get();
            if(!$date_views->isEmpty()){ 
                foreach($date_views as $date){
                    $arr[]=$date->id;
                }
                $views=View::whereIn('date_view_id',$arr)->orderBy('view','DESC')->get();
                $list_id_movies=[];
                $dem=0;
                foreach($views as $v){
                    if(!in_array($v->movie_id,$list_id_movies)){
                        $dem++;
                        if($dem < 11){
                            $list_id_movies[]=$v->movie_id;
                            $movie=Movie::where('id',$v->movie_id)->first();
                            $number_view=View::where('movie_id',$movie->id)->whereIn('date_view_id',$arr)->sum('view');
                            switch($movie->resolution){
                                case(0):
                                    $resolution='HD';
                                    break;
                                case(1):
                                    $resolution='SD';
                                    break;
                                case(2):
                                    $resolution='HDCam';
                                    break;
                                case(3):
                                    $resolution='Cam';
                                    break;
                                case(4):
                                    $resolution='FullHD';
                            }
                            if($number_view > 999999){
                                $totalView=floor($number_view / 1000000).'M';
                            }
                            elseif($number_view > 999){
                                $totalView=floor($number_view / 1000).'K';
                            }else{
                                $totalView=$number_view;
                            }
                            $data[]=[
                                'movies'=>$movie,
                                'resolution' =>$resolution,
                                'totalView' =>$totalView
                            ];
                        } 
                    }            
                }
                $output = view('render.movie_trending',compact('data'))->render();
            }
            
        }
        return $output;
    }
}

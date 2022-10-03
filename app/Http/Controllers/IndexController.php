<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Visits_Website;
use App\Models\Movie_Genre;
use App\Models\Review;
use App\Models\Directors_Actors;
use App\Models\Movie_Dir_Act;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Date_View;
use App\Models\View;
use App\Http\Controllers\MovieTrendingController;

use function PHPUnit\Framework\isEmpty;

class IndexController extends Controller
{
    public function getYear()
    {
        return Carbon::now('Asia/Ho_Chi_Minh')->format('Y');
    }
    public function index()
    {
        $category = Category::with('movie')->orderBy('id', 'DESC')->where('status', 1)->get();
        $phim_hot = Movie::with('episode')->where('phim_hot', 1)->where('status', 1)->where('hide_or_show', 1)->orderBy('date_updated', 'DESC')->orderBy('year', 'DESC')->get();
        $title = 'Phim hay ' . $this->getYear() . ' | Xem phim mới | Phim online | Full HD - VietSub';
        return view('pages.home', compact('category', 'phim_hot', 'title'));
    }
    public function movieByCategory($slug)
    {
        $slug_cate = Category::where('slug', $slug)->first();
        if ($slug == 'phim-moi') {
            $movies = Movie::where('hide_or_show', 1)->orderBy('date_updated', 'DESC')->paginate(20);
            $title = 'Phim hay ' . $this->getYear() . ' | Xem phim mới | Phim online | Full HD - VietSub';
        } else {
            $movies = Movie::where('category_id', $slug_cate->id)->where('hide_or_show', 1)->orderBy('date_updated', 'DESC')->paginate(20);
            if ($slug == 'phim-le') {
                $title = '[Tuyển tập] Phim lẻ hay nhất | Phim lẻ mới nhất ' . $this->getYear();
            } else if ($slug == 'phim-chieu-rap') {
                $title = '[Tuyển tập] Phim chiếu rạp hay nhất | Phim chiếu rạp mới nhất ' . $this->getYear();
            } else {
                $title = '[Tuyển tập] Phim bộ hay nhất | Phim bộ mới nhất ' . $this->getYear();
            }
        }

        return view('pages.category', compact('slug_cate', 'movies', 'title'));
    }
    public function movieByCountry($slug)
    {
        $slug_country = Country::where('slug', $slug)->first();
        $movies = Movie::where('country_id', $slug_country->id)->where('hide_or_show', 1)->orderBy('date_updated', 'DESC')->paginate(20);
        $title = '[Tuyển tập] Phim quốc gia ' . strtolower($slug_country->title) . ' hay nhất ' . $this->getYear();
        return view('pages.country', compact('slug_country', 'movies', 'title'));
    }
    public function movieByGenre($slug)
    {
        $slug_genre = Genre::where('slug', $slug)->first();

        $movie_genre = Movie_genre::where('genre_id', $slug_genre->id)->get();
        $many_phim = [];
        foreach ($movie_genre as $key => $mov) {
            $many_phim[] = $mov->movie_id;
        }
        $movies = Movie::whereIn('id', $many_phim)->where('hide_or_show', 1)->orderBy('date_updated', 'DESC')->paginate(20);
        $title = '[Tuyển tập] Phim thể loại ' . strtolower($slug_genre->title) . ' hay nhất ' . $this->getYear();
        return view('pages.genre', compact('slug_genre', 'movies', 'title'));
    }
    public function movieDetail($slug)
    {
        $movie = Movie::with('category', 'movie_genre', 'country', 'movie_dir_act')->where('slug', $slug)->first();
        $related = Movie::with('category', 'movie_genre', 'country')->where('category_id', $movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        $episode = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'DESC')->take(3)->get();
        $episode_first = Episode::with('movie')->where('movie_id', $movie->id)->orderBy('episode', 'ASC')->take(1)->first();
        $count_episode = Episode::with('movie')->where('movie_id', $movie->id)->count();
        $review = Review::where('movie_id', $movie->id)->first();
        if (ucwords($movie->title) == ucwords($movie->name_eng)) {
            $title = ucwords($movie->title) . ' (' . $movie->year . ') Full HD - VietSub';
        } else {
            $title = ucwords($movie->title) . ' - ' . ucwords($movie->name_eng) . ' (' . $movie->year . ') Full HD - VietSub';
        }
        return view('pages.movie', compact('movie', 'related', 'episode', 'episode_first', 'count_episode', 'review', 'title'));
    }
    public function watchMovie($slug, $tap)
    {
        $movie = Movie::with('category', 'movie_genre', 'country', 'episode', 'view')->where('slug', $slug)->first();
        if ($tap == 'full') {
            $episode = Episode::where('movie_id', $movie->id)->first();
        } else {
            // $tapphim=substr($tap,4,1);
            $episode = Episode::where('movie_id', $movie->id)->where('episode', $tap)->first();
        }
        // return response()->json($episode);

        //Tạo và lưu số lượt xem
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $date_view = Date_View::get();
        if (count($date_view) ==  0) {
            Date_View::create([
                'date' => $now
            ]);
            $date_view_first = Date_View::where('date', $now)->first();
            View::create([
                'movie_id' => $movie->id,
                'date_view_id' => $date_view_first->id,
                'view' => 1
            ]);
            $movie->increment('view');
        } else {
            $arr = [];
            foreach ($date_view as $key => $date_v) {
                $arr[] = $date_v->date;
            }
            if (in_array($now, $arr)) {
                $date_view_first = Date_View::where('date', $now)->first();
                $id_date_view = $date_view_first->id;
                $view = View::where('movie_id', $movie->id)->where('date_view_id', $id_date_view)->first();
                if (empty($view)) {
                    View::create([
                        'movie_id' => $movie->id,
                        'date_view_id' => $id_date_view,
                        'view' => 1
                    ]);
                    $movie->increment('view');
                } else {
                    $view->increment('view');
                    $movie->increment('view');
                }
            } else {
                Date_View::create([
                    'date' => $now
                ]);
                $date_view_first = Date_View::where('date', $now)->first();
                View::create([
                    'movie_id' => $movie->id,
                    'date_view_id' => $date_view_first->id,
                    'view' => 1
                ]);
                $movie->increment('view');
            }
        }
        $movie = Movie::with('category', 'movie_genre', 'country', 'episode', 'view')->where('slug', $slug)->first();
        $related = Movie::with('category', 'movie_genre', 'country')->where('category_id', $movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug', [$slug])->get();
        if (ucwords($movie->title) == ucwords($movie->name_eng)) {
            $title = ucwords($movie->title) . ' (' . $movie->year . ') - Tập ' . $tap . ' [Full HD - VietSub]';
        } else {
            $title = ucwords($movie->title) . ' - ' . ucwords($movie->name_eng) . ' (' . $movie->year . ') - Tập ' . $tap . ' [Full HD - VietSub]';
        }
        return view('pages.watch', compact('movie', 'episode', 'related', 'title'));
    }
    public function movieTag($tag)
    {
        $movies = Movie::where('tags', 'LIKE', '%' . $tag . '%')->orderBy('date_updated', 'DESC')->paginate(40);
        $title = $tag;
        return view('pages.tag', compact('tag', 'movies', 'title'));
    }
    public function movieByDirectorOrActor($type, $name, $id)
    {
        $movie_dir_act = Movie_Dir_Act::where('dir_act_id', $id)->get();
        foreach ($movie_dir_act as $mov) {
            $many_phim[] = $mov->movie_id;
        }
        $movies = Movie::whereIn('id', $many_phim)->orderBy('date_updated', 'DESC')->paginate(40);

        if ($type == 'dao-dien') {
            $t = 'đạo diễn';
        } else {
            $t = 'diễn viên';
        }
        $title = '[Tuyển tập] Phim theo ' . strtolower($t) . ' ' . strtolower($name) . ' hay nhất ' . $this->getYear();
        return view('pages.director_actor', compact('type', 'name', 'movies', 'title'));
    }

    public function filter_sidebar(Request $request)
    {
        return (new MovieTrendingController)->filter_sidebar($request);
    }

    public function search()
    {
        if (isset($_GET['q'])) {
            $search = $_GET['q'];

            $movies = Movie::where('title', 'LIKE', '%' . $search . '%')->orderBy('date_updated', 'DESC')->paginate(40);
            $title = 'Tìm kiếm phim';
            return view('pages.search', compact('movies', 'search', 'title'));
        } else {
            return redirect()->route('index');
        }
    }
    public function visitWebsite()
    {
        //whether ip is from share internet
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip_address = $_SERVER['HTTP_CLIENT_IP'];
        }
        //whether ip is from proxy
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        //whether ip is from remote address
        else {
            $ip_address = $_SERVER['REMOTE_ADDR'];
        }

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $visitWebsite = Visits_Website::where('date', $now)->first();
        if ($visitWebsite == null) {
            Visits_Website::create([
                'date' => $now,
                'visit' => 1
            ]);
        } else {
            $visitWebsite->increment('visit');
        }
    }
    public function ratingMovie(Request $request)
    {
        $review = Review::where('movie_id', $request->movie_id)->first();
        if ($review == null) {
            Review::create([
                'movie_id' => $request->movie_id,
                'rating' => $request->ratingValue,
                'review' => 1
            ]);
            return array('review' => 1, 'rating' => $request->ratingValue);
        } else {;
            $review->increment('review');
            $review->update(['rating' => round(($review->rating + $request->ratingValue) / 2, 1)]);
            return array('review' => $review->review, 'rating' => $review->rating);
        }
    }
}

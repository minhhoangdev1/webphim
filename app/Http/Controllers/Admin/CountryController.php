<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries=Country::orderby('id','DESC')->get();
        return view('admin.country.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.country.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkData($request);
        $country = new Country();
        $country->title = $request->title;
        $country->slug=Str::slug($request->title);
        $country->status = $request->status;
        $country->save();
        
        $message=[
            'status'=>200,
            'type'=>'insert',
            'title'=>'Thêm quốc gia '.$request->title.' thành công !'
        ];
        return redirect()->back()->with('message',$message);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country=Country::find($id);
        return view('admin.country.form',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->checkData($request);
        $country = Country::find($id);
        $country->title = $request->title;
        $country->slug=Str::slug($request->title);
        $country->status = $request->status;
        $country->save();

        $message=[
            'status'=>200,
            'type'=>'update',
            'title'=>'Cập nhật quốc gia '.$request->title.' thành công !'
        ];
        
        return redirect()->back()->with('message',$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country=Country::findOrFail($id);
        $name=$country->title;
        $country->delete();
        $message=[
            'status'=>200,
            'type'=>'delete',
            'title'=>'Xóa quốc gia '.$name.' thành công !'
        ];

        return redirect()->back()->with('message',$message);
    }

    public function checkData(Request $request){
        $request->validate([
            'title'=>'required',
            'status'=>'required'
        ]);
    }

    public function deleteManyCountry(Request $request){
        Country::whereIn('id',$request->id)->delete();
        // Cookie::queue('delete', 'yes', 1);
        //https://www.edureka.co/community/65056/how-to-get-user-s-ip-address-in-laravel
    }
}

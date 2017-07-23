<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppShare;
use App\User;
use Auth;
class AppShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AppShare::all()->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appshare =new AppShare();
        $ByUserid=Auth::user()->id;
        $appshare->ByUser()->associate($ByUserid);
        $TouserId=User::find($request->ToUserId);
        $appshare->ToUser()->associate($TouserId);
        $appshare->phoneNo=$request->phoneNo;
        $appshare->email=$request->email;
        $appshare->fb=$request->fb;
        $appshare->google=$request->google;
        $appshare->downloaded=$request->downloaded;
        $appshare->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return AppShare::find($id)->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return AppShare::find($id)->toJson();
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
      AppShare::destroy($id);
      $appshare =new AppShare();
      $ByUserid=Auth::user()->id;
      $appshare->ByUser()->associate($ByUserid);
      $TouserId=User::find($request->TouserId);
      $appshare->ByUser()->associate($ToUserid);
      $appshare->phoneNo=$request->phoneNo;
      $appshare->email=$request->email;
      $appshare->fb=$request->fb;
      $appshare->google=$request->google;
      $appshare->downloaded=$request->downloaded;
      $appshare->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      AppShare::destroy($id);
    }
}

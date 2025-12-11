<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Config;
use Image;
use Storage;
use Illuminate\Support\Facades\File;
use Session;
use Purifier;
use Auth;

class ConfigController extends Controller
{

    public function __construct()
    {
        $this->middleware('check_role');
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $configs = Config::orderBy('id', 'asc')->paginate(20);
        return view('config/index')->with('configs', $configs);

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
        $config = Config::find($id);
        $oldFilename = $config->value;
        $config_name = $config->name;
        $filename = $request->$config_name;
        $config->value = $filename;
        if(env('APP_OS')=='nix'){
         $slash='/';
        }else{
         $slash='\\';
        }
        if($config->type === 'file'){
          $image = $request->file('fileupload');
          $location = public_path("images".$slash."files"); # full path to public dir, to where images are to be saved
          Image::make($image)->save("$location".$slash."$filename");
          $full_img_path = "$location".$slash."$oldFilename";
          if (! Storage::exists($full_img_path)) {
           File::delete($full_img_path);
          }
        }
        $config->save();
        
        Session::flash("success", "Config for $config_name updated");
        $configs = Config::orderBy("id", "asc")->paginate(20);
        return view("config/index")->with("configs", $configs);
    }

    
}

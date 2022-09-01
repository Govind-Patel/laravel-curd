<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
class DeviceController extends Controller
{
    function list(){
        return Device::all() ;
    }
    function addData(Request $request){
        // $device = new Device;
        // $device->name=$request->name;
        // $device->member_id=$request->member_id;
        // $result = $device->save();
        $res= [
            "name"=>$request->name,
            "member_id"=>$request->member_id
        ];
        $result = Device::create($res);
        if($result){
            return ["result"=>"Data has been save"];
        }
        else{
            return ["result"=>"Operation failed"]; 
        }
    }
    function updateData(Request $request){
            // $device = Device::find($request->id);
            // $device->name=$request->name;
            // $device->member_id=$request->member_id;
            // $result = $device->save();
            $update = [
                "name"=>$request->name,
                "member_id"=>$request->member_id
            ];
            $result = Device::where('id',$request->id)->update($update);
            if($result){
                return ["result"=>"Data has been update"];
            }
            else{
                return ["result"=>"Operation failed"]; 
            }
      
    }
    function delete(Request $request){
        $result = Device::where('id',$request->id)->delete();
        if ($result) {
           return ["response"=>"Delete Data successfully"];
        }
        else {
            return ["response"=>"you not delete"];
        }
    }
    function srearch(Request $request){
        $nam = $request->name;
        return Device::where("name","like","%".$request->name."%")->get();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Menus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenusController extends Controller
{
    public function index()
    {
        return view('menus.menus-index');       
    }
    public function get_data_menus(Request $request)
    {
        $data = Menus::all();
        return response()->json([
            'data'=>$data,
        ]);
    }
    public function save_menus(Request $request)
    {
        $status = 500;
        $message = 'Data gagal disimpan';
        $menus_name = $request->menus_name;
        $type_menus = $request->type_menus;
        $menus_link = $request->menus_link;
        $description_menus = $request->description_menus;
       
        $validator = Validator::make($request->all(),[
            'menus_name'=>'required',
            'menus_link'=>'required|unique:menus,link',
            'description_menus'=>'required',
            'type_menus'=>'required',
      
        ],[
            'menus_name.required'=>'Nama menu tidak boleh kosong',
            'menus_link.required'=>'Link menu tidak boleh kosong',
            'menus_link.unique'=>'Link menu sudah ada',
            'description_menus.required'=>'Deskripsi menu tidak boleh kosong',
            'type_menus.required'=>'tipe menu tidak boleh kosong',
        ]);
        if($validator->fails()){
            return response()->json([
                'message'=>$validator->errors(), 
                'status'=>422
            ]);
        }else{
            $post =[
                'name'=>$menus_name,
                'description'=>$description_menus,
                'link'=>$menus_link,
                'type'=>$type_menus,
                'permission_name'=>'view-'.$menus_link
            ];

            $insert = Menus::create($post);
            if($insert){
                $status=200;
                $message='Data berhasil disimpan';
            }
        }
        return response()->json([
            'status'=>$status,
            'message'=>$message,
        ]);
    }
}

<?php

namespace App\Http\Controllers\mobile;

use App\Models\MenuGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AllMobileController extends Controller
{
    public function getAllData(){
        $allData = [];
        $data = MenuGroup::all();
        foreach ($data as $menu) {
            if (Storage::disk('public_index')->exists('images/'.$menu->photo)) {
                $menu->img = "data:image/png;base64, ".base64_encode(Storage::disk('public_index')->get('images/'.$menu->photo));
            }
            $menulist = DB::table('menu_items')->where('menu_groups_id', $menu['id'])->get();
            foreach ($menulist as $menu_items) {
                if (Storage::disk('public_index')->exists('images/'.$menu->photo)) {
                    $menu_items->img = "data:image/png;base64, ".base64_encode(Storage::disk('public_index')->get('images/'.$menu_items->photo));
                }
            }
            $menu->menu_list = $menulist;
        }

        $ads = Storage::disk('public_index')->files('ads');
        if(!empty($ads)){
            foreach ($ads as $key => $file) {
                $ads[$key] = "data:image/png;base64, ".base64_encode(Storage::disk('public_index')->get($file));
            }
        }

        $featured = DB::table('menu_items')->where('is_featured', 1)->get();
            foreach ($featured as $menu_items) {
                if (Storage::disk('public_index')->exists('images/'.$menu->photo)) {
                    $menu_items->img = "data:image/png;base64, ".base64_encode(Storage::disk('public_index')->get('images/'.$menu_items->photo));
                }
            }

        $contacts = DB::table('app_info')->first();
        $reservations = DB::table('reservations')->get();
        $highlights = DB::table('highlights')->get();

        $allData['menu']=$data;
        $allData['featured'] = $featured;
        $allData['ads']=$ads;
        $allData['contacts']=$contacts;
        $allData['reservations']=$reservations;
        $allData['highlights']=$highlights;

        return $allData;
    }

    public function contactUs(Request $request){
      return $request->all();
      $phone_number = $request->phone_number;
      $email = $request->email;
      $name = $request->name;
      $msg = $request->msg;
      //TODO we will send mail
    }

    public function getUserPromoData($id){
        $user = DB::table('users')->select('id','name','phone_number','email')->where('id',$id)->first();
        $promos = DB::table('promo_users')
                ->leftJoin('promos', 'promo_users.promo_code', '=', 'promos.promo_code')
                ->where('promo_users.user_id', $id)->get();
        return ['user'=>$user, 'promos'=>$promos];
    }

    public function setUserPromoData(Request $request){

        $promo = DB::table('promo_users')
                ->where('id', $request->id)
                ->update(['is_used' => 1]);
                if($promo){
                    return "success";
                }else{
                    return "failed";
                }
        return $promo;
    }
}

<?php

namespace App\Http\Controllers\mobile;

use App\Models\Promo;
use App\Models\PromoUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PromoController extends Controller
{
    public function promo(Request $request)
    {
        $promo_code = $request->promo_code;
        $user_id = Auth::user()->id;
        $promodata = Promo::where('promo_code', $promo_code)->first();
        $check_if = DB::table('promo_users')->where(['user_id'=>$user_id, 'promo_code'=>$promo_code])->first();
        if($check_if){
            return response()->json(['message' => 'Promo code already used!'], 400);
        }else{
            if ($promodata) {
                if ($promodata->promo_total > 0 and strtotime($promodata->promo_expiry) <= time()) {
                    $promo = Promo::where('promo_code', $promo_code)->decrement('promo_total', 1);
                    if ($promo) {
                        $save_promo = new PromoUser;
                        $save_promo->user_id = $user_id;
                        $save_promo->promo_code = $request->promo_code;
                        $save_promo->save();
                        if($save_promo){
                            return response()->json(['message' => 'success'], 200);
                        }else{
                            return response()->json(['message' => 'error'], 400);
                        }
                    } else {
                        return response()->json(['message' => 'Failed'], 400);
                    }
                }else {
                    return response()->json(['message' => 'Promo period has expired'], 400);
                }
            }else {
                return response()->json(['message' => 'Promo code does not exist'], 401);
            }
        }

    }



    public function getUserPromo(Request $request){

        //get auth id
        //search promo_users tbl with id
        //link promo_users promo_id to promos tbl data

        $user_id = Auth::user()->id;
        $promos = DB::table('promo_users')
                ->leftJoin('promos', 'promo_users.promo_code', '=', 'promos.promo_code')
                ->where('promo_users.user_id', $user_id)->get();
        // $promos = DB::raw('SELECT * FROM promo_users WHERE promo_users.user_id = ? LEFT JOIN promos ON ',[$user_id]);
        // $promos = PromoUser::where('user_id', $user_id)->with('promos')->get();
        return $promos;


    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Promo;
use App\Models\PromoUser;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = User::find(session()->get('loginId'));

        $promolist = Promo::all();

        return view('promo', compact('user','promolist'));
    }

    /**
     * Show the form for creating a new Promo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::find(session()->get('loginId'));

        return view('addpromo', compact('user'));
    }

    /**
     * Store a newly created promo in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $addPromo = new Promo;

        // $addPromo->user_id = session()->get('loginId');
        $addPromo->promo_name = $request->promo_name;
        $addPromo->promo_code = $request->promo_code;
        $addPromo->promo_total = $request->promo_total;

        $promo_expiry = $request->promo_expiry;
        $addPromo->promo_expiry = date('Y-m-d H:i:s', strtotime($promo_expiry));

        // dd($addPromo);

        $addPromo->save();

        return redirect()->action(
            [PromoController::class, 'index']

        );


    }

    /**
     * Display the User in Each Promo.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show(Promo $promo, PromoUser $promoUser, $id, $promoCode)
    {
        $user = User::find(session()->get('loginId'));

        $promo = Promo::find($id);

        $promo_users = PromoUser::where('promo_code', '=', $promoCode)->with('user')->get();


        return view('promoUser', compact('user', 'promo', 'promo_users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $promo)
    {
        //
    }

    /**
     * Remove a promo from storage.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promo, $id)
    {
        $promo = Promo::find($id);

        $promo->delete();


        return redirect()->action(
            [PromoController::class, 'index']
        );
    }



        /**
     * Remove a user in a particular promo .
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function delete(Promo $promo, PromoUser $promoUser, $promo_id, $id)
    {


        $promoUser = PromoUser::find($id);

        $promoCode = $promoUser->promo_code;

        $promoUser->delete();


        return redirect()->action(
            [PromoController::class, 'show'],
            ['id'=> $promo_id,
            'promoCode'=>$promoCode]
        );
    }



}

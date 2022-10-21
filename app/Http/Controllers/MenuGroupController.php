<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\MenuGroup;
use Illuminate\Http\Request;

class MenuGroupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $user = User::find(session()->get('loginId'));

        return(view('welcome', compact('user')));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = User::find(session()->get('loginId'));

        $menugrouplist = MenuGroup::where('user_id', $user->id)
            ->with('getUsers')
            ->get();

        // dd($ProjectList);

        // $ProjectList = Project::all();
        return(view('menu', compact('menugrouplist', 'user')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return(view('addmenu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $menugroup = new MenuGroup;

        $menugroup->user_id = session()->get('loginId');
        $menugroup->menu_name = $request->menu_name;
        $imagename = rand(100000,999999);

        if($request->file('image')){
            $file= $request->file('image');
            $ext= $request->image->extension();
            $filename= "menu_$imagename.$ext";
            $file-> move(public_path('images'), $filename);
            $data['image']= $filename;
        } else {$filename = null;}

        $menugroup->photo = $filename;

        // dd($menugroup);

        $menugroup->save();

        return redirect()->action(
            [MenuGroupController::class, 'index']

        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuGroup  $menugroup
     * @return \Illuminate\Http\Response
     */
    public function show(MenuGroup $menugroup)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuGroup $menugroup, $id)
    {
        $menugroup = MenuGroup::find($id);

        return(view('editMenu', Compact('menugroup')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuGroup  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $menugroup = MenuGroup::find($id);

        $menugroup->user_id = session()->get('loginId');
        $menugroup->menu_name = $request->menu_name;


        if ( $request->image != null)  {

            $path = public_path().'/images';

            // dd($path);

            //code for remove old file
            if( $menugroup->photo != ''
                && $menugroup->photo != null){
                 $file_old = $path.'/'.$menugroup->photo;

                //  dd($file_old);

                 unlink($file_old);
            }

            //upload new file
            $file = $request->file('image');
            $ext= $request->image->extension();
            $imagename = rand(100000,999999);
            $filename= "menu_$imagename.$ext";
            $file-> move(public_path('images'), $filename);

            $menugroup->photo = $filename;
        }


        // dd($menugroup);

        $menugroup->save();

        return redirect()->action(
            [MenuGroupController::class, 'index']

        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuGroup $menugroup, $id)
    {
        $menugroup = MenuGroup::find($id);

        // dd($project);
        $menugroup->delete();

        return redirect()->action(
            [MenuGroupController::class, 'index']
        );
    }
}

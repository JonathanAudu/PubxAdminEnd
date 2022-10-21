<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\MenuItem;
use App\Models\MenuGroup;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @param  string  $id
     */
    public function index($id)
    {

        $menugroup = MenuGroup::find($id);

        // dd($id, $project);
        $menuitemlist = MenuItem::where('menu_groups_id',  $id)->paginate(10);

        return(view('menuItems', compact('menugroup', 'menuitemlist')));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {


        $menu_groups_id = $id;

        $menu_groups = MenuGroup::find($id);

        // dd($project);

        return(view('createMenuItem', compact('menu_groups')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $addMenuList = new MenuItem;
        $addMenuList->menu_groups_id = $request->menu_groups_id;
        $addMenuList->menu_item = $request->menu_item;
        $addMenuList->price = $request->price;
        $addMenuList->is_featured = $request->is_featured;
        $addMenuList->discount = $request->discount;


        $imagename = rand(100000,999999);

        if($request->file('image')){
            $file= $request->file('image');
            $ext= $request->image->extension();
            $filename= "item_$imagename.$ext";
            $file-> move(public_path('images'), $filename);
            $data['image']= $filename;
        } else {$filename = null;}

        $addMenuList->photo = $filename;




        // dd($addMenuList);
        $addMenuList->save();

        return redirect()->action(
            [MenuItemController::class, 'index'],
            ['id'=> $addMenuList->menu_groups_id]

        );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(MenuItem $menuItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuItem  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuItem $menuItem, $id)
    {
        $menuitem = MenuItem::find($id);

        return(view('editMenuItem', compact('menuitem')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\MenuItem  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = $request->id;

        if ( Empty($request->is_featured) ){
            $request->is_featured = 0;
        };
        // $id = 37;
        // dd($request->id);

        $menuItem = MenuItem::find($id);

        // dd($menuItem);

        $menuItem->menu_item = $request->menu_item;
        $menuItem->price = $request->price;
        $menuItem->is_featured = $request->is_featured;
        $menuItem->discount = $request->discount;

        if ( $request->image != null)  {

            $path = public_path().'/images';

            // dd($path);

            //code for remove old file
            if( $menuItem->photo != ''
                && $menuItem->photo != null){
                 $file_old = $path.'/'.$menuItem->photo;

                //  dd($file_old);

                 unlink($file_old);
            }
            $imagename = rand(100000,999999);

            //upload new file
            $file = $request->file('image');
            $ext= $request->image->extension();
            $filename= "item_$imagename.$ext";
            $file-> move(public_path('images'), $filename);

            $menuItem->photo = $filename;


        }
        // dd($menuItem);

        $menuItem->save();


        return redirect()->action(
            [MenuItemController::class, 'index'],
            ['id'=> $menuItem->menu_groups_id]

        );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuItem $menuItem, $id)
    {
        $menuItem = MenuItem::find($id);

        $menuItem->delete();


        return redirect()->action(
            [MenuItemController::class, 'index'],
            ['id'=> $menuItem->menu_groups_id]

        );
    }
}

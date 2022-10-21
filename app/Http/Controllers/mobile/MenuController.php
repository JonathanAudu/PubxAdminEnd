<?php

namespace App\Http\Controllers\mobile;

use App\Models\MenuItem;
use App\Models\MenuGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function getMenu(Request $request){
        $menu = MenuGroup::all();
        return response()->json($menu);
    }

    public function getMenuList(Request $request, $id){
        $menulist = DB::table('menu_items')->where('menu_groups_id', $id)->get();
        return $menulist;
    }

    public function getFeaturedMenuList(Request $request){
        $menulist = DB::table('menu_items')->where('featured', 1)->get();
        return response($menulist);
    }

    public function getAllMenu(Request $request){
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
        return $data;

    }
}

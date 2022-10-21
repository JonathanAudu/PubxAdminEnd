<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Highlight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HighlightController extends Controller
{
    public function index()
    {
        $user = User::find(session()->get('loginId'));
        $highlights = Highlight::all();
        return (view('highlight', compact('highlights', 'user')));
    }



    public function create()
    {
        return (view('addhighlight'));
    }



    public function store(Request $request)
    {
        $addHighlight = new Highlight;
        $addHighlight->title = $request->title;
        $addHighlight->info = $request->info;
        $addHighlight->event_start_date = $request->event_start_date;
        $addHighlight->event_end_date = $request->event_end_date;
        $addHighlight->save();

        return redirect()->action(
            [HighlightController::class, 'index']
        );
    }



    public function destroy(Highlight $highlight, $id)
    {
        $highlight = Highlight::find($id);
        $highlight->delete();

        return redirect()->action(
            [HighlightController::class, 'index']
        );
    }
}

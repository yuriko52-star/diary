<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;


class DiaryController extends Controller
{
   public function index()
   {
    $diaries = Diary::all();
    return view('diaries.index',compact('diaries'));
   }

   public function store(Request $request)
   {
    Diary::create([
        'date' => $request->date,
        'content' => $request->content,
        'tag' => $request->tag,
    ]);
    return redirect('/diaries');
   }

   public function edit($id)
   {
    $diary = Diary::findOrFail($id);
    return view('diaries.edit',compact('diary'));

   }

   public function update(Request $request ,$id)
   {
    $diary = Diary::findOrFail($id);
    $diary->update([
        'date'=> $request->date,
        'content' => $request->content,
        'tag' => $request->tag,
    ]);
    return redirect('/diaries');
   }

   public function destroy($id)
   {
    $diary = Diary::findOrFail($id);
    $diary->delete();
    return redirect('/diaries');
   }
}



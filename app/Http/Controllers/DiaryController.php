<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;


class DiaryController extends Controller
{
   public function index(Request $request)
   {
        $query = Diary::query();
        if($request->date) {
            $query->whereDate('date',$request->date);
        }
        if($request->tag) {
            $query->where('tag',$request->tag);
        }
        $sort = $request->sort ?? 'desc';
        if($sort === 'asc') {
            $query->orderBy('date','asc');
        } else {
            $query->orderBy('date','desc');
        }
        $diaries = $query->get();
        $tags = Diary::select('tag')
            ->whereNotNull('tag')
            ->distinct()
            ->pluck('tag');
        return view('diaries.index',compact('diaries','sort','tags'));
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



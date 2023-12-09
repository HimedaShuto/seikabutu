<?php

namespace App\Http\Controllers;

use App\Models\Circle;
use App\Http\Requests\CircleRequest;
use Illuminate\Http\Request;

class CircleController extends Controller
{
    public function index(Circle $circle)
    {
        return view('circles.index')->with(['circles' => $circle->getPaginateByLimit()]);
        //blade内で使う変数'circles'と設定。'circles'の中身にgetを使い、インスタンス化した$circleを代入
    }
    
    public function show(Circle $circle)
    {
        return view('circles.show')->with(['circle'=>$circle]);
        //'circle'はbladeファイルで使う変数。中身は$circleはid=1のCircleインスタンス。
    }
    
    public function create()
    {
        return view('circles.create');
    }
    
    public function store(CircleRequest $request, Circle $circle)
    {
        $input = $request['circle'];
        $circle->fill($input)->save();
        return redirect('/circles/' . $circle->id);
    }
    
    public function edit(Circle $circle)
    {
        return view('circles.edit')->with(['circle' => $circle]);
    }
    
    public function update(CircleRequest $request, Circle $circle)
    {
        $input_circle = $request['circle'];
        $circle->fill($input_circle)->save();
        
        return redirect('/circles/' .$circle->id);
    }
    
    public function delete(Circle $circle)
    {
        $circle->delete();
        return redirect('/');
    }
}

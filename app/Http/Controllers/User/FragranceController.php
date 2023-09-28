<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Fragrance;
use App\Models\MBrand;
use App\Models\MComponent;


class FragranceController extends Controller
{
    /**
     * 香水をランダムに表示するページのアクション
     * 
     * @param Request $request 画面からきたリクエストパラメータ
     * @return View main.blade.php
     */
    public function random(Request $request)
    {   
        $brand =null;
        $component =null;
        if ($request->has('brand_id')){
            // 画面からブランドIDが渡された場合
            $brand = $request->brand_id;
            
            // 香水とブランドマスタを紐づけたうえで、ブランドマスタで条件していしている
            // $fragrances = Fragrance::whereHas('brand', function ($q) use ($brand) {
            //     $q->where('m_brand_id', $brand);
            // })->inRandomOrder()->take(2)->get();
            $fragrances = Fragrance::where('m_brand_id',$brand)->inRandomOrder()->take(2)->get();
            $brand = MBrand::find($brand);
            $flag = 1; 
        
        }else if ($request->has('component_id')){
            //画面から成分が渡された場合
             $component = $request->component_id;
            //渡されてきたコンポーネントidと一致するデータを持つFragranceのデータをコンポーネントテーブルを経由して抽出
             $fragrances = Fragrance::whereHas('components', function ($q) use ($component) {
                $q->where('m_component_id', $component);
            })->inRandomOrder()->take(3)->get();
            $component = MComponent::find($component);
            $flag = 2;
            
        } else {
            // 渡される値がない場合
            $fragrances = Fragrance::inRandomOrder()->take(3)->get();
            $flag = 3;
        }
        
        return view('user.main' , compact('fragrances', 'flag', 'brand','component'));
    }
    
    
     public function show($id)
    {
        //
        
        $fragrance = Fragrance::find($id);
        
        
        return view('user.detail' , compact('fragrance'));
    }
    
    public function search(Request $request)
    {
        $cond_string = $request->cond_string;
        if ($cond_string != '') {
            // 検索されたら検索結果を取得する
            
            //ブランド名、香水名は部分一致　成分名は完全一致で抽出
            $fragrances = Fragrance::whereHas('brand', function($q) use($cond_string){
                $q->Where('brand', 'LIKE', "%$cond_string%")->orWhere('brandJP', 'LIKE', "%$cond_string%");
            })
            ->orWhereHas('components', function($q) use($cond_string){
                $q->whereHas('m_component', function($q) use($cond_string) {
                    $q->where('component', $cond_string);
                });
            })
            ->orWhere('fragrance','LIKE', "%$cond_string%")
            ->get();
            
        } else {
            // それ以外はすべてを取得する
            $fragrances = Fragrance::all();
        }
        return view('user.index', ['fragrances' => $fragrances, 'cond_string' => $cond_string]);
    }
    
    
}

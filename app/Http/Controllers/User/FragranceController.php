<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Fragrance;

class FragranceController extends Controller
{
    public function random(Request $request)
    {
        //  dd($request);
        if ($request->has('brand_id')){
            $brand = $request->brand_id;
            $fragrances = Fragrance::whereHas('brand', function ($q) use ($brand) {
                $q->where('m_brand_id', $brand);
            })->inRandomOrder()->take(2)->get();
        
        }else if ($request->has('component_id')){
             $component = $request->component_id;
             $fragrances = Fragrance::whereHas('components', function ($q) use ($component) {
                $q->where('m_component_id', $component);
            })->inRandomOrder()->take(2)->get();
            
        } else {
            $fragrances = Fragrance::inRandomOrder()->take(3)->get();
        }
        
        return view('user.main' , compact('fragrances'));
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

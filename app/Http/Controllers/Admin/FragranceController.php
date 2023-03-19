<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Fragrance;
use App\Models\MBrand;
use App\Models\MComponent;
use App\Models\Component;

class FragranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.fragrance.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $mbrand = new MBrand();
        $brands = $mbrand->get();
        
        $mcomponent = new MComponent();
        $components = $mcomponent->get();
        
        // dd($brands);
        
         return view('admin.fragrance.create', compact('brands', 'components'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, Fragrance::$rules);

        $fragrance = new Fragrance;
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$fragrance->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $fragrance->image_path = basename($path);
        } else {
            $fragrance->image_path = null;
        }
        
        $topnotes = $form['topnote'];

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);
        //  フォームから送信されてきたtopnoteを削除する
        unset($form['topnote']);
    

        // データベースに保存する
        $fragrance->fill($form);
        $fragrance->save();
        
        // トップノート登録
        foreach ($topnotes as $topnote) {
            $component = new Component;
            
            // 登録するデータを設定
            $component->fragrance_id = $fragrance->id;
            $component->m_component_id = $topnote;
            $component->note = 1;
            
            // データベースに保存する
            $component->save();
        }

        return redirect('admin/fragrances');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

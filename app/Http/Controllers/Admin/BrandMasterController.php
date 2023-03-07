<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MBrand;

class BrandMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       $brands=MBrand::all();
       
        return view('admin.brand.index', compact('brands'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request);
        
        $this->validate($request, MBrand::$rules);

        $m_brand = new MBrand;
        $form = $request->all();
        
        // データベースに保存する
        $m_brand->fill($form);
        $m_brand->save();
        
         // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        return redirect('admin/brands/create');
        
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
        // dd($request->id);
        
        $brand = MBrand::find($id);
    
        return view('admin.brand.edit', ['brand' => $brand]);
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
        // Validationをかける
        $this->validate($request, MBrand::$rules);
        // News Modelからデータを取得する
        $brand = MBrand::find($request->id);
        // 送信されてきたフォームデータを格納する
        $form = $request->all();
        unset($form['_token']);

        // 該当するデータを上書きして保存する
        $brand->fill($form)->save();

        return redirect('admin/brand');
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

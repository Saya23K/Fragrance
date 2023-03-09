<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\MComponent;

class ComponentMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $components=MComponent::all();
        
        return view('admin.component.index' , compact('components'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.component.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $this->validate($request, MComponent::$rules);

        $m_component = new MComponent;
        $form = $request->all();
        
        // データベースに保存する
        $m_component->fill($form)->save();
        
        dd($m_component);
        
         // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        
        return redirect('admin/components/create');
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
        $component = MComponent::find($id);
        
        return view('admin.component.edit' , ['component' => $component]);
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
        $this->validate($request,MComponent::$rules);
        
        $component = MComponent::find($request->id);
        
        $form = $request->all();
        unset($form['_token']);
        
        $component->fill($form)->save();
        
        return redirect('admin/component');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $component = MComponent::find($request->id);
        
        $brand->delete();
        
        return redirect( 'admin/component' );
        
    }
}

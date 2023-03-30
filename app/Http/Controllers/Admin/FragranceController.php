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
        
        $fragrances=Fragrance::all();
       
        
        return view('admin.fragrance.index', compact('fragrances'));
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
            
            $file = $request->file('image');
            //dd($file);
            $path = $file->store('public/image');
            // $path = $request->file('image')->store('public/image');
            $fragrance->image_path = basename($path);
        } else {
            $fragrance->image_path = null;
        }
        
        $topnotes = $form['topnote'];
        $middlenotes = $form['middlenote'];
        $lastnotes = $form['lastnote'];

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);
        //  フォームから送信されてきたnoteを削除する
        unset($form['topnote']);
        unset($form['middlenote']);
        unset($form['lastnote']);
    

        // データベースに保存する
        $fragrance->fill($form);
        $fragrance->save();
        
        // 成分登録
        $this->saveComponents($fragrance->id, $topnotes, 1);
        $this->saveComponents($fragrance->id, $middlenotes, 2);
        $this->saveComponents($fragrance->id, $lastnotes, 3);

        return redirect('admin/fragrances');
        
    }
    
    /**
     * 香水の成分を登録する
     *
     * @param  int  $fragranceId 香水ID
     * @param  array  $componentIds 成分IDの配列
     * @param  int  $note 成分の種類
     */
    private function saveComponents($fragranceId, $componentIds, $note)
    {
        foreach ($componentIds as $componentId) {
            $component = new Component;
            
            // 登録するデータを設定
            $component->fragrance_id = $fragranceId;
            $component->m_component_id = $componentId;
            $component->note = $note;
            
            // データベースに保存する
            $component->save();
        }
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
        $mbrand = new MBrand();
        $brands = $mbrand->get();
        
        $mcomponent = new MComponent();
        $components = $mcomponent->get();
        
        $fragrance = fragrance::find($id);
    
        return view('admin.fragrance.edit', compact('brands', 'components', 'fragrance'));
        
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
        $this->validate($request, fragrance::$rules);
        // Modelからデータを取得する
        $fragrance = fragrance::find($request->id);
        // 送信されてきたフォームデータを格納する
        $form = $request->all();
        
        unset($form['_token']);

        // 該当するデータを上書きして保存する
        $brand->fill($form)->save();

        return redirect('admin/fragrances');
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

@extends('layouts.admin')
        
@section('content')
<div class="container">
        <div class="row">
                <div class="col-md-8 mx-auto">
                        <h2>香水新規登録</h2>
                                
                        <form action="{{route('fragrances.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <label>ブランド名</label>
                                <select name="m_brand_id">
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                                @endforeach
                                </select>
                                <br>
                                <label>香水名</label>
                                <input type="text" name="fragrance">
                                <br>
                                <label>香水の種類</label><br>
                                <select name= "kind">
                                        <option value = "1">パルファン</option>
                                        <option value = "2">トワレ</option>
                                        <option value = "3">コロン</option>
                                </select>
                                <br>
                                <label>トップノート</label><br>
                                <div class="d-flex justify-content-start flex-wrap">
                                @foreach ($components as $component)
                                    <div style="width:20%;"><input type="checkbox" name="topnote[]" value="{{ $component->id }}">{{ $component->component }}</div>
                                @endforeach
                                </div>
                                <br>
                                <label>ミドルノート</label><br>
                                @foreach ($components as $component)
                                    <input type="checkbox" name="middlenote[]" value="{{ $component->id }}">{{ $component->component }}
                                @endforeach
                                <br>
                                <label>ラストノート</label><br>
                                @foreach ($components as $component)
                                    <input type="checkbox" name="lastnote[]" value="{{ $component->id }}">{{ $component->component }}
                                @endforeach
                                <br>
                                <label>容量(ml)</label><br>
                                <input type="text" class="form-control" name="capacity" value="{{ old('capacity') }}">
                                
                                <label>価格(¥)</label><br>
                                <input type="text" class="form-control" name="price" value="{{ old('price') }}">        
                                
                                
                                
                                <label class="col-md-2">説明文</label>
                                <div class="col-md-10">
                                        <textarea class="form-control" name="comment" cols="50" rows="5">{{ old('comment') }}</textarea>
                                </div><br>
                                <div class="form-group row">
                                        <label class="col-md-2">画像</label>
                                        <div class="col-md-10">
                                        <input type="file" class="form-control-file" name="image">
                                        </div>
                                </div>
                                <div class="form-group row">
                                        <label class="col-md-2">シルエット</label>
                                        <div class="col-md-10">
                                        <input type="file" class="form-control-file" name="silhouette">
                                        </div>
                                </div>
                                
                                
                                <input type='submit' value='送信' />
                                
                        </form>
                </div>
        </div>
</div>                         
        
@endsection
@extends('layouts.admin')
        
@section('content')
        <div class="col-md-8 mx-auto">
                <h2>香水情報編集ページ</h2>
                
                <form action="{{ route('brands.update', [ $fragrance->id ]) }}" method="post">
                    @csrf
                    @method('put')
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                                <label>ブランド名</label>
                                <select name="m_brand_id">
                                @foreach ($brands as $brand)
                                    @if ($brand->id == $fragrance->m_brand_id)
                                        <option value="{{ $brand->id }}" selected>{{ $brand->brand }}</option>
                                    @else
                                        <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                                    @endif
                                @endforeach
                                </select>
                                <br>
                                <label>香水名</label>
                                <input type="text" name="fragrance" value="{{ $fragrance->fragrance }}">
                                <br>
                                <label>香水の種類</label><br>
                                <select name= "kind" value="{{ $fragrance->kind }}">
                                        <option value = "1">パルファン</option>
                                        <option value = "2">トワレ</option>
                                        <option value = "3">コロン</option>
                                </select>
                                <br>
                                <label>トップノート</label><br>
                                @foreach ($components as $component)
                                    <input type="checkbox" name="topnote[]" value="{{ $component->id }}">{{ $component->component }}
                                @endforeach
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
                                <input type="text" class="form-control" name="capacity" value="{{ $fragrance->capacity }}">
                                
                                <label>価格(¥)</label><br>
                                <input type="text" class="form-control" name="price" value="{{ $fragrance->price }}">        
                                
                                
                                
                                <label class="col-md-2">説明文</label>
                                <div class="col-md-10">
                                        <textarea class="form-control" name="comment" cols="50" rows="5">{{ $fragrance->comment }}</textarea>
                                </div><br>
                                <div class="form-group row">
                                        <label class="col-md-2">画像</label>
                                        <div class="col-md-10">
                                        <input type="file" class="form-control-file" name="image">
                                        </div>
                                </div>
                            
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
        </div>
        
@endsection
@extends('layouts.admin')
        
@section('content')
        <div class="col-md-8 mx-auto">
                <h2>香水情報編集ページ</h2>
                
                <form action="{{ route('fragrances.update', [ $fragrances->id ]) }}" method="post" enctype="multipart/form-data">
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
                                    @if ($brand->id == $fragrances->m_brand_id)
                                        <option value="{{ $brand->id }}" selected>{{ $brand->brand }}</option>
                                    @else
                                        <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                                    @endif
                                @endforeach
                                </select>
                                <br>
                                <label>香水名</label>
                                <input type="text" name="fragrance" value="{{ $fragrances->fragrance }}">
                                <br>
                                <label>香水の種類</label><br>
                                <select name= "kind">
                                @foreach ($fragrances as $fragrance)
                                    @if ($fragrances->kind == 1)
                                        <option value = "{{ $fragrances->kind }}" selected>パルファン</option>
                                    @elseif ($fragrances->kind == 2)
                                        <option value = "{{ $fragrances->kind }}" selected>トワレ</option>
                                    @else
                                        <option value = "{{ $fragrances->kind }}" selected>コロン</option>
                                    @endif
                                @endforeach
                                </select>
                                <br>
                                <label>トップノート</label><br>
                                @foreach ($components as $component)
                                    @if ( $fragrances->top_components->contains('m_component_id',$component->id))
                                    <input type="checkbox" name="topnote[]" value="{{ $component->id }}" checked>{{ $component->component }}
                                    @else
                                    <input type="checkbox" name="topnote[]" value="{{ $component->id }}">{{ $component->component }}
                                    @endif
                                @endforeach
                                <br>
                                <label>ミドルノート</label><br>
                                @foreach ($components as $component)
                                    @if ( $fragrances->middle_components->contains('m_component_id',$component->id))
                                    <input type="checkbox" name="topnote[]" value="{{ $component->id }}" checked>{{ $component->component }}
                                    @else
                                    <input type="checkbox" name="topnote[]" value="{{ $component->id }}">{{ $component->component }}
                                    @endif
                                @endforeach
                                <br>
                                <label>ラストノート</label><br>
                                @foreach ($components as $component)
                                    @if ( $fragrances->last_components->contains('m_component_id',$component->id))
                                    <input type="checkbox" name="topnote[]" value="{{ $component->id }}" checked>{{ $component->component }}
                                    @else
                                    <input type="checkbox" name="topnote[]" value="{{ $component->id }}">{{ $component->component }}
                                    @endif
                                @endforeach
                                <br>
                                <label>容量(ml)</label><br>
                                <input type="text" class="form-control" name="capacity" value="{{ $fragrances->capacity }}">
                                
                                <label>価格(¥)</label><br>
                                <input type="text" class="form-control" name="price" value="{{ $fragrances->price }}">        
                                
                                
                                
                                <label class="col-md-2">説明文</label>
                                <div class="col-md-10">
                                        <textarea class="form-control" name="comment" cols="50" rows="5">{{ $fragrances->comment }}</textarea>
                                </div><br>
                                <div class="form-group row">
                                        <div class="image col-md-6 text-right mt-4">
                                            @if ($fragrances->image_path)
                                                <img src="{{ secure_asset('storage/image/fragrance/' . $fragrances->image_path) }}" width="100" height="100">
                                            @endif
                                        </div>
                            
                                        <label class="col-md-2">画像</label>
                                        <div class="col-md-10">
                                        <input type="file" class="form-control-file" name="image">
                                        </div>
                                        
                                </div>
                                
                                 <div class="form-group row">
                                        <div class="image col-md-6 text-right mt-4">
                                            @if ($fragrances->silhouette_path)
                                                <img src="{{ secure_asset('storage/image/silhouette/' . $fragrances->silhouette_path) }}" width="100" height="100">
                                            @endif
                                        </div>
                            
                                        <label class="col-md-2">シルエット</label>
                                        <div class="col-md-10">
                                        <input type="file" class="form-control-file" name="silhouette">
                                        </div>
                                        
                                </div>
                                         <input type="submit" class="btn btn-primary" value="更新">
                </form>
                <form action="{{ route('fragrances.destroy', [ $fragrances->id ]) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="削除" onclick='return confirm("削除しますか？");'>
                </form>
                
        </div>
@endsection
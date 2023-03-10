@extends('layouts.admin')
        
@section('content')
<div class="container">
        <div class="row">
                <div class="col-md-8 mx-auto">
                        <h2>香水新規登録</h2>
                                
                        <form action="{{route('fragrances.store')}}" method="post">
                                @csrf
                                <label>ブランド名</label>
                                <select name="m_brand_id">
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                                @endforeach
                                </select>
                                
                                <label>香水名</label>
                                <input type="text" name="fragrance">
                                
                                
                                
                                <input type='submit' value='送信' />
                                
                        </form>
                </div>
        </div>
</div>                         
        
@endsection
@extends('layouts.admin')
        
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>ブランド名新規登録</h2>
                
                <form action="{{route('brands.store')}}" method="post">
                    <!--enctype="text/plain削除-->
                    
                    @csrf
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2">ブランド名（英語）</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="brand" value="{{ old('brand') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">ブランド名（カナ）</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="brandJP" value="{{ old('brandJP') }}">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
            </div>
        </div>
    </div>
        
@endsection
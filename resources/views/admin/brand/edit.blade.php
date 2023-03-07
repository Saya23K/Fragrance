@extends('layouts.admin')
        
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                
                <h2>ブランド名編集</h2>
                <form action="{{ route('brands.update', [ '$brand->id' ]) }}" method="put">
                    @csrf
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="brand" value="{{ $brand->brand }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="brandJP" value="{{ $brand->brandJP }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $brand->id }}">
                            
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
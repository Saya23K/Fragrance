@extends('layouts.admin')
        
@section('content')
        
        <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>成分名新規登録</h2>
                
                <form action="{{ route('components.store') }}" method="post">
                    
                    @csrf    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2">成分名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="component" value="{{ old('component') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">説明</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="component_comment" value="{{ old('component_comment') }}">
                        </div>
                    </div>
                    
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
            </div>
        </div>
    </div>
        
@endsection
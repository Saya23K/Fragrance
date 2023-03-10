@extends('layouts.admin')
        
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                
                <h2>成分名編集</h2>
                <form action="{{ route('components.update', [ $component->id ]) }}" method="post">
                    @csrf
                    @method('put')
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="component" value="{{ $component->component }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="component_comment" value="{{ $component->component_comment }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $component->id }}">
                            
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                    {{--削除ボタン--}}
                <form action="{{ route('components.destroy', [ $component->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="削除" onclick='return confirm("削除しますか？");'>
                </form>  
            </div>
        </div>
    </div>
@endsection
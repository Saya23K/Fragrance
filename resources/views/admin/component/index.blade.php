<div class="body">
        @extends('layouts.admin')
                
        @section('content')
                <div class="col-md-8 mx-auto  table_space">
                        <h2>登録成分一覧</h2>
                        
                        <a href="{{ url('admin/components/create') }}">新規登録</a>
                        
                        <table class="table table-hover">
                                <tr>
                                        <th style="width: 30%">成分名</th>
                                        <th style="width: 60%">コメント</th>
                                        <th style="width: 10%"></th>
                                </tr>
                                
                        @foreach ($components as $component)
                                
                                <tr class ="component_box">
                                        <td>{{$component->component}}</td>
                                        <td>{{$component->component_comment}}</td>
                                        <td><a href="{{route('components.edit', [$component->id])}}">[編集]</a></td>
                                </tr>
                        @endforeach
                        </table>
                        <div style="height: 100px"></div>
                </div>
             
        @endsection
</div>
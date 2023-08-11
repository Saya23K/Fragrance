<div class="body">
        @extends('layouts.admin')
                
        @section('content')
                <div class="col-md-8 mx-auto">
                        <h2>登録成分一覧</h2>
                        
                        <a href="{{ url('admin/components/create') }}">新規登録</a>
                        
                        <table>
                                <tr>
                                        <th>  ID  </th>
                                        <th>成分名</th>
                                        <th>コメント</th>
                                </tr>
                                
                        @foreach ($components as $component)
                                <tr>
                                        <td>{{$component->id}}</td>
                                        <td>{{$component->component}}</td>
                                        <td>{{$component->component_comment}}</td>
                                        <td><a href="{{route('components.edit', [$component->id])}}">[編集]</a></td>
                                </tr>
                        @endforeach
                        </table>
                </div>
             
        @endsection
</div>
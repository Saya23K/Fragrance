@extends('layouts.admin')
        
@section('content')
 
        
        <div class="container">
                
                <!--<div class="col-md-8 mx-auto">-->
                <!--         <div class="contents d-flex align-items-center justyfy-content-center">-->
                        <table align="center">
                                <tr>
                                        <th><a href="{{ url('/admin/fragrances/') }}"><img src="{{ asset('storage/image/FragranceMaster.png')}}" width="100%" height="auto" alt="登録香水一覧"></a></th>
                                
                                <th><a href="{{ url('/admin/components/') }}"><img src="{{ asset('storage/image/ComponentMaster.png')}}" width="100%" height="auto" alt="成分マスター"></a></th>
                         
                               <th><a href="{{ url('/admin/brands/') }}"><img src="{{ asset('storage/image/BrandMaster.png')}}" width="100%" height="auto" alt="ブランドマスター"></a></th>
                               </tr>
                        </div>
                </div>

        
        </div>

@endsection
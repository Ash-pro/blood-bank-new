@extends('layouts.dashboard.app')

@section('content')
    <div class="app-title">
        <div>
            @if(isset($role)  )
                <h1>
                    <i class="fa fa-edit">
                        {{ __('site.UpdateRole')}}
                    </i>
               </h1>
            @else
                <h1>
                    <i class="fa fa-plus">
                      {{__('site.AddRole') }}
                    </i>
                </h1>
            @endif

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-list"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">{{__('site.Dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.roles.index')}}">{{__('site.Role')}}</a></li>
            @if(isset($role))
                <li class="breadcrumb-item">{{__('site.UpdateRole')}}</li>
            @else
                <li class="breadcrumb-item">{{__('site.AddRole')}}</li>
            @endif
        </ul>
    </div>

    <div class="tile mb-4">
        <div class="row">
            <div class="col-md-12">
             <form action="{{isset($role)?route('dashboard.roles.update',$role->id):route('dashboard.roles.store')}}" method="post">
                 @csrf
                 @if(isset($role))
                     @method('put')
                 @else
                     @method('post')
                 @endif

                 @include('dashboard.partials._errors')

                 <div class="form-group">
                     <label>{{__('site.name')}} :</label>
                     <input type="text" name="name" class="form-control" value="{{isset($role)?$role->name:""}}">
                 </div>

                 <div class="form-group">
                     <h4>Permission</h4>

                     <table class="table table-hover">
                         <thead>
                            <tr>
                                <th>#</th>
                                <th>Model</th>
                                <th>Permission</th>
                            </tr>
                         </thead>
                        <tbody>

                        @php
                            $models = ['users','categories','roles','settings','consultation_requests' ,'advertisement' ,'advertisementItem'];
                        @endphp

                        @foreach( $models as $index=>$model )
                            <tr>
                                <td width="10%">{{$index+1}}</td>
                                <td width="20%">{{ucfirst($model)}}</td>
                                <td width="100%">
                                    @php
                                       $permission_maps = ['create','read','update','delete'];
                                    @endphp

                                        <select name="permissions[]"  class="form-control select2" multiple>
                                            @foreach( $permission_maps as $permission_map )
                                                @if( isset($role) )
                                                    <option
                                                        value="{{$permission_map . '_' . $model}} "
                                                        {{$role->hasPermission($permission_map . '_' . $model)?'selected':''}}
                                                    >
                                                        {{ $permission_map}}
                                                    </option>
                                                @else
                                                    <option value="{{$permission_map . '_' . $model}}">{{ $permission_map}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                     </table>
                 </div>

                 <div class="form-group">
                     <button type="submit" class="btn btn-primary">
                         @if( isset($role) )
                             <i class="fa fa-edit"></i>
                             {{__('site.Update')}}
                         @else
                             <i class="fa fa-plus"></i>
                             {{__('site.Add')}}
                         @endif

                     </button>
                 </div>
             </form>

            </div>{{-- end-of-col-12 --}}
        </div>{{--end-of-row--}}


    </div>{{--end-of-tile mb-4--}}


@endsection

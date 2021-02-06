@extends('layouts.dashboard.app')

@section('content')
    <div class="app-title">
        <div>
            @if(isset($user))
                <h1>
                    <i class="fa fa-edit">
                        {{ __('site.UpdateUser')}}
                    </i>
               </h1>
            @else
                <h1>
                    <i class="fa fa-plus">
                      {{__('site.AddUser') }}
                    </i>
                </h1>
            @endif

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-list"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">{{__('site.Dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.users.index')}}">{{__('site.Category')}}</a></li>
            @if(isset($user))
                <li class="breadcrumb-item">{{__('site.UpdateUser')}}</li>
            @else
                <li class="breadcrumb-item">{{__('site.AddUser')}}</li>
            @endif
        </ul>
    </div>

    <div class="tile mb-4">
        <div class="row">
            <div class="col-md-12">
             <form action="{{isset($user)?route('dashboard.users.update',$user->id):route('dashboard.users.store')}}" method="post">
                 @csrf
                 @if(isset($user))
                     @method('put')
                 @else
                     @method('post')
                 @endif

                 @include('dashboard.partials._errors')
                {{-- name --}}
                 <div class="form-group">
                     <label>{{__('site.name')}} :</label>
                     <input type="text" name="name" class="form-control" value="{{isset($user)?$user->name:""}}">
                 </div>

                 {{-- email --}}
                 <div class="form-group">
                     <label>{{__('site.email')}} :</label>
                     <input type="email" name="email" class="form-control" value="{{isset($user)?$user->email:""}}">
                 </div>
                 @if( !isset($user) )
                     {{-- password --}}
                     <div class="form-group">
                         <label>{{__('site.password')}} :</label>
                         <input type="password" name="password" class="form-control">
                     </div>

                     {{-- confirm Password --}}
                     <div class="form-group">
                         <label>{{__('site.confirm_password')}} :</label>
                         <input type="password" name="password_confirmation" class="form-control">
                     </div>
                 @endif


                     {{-- image --}}
                 <div class="form-group">
                     <label>{{__('site.image')}} :</label>
                     <input type="file" name="image" class="form-control">
                 </div>

                {{-- Role --}}
                 <div class="form-group">
                     <label>{{__('site.Role')}} :</label>
                     <select name="role_id" class="form-control">

                         @if( isset($user) )

                             @foreach( $roles as $role )
                                 <option
                                     value="{{$role->id}}"
                                     {{$user->hasRole($role->name) ? 'selected': ''}}
                                 >
                                     {{ $role->name }}
                                 </option>
                             @endforeach
                         @else
                            @foreach( $roles as $role )
                                 <option value="{{$role->id}}"> {{ lcfirst($role->name) }}</option>
                             @endforeach
                         @endif

                     </select>
                     {{-- make new Role --}}
                     <a href="{{route('dashboard.roles.create')}}" ><b>Create New Role</b>  </a>
                 </div>

                 <div class="form-group">
                     @if(auth()->user()->hasPermission('create_users'))
                         <button type="submit" class="btn btn-primary">
                             @if( isset($user) )
                                 <i class="fa fa-edit"></i>
                                 {{__('site.Update')}}
                             @else
                                 <i class="fa fa-plus"></i>
                                 {{__('site.Add')}}
                             @endif

                         </button>
                     @else
                         @if( isset($user) )
                            <a href="#" disabled class="btn btn-primary"><i class="fa fa-edit">{{__('site.Update')}}</i></a>
                         @else
                            <a href="#" disabled class="btn btn-primary"><i class="fa fa-edit">{{__('site.Add')}}</i></a>

                         @endif
                     @endif

                 </div>
             </form>

            </div>{{-- end-of-col-12 --}}
        </div>{{--end-of-row--}}


    </div>{{--end-of-tile mb-4--}}


@endsection

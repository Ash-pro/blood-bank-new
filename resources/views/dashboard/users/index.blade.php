@extends('layouts.dashboard.app')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-list"></i> {{ __('site.Users')}}</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">{{ __('site.Dashboard')}} </a></li>
            <li class="breadcrumb-item">{{ __('site.Users')}}</li>
        </ul>
    </div>

    <div class="tile mb-4">
        <div class="row">
            <div class="col-md-12">
                {{-- this form for Search button                --}}
                <form action="" >
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="search" autofocus class="form-control" placeholder="Search" value="{{request()->search}}">
                            </div>
                        </div>{{-- end-of-col-4 --}}

                        <div class="col-md-4">
                            {{-- Select of  --}}
                             <div class="form-group">
                                 <select name="role_id" class="form-control">
                                     <option value="">{{__('site.All Role')}}</option>
                                      @foreach( $roles as $role )
                                         <option
                                             value="{{$role->id}}"
                                             {{request()->role_id == $role->id ?'selected':''}}
                                         > {{ $role->name }}</option>
                                    @endforeach
                                 </select>
                             </div>
                        </div>{{-- end-of-col-4 --}}

                        <div class="col-md-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
                                @if(auth()->user()->hasPermission('create_users'))
                                    <a href="{{route('dashboard.users.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                                @else
                                    <a href="#" disabled="" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                                @endif
                            </div>
                        </div>{{-- end-of-col-4 --}}


                    </div>{{-- end-of-row --}}
                </form>{{-- end-of-form --}}

            </div>{{-- end-of-col-12 --}}
        </div>{{--end-of-row--}}

        <div class="row">
            <div class="col-md-12">
                @if($users->count() > 0 )
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('site.name')}}</th>
                            <th>{{__('site.email')}}</th>
                            <th>{{__('site.Role')}}</th>
                            <th>{{__('site.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $index=>$user)
                            <tr>
                                <td>{{++$index}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @foreach( $user->roles as $role )
                                     <span style="display: inline-block" class="badge badge-primary">{{$role->name}}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @if(auth()->user()->hasPermission('update_users'))
                                        <a href="{{route('dashboard.users.edit', $user->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit">Edit</i></a>
                                    @else
                                        <a href="#" disabled="" class="btn btn-warning btn-sm"><i class="fa fa-edit">Edit</i></a>
                                    @endif

                                    @if(auth()->user()->hasPermission('delete_users'))
                                        <form action="{{route('dashboard.users.destroy', $user->id)}}" method="post" style="display: inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>Delete</button>
                                        </form>
                                    @else
                                        <a href="#" disabled class="btn btn-danger btn-sm"><i class="fa fa-edit">Delete</i></a>
                                    @endif


                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                    {{$users->appends(request()->query())->links()}}
                @else
                    <h3 style="font-weight: 400; text-align: center"> No Record Found</h3>
                @endif
            </div>
        </div>
    </div>{{--end-of-tile mb-4--}}


@endsection

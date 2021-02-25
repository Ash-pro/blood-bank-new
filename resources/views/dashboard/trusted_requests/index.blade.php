@extends('layouts.dashboard.app')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-list text-capitalize"></i> {{__('site.Trusted_Request')}} </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">{{__('site.Dashboard')}}</a></li>
            <li class="breadcrumb-item text-capitalize"> {{__('site.Trusted_Request')}}</li>
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
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
{{--                                @if($trusted_requests->count()  == 1)--}}
{{--                                    @foreach( $trusted_requests as $trusted_request )--}}
{{--                                        @if(auth()->user()->hasPermission('create_trusted_requests'))--}}
{{--                                            <a href="{{route('dashboard.categories.edit', $trusted_request->id)}}" class="btn btn-warning" ><i class="fa fa-edit">{{__('site.Edit')}}</i></a>--}}
{{--                                        @else--}}
{{--                                            <a href="#" disabled class="btn btn-primary"><i class="fa fa-plus"></i> Update</a>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                @else--}}
                                    @if(auth()->user()->hasPermission('create_trusted_requests'))
                                        <a href="{{route('dashboard.trusted_requests.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                                    @else
                                        <a href="#" disabled class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                                    @endif
{{--                                @endif--}}
                            </div>
                        </div>{{-- end-of-col-4 --}}


                    </div>{{-- end-of-row --}}
                </form>{{-- end-of-form --}}

            </div>{{-- end-of-col-12 --}}
        </div>{{--end-of-row--}}

        <div class="row">
            <div class="col-md-12">
                <hr>
                @if($trusted_requests->count() > 0  )
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('site.name')}}</th>
                            <th>{{__('site.national_id')}}</th>
                            <th>{{__('site.type')}}</th>
                            <th>{{__('site.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($trusted_requests as $index=>$trusted_request)
                            @if($trusted_request->type == 0)
                                @continue;
                            @else
                                <tr>
                                    <td>{{++$index}}</td>
                                    <td>
                                        @foreach( $donation_requests as $donation_request )
                                            @if($trusted_request->national_id == $donation_request->national_id){{$donation_request->full_name}} @endif
                                        @endforeach
                                    </td>
                                    <td>{{$trusted_request->national_id}}</td>
                                    <td class="text-capitalize">
                                            <span style="display: inline-block" class="badge badge-success">real</span>
                                    <td>
                                        {{--Edit buttom--}}
                                        @if(auth()->user()->hasPermission('update_trusted_requests'))
                                            <a href="{{route('dashboard.trusted_requests.edit', $trusted_request->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit">{{__('site.edit')}}</i></a>
                                        @else
                                            <a href="#" disabled="" class="btn btn-warning btn-sm"><i class="fa fa-edit">{{__('site.Edit')}}</i></a>
                                        @endif

                                        {{--Delete buttom--}}
                                        @if(auth()->user()->hasPermission('delete_trusted_requests'))
                                            <form action="{{route('dashboard.trusted_requests.destroy', $trusted_request->id)}}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>{{__('site.Delete')}}</button>
                                            </form>
                                        @else
                                            <a href="#" disabled="" class="btn btn-danger btn-sm"><i class="fa fa-edit">{{__('site.Delete')}}</i></a>
                                        @endif

                                    </td>
                                </tr>
                            @endif
                        @endforeach

                        </tbody>

                    </table>
                    {{$trusted_requests->appends(request()->query())->links()}}
                @else
                    <h3 style="font-weight: 400; text-align: center"> No Record Found</h3>
                @endif
            </div>
        </div>
    </div>{{--end-of-tile mb-4--}}


@endsection

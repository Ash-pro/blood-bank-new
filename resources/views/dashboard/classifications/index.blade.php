@extends('layouts.dashboard.app')

@section('content')
    <style>
        .colorHead{
            font-family: "Arial Black";
            color: black;

        }
        .colorItem{
            /*font-family: arial, sans-serif;*/
            color: #010c11;
        }
        .colorNumber{
            color: #ff000d;
            display: inline-block;
        }

    </style>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-list text-capitalize"></i> {{__('site.classifications')}} </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">{{__('site.Dashboard')}}</a></li>
            <li class="breadcrumb-item text-capitalize"> {{__('site.classifications')}}</li>
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
{{--                                @if($classifications->count()  == 1)--}}
{{--                                    @foreach( $classifications as $classification )--}}
{{--                                        @if(auth()->user()->hasPermission('create_classifications'))--}}
{{--                                            <a href="{{route('dashboard.categories.edit', $classification->id)}}" class="btn btn-warning" ><i class="fa fa-edit">{{__('site.Edit')}}</i></a>--}}
{{--                                        @else--}}
{{--                                            <a href="#" disabled class="btn btn-primary"><i class="fa fa-plus"></i> Update</a>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                @else--}}
                                    @if(auth()->user()->hasPermission('create_classifications'))
                                        <a href="{{route('dashboard.classifications.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
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
{{--                <hr>--}}
                @if($classifications->count() > 0 )
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
                        @foreach($classifications as $index=>$classification)
                            <tr>
                                <td>{{++$index}}</td>
                                <td>
                                    @foreach( $donation_requests as $donation_request )
                                       @if($classification->national_id == $donation_request->national_id){{$donation_request->full_name}} @endif
                                    @endforeach
                                </td>
                                <td>{{$classification->national_id}}</td>
                                <td class="text-capitalize">
                                    @if($classification->type == 0)
                                        <span style="display: inline-block" class="badge badge-danger">fake</span>
                                    @else
                                        <span style="display: inline-block" class="badge badge-success">real</span>
                                    @endif
                                <td>
                                    {{--Edit buttom--}}
                                    @if(auth()->user()->hasPermission('update_classifications'))
                                        <a href="{{route('dashboard.classifications.edit', $classification->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit">{{__('site.edit')}}</i></a>
                                    @else
                                        <a href="#" disabled="" class="btn btn-warning btn-sm"><i class="fa fa-edit">{{__('site.Edit')}}</i></a>
                                    @endif

                                    {{--Delete buttom--}}
                                    @if(auth()->user()->hasPermission('delete_classifications'))
                                        <form action="{{route('dashboard.classifications.destroy', $classification->id)}}" method="post" style="display: inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>{{__('site.Delete')}}</button>
                                        </form>
                                    @else
                                        <a href="#" disabled="" class="btn btn-danger btn-sm"><i class="fa fa-edit">{{__('site.Delete')}}</i></a>
                                    @endif

                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                    {{$classifications->appends(request()->query())->links()}}
                @else
                    <h3 style="font-weight: 400; text-align: center"> No Record Found</h3>
                @endif
            </div>
        </div>
    </div>{{--end-of-tile mb-4--}}

{{--    --}}{{--    card--}}
{{--    <div class="card text-white bg-white mb-3">--}}
{{--        <div class="card-header colorHead">Statistic</div>--}}
{{--        <div class="card-body colorItem">--}}
{{--            <h5 class="card-title"> All Request: [  <p class="colorNumber" > {{$classifications->count()}} </p>  ]</h5>--}}
{{--            <h5 class="card-title">Number of Fake Request:  [ <p class="colorNumber" > {{$classification_Real_Request}}  </p> ]--}}
{{--            </h5>--}}
{{--            <h5 class="card-title">Number of Trusted Request:  [ <p class="colorNumber" >{{$classification_fake_Request}} </p> ]--}}
{{--            </h5>--}}
{{--        </div>--}}
{{--    </div>--}}


    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>All Request</h4>
                    <p><b class="colorNumber" >{{$classifications->count()}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Fake Request</h4>
                    <p><b class="colorNumber" >{{$classification_fake_Request}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-star fa-3x"></i>
                <div class="info">
                    <h4>Trusted Request</h4>
                    <p><b class="colorNumber" >{{$classification_Real_Request}}</b></p>
                </div>
            </div>
        </div>
    </div>


@endsection

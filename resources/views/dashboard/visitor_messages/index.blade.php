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
            <h1><i class="fa fa-list text-capitalize"></i> {{__('site.visitor_messages')}} </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">{{__('site.Dashboard')}}</a></li>
            <li class="breadcrumb-item text-capitalize"> {{__('site.visitor_messages')}}</li>
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
{{--                                    @if(auth()->user()->hasPermission('create_visitor_messages'))--}}
{{--                                        <a href="{{route('dashboard.visitor_messages.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>--}}
{{--                                    @else--}}
{{--                                        <a href="#" disabled class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>--}}
{{--                                    @endif--}}
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
                @if($visitor_messages->count() > 0 )
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('site.name')}}</th>
                            <th>{{__('site.email')}}</th>
                            <th>{{__('site.phone_number')}}</th>
                            <th>{{__('site.messages')}}</th>
                            <th>{{__('site.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($visitor_messages as $index=>$visitor_message)
                            <tr>
                                <td>{{++$index}}</td>
                                <td>{{$visitor_message->name}}</td>
                                <td>{{$visitor_message->email}}</td>
                                <td>{{$visitor_message->phone_number}}</td>
                                <td> {{\Illuminate\Support\Str::limit($visitor_message->messages, 100)}} </td>
                                <td>
{{--                                    --}}{{--Edit buttom--}}
{{--                                    @if(auth()->user()->hasPermission('update_visitor_messages'))--}}
{{--                                        <a href="{{route('dashboard.visitor_messages.edit', $visitor_message->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit">{{__('site.edit')}}</i></a>--}}
{{--                                    @else--}}
{{--                                        <a href="#" disabled="" class="btn btn-warning btn-sm"><i class="fa fa-edit">{{__('site.Edit')}}</i></a>--}}
{{--                                    @endif--}}

                                    {{--Delete buttom--}}
                                    @if(auth()->user()->hasPermission('delete_visitor_messages'))
                                        <form action="{{route('dashboard.visitor_messages.destroy', $visitor_message->id)}}" method="post" style="display: inline-block">
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
                    {{$visitor_messages->appends(request()->query())->links()}}
                @else
                    <h3 style="font-weight: 400; text-align: center"> No Record Found</h3>
                @endif
            </div>
        </div>
    </div>{{--end-of-tile mb-4--}}



@endsection

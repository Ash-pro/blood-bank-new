@extends('layouts.dashboard.app')

<style>

    .rowDes{

       height: 150px;
        width: 350px;
    }
    .rowDes2{
        height: 150px;
        width: 200px;
    }


</style>


@section('content')
    <div class="app-title">
        <div>
                <h1><i class="fa fa-list"></i> {{__('site.Who Are We')}} </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item"> {{__('site.Who Are We')}}</li>
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
                                @if($WhoAreWes->count()  == 1)
                                    @foreach( $WhoAreWes as $WhoAreWe )
                                        @if(auth()->user()->hasPermission('create_WhoAreWe'))
                                            <a href="{{route('dashboard.WhoAreWes.edit', $WhoAreWe->id)}}" class="btn btn-warning btn-lg" ><i class="fa fa-edit">{{__('site.Edit')}}</i></a>
{{--                                            <form action="{{route('dashboard.WhoAreWes.destroy', $WhoAreWe->id)}}" method="post" style="display: inline-block">--}}
{{--                                                @csrf--}}
{{--                                                @method('delete')--}}
{{--                                                <button type="submit" class="btn btn-danger delete"><i class="fa fa-trash"></i>{{__('site.Delete')}}</button>--}}
{{--                                            </form>--}}
                                        @else
                                            <a href="#" disabled class="btn btn-primary"><i class="fa fa-plus"></i> Update</a>
                                        @endif

{{--    --}}{{--                                Delete    --}}
{{--                                        @if(auth()->user()->hasPermission('delete_WhoAreWe'))--}}
{{--                                            <form action="{{route('dashboard.WhoAreWes.destroy', $WhoAreWe->id)}}" method="post" style="display: inline-block">--}}
{{--                                                @csrf--}}
{{--                                                @method('delete')--}}
{{--                                                <button type="submit" class="btn btn-danger delete"><i class="fa fa-trash"></i>{{__('site.Delete')}}</button>--}}
{{--                                            </form>--}}
{{--                                        @else--}}
{{--                                          <a href="#" disabled="" class="btn btn-danger"><i class="fa fa-edit">{{__('site.Delete')}}</i></a>--}}
{{--                                        @endif--}}
                                    @endforeach
                                @else
                                    @if(auth()->user()->hasPermission('create_advertisement'))
                                        <a href="{{route('dashboard.WhoAreWes.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                                    @else
                                        <a href="#" disabled class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                                    @endif
                                @endif

{{--                                Delete buttom--}}

                            </div>
                        </div>{{-- end-of-col-4 --}}


                    </div>{{-- end-of-row --}}
                </form>{{-- end-of-form --}}

            </div>{{-- end-of-col-12 --}}
        </div>{{--end-of-row--}}

        <div class="row">
            <div class="col-md-12">
                <hr>
                @if($WhoAreWes->count() > 0 )
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="30px">#</th>
                            <th>{{__('site.General Description')}}</th>
                            <th>{{__('site.Teams Description')}}</th>
                             <th>{{__('site.Youtube Link')}}</th>
{{--                             <th>{{__('site.photo_1')}}</th>--}}
{{--                             <th>{{__('site.photo_2')}}</th>--}}
{{--                            <th>{{__('site.action')}}</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($WhoAreWes as $index=>$WhoAreWe)
                            <tr>
                                <td>{{++$index}}</td>
                                <td class="rowDes"> {{\Illuminate\Support\Str::limit($WhoAreWe->general_description, 100)}} </td>
                                <td class="rowDes"> {{\Illuminate\Support\Str::limit($WhoAreWe->team_description, 50)}} </td>
                                <td class="rowDes2"> {{\Illuminate\Support\Str::limit($WhoAreWe->youtube_link, 50)}} </td>
                                <td>
{{--                                    Edit buttom--}}
                                    @if(auth()->user()->hasPermission('update_WhoAreWe'))
                                        <a href="{{route('dashboard.WhoAreWes.edit', $WhoAreWe->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit">Edit</i></a>
                                    @else
                                        <a href="#" disabled="" class="btn btn-warning btn-lg"><i class="fa fa-edit">{{__('site.Edit')}}</i></a>
                                    @endif

{{--                                    Delete buttom--}}
                                    @if(auth()->user()->hasPermission('delete_WhoAreWe'))
                                        <form action="{{route('dashboard.WhoAreWes.destroy', $WhoAreWe->id)}}" method="post" style="display: inline-block">
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
                    {{$WhoAreWes->appends(request()->query())->links()}}
                @else
                    <h3 style="font-weight: 400; text-align: center"> No Record Found</h3>
                @endif
            </div>
        </div>


    </div>{{--end-of-tile mb-4--}}

    <div class="tile mb-4">
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    @if($WhoAreWes->count() > 0 )
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('site.Photo 1')}}</th>
                                <th>{{__('site.Photo 2')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($WhoAreWes as $index=>$WhoAreWe)
                                <tr>
                                    <td>{{++$index}}</td>
                                    <td><img width="100px" height="100px" src="{{asset('storage/'.$WhoAreWe->photo1)}}" alt="">  </td>
                                    <td><img width="100px" height="100px" src="{{asset('storage/'.$WhoAreWe->photo2)}}" alt=""></td>
    {{--                                    <td>--}}
    {{--                                        --}}{{--Edit buttom--}}
    {{--                                        @if(auth()->user()->hasPermission('update_contact_us'))--}}
    {{--                                            <a href="{{route('dashboard.contact_us.edit', $WhoAreWe->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit">Edit</i></a>--}}
    {{--                                        @else--}}
    {{--                                            <a href="#" disabled="" class="btn btn-warning btn-sm"><i class="fa fa-edit">{{__('site.Edit')}}</i></a>--}}
    {{--                                        @endif--}}

    {{--                                        --}}{{--Delete buttom--}}
    {{--                                        @if(auth()->user()->hasPermission('delete_contact_us'))--}}
    {{--                                            <form action="{{route('dashboard.contact_us.destroy', $WhoAreWe->id)}}" method="post" style="display: inline-block">--}}
    {{--                                                @csrf--}}
    {{--                                                @method('delete')--}}
    {{--                                                <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>{{__('site.Delete')}}</button>--}}
    {{--                                            </form>--}}
    {{--                                        @else--}}
    {{--                                            <a href="#" disabled="" class="btn btn-danger btn-sm"><i class="fa fa-edit">{{__('site.Delete')}}</i></a>--}}
    {{--                                        @endif--}}

    {{--                                    </td>--}}
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                        {{$WhoAreWes->appends(request()->query())->links()}}
                    @else
                        <h3 style="font-weight: 400; text-align: center"> No Record Found</h3>
                    @endif
                </div>
            </div>
            {{--end-of-row--}}


    </div>{{--end-of-tile mb-4--}}




@endsection

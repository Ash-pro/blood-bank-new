@extends('layouts.dashboard.app')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-list"></i> {{__('site.Request Donations')}} </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item"> {{__('site.Request Donations')}}</li>
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
                                {{-- Select of  --}}
                                 <div class="form-group">
                                     <label>{{__('site.Search')}} :</label>
                                     <select name="search" class="form-control">
                                         <option value="0"> select blood type</option>
                                     @foreach( $categories as $category )
                                             <option value="{{$category->id}}"> {{ $category->category_name }}</option>
                                     @endforeach
                                     </select>
                                 </div>
                                <input type="text" name="search2" autofocus class="form-control" placeholder="Search by city" value="{{request()->search2}}">

                            </div>
                        </div>{{-- end-of-col-4 --}}


                        <div class="col-md-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
{{--                                @if($blood_donations->count()  == 1)--}}
{{--                                    @foreach( $blood_donations as $blood_donation )--}}
{{--                                        @if(auth()->user()->hasPermission('create_blood_donations'))--}}
{{--                                            <a href="{{route('dashboard.blood_donations.edit', $blood_donation->id)}}" class="btn btn-warning" ><i class="fa fa-edit">{{__('site.Edit')}}</i></a>--}}
{{--                                        @else--}}
{{--                                            <a href="#" disabled class="btn btn-primary"><i class="fa fa-plus"></i> Update</a>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                @else--}}
                                    @if(auth()->user()->hasPermission('create_blood_donations'))

                                        <a href="{{route('dashboard.blood_donations.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                                    @else
                                        <a href="#" disabled class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                                    @endif
                                @if(auth()->user()->hasPermission('create_print'))
                                    <button  class="btn btn-primary" onclick="window.print()">Print this page</button>
                                @endif
{{--                                @endif--}}
                            </div>

                        </div>{{-- end-of-col-4 --}}


                    </div>{{-- end-of-row --}}
                </form>{{-- end-of-form --}}

{{--                <form action="" >--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-4">--}}
{{--                            <div class="form-group">--}}
{{--                            <input type="text" name="search2" autofocus class="form-control" placeholder="Search" value="{{request()->search2}}">--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    </form>--}}


            </div>{{-- end-of-col-12 --}}
        </div>{{--end-of-row--}}

        <div class="row">
            <div class="col-md-12">
                <hr>
                @if($blood_donations->count() > 0 )
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-capitalize">{{__('site.national_id')}}</th>
                            <th class="text-capitalize">{{__('site.full_name')}}</th>
                            <th class="text-capitalize">{{__('site.unit_number')}}</th>
                            <th class="text-capitalize">{{__('site.province_name')}}</th>
                            <th class="text-capitalize">{{__('site.blood_type')}}</th>
                            @if(auth()->user()->hasRole('super_admin'))
                            <th class="text-capitalize">{{__('site.Active')}}</th>
                            @endif
                            <th class="text-capitalize text-center">{{__('site.Action')}}</th>
                        </tr>
                        </thead>
                        @if(!auth()->user()->hasRole('super_admin'))
                            <div style="text-align: center; color: red">
                                أي طلب سوف تقوم بارساله لن يضاف الى القائمة الى بعد تأكيده من إدارة الموقع
                            </div>
                        @endif
                        <tbody>
                        @foreach($blood_donations as $index=>$blood_donation)
                            @if(auth()->user()->hasRole('super_admin'))
                                <tr>
                                    <td>{{++$index}}</td>
                                    <td> {{$blood_donation->national_id}}</td>
                                    {{--                                <td> {{\Illuminate\Support\Str::limit($blood_donation->category_name, 100)}} </td>--}}

                                    <td> {{$blood_donation->full_name}}</td>
                                    <td>{{$blood_donation->unit_number}}</td>
                                    <td>{{$blood_donation->province_name}}</td>
                                    <td>
                                        @foreach($categories as $category)
                                            @if($blood_donation->blood_type == $category->id )
                                                {{$category->category_name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$blood_donation->active}}</td>
                                    <td class=" text-center">
                                        {{--show buttom--}}
                                        @if(auth()->user()->hasPermission('read_blood_donations'))
                                            <a href="{{route('dashboard.blood_donations.show', $blood_donation->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit">{{__('site.show')}}</i></a>
                                        @else
                                            <a href="#" disabled="" class="btn btn-warning btn-sm"><i class="fa fa-edit">{{__('site.Edit')}}</i></a>
                                        @endif
                                        {{--Edit buttom--}}
                                        @if(auth()->user()->hasPermission('update_blood_donations') && auth()->user()->hasPermission('read_dashboard') )
                                            <a href="{{route('dashboard.blood_donations.edit', $blood_donation->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit">{{__('site.edit')}}</i></a>
                                            {{--                                    @elseif(auth()->user()->hasPermission('update_dashboard'))--}}
                                            {{--                                        <a href="#" disabled="" class="btn btn-warning btn-sm"><i class="fa fa-edit">{{__('site.Edit')}}</i></a>--}}
                                        @else

                                        @endif

                                        {{--Delete buttom--}}
                                        @if(auth()->user()->hasPermission('delete_blood_donations') && auth()->user()->hasPermission('read_dashboard'))
                                            <form action="{{route('dashboard.blood_donations.destroy', $blood_donation->id)}}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>{{__('site.Delete')}}</button>
                                            </form>
                                            {{--                                    @elseif(auth()->user()->hasPermission('delete_dashboard'))--}}
                                            {{--                                        <a href="#" disabled="" class="btn btn-danger btn-sm"><i class="fa fa-edit">{{__('site.Delete')}}</i></a>--}}
                                        @else

                                        @endif

                                    </td>
                                </tr>
                            @elseif($blood_donation->active == 1)
                                <tr>
                                    <td>{{++$index}}</td>
                                    <td> {{$blood_donation->national_id}}</td>
                                    {{--                                <td> {{\Illuminate\Support\Str::limit($blood_donation->category_name, 100)}} </td>--}}

                                    <td> {{$blood_donation->full_name}}</td>
                                    <td>{{$blood_donation->unit_number}}</td>
                                    <td>{{$blood_donation->province_name}}</td>
                                    <td>
                                        @foreach($categories as $category)
                                            @if($blood_donation->blood_type == $category->id )
                                                {{$category->category_name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    @if(auth()->user()->hasRole('super_admin'))
                                    <td>{{$blood_donation->active}}</td>
                                    @endif

                                    <td class=" text-center">
                                        {{--show buttom--}}
                                        @if(auth()->user()->hasPermission('read_blood_donations'))
                                            <a href="{{route('dashboard.blood_donations.show', $blood_donation->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit">{{__('site.show')}}</i></a>
                                        @else
                                            <a href="#" disabled="" class="btn btn-warning btn-sm"><i class="fa fa-edit">{{__('site.Edit')}}</i></a>
                                        @endif
                                        {{--Edit buttom--}}
                                        @if(auth()->user()->hasPermission('update_blood_donations') && auth()->user()->hasPermission('read_dashboard') )
                                            <a href="{{route('dashboard.blood_donations.edit', $blood_donation->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit">{{__('site.edit')}}</i></a>
                                            {{--                                    @elseif(auth()->user()->hasPermission('update_dashboard'))--}}
                                            {{--                                        <a href="#" disabled="" class="btn btn-warning btn-sm"><i class="fa fa-edit">{{__('site.Edit')}}</i></a>--}}
                                        @else

                                        @endif

                                        {{--Delete buttom--}}
                                        @if(auth()->user()->hasPermission('delete_blood_donations') && auth()->user()->hasPermission('read_dashboard'))
                                            <form action="{{route('dashboard.blood_donations.destroy', $blood_donation->id)}}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i>{{__('site.Delete')}}</button>
                                            </form>
                                            {{--                                    @elseif(auth()->user()->hasPermission('delete_dashboard'))--}}
                                            {{--                                        <a href="#" disabled="" class="btn btn-danger btn-sm"><i class="fa fa-edit">{{__('site.Delete')}}</i></a>--}}
                                        @else

                                        @endif

                                    </td>
                                </tr>
                            @endif
                        @endforeach
{{--                            <h3 style="font-weight: 400; text-align: center"> No Request Accepted yet</h3>--}}

                        </tbody>

                    </table>
                    {{$blood_donations->appends(request()->query())->links()}}
                @else
                    <h3 style="font-weight: 400; text-align: center"> No Record Found</h3>
                @endif
            </div>
        </div>
    </div>{{--end-of-tile mb-4--}}


@endsection

@extends('layouts.dashboard.app')

@section('content')
    <div class="app-title">
        <div>
                <h1><i class="fa fa-list"></i> {{__('site.Contact Us')}} </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">Dashboard</a></li>
            <li class="breadcrumb-item"> {{__('site.Contact Us')}}</li>
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
                                @if($contact_us->count()  == 1)
                                    @foreach( $contact_us as $contact )
                                        @if(auth()->user()->hasPermission('create_contact_us'))
                                            <a href="{{route('dashboard.contact_us.edit', $contact->id)}}" class="btn btn-warning" ><i class="fa fa-edit">{{__('site.Edit')}}</i></a>
                                        @else
                                            <a href="#" disabled class="btn btn-primary"><i class="fa fa-plus"></i> Update</a>
                                        @endif
                                    @endforeach
                                @else
                                    @if(auth()->user()->hasPermission('create_contact_us'))
                                        <a href="{{route('dashboard.contact_us.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                                    @else
                                        <a href="#" disabled class="btn btn-primary"><i class="fa fa-plus"></i> Add</a>
                                    @endif
                                @endif
                            </div>
                        </div>{{-- end-of-col-4 --}}


                    </div>{{-- end-of-row --}}
                </form>{{-- end-of-form --}}

            </div>{{-- end-of-col-12 --}}
        </div>{{--end-of-row--}}

        <div class="row">
            <div class="col-md-12">
                <hr>
                @if($contact_us->count() > 0 )
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('site.Contact description')}}</th>
                            <th>{{__('site.address')}}</th>
                            <th>{{__('site.mail1')}}</th>
                            <th>{{__('site.mail2')}}</th>
                            <th>{{__('site.callUs1')}}</th>
                            <th>{{__('site.callUs2')}}</th>
                            <th>{{__('site.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contact_us as $index=>$contact)
                            <tr>
                                <td>{{++$index}}</td>
                                <td style="width: 200px"> {{\Illuminate\Support\Str::limit($contact->contact_description, 100)}} </td>
                                <td> {{$contact->address}} </td>
                                <td> {{$contact->mail1}} </td>
                                <td> {{$contact->mail2}} </td>
                                <td> {{$contact->callUs1}} </td>
                                <td> {{$contact->callUs2}} </td>
                                <td>
                                    {{--Edit buttom--}}
                                    @if(auth()->user()->hasPermission('update_contact_us'))
                                        <a href="{{route('dashboard.contact_us.edit', $contact->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit">Edit</i></a>
                                    @else
                                        <a href="#" disabled="" class="btn btn-warning btn-sm"><i class="fa fa-edit">{{__('site.Edit')}}</i></a>
                                    @endif

                                    {{--Delete buttom--}}
                                    @if(auth()->user()->hasPermission('delete_contact_us'))
                                        <form action="{{route('dashboard.contact_us.destroy', $contact->id)}}" method="post" style="display: inline-block">
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
                    {{$contact_us->appends(request()->query())->links()}}
                @else
                    <h3 style="font-weight: 400; text-align: center"> No Record Found</h3>
                @endif
            </div>
        </div>
    </div>{{--end-of-tile mb-4--}}


@endsection

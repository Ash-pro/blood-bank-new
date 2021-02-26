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
{{--                <form action="{{isset($blood_donation)?route('dashboard.blood_donations.index',$blood_donation->id):route('dashboard.blood_donations.store')}}" method="post">--}}
                    @csrf
                    @if(isset($blood_donation))
{{--                        @method('put')--}}
                    @else
                        @method('post')
                    @endif

                    @include('dashboard.partials._errors')

                    <div class="form-group">
                        <label class="text-capitalize">{{__('site.full_name')}} :</label>
                        <input type="text" name="full_name" class="form-control" value="{{isset($blood_donation)?$blood_donation->full_name:""}}" disabled>
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize">{{__('site.national_id')}} :</label>
                        {{--                     <textarea name="national_id" cols="30" rows="10"  class="form-control">{{isset($blood_donation)?$blood_donation->national_id:""}}</textarea>--}}
                        <input type="text" name="national_id" class="form-control" value="{{isset($blood_donation)?$blood_donation->national_id:""}}" disabled>
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize">{{__('site.birthday_date')}} :</label>
                        <input type="date" name="birthday_date" class="form-control" value="{{isset($blood_donation)?$blood_donation->birthday_date:""}}" disabled>
                    </div>

                    {{-- blood_type --}}
                    <div class="form-group">
                        <label class="text-capitalize">{{__('site.blood_type')}} :</label>
                        <select name="blood_type" class="form-control" disabled>

                            @if( isset($blood_donation) )

                                @foreach( $categories as $category )
                                    <option
                                        value="{{$category->id}}"
                                        {{isset($category->category_name) ? 'selected': ''}}
                                    >
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            @else
                                @foreach( $categories as $category )
                                    <option value="{{$category->id}}">{{ $category->category_name }}</option>
                                @endforeach
                            @endif

                        </select>
                    </div>


                    <div class="form-group">
                        <label class="text-capitalize">{{__('site.last_donation_date')}} :</label>
                        <input type="date" name="last_donation_date" class="form-control" value="{{isset($blood_donation)?$blood_donation->last_donation_date:""}}" disabled>
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize">{{__('site.province_name')}} :</label>
                        <input type="text" name="province_name" class="form-control" value="{{isset($blood_donation)?$blood_donation->province_name:""}}" disabled>
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize">{{__('site.region_name')}} :</label>
                        <input type="text" name="region_name" class="form-control" value="{{isset($blood_donation)?$blood_donation->region_name:""}}" disabled>
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize">{{__('site.phone_number')}} :</label>
                        <input type="text" name="phone_number" class="form-control" value="{{isset($blood_donation)?$blood_donation->phone_number:""}}" disabled>
                    </div>
                    <div class="form-group">
                        <label class="text-capitalize">{{__('site.unit_number')}} :</label>
                        <input type="number" name="unit_number" class="form-control" value="{{isset($blood_donation)?$blood_donation->unit_number:""}}" disabled>
                    </div>


                    <div class="form-group">
                        <label class="text-capitalize">{{__('site.messages')}} :</label>
                        <textarea name="messages" cols="30" rows="10"  disabled class="form-control">{{isset($blood_donation)?$blood_donation->messages:""}}</textarea>
                    </div>

{{--                    <div class="form-group">--}}
{{--                        <button type="submit" class="btn btn-primary">--}}
{{--                            @if( isset($blood_donation) )--}}
{{--                                <i class="fa fa-edit"></i>--}}
{{--                                {{__('site.Back')}}--}}
{{--                            @else--}}
{{--                                <i class="fa fa-plus"></i>--}}
{{--                                {{__('site.Add')}}--}}
{{--                            @endif--}}

{{--                        </button>--}}
{{--                    </div>--}}
{{--                </form>--}}
                <div class="form-group">
                    <a class="btn btn-primary form-group" href="{{route('dashboard.blood_donations.index')}}">back</a>
                </div>
            </div>{{-- end-of-col-12 --}}
        </div>{{--end-of-row--}}


    </div>{{--end-of-tile mb-4--}}


@endsection

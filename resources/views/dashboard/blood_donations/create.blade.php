@extends('layouts.dashboard.app')

@section('content')
    <div class="app-title">
        <div>
            @if(isset($blood_donation)  )
                <h1>
                    <i class="fa fa-edit">
                        {{ __('site.Update_Donation_Request')}}
                    </i>
               </h1>
            @else
                <h1>
                    <i class="fa fa-plus">
                      {{__('site.Add_Donation_Request') }}
                    </i>
                </h1>
            @endif

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-list"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">{{__('site.Dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.blood_donations.index')}}">{{__('site.all_donations')}}</a></li>
            @if(isset($blood_donation))
                <li class="breadcrumb-item">{{__('site.Update_Donation_Request')}}</li>
            @else
                <li class="breadcrumb-item">{{__('site.Add_Donation_Request')}}</li>
            @endif
        </ul>
    </div>

    <div class="tile mb-4">
        <div class="row">
            <div class="col-md-12">
             <form action="{{isset($blood_donation)?route('dashboard.blood_donations.update',$blood_donation->id):route('dashboard.blood_donations.store')}}" method="post">
                 @csrf
                 @if(isset($blood_donation))
                     @method('put')
                 @else
                     @method('post')
                 @endif

                 @include('dashboard.partials._errors')

                 <div class="form-group">
                     <label class="text-capitalize">{{__('site.full_name')}} :</label>
                     <input type="text" name="full_name" class="form-control" value="{{isset($blood_donation)?$blood_donation->full_name:""}}">
                 </div>
                 <div class="form-group">
                     <label class="text-capitalize">{{__('site.national_id')}} :</label>
{{--                     <textarea name="national_id" cols="30" rows="10"  class="form-control">{{isset($blood_donation)?$blood_donation->national_id:""}}</textarea>--}}
                     <input type="text" name="national_id" class="form-control" value="{{isset($blood_donation)?$blood_donation->national_id:""}}">
                 </div>
                 <div class="form-group">
                     <label class="text-capitalize">{{__('site.Age')}} :</label>
                     <h6 style="color: red;">your age must be at least 16 years old</h6>
                     <input type="number" name="birthday_date" class="form-control" value="{{isset($blood_donation)?$blood_donation->birthday_date:""}}">
                 </div>

                 {{-- blood_type --}}
                 <div class="form-group">
                     <label class="text-capitalize">{{__('site.blood_type')}} :</label>
                     <select name="blood_type" class="form-control">

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
                     <input type="date" name="last_donation_date" class="form-control" value="{{isset($blood_donation)?$blood_donation->last_donation_date:""}}">
                 </div>

                 {{-- Select of  --}}
                  <div class="form-group">
                      <label>{{__('site.province_name')}} :</label>
                      <select name="province_name" class="form-control">
                              <option value="Jerusalem">Jerusalem </option>
                              <option value="Ramallah">Ramallah</option>
                              <option value="Salfit">Salfit </option>
                              <option value="Hebron">Hebron </option>
                              <option value="Jericho">Jericho </option>
                              <option value="Bethlehem">Bethlehem </option>
                      </select>
                  </div>

                 <div class="form-group">
                     <label class="text-capitalize">{{__('site.region_name')}} :</label>
                     <input type="text" name="region_name" class="form-control" value="{{isset($blood_donation)?$blood_donation->region_name:""}}">
                 </div>
                 <div class="form-group">
                     <label class="text-capitalize">{{__('site.phone_number')}} :</label>
                     <input type="text" name="phone_number" class="form-control" value="{{isset($blood_donation)?$blood_donation->phone_number:""}}">
                 </div>
                 <div class="form-group">
                     <label class="text-capitalize">{{__('site.unit_number')}} :</label>
                     <input type="number" name="unit_number" class="form-control" value="{{isset($blood_donation)?$blood_donation->unit_number:""}}">
                 </div>
                 @if(auth()->user()->hasRole('super_admin'))
                 <div class="form-group">
                     {{-- Select of  --}}
                      <div class="form-group">
                          <label>{{__('site.Active')}} :</label>
                          <select name="active" class="form-control">
                              <option value="1">Appear</option>
                              <option value="0">DisAppear</option>

                          </select>
                      </div>
                 </div>
                 @endif

                 <div class="form-group">
                     <label class="text-capitalize">{{__('site.messages')}} :</label>
                     <textarea name="messages" cols="30" rows="10"  class="form-control">{{isset($blood_donation)?$blood_donation->messages:""}}</textarea>
                 </div>

                 <div class="form-group">
                     <button type="submit" class="btn btn-primary">
                         @if( isset($blood_donation) )
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

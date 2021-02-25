@extends('layouts.dashboard.app')

@section('content')
    <div class="app-title">
        <div>
            @if(isset($classification)  )
                <h1>
                    <i class="fa fa-edit">
                        {{ __('site.Update_classification_request')}}
                    </i>
               </h1>
            @else
                <h1>
                    <i class="fa fa-plus">
                      {{__('site.Add_classification_request') }}
                    </i>
                </h1>
            @endif

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-list"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">{{__('site.Dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.classifications.index')}}">{{__('site.classifications')}}</a></li>
            @if(isset($classification))
                <li class="breadcrumb-item">{{__('site.Update_classification_request')}}</li>
            @else
                <li class="breadcrumb-item">{{__('site.Add_classification_request')}}</li>
            @endif
        </ul>
    </div>

    <div class="tile mb-4">
        <div class="row">
            <div class="col-md-12">
             <form action="{{isset($classification)?route('dashboard.classifications.update',$classification->id):route('dashboard.classifications.store')}}" method="post">
                 @csrf
                 @if(isset($classification))
                     @method('put')
                 @else
                     @method('post')
                 @endif

                 @include('dashboard.partials._errors')

                 {{-- national_id | name --}}
                 <div class="form-group">
                     <label class="text-capitalize">{{__('site.National_id | Name')}} :</label>
                     <select name="national_id" class="form-control">
                         @if( isset($classification) )
                             @foreach( $donation_requests as $donation_request )
                                 <option
                                     value="{{$donation_request->national_id}}"
                                     {{isset($donation_request->national_id) ? 'selected': ''}}
                                 >
                                     {{ $donation_request->national_id.' | '. $donation_request->full_name }}
                                 </option>
                             @endforeach
                         @else
                             @foreach( $donation_requests as $donation_request )
                                 <option value="{{$donation_request->national_id}}">{{ $donation_request->national_id.' | '. $donation_request->full_name }}</option>
                             @endforeach
                         @endif

                     </select>
                 </div>

{{--                 <div class="form-group">--}}
{{--                     <label class="text-capitalize">{{__('site.region_name')}} :</label>--}}
{{--                     <input type="hidden" name="region_name" class="form-control" value="{{isset($blood_donation)?$blood_donation->region_name:""}}">--}}
{{--                 </div>--}}

                 {{-- type --}}
                 <div class="form-group">
                     <label class="text-capitalize">{{__('site.type')}} :</label>
                     <select name="type" class="form-control">

                         @if( isset($classification) )
                                 <option value="0" {{$classification->type =='0' ? 'selected': ''}}>
                                     Fake
                                 </option>

                                 <option  value="1" {{$classification->type == '1' ? 'selected': ''}}>
                                     Real
                                 </option>
                         @else
                             <option value="0"> Fake </option>
                             <option value="1" >Real</option>
                         @endif

                     </select>
                 </div>

                 <div class="form-group">
                     <button type="submit" class="btn btn-primary">
                         @if( isset($classification) )
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

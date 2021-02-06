@extends('layouts.dashboard.app')

@section('content')
    <div class="app-title">
        <div>
            @if(isset($contact_u)  )
                <h1>
                    <i class="fa fa-edit">
                        {{__('site.Update Contact Us')}}
                    </i>
               </h1>
            @else
                <h1>
                    <i class="fa fa-plus">
                        {{__('site.Add Contact Us')}}
                    </i>
                </h1>
            @endif

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-list"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">{{__('site.Dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.contact_us.index')}}">{{__('site.Contact Us')}}</a></li>
            @if(isset($contact_u))
                <li class="breadcrumb-item">{{__('site.Update Contact Us')}}</li>
            @else
                <li class="breadcrumb-item">{{__('site.Add Contact Us')}}</li>
            @endif
        </ul>
    </div>

    <div class="tile mb-4">
        <div class="row">
            <div class="col-md-12">
             <form action="{{isset($contact_u)?route('dashboard.contact_us.update',$contact_u->id):route('dashboard.contact_us.store')}}" method="post" enctype="multipart/form-data">
                 @csrf
                 @if(isset($contact_u))
                     @method('put')
                 @else
                     @method('post')
                 @endif

                 @include('dashboard.partials._errors')

                 <div class="form-group">
                     <label>{{__('site.contact description')}} :</label>
                     <textarea name="contact_description" cols="30" rows="10"  class="form-control">{{isset($contact_u)?$contact_u->contact_description:""}}</textarea>
{{--                     <input type="text" name="description" class="form-control" value="{{isset($contact_u)?$contact_u->description:""}}">--}}
                 </div>

                <div class="form-group">
                     <label>{{__('site.address')}} :</label>
                     <input type="text" name="address" class="form-control" value="{{isset($contact_u)?$contact_u->address:""}}">
                 </div>
                 <div class="form-group">
                     <label>{{__('site.mail1')}} :</label>
                     <input type="text" name="mail1" class="form-control" value="{{isset($contact_u)?$contact_u->mail1:""}}">
                 </div>
                 <div class="form-group">
                     <label>{{__('site.mail2')}} :</label>
                     <input type="text" name="mail2" class="form-control" value="{{isset($contact_u)?$contact_u->mail2:""}}">
                 </div>
                  <div class="form-group">
                     <label>{{__('site.callUs1')}} :</label>
                     <input type="text" name="callUs1" class="form-control" value="{{isset($contact_u)?$contact_u->callUs1:""}}">
                 </div>
                 <div class="form-group">
                     <label>{{__('site.callUs2')}} :</label>
                     <input type="text" name="callUs2" class="form-control" value="{{isset($contact_u)?$contact_u->callUs2:""}}">
                 </div>


                 <div class="form-group">
                     <button type="submit" class="btn btn-primary">
                         @if( isset($contact_u) )
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

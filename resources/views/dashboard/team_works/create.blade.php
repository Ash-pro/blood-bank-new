@extends('layouts.dashboard.app')

@section('content')
    <div class="app-title">
        <div>
            @if(isset($team_work)  )
                <h1>
                    <i class="fa fa-edit">
                        {{ __('site.Update_team_work')}}
                    </i>
               </h1>
            @else
                <h1>
                    <i class="fa fa-plus">
                      {{__('site.Add_team_work') }}
                    </i>
                </h1>
            @endif
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-list"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">{{__('site.Dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.team_works.index')}}">{{__('site.team_works')}}</a></li>
            @if(isset($team_work))
                <li class="breadcrumb-item">{{__('site.Update_team_work')}}</li>
            @else
                <li class="breadcrumb-item">{{__('site.Add_team_work')}}</li>
            @endif
        </ul>
    </div>

    <div class="tile mb-4">
        <div class="row">
            <div class="col-md-12">
             <form action="{{isset($team_work)?route('dashboard.team_works.update',$team_work->id):route('dashboard.team_works.store')}}" method="post" enctype="multipart/form-data">
                 @csrf
                 @if(isset($team_work))
                     @method('put')
                 @else
                     @method('post')
                 @endif

                 @include('dashboard.partials._errors')

                 <div class="form-group">
                     <label>{{__('site.name')}} :</label>
{{--                     <textarea name="name" cols="30" rows="10"  class="form-control">{{isset($team_work)?$team_work->name:""}}</textarea>--}}
                     <input type="text" name="name" class="form-control" value="{{isset($team_work)?$team_work->name:""}}">
                 </div>
                 <div class="form-group">
                     <label>{{__('site.email')}} :</label>
                     <input type="text" name="email" class="form-control" value="{{isset($team_work)?$team_work->email:""}}">
                 </div>
                 <div class="form-group">
                     <label>{{__('site.image')}} :</label><br>
                    @isset($team_work)
                         <td><img class="imageSize" src="{{asset('storage/'.$team_work->image)}}" alt=""></td>
                         <input type="file" name="image" class="form-control" value="{{isset($team_work)?$team_work->image:""}}">
                     @else
                         <input type="file" name="image" class="form-control" value="{{isset($team_work)?$team_work->image:""}}">
                     @endisset
                  </div>
                 <div class="form-group">
                     <label>{{__('site.address')}} :</label>
                     <input type="text" name="address" class="form-control" value="{{isset($team_work)?$team_work->address:""}}">
                 </div>
                  <div class="form-group">
                     <label>{{__('site.Phone')}} :</label>
                     <input type="text" name="Phone" class="form-control" value="{{isset($team_work)?$team_work->Phone:""}}">
                 </div>
{{--                 <div class="form-group">--}}
{{--                     <label>{{__('site.name_contact_1')}} :</label>--}}
{{--                     <input type="text" name="name_contact_1" class="form-control" value="{{isset($team_work)?$team_work->name_contact_1:""}}">--}}
{{--                 </div>--}}
{{--                 <div class="form-group">--}}
{{--                     <label>{{__('site.link_contact_1')}} :</label>--}}
{{--                     <input type="text" name="link_contact_1" class="form-control" value="{{isset($team_work)?$team_work->link_contact_1:""}}">--}}
{{--                 </div>--}}
{{--                 <div class="form-group">--}}
{{--                     <label>{{__('site.name_contact_2')}} :</label>--}}
{{--                     <input type="text" name="name_contact_2" class="form-control" value="{{isset($team_work)?$team_work->name_contact_2:""}}">--}}
{{--                 </div>--}}
{{--                 <div class="form-group">--}}
{{--                     <label>{{__('site.link_contact_2')}} :</label>--}}
{{--                     <input type="text" name="link_contact_2" class="form-control" value="{{isset($team_work)?$team_work->link_contact_2:""}}">--}}
{{--                 </div>--}}

                 <div class="form-group">
                     <button type="submit" class="btn btn-primary">
                         @if( isset($team_work) )
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

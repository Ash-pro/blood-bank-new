@extends('layouts.dashboard.app')

@section('content')
    <div class="app-title">
        <div>
            @if(isset($WhoAreWe)  )
                <h1>
                    <i class="fa fa-edit">
                        {{__('site.Update Who Are Wes')}}
                    </i>
               </h1>
            @else
                <h1>
                    <i class="fa fa-plus">
                        {{__('site.Add Who Are Wes')}}
                    </i>
                </h1>
            @endif

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-list"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">{{__('site.Dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.WhoAreWes.index')}}">{{__('site.Who Are Wes')}}</a></li>
            @if(isset($WhoAreWe))
                <li class="breadcrumb-item">{{__('site.Update Who Are Wes')}}</li>
            @else
                <li class="breadcrumb-item">{{__('site.Add Who Are Wes')}}</li>
            @endif
        </ul>
    </div>

    <div class="tile mb-4">
        <div class="row">
            <div class="col-md-12">
             <form action="{{isset($WhoAreWe)?route('dashboard.WhoAreWes.update',$WhoAreWe->id):route('dashboard.WhoAreWes.store')}}" method="post" enctype="multipart/form-data">
                 @csrf
                 @if(isset($WhoAreWe))
                     @method('put')
                 @else
                     @method('post')
                 @endif

                 @include('dashboard.partials._errors')

                 <div class="form-group">
                     <label>{{__('site.General Description')}} :</label>
                     <textarea name="general_description" cols="30" rows="10"  class="form-control">{{isset($WhoAreWe)?$WhoAreWe->general_description:""}}</textarea>
{{--                     <input type="text" name="description" class="form-control" value="{{isset($WhoAreWe)?$WhoAreWe->description:""}}">--}}
                 </div>

                <div class="form-group">
                     <label>{{__('site.Teams Description')}} :</label>
                     <textarea name="team_description" cols="30" rows="10"  class="form-control">{{isset($WhoAreWe)?$WhoAreWe->team_description:""}}</textarea>
{{--                     <input type="text" name="description" class="form-control" value="{{isset($WhoAreWe)?$WhoAreWe->description:""}}">--}}
                 </div>


                <div class="form-group">
                     <label>{{__('site.Youtube Link')}} :</label>
{{--                     <textarea name="youtube_link" cols="30" rows="10"  class="form-control">{{isset($WhoAreWe)?$WhoAreWe->youtube_link:""}}</textarea>--}}
                     <input type="text" name="youtube_link" class="form-control" value="{{isset($WhoAreWe)?$WhoAreWe->youtube_link:""}}">
                 </div>

                 <div class="form-group">
                     <label>{{__('site.Photo_1')}} :</label><br><br>
                     @isset($WhoAreWe)
                         <img width="100px" height="100px" src="{{asset('storage/'.$WhoAreWe->photo1)}}" alt=""><br><br>
                         <input type="file" name="photo1" class="form-control">
                     @else
                         <input type="file" name="photo1" class="form-control" value="{{isset($WhoAreWe)?$WhoAreWe->photo1:""}}">
                     @endisset
                 </div>

                 <div class="form-group">
                     <label>{{__('site.Photo_2')}} :</label><br><br>
                     @isset($WhoAreWe)
                         <img width="100px" height="100px" src="{{asset('storage/'.$WhoAreWe->photo2)}}" alt="">
                         <input type="file" name="photo2" class="form-control">
                     @else
                         <input type="file" name="photo2" class="form-control" value="{{isset($WhoAreWe)?$WhoAreWe->photo2:""}}">
                     @endisset

                 </div>





                 <div class="form-group">
                     <button type="submit" class="btn btn-primary">
                         @if( isset($WhoAreWe) )
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

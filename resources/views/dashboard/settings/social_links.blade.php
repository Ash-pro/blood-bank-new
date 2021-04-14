@extends('layouts.dashboard.app')

@section('content')
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-link">
                  {{__('site.Social Links') }}
                </i>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-dashboard"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">{{__('site.Dashboard')}}</a></li>
            <li class="breadcrumb-item active">{{__('site.Settings')}}</li>

        </ul>
    </div>

    <div class="tile mb-4">
        <div class="row">
            <div class="col-md-12">
             <form action="{{route('dashboard.settings.store')}}" method="post">
                 @csrf
                 @method('post')

                 @include('dashboard.partials._errors')


                 @php
                    $social_links = ['facebook','instagram','twitter','whatsUp','email','address']
                 @endphp

                 @foreach( $social_links as $social_link )
                     <div class="form-group">
                         <label>{{ucfirst(__('site.'. $social_link))}} :</label>
                         <input type="text" name="{{$social_link}}_link" class="form-control" value="{{ setting($social_link . '_link') }}">
                     </div>
                 @endforeach



                 <div class="form-group">
                     <button type="submit" class="btn btn-primary">
                         <i class="fa fa-floppy-o"></i>
                             {{__('site.Save')}}
                     </button>
                 </div>
             </form>

            </div>{{-- end-of-col-12 --}}
        </div>{{--end-of-row--}}


    </div>{{--end-of-tile mb-4--}}


@endsection

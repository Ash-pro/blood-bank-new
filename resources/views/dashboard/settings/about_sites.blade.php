@php

$name_site = setting('name_site');
$mission = setting('mission');
$vision = setting('vision');
$description = setting('description');
$copyright = setting('copyright');

@endphp




@extends('layouts.dashboard.app')

@section('content')
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-link">
                  {{__('site.about_sites') }}
                </i>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-dashboard"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">{{__('site.Dashboard')}}</a></li>
            <li class="breadcrumb-item active">{{__('site.about_sites')}}</li>

        </ul>
    </div>

    <div class="tile mb-4">
        <div class="row">
            <div class="col-md-12">
             <form action="{{route('dashboard.settings.store_about_sites')}}" method="post">
                 @csrf
                 @method('post')

                 @include('dashboard.partials._errors')

                      <div class="form-group">
                          <label>{{ucfirst(__('site.name_site'))}} :</label>
                          <input type="text" name="name_site" class="form-control" value="{{$name_site}}">
                      </div>

                      <div class="form-group">
                          <label>{{ucfirst(__('site.mission'))}} :</label>
                          <input type="text" name="mission" class="form-control" value="{{$mission}}">
                      </div>

                      <div class="form-group">
                          <label>{{ucfirst(__('site.vision'))}} :</label>
                          <input type="text" name="vision" class="form-control" value="{{$vision}}">
                      </div>

                      <div class="form-group">
                          <label>{{ucfirst(__('site.description'))}} :</label>
                          <textarea name="description" class="form-control"  id="" cols="30" rows="10">{{$description}}</textarea>
{{--                          <input type="text" name="description" class="form-control" value="{{$description}}">--}}
                      </div>

                      <div class="form-group">
                     <label>{{ucfirst(__('site.copyright'))}} :</label>
                     <input type="text" name="copyright" class="form-control" value="{{$copyright}}">
                 </div>

{{--                 @foreach( $social_links as $social_link )--}}
{{--                     <div class="form-group">--}}
{{--                         <label>{{ucfirst(__('site.'. $social_link))}} :</label>--}}
{{--                         <input type="text" name="{{$social_link}}_link" class="form-control" value="{{ setting($social_link . '_link') }}">--}}
{{--                     </div>--}}
{{--                 @endforeach--}}



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

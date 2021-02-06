@extends('layouts.dashboard.app')

<style>
    .headGroup {
        padding-left: 40%;
        padding-top: 8px;
        color: red;
        font-family: "Arial Black";

        width: 100%;
        height: 40px;
    }


</style>

@section('content')
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-sign-in">
                    {{__('site.Social Login') }}
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
                        $social_logins = ['facebook','google']
                    @endphp

                    @foreach( $social_logins as $social_login )

                        <label class="text-capitalize headGroup">
                            {{$social_login}} Login Info
                        </label>

                        {{--client id--}}
                        <div class="form-group">
                            <label for="{{$social_login . '_client_id'}}">{{__('site.'. $social_login.' client id')}}
                                :</label>
                            <input id="{{$social_login . '_client_id'}}" type="text" name="{{$social_login}}_client_id"
                                   class="form-control" value="{{ setting($social_login . '_client_id') }}">
                        </div>

                        {{--client secret--}}
                        <div class="form-group">
                            <label
                                for="{{$social_login . '_client_secret'}}">{{__('site.'. $social_login.' client secret')}}
                                :</label>
                            <input id="{{$social_login . '_client_secret'}}" type="text"
                                   name="{{$social_login}}_client_secret" class="form-control"
                                   value="{{ setting($social_login . '_client_secret') }}">
                        </div>

                        {{--redirect url--}}
                        <div class="form-group">
                            <label
                                for="{{$social_login . '_redirect_url'}}">{{__('site.'. $social_login.' redirect url')}}
                                :</label>
                            <input id="{{$social_login . '_redirect_url'}}" type="text"
                                   name="{{$social_login}}_redirect_url" class="form-control"
                                   value="{{ setting($social_login . '_redirect_url') }}">
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

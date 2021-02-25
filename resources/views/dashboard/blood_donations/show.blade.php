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
                <hr>
                show page

        </div>
    </div>{{--end-of-tile mb-4--}}


@endsection

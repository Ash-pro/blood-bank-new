@extends('layouts.dashboard.app')

@section('content')
{{--    header  --}}
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    </ul>
</div>
<div class="card-deck">
{{--card 1--}}

<div class="card text-white bg-info mb-3">
    <div class="card-header">The Number of Patients</div>
    <div class="card-body">
        <h5 class="card-title">This card view all number of patients in our system</h5>
        <h1 class="card-text"># 0000 </h1>
    </div>
    <div class="card-footer">
{{--        <small class="card-text">Last updated <b><h6>{{isset($last_AdvertisementItems)? $last_AdvertisementItems->created_at->diffForHumans():""  }} </h6></b> </small>--}}
        <small class="card-text">Last updated <b>: 2/2/2021</b> </small>
    </div>
</div>

{{--card 2--}}

<div class="card text-white bg-success mb-3">
    <div class="card-header">The Number of Patients</div>
    <div class="card-body">
        <h5 class="card-title">This card view all number of patients in our system</h5>
        <h1 class="card-text"># 0000 </h1>
    </div>
    <div class="card-footer">
        <small class="card-text">Last updated <b>2/2/2021 </b> </small>
    </div>
</div>

{{--card 3--}}

<div class="card text-white bg-dark mb-3">
    <div class="card-header">The Number of Patients</div>
    <div class="card-body">
        <h5 class="card-title">This card view all number of patients in our system</h5>
        <h1 class="card-text"># 0000 </h1>
    </div>
    <div class="card-footer">
        <small class="card-text">Last updated <b>2/2/2021 </b> </small>
    </div>
</div>

</div>


@endsection

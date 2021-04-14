@extends('layouts.dashboard.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                @if(isset($users))
                    <h3 class="tile-title">Show User Details</h3>
                @elseif(isset($UserDetail))
                    <h3 class="tile-title">Update User Details</h3>
                @endif
                <div class="tile-body">
                    <form action="{{isset($UserDetail)?route('dashboard.UserDetails.update',$UserDetail->id):''}}" method="post">
                        @if(isset($UserDetail))
                            @method('put')
                            @csrf
                        @endif
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            @if(isset($UserDetail))
                                <input class="form-control" type="text" name="name"  value="{{$UserDetail->name}}" placeholder="Enter full name">
                            @elseif (isset($users))
                                <input class="form-control" type="text" name="name" disabled value="{{$users->name}}" placeholder="Enter full name">

                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            @if(isset($UserDetail))
                                <input class="form-control" type="email"  name="email"  value="{{$UserDetail->email}}" placeholder="Enter email address">
                            @elseif(isset($users))
                                <input class="form-control" type="email"  name="email" disabled value="{{$users->email}}" placeholder="Enter email address">
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            @if(isset($UserDetail))
                                <input class="form-control" type="password"  name="password"   placeholder="Enter password">
                            @elseif(isset($users))
                                <input class="form-control" type="password"  name="password" disabled  placeholder="Enter password">
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Confirm Password</label>
                            @if(isset($UserDetail))
                                <input class="form-control" type="password"  name="password_confirmation"   placeholder="Enter password">
                            @elseif(isset($users))
                                <input class="form-control" type="password"  name="password_confirmation" disabled  placeholder="Enter password">
                            @endif

                        </div>
                            <div class="tile-footer">
                                @if(isset($UserDetail))
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;
                                @elseif(isset($users))
                                    <a class="btn btn-primary" href="{{route('dashboard.UserDetails.edit',$users->id)}}"><i class="fa fa-fw fa-lg fa-check-circle"></i>Edit</a>
                                @endif
                            </div>
                    </form>
                </div>

            </div>
        </div>

        @if(isset($donationDetails))
            <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Details Donations</h3>

                <div class="tile-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if($donationDetails->count() > 0 )
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>status</th>
                                            <th width="30%">Blood type</th>
                                            <th width="15%">Unit number</th>
                                            <th width="30%">Date of donation</th>
                                            <th width="30%">last Update</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @foreach( $donationDetails as $index =>$donationDetail )
                                        @if(auth()->user()->id == $donationDetail->user_id)

                                        <tr>
                                            <td>{{$donationDetail->active == 1 ?'Active': 'DisActive'}}</td>
                                            <td>
                                                @foreach($categories as $category)
                                                    @if($donationDetail->blood_type == $category->id )
                                                        {{$category->category_name}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{$donationDetail->unit_number}}</td>
                                            <td>{{$donationDetail->created_at->diffForHumans()}}</td>
                                            <td>{{$donationDetail->updated_at->diffForHumans()}}</td>
                                        </tr>
                                        @endif
                                    @endforeach

                                    </tbody>
                                </table>
                            @else
                                <h3 style="font-weight: 400; text-align: center"> No Record Found</h3>
                            @endif
                        </div>
                    </div>
                    @foreach( $donationDetails as $index =>$donationDetail )

                        <div class="form-group">
                            <label class="control-label">Number of Donation</label>
                            <input class="form-control" disabled type="text" name="name"  value="{{auth()->user()->id == $donationDetail->user_id?$donationDetail->count(): 'not yet'}}" placeholder="Enter full name">
                        </div>
                        @break
                    @endforeach
                </div>

            </div>
        </div>
        @endif
    </div>


@endsection


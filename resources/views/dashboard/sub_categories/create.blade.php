@extends('layouts.dashboard.app')

@section('content')
    <div class="app-title">
        <div>
            @if(isset($subCategory)  )
                <h1>
                    <i class="fa fa-edit">
                        {{ __('site.Update Sub_Category')}}
                    </i>
               </h1>
            @else
                <h1>
                    <i class="fa fa-plus">
                      {{__('site.Add Sub_Category') }}
                    </i>
                </h1>
            @endif

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-list"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">{{__('site.Dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.sub_categories.index')}}">{{__('site.Sub Categories')}}</a></li>
            @if(isset($subCategory))
                <li class="breadcrumb-item">{{ __('site.Update Sub_Category')}}</li>
            @else
                <li class="breadcrumb-item">{{__('site.Add Sub_Category')}}</li>
            @endif
        </ul>
    </div>

    <div class="tile mb-4">
        <div class="row">
            <div class="col-md-12">
             <form action="{{isset($subCategory)?route('dashboard.sub_categories.update',$subCategory->id):route('dashboard.sub_categories.store')}}" method="post">
                 @csrf
                 @if(isset($subCategory))
                     @method('put')
                 @else
                     @method('post')
                 @endif

                 @include('dashboard.partials._errors')

                 <div class="form-group">
                     <label>{{__('site.name')}} :</label>
                     <input type="text" name="name" class="form-control" value="{{isset($subCategory)?$subCategory->name:""}}">
                 </div>

                 {{-- Select of Category --}}
                  <div class="form-group">
                      <label>{{__('site.Category')}} :</label>
                      <select name="category_id" class="form-control">
                         @foreach( $categories as $category )
                              <option
                                  value="{{$category->id}}"
                                  {{isset($subCategory)?$category->id == $subCategory->category->id ?'selected':'' : '' }}
                              >
                                  {{ $category->name }}
                              </option>
                         @endforeach
                      </select>
                  </div>

                 {{-- Add Button--}}
                 <div class="form-group">
                     <button type="submit" class="btn btn-primary">
                         @if( isset($subCategory) )
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

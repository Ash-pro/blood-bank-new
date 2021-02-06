@extends('layouts.dashboard.app')

@section('content')
    <div class="app-title">
        <div>
            @if(isset($category)  )
                <h1>
                    <i class="fa fa-edit">
                        {{ __('site.UpdateCategory')}}
                    </i>
               </h1>
            @else
                <h1>
                    <i class="fa fa-plus">
                      {{__('site.AddCategory') }}
                    </i>
                </h1>
            @endif

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-list"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.welcome')}}">{{__('site.Dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.categories.index')}}">{{__('site.Category')}}</a></li>
            @if(isset($category))
                <li class="breadcrumb-item">{{__('site.UpdateCategory')}}</li>
            @else
                <li class="breadcrumb-item">{{__('site.AddCategory')}}</li>
            @endif
        </ul>
    </div>

    <div class="tile mb-4">
        <div class="row">
            <div class="col-md-12">
             <form action="{{isset($category)?route('dashboard.categories.update',$category->id):route('dashboard.categories.store')}}" method="post">
                 @csrf
                 @if(isset($category))
                     @method('put')
                 @else
                     @method('post')
                 @endif

                 @include('dashboard.partials._errors')

                 <div class="form-group">
                     <label>{{__('site.category_name')}} :</label>
{{--                     <textarea name="category_name" cols="30" rows="10"  class="form-control">{{isset($category)?$category->category_name:""}}</textarea>--}}
                     <input type="text" name="category_name" class="form-control" value="{{isset($category)?$category->category_name:""}}">
                 </div>

                 <div class="form-group">
                     <button type="submit" class="btn btn-primary">
                         @if( isset($category) )
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

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
                    src="{{asset('dashboard_files/images/logo.jpg')}}"
                    width="90px"
                    hight="100px"
                    alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
            <p class="app-sidebar__user-designation">{{implode(', ' , auth()->user()->roles->pluck('name')->toArray())}}</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item" href="{{route('dashboard.welcome')}}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span
                    class="app-menu__label">{{ __('site.Dashboard')}}
                </span>
            </a>
        </li>
         <li>
         @if(auth()->user()->hasPermission('read_categories'))
            <li class="treeview">
            <li>
                <a class="app-menu__item" href="{{route('dashboard.categories.index')}}">
                    <i class="app-menu__icon fa fa-circle-o"></i>
                    <span
                        class="app-menu__label"> {{ __('site.Category')}}
                </span>
                </a>
            </li>
         @endif


{{--        @if(auth()->user()->hasPermission('read_WhoAreWe'))--}}
{{--            <li>--}}
{{--                <a class="app-menu__item " href="{{route('dashboard.WhoAreWes.index')}}">--}}
{{--                    <i class="app-menu__icon fa fa-list"></i>--}}
{{--                    <span--}}
{{--                        class="app-menu__label">{{ __('site.Who Are We')}}--}}
{{--                     </span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endif--}}
{{--        @if(auth()->user()->hasPermission('read_WhoAreWe'))--}}
{{--            <li>--}}
{{--                <a class="app-menu__item " href="{{route('dashboard.contact_us.index')}}">--}}
{{--                    <i class="app-menu__icon fa fa-list"></i>--}}
{{--                    <span--}}
{{--                        class="app-menu__label">{{ __('site.Contact Us')}}--}}
{{--                     </span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endif--}}


        @if(auth()->user()->hasPermission('read_roles'))
            <li>
                <a class="app-menu__item " href="{{route('dashboard.roles.index')}}">
                    <i class="app-menu__icon fa fa-anchor"></i>
                    <span
                        class="app-menu__label">{{ __('site.Roles')}}
                </span>
                </a>
            </li>
        @endif

        @if(auth()->user()->hasPermission('read_users'))
            <li>
                <a class="app-menu__item " href="{{route('dashboard.users.index')}}">
                    <i class="app-menu__icon fa fa-users"></i>
                    <span
                        class="app-menu__label">{{ __('site.Users')}}
                </span>
                </a>
            </li>
        @endif
       @if(auth()->user()->hasPermission('read_blood_donations'))
            <li>
                <a class="app-menu__item " href="{{route('dashboard.blood_donations.index')}}">
                    <i class="app-menu__icon fa fa-users"></i>
                    <span
                        class="app-menu__label">{{ __('site.Request_donation')}}
                </span>
                </a>
            </li>
        @endif
        @if(auth()->user()->hasPermission('read_classifications'))
            <li>
                <a class="app-menu__item " href="{{route('dashboard.classifications.index')}}">
                    <i class="app-menu__icon fa fa-users"></i>
                    <span
                        class="app-menu__label">{{ __('site.classification')}}
                </span>
                </a>
            </li>
        @endif
        @if(auth()->user()->hasPermission('read_team_works'))
            <li class="treeview">
            <li>
                <a class="app-menu__item" href="{{route('dashboard.team_works.index')}}">
                    <i class="app-menu__icon fa fa-users"></i>
                    <span
                        class="app-menu__label"> {{ __('site.team_works')}}
                </span>
                </a>
            </li>
        @endif
        @if(auth()->user()->hasPermission('read_visitor_messages'))
            <li class="treeview">
            <li>
                <a class="app-menu__item" href="{{route('dashboard.visitor_messages.index')}}">
                    <i class="app-menu__icon fa fa-users"></i>
                    <span
                        class="app-menu__label"> {{ __('site.visitor_messages')}}
                </span>
                </a>
            </li>
        @endif
{{--    @if(auth()->user()->hasPermission('read_classifications'))--}}
{{--            <li class="treeview">--}}
{{--                <a class="app-menu__item" href="#" data-toggle="treeview">--}}
{{--                    <i class="app-menu__icon fa fa-laptop"></i>--}}
{{--                    <span class="app-menu__label text-capitalize">{{ __('site.classification')}}</span>--}}
{{--                    <i class="treeview-indicator fa fa-angle-right"></i>--}}
{{--                </a>--}}
{{--                <ul class="treeview-menu">--}}
{{--                    <li>--}}
{{--                        <a class="treeview-item" href="{{route('dashboard.classifications.index')}}"--}}
{{--                           rel="noopener"><i class="icon fa fa-circle-o"></i> {{ __('site.classification_request')}}--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="treeview-item" href="{{route('dashboard.trusted_requests.index')}}"--}}
{{--                           rel="noopener"><i class="icon fa fa-circle-o"></i> {{ __('site.Trusted_request')}}--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                </ul>--}}
{{--            </li>--}}
{{--        @endif--}}

        @if(auth()->user()->hasPermission('read_settings'))
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-laptop"></i>
                    <span class="app-menu__label">{{ __('site.Settings')}}</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
{{--                    <li>--}}
{{--                        <a class="treeview-item" href="#"><i class="icon fa fa-circle-o"></i>--}}
{{--                            {{ __('site.Pages Settings')}}--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <a class="treeview-item" href="{{route('dashboard.settings.social_login')}}"--}}
{{--                           rel="noopener"><i class="icon fa fa-circle-o"></i> {{ __('site.Social Login')}}--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    <li>
                        <a class="treeview-item" href="{{route('dashboard.settings.social_links')}}"
                           rel="noopener"><i class="icon fa fa-circle-o"></i> {{ __('site.Social Links')}}
                        </a>
                    </li>
                </ul>
            </li>
        @endif

{{--         @if(auth()->user()->hasPermission('read_donations'))--}}
{{--            <li>--}}
{{--                <a class="app-menu__item " href="{{route('dashboard.donations.index')}}">--}}
{{--                    <i class="app-menu__icon fa fa-product-hunt"></i>--}}
{{--                    <span--}}
{{--                        class="app-menu__label">{{ __('site.Donation items')}}--}}
{{--                </span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endif--}}

{{--        @if(auth()->user()->hasPermission('read_posts'))--}}
{{--            <li>--}}
{{--                <a class="app-menu__item " href="#">--}}
{{--                    <i class="app-menu__icon fa Example of clipboard fa-clipboard"></i>--}}
{{--                    <span--}}
{{--                        class="app-menu__label">{{ __('site.Posts')}}--}}
{{--                </span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        @endif--}}


    </ul>
</aside>

<div class="page-header-inner">


    <!-- BEGIN LOGO -->


    <div class="page-logo">


        <a href="{{ url(getCurrentLocale() . '/manager') }}">


           <img src="{{ url('assets/nn_cms/layouts/layout/img/logo-orien.svg') }}" width="50" alt="logo" class="logo-default" /></a>


        <div class="menu-toggler sidebar-toggler"> </div>


    </div>


    <!-- END LOGO -->


    <!-- BEGIN RESPONSIVE MENU TOGGLER -->


    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>


    <!-- END RESPONSIVE MENU TOGGLER -->


    <!-- BEGIN TOP NAVIGATION MENU -->


    <div class="top-menu">


        <ul class="nav navbar-nav pull-right">


            {{-- <li class="dropdown lang">


                @if(count(LaravelLocalization::getSupportedLocales()) > 1)


                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">


                    <span class="flag">


                        <img src="{{ url('assets/nn_cms/global/img/flags/' . getCurrentLocale() . '.png') }}" class="img-responsive" alt="{{ getCurrentLocaleName() }}-flag">


                    </span>


                    <span class="l"> {{ getCurrentLocale() }} </span>


                    <i class="fa fa-angle-down"></i>


                </a>


                <ul class="dropdown-menu dropdown-menu-default">


                   @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)


                        @if(getCurrentLocaleName() != $properties['name'])


                        <li>


                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode) }}">


                                <span class="flag">


                                    <img src="{{ url('assets/nn_cms/global/img/flags/' . $localeCode . '.png') }}" class="img-responsive" alt="{{ $localeCode }}-flag">


                                </span>


                                <span class="l">


                                 {{ $localeCode }}


                                </span>


                            </a>


                        </li>


                        @endif


                    @endforeach


                </ul>


                @else


                <a nohref class="dropdown-toggle">


                    <span class="flag">


                        <img src="{{ url('assets/nn_cms/global/img/flags/' . getCurrentLocale() . '.png') }}" class="img-responsive" alt="{{ getCurrentLocaleName() }}-flag">


                    </span>


                    <span class="l"> {{ getCurrentLocale() }} </span>


                </a>


                @endif


            </li> --}}


            <!-- BEGIN USER LOGIN DROPDOWN -->


            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->


            <li class="dropdown dropdown-user">


                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">


                    <img alt="profile photo" class="img-circle" src="@if(\Auth::user()->imgurl) {{\Auth::user()->imgurl }} @else {{ url('assets/nn_cms/layouts/layout/img/user-default-photo.png') }} @endif" />


                    <span class="username username-hide-on-mobile"> {{ \Auth::user()->name }} </span>


                    <i class="fa fa-angle-down"></i>


                </a>


                <ul class="dropdown-menu dropdown-menu-default">


                    <li>


                        <a href="{{ url(getCurrentLocale() . '/manager/user/profile') }}">


                            <i class="icon-user"></i> {{ trans('general.myProfile') }} </a>


                    </li>


                    <li class="divider"> </li>


                    <li>


                        <a href="{{ url('!admin/logout') }}">


                            <i class="icon-key"></i> {{ trans('general.logOut') }} </a>


                    </li>


                </ul>


            </li>


            <!-- END USER LOGIN DROPDOWN -->


        </ul>


    </div>


    <!-- END TOP NAVIGATION MENU -->


</div>
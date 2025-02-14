<div class="tagline bg-white header-container-fluid-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between">
                    <ul class="list-unstyled mb-0">
                        <li class="list-inline-item mb-0"><a href="mailto:{{$siteSettings->email}}" class="text-muted fw-normal"><i data-feather="mail" class="fea icon-sm text-primary"></i> {{$siteSettings->email}}</a></li>
                        <li class="list-inline-item mb-0 ms-3"><span class="text-muted fw-normal"><i data-feather="map-pin" class="fea icon-sm text-primary"></i>
                            @if (getCurrentLocale() == 'ka')
                                {{$siteSettings->address_ka}}
                            @elseif (getCurrentLocale() == 'en')
                                {{$siteSettings->address_en}}
                            @endif
                        </span></li>
                    </ul>

                    <div class="d-flex align-items-center">
                        <ul class="list-unstyled social-icon tagline-social mb-0">
                            @if ($siteSettings->facebook)
                                <li class="list-inline-item mb-0"><a href="{{$siteSettings->facebook}}" target="_blank"><i class="uil uil-facebook-f h6 mb-0"></i></a></li>
                            @endif
                            @if ($siteSettings->instagram)
                                <li class="list-inline-item mb-0"><a href="{{$siteSettings->instagram}}" target="_blank"><i class="uil uil-instagram h6 mb-0"></i></a></li>
                            @endif
                            {{-- <li class="list-inline-item mb-0"><a href="javascript:void(0)" target="_blank"><i class="uil uil-twitter h6 mb-0"></i></a></li> --}}
                            @if ($siteSettings->linkedin)
                                <li class="list-inline-item mb-0"><a href="{{$siteSettings->linkedin}}" target="_blank"><i class="uil uil-linkedin h6 mb-0"></i></a></li>
                            @endif
                        </ul><!--end icon-->
                        @if (getCurrentLocale() == 'ka')
                            <a href="{{LaravelLocalization::getLocalizedURL('en')}}" class="lang">
                                <img src="/assets/images/lang-en.svg" alt="" class="lang-img"> En
                            </a>
                        @elseif (getCurrentLocale() == 'en')
                            <a href="{{LaravelLocalization::getNonLocalizedURL()}}" class="lang">
                                <img src="/assets/images/lang-ka.svg" alt="" class="lang-img"> Ge
                            </a>
                        @endif
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</div><!--end tagline-->
<!-- TAGLINE END-->

<!-- Navbar STart -->
<header id="topnav" class="defaultscroll sticky tagline-height header-container-fluid-wrapper">
    <div class="container-fluid">
        <div class="topnav-container-inner">
            <!-- Logo container-->
            <a class="logo" href="{{fullUrl()}}">
                <img src="/assets/images/logo.png" class="logo-light-mode" alt="">
                <img src="/assets/images/logo-light.png" class="logo-dark-mode" alt="">
            </a>
            <div class="ms-auto mobile-lang">
                @if (getCurrentLocale() == 'ka')
                    <a href="{{LaravelLocalization::getLocalizedURL('en')}}" class="lang">
                        <img src="/assets/images/lang-en.svg" alt="" class="lang-img"> En
                    </a>
                @elseif (getCurrentLocale() == 'en')
                    <a href="{{LaravelLocalization::getNonLocalizedURL()}}" class="lang">
                        <img src="/assets/images/lang-ka.svg" alt="" class="lang-img"> Ge
                    </a>
                @endif
            </div>
            <!-- End Logo container-->
            <div class="menu-extras">
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>

            <!-- search-->
            {{-- <ul class="buy-button list-inline mb-0">
                <li class="list-inline-item search-icon mb-0">
                    <div class="dropdown">
                        <button type="button" class="btn btn-link text-decoration-none dropdown-toggle mb-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="uil uil-search h5 text-white mb-0"></i>
                        </button>
                        <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-4 py-0" style="width: 300px;">
                            <form class="p-4">
                                <input type="text" id="text" name="name" class="form-control border bg-white" placeholder="Search...">
                            </form>
                        </div>
                    </div>
                </li>
            </ul> --}}
            <!-- search end -->

            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu nav-right">
                    @if(isset(menu()->nn_menu_items))
                        @foreach(menu()->nn_menu_items as $item)
                            <li @if(!$loop->last)class="has-submenu parent-parent-menu-item"@endif>
                                @if($item->type == 'collection')
                                    <a href="{{fullUrl($item->slug)}}">{{$item->lang->name}}</a>
                                @endif
                                @if($item->type == 'link')
                                    <a href="{{$item->lang->link}}">{{$item->lang->name}}</a>
                                @endif
                                @if($item->type == 'text')
                                    <a href="{{fullUrl($item->slug)}}">{{$item->lang->name}}</a>
                                @endif
                                @if($item->type == 'category')
                                    <a href="javascript:void(0);">{{$item->lang->name}}</a>
                                @endif
                                @if($item->type == 'contact')
                                    <a href="{{fullUrl($item->slug)}}">{{$item->lang->name}}</a>
                                @endif

                                @if(isset($item->subMenu[0]))
                                    @if ($item->slug != 'momtsodeblebi')
                                        <span class="menu-arrow"></span>
                                    @endif
                                    <ul class="submenu">
                                        @foreach($item->subMenu as $menuItem)

                                                    @if(isset($menuItem->subMenu[0]))
                                                        <li class="has-submenu parent-menu-item"><a href="javascript:void(0)">{{$menuItem->lang->name}}</a><span class="submenu-arrow"></span>
                                                            <ul class="submenu">
                                                                @foreach($menuItem->subMenu as $subItem)
                                                                    <li><a href="{{fullUrl('list/'.$subItem->parentItem->slug.'/'.$subItem->slug)}}" class="sub-menu-item"

                                                                        >{{$subItem->lang->name}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </li>

                                                    @else
                                                        <li><a href="{{fullUrl($menuItem->slug)}}" class="sub-menu-item">{{$menuItem->lang->name}}</a></li>
                                                    @endif
                                        
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    @endif


                </ul><!--end navigation menu-->
            </div><!--end navigation-->
        </div>
    </div><!--end container-->
</header><!--end header-->
<!-- Navbar End -->

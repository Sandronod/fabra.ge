<div class="tagline bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between">
                    <ul class="list-unstyled mb-0">
                        <li class="list-inline-item mb-0"><a href="javascript:void(0)" class="text-muted fw-normal"><i data-feather="mail" class="fea icon-sm text-primary"></i> support@starty.com</a></li>
                        <li class="list-inline-item mb-0 ms-3"><a href="javascript:void(0)" class="text-muted fw-normal"><i data-feather="map-pin" class="fea icon-sm text-primary"></i> 4432 Pick Street Denver, CO 80203</a></li>
                    </ul>

                    <ul class="list-unstyled social-icon tagline-social mb-0">
                        <li class="list-inline-item mb-0"><a href="javascript:void(0)"><i class="uil uil-facebook-f h6 mb-0"></i></a></li>
                        <li class="list-inline-item mb-0"><a href="javascript:void(0)"><i class="uil uil-instagram h6 mb-0"></i></a></li>
                        <li class="list-inline-item mb-0"><a href="javascript:void(0)"><i class="uil uil-twitter h6 mb-0"></i></a></li>
                        <li class="list-inline-item mb-0"><a href="javascript:void(0)"><i class="uil uil-linkedin h6 mb-0"></i></a></li>
                    </ul><!--end icon-->
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</div><!--end tagline-->
<!-- TAGLINE END-->

<!-- Navbar STart -->
<header id="topnav" class="defaultscroll sticky tagline-height">
    <div class="container">
        <!-- Logo container-->
        <a class="logo" href="index.html">
            <img src="/assets/images/logo-dark.png" class="logo-light-mode" alt="">
            <img src="/assets/images/logo-light.png" class="logo-dark-mode" alt="">
        </a>
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

        <ul class="buy-button list-inline mb-0">
            <li class="list-inline-item search-icon mb-0">
                <div class="dropdown">
                    <button type="button" class="btn btn-link text-decoration-none dropdown-toggle mb-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="uil uil-search h5 text-dark mb-0"></i>
                    </button>
                    <div class="dropdown-menu dd-menu dropdown-menu-end bg-white shadow rounded border-0 mt-4 py-0" style="width: 300px;">
                        <form class="p-4">
                            <input type="text" id="text" name="name" class="form-control border bg-white" placeholder="Search...">
                        </form>
                    </div>
                </div>
            </li>
        </ul>

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
                                <span class="menu-arrow"></span>
                            @if(isset($item->subMenu[0]))
                                <ul class="submenu megamenu">
                                    @foreach($item->subMenu as $menuItem)
                                        <li>
                                            <ul>
                                                <li class="megamenu-head">{{$menuItem->lang->name}}</li>
                                                @if(isset($menuItem->subMenu[0]))
                                                    @foreach($menuItem->subMenu as $subItem)
                                                        <li><a href="{{fullUrl('list/'.$subItem->parentItem->slug.'/'.$subItem->slug)}}" class="sub-menu-item">{{$subItem->lang->name}}</a></li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                @endif


            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div><!--end container-->
</header><!--end header-->
<!-- Navbar End -->

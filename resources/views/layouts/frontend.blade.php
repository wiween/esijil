<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eSijil ESPKM</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="/themes/limitless/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="/themes/limitless/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/themes/limitless/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="/themes/limitless/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="/themes/limitless/assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="/themes/limitless/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="/themes/limitless/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="/themes/limitless/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="/themes/limitless/assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="/themes/limitless/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="/themes/limitless/assets/js/plugins/forms/selects/select2.min.js"></script>

    <script type="text/javascript" src="/themes/limitless/assets/js/core/app.js"></script>
    <script type="text/javascript" src="/themes/limitless/assets/js/pages/datatables_basic.js"></script>
    <!-- /theme JS files -->

    {{-- My Script --}}
    <link href="/css/mystyle.css" rel="stylesheet" type="text/css">

    <!--vue -->
    <script src="/js/vue.js"></script>

    {{-- Touch Icon --}}
    @include('partials.touchicon')

    {{-- Custom Styling or JS from Content Page --}}
    @yield('header_script')

</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-default header-highlight">
    <div class="navbar-header">
        <a class="navbar-brand" href="/home"><img src="/themes/limitless/assets/images/esijil.png" alt=""></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        {{--<ul class="nav navbar-nav">--}}
            {{--<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>--}}
            {{--<li><a href="1master.dev"> View Portal</a></li>--}}
        {{--</ul>--}}

        <div class="navbar-right">
            <ul class="nav navbar-nav">


                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <span>Hello {{ Auth::user()->name }}</span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="/user/profile"><i class="icon-user-plus"></i> My profile</a></li>
                        <li><a href="/user/change-password"><i class="icon-cog5"></i> Change Password</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="icon-switch2"></i>{{ __('Logout') }}
                            </a></li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>

            </ul>
            {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                {{--@csrf--}}
                {{--<i class="icon-switch2"></i> Logout--}}
            {{--</form>--}}
        </div>
    </div>
</div>
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-main">
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-user">
                    <div class="category-content">
                        <div class="media">
                            <a href="#" class="media-left"><img src="{{ Auth::user()->avatar }}" class="img-circle img-sm" alt=""></a>
                            <div class="media-body">
                                <span class="media-heading text-semibold">{{ Auth::user()->name }}</span>
                                <div class="text-size-mini text-muted text-capitalize">
                                    <i class="icon-user-tie text-size-small"></i> &nbsp;{{ str_replace('_', ' ', Auth::user()->role) }}
                                </div>
                            </div>

                            <div class="media-right media-middle">
                                <ul class="icons-list">
                                    <li>
                                        <a href="/user/profile"><i class="icon-cog3"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /user menu -->

                <!-- Main navigation -->
                <div class="sidebar-category sidebar-category-visible">
                    <div class="category-content no-padding">
                        <ul class="navigation navigation-main navigation-accordion">
                            @include('partials.frontend_sidebar')
                        </ul>
                    </div>
                </div>
                <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header">
                <div class="page-header-content">
                    <div class="page-title">
                        <h4>
                            <a href="/home">
                                <i class="icon-arrow-left52 position-left"></i>
                            </a>
                            <span class="text-semibold">
                                @yield('mainTitle')
                            </span>
                        </h4>
                    </div>

                    <div class="heading-elements">
                        <div class="heading-btn-group">
                            @yield('topButton')
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">
            {{-- Show validation error if it occurs --}}
            @include('partials.notification')
            @yield('content')

            <!-- Footer -->
                <div class="footer text-muted">
                    &copy; {{ \Carbon\Carbon::now()->year }}. <a href="#">Percetakan Sijil</a> by <a href="http://mohr.gov.my">JPK, MOHR</a>
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

@yield('footer_script')
</body>
</html>

<meta charset="utf-8" />


<title>Orien Admin</title>


<meta name="csrf-token" content="{{ csrf_token() }}"><!-- For Menu csrf_token -->


<meta http-equiv="X-UA-Compatible" content="IE=edge">


<meta content="width=device-width, initial-scale=1" name="viewport" />


<meta content="" name="description" />


<meta content="" name="author" />


<!-- HEAD STACK START -->


@stack('head')


<!-- HEAD STACK END -->


{{-- <link rel="shortcut icon" href="{{ url('assets/nn_cms/layouts/layout/img/favicon.ico') }}" /> --}}

{{-- <link rel="shortcut icon" href="assets/images/favicon.svg?v=1.1"> --}}

<link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/nn_cms/layouts/layout/img/favicon.png') }}">


<!-- BEGIN GLOBAL MANDATORY STYLES -->


<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />


<link href="{{ url('assets/nn_cms/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ url('assets/nn_cms/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ url('assets/nn_cms/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ url('assets/nn_cms/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ url('assets/nn_cms/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />


<!-- END GLOBAL MANDATORY STYLES -->


<!-- BEGIN PAGE LEVEL PLUGINS -->


<link href="{{ url('assets/nn_cms/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ url('assets/nn_cms/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
        
        <link href="{{ url('assets/nn_cms/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
        
        <link href="{{ url('assets/nn_cms/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
         <link href="{{ url('assets/nn_cms//global/plugins/clockface/css/clockface.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ url('assets/nn_cms/global/plugins/bootstrap-toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ url('assets/nn_cms/global/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ url('assets/nn_cms/global/plugins/fullcalendar/fullcalendar.min.css') }}" rel="stylesheet" type="text/css" />


<!-- END PAGE LEVEL PLUGINS -->


<!-- BEGIN THEME GLOBAL STYLES -->


<link href="{{ url('assets/nn_cms/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />


<link href="{{ url('assets/nn_cms/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />


<!-- END THEME GLOBAL STYLES -->


<!-- BEGIN THEME LAYOUT STYLES -->


<link href="{{ url('assets/nn_cms/layouts/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css" />


<link href="{{ url('assets/nn_cms/layouts/layout/css/themes/darkblue.min.css') }}" rel="stylesheet" type="text/css" id="style_color" />


<!-- BEGIN PAGE LEVEL PLUGINS -->


<!-- END PAGE LEVEL PLUGINS -->


<link href="{{ url('assets/nn_cms/custom/css/style.css') }}" rel="stylesheet" type="text/css" />


<!-- END CUSTOM STYLES -->
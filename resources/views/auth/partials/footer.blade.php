<div id="footer">

</div>

<div class="copyright"> 2021 © &nbsp;
    {{-- <a href="https://legalaid.ge" class="font-white" target="_blank">www.legalaid.ge</a> --}}
</div>

<!--[if lt IE 9]>

<script src="{{ url('assets/nn_cms/global/plugins/respond.min.js') }}" type="text/javascript"></script>

<script src="{{ url('assets/nn_cms/global/plugins/excanvas.min.js') }}" type="text/javascript"></script>

<![endif]-->

<!-- BEGIN CORE PLUGINS -->

<script src="{{ url('assets/nn_cms/global/plugins/jquery.min.js') }}" type="text/javascript"></script>

<script src="{{ url('assets/nn_cms/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>

<script src="{{ url('assets/nn_cms/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>

<script src="{{ url('assets/nn_cms/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>

<script src="{{ url('assets/nn_cms/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>

<script src="{{ url('assets/nn_cms/global/plugins/uniform/jquery.uniform.min.js') }}" type="text/javascript"></script>

<script src="{{ url('assets/nn_cms/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>

<!-- END CORE PLUGINS -->

<!-- BEGIN THEME GLOBAL SCRIPTS -->

<script src="{{ url('assets/nn_cms/global/scripts/app.min.js') }}" type="text/javascript"></script>

<!-- END THEME GLOBAL SCRIPTS -->
<script>
    let bg = [
        '{{url('assets/nn_cms/images/1.jpeg')}}',
        '{{url('assets/nn_cms/images/2.png')}}',
        '{{url('assets/nn_cms/images/3.png')}}',
    ];
    let imageUrl = bg[Math.floor(Math.random()*bg.length)];
    $('.login-img').attr("src", imageUrl);
</script>

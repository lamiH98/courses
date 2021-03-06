
		<!-- begin::Scroll Top -->
		<div id="m_scroll_top" class="m-scroll-top">
            <i class="la la-arrow-up"></i>
        </div>
        <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
        <script src="{{ asset('dashboards/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('dashboards/assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('dashboards/assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('dashboards/assets/demo/default/custom/crud/datatables/advanced/multiple-controls.js') }}" type="text/javascript"></script>
        <script src="{{ asset('dashboards/assets/demo/default/custom/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
        <script src="{{ asset('dashboards/assets/app/js/dashboard.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/treeview.js')}}" type="text/javascript"></script>
        <script>
            $(".Confirm").click(function(e){
                $("#Confirm").modal("show");
                $("#Confirm .btn-danger").attr("href",$(this).attr("href"));
                return false;
                //e.preventDefault();
            });
        </script>
        @yield('js')
    </body>

    <!-- end::Body -->
</html>

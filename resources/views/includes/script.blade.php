<!-- ============================================================== -->
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('backend/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('backend/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{ asset('backend/assets/extra-libs/sparkline/sparkline.js')}}"></script>
<!--Wave Effects -->
<script src="{{ asset('backend/dist/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{ asset('backend/dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('backend/dist/js/custom.min.js')}}"></script>
<!--This page JavaScript -->
<!-- <script src="{{ asset('backend/dist/js/pages/dashboards/dashboard1.js')}}"></script> -->
<!-- Charts js Files -->
<script src="{{ asset('backend/assets/libs/flot/excanvas.js')}}"></script>
<script src="{{ asset('backend/assets/libs/flot/jquery.flot.js')}}"></script>
<script src="{{ asset('backend/assets/libs/flot/jquery.flot.pie.js')}}"></script>
<script src="{{ asset('backend/assets/libs/flot/jquery.flot.time.js')}}"></script>
<script src="{{ asset('backend/assets/libs/flot/jquery.flot.stack.js')}}"></script>
<script src="{{ asset('backend/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
<script src="{{ asset('backend/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{ asset('backend/dist/js/pages/chart/chart-page-init.js')}}"></script>
<script src="{{ asset('backend/assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<!-- This Page JS -->
<script src="{{ asset('backend/assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{ asset('backend/dist/js/pages/mask/mask.init.js')}}"></script>
<script src="{{ asset('backend/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{ asset('backend/assets/libs/select2/dist/js/select2.min.js')}}"></script>
<script src="{{ asset('backend/assets/libs/jquery-asColor/dist/jquery-asColor.min.js')}}"></script>
<script src="{{ asset('backend/assets/libs/jquery-asGradient/dist/jquery-asGradient.js')}}"></script>
<script src="{{ asset('backend/assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js')}}"></script>
<script src="{{ asset('backend/assets/libs/jquery-minicolors/jquery.minicolors.min.js')}}"></script>
<script src="{{ asset('backend/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- <script src="{{ asset('backend/assets/libs/quill/dist/quill.min.js')}}"></script> -->
<script src="{{ asset('backend/assets/libs/toastr/build/toastr.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
<script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();
    //***********************************//
    // For select 2
    //***********************************//
    $(".select2").select2();
    /*datwpicker*/
    jQuery('.mydatepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    // quill editor
    // var quill = new Quill('#editor', {
    //     theme: 'snow'
    // });
</script>
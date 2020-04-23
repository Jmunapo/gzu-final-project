<!-- start js include path -->
<script src="{!! asset('assets/plugins/jquery/jquery.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/popper/popper.js') !!}"></script>
<script src="{!! asset('assets/plugins/jquery-blockui/jquery.blockui.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') !!}"></script>
<script src="{!! asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/jquery-ui/jquery-ui.min.js') !!}"></script>
<!-- bootstrap -->
<script src="{!! asset('assets/plugins/bootstrap/js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/sparkline/jquery.sparkline.js') !!}"></script>
<script src="{!! asset('assets/js/pages/sparkline/sparkline-data.js') !!}"></script>
<!-- Common js-->
<script src="{!! asset('assets/js/app.js') !!}"></script>
<script src="{!! asset('assets/js/layout.js') !!}"></script>
<script src="{!! asset('assets/js/theme-color.js') !!}"></script>

<!-- material -->
<script src="{!! asset('assets/plugins/material/material.min.js') !!}"></script>
{{-- If Necessary i.e if we need select and date pickers logic here!!! --}}

<script src="{!! asset('assets/js/pages/material-select/getmdl-select.js') !!}"></script>
<script src="{!! asset('assets/plugins/material-datetimepicker/moment-with-locales.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js') !!}"></script>
<script src="{!! asset('assets/plugins/material-datetimepicker/datetimepicker.js') !!}"></script>


{{-- Edif --}}

<!-- data tables -->
<script src="{!! asset('assets/plugins/datatables/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('assets/js/pages/table/table_data.js') !!}"></script>
<!-- summernote -->
<script src="{!! asset('assets/plugins/summernote/summernote.js') !!}"></script>
<script src="{!! asset('assets/js/pages/summernote/summernote-data.js') !!}"></script>

<!-- GZU Admin  Scripts-->
<script src="{!! asset('js/gzu.masteradmin.js') !!}"></script>


	@if (Request::is('exam_timetable/*'))
  <script src="{!! asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js') !!}"></script>
  <script src="{!! asset('assets/plugins/bootstrap-datepicker/datepicker-init.js') !!}"></script>
  <script src="{!! asset('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') !!}" charset="UTF-8"></script>
  <script src="{!! asset('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js') !!}"
      charset="UTF-8"></script>
	@endif




<!-- General JS Scripts -->
{{--  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>  --}}



<script src="{{ asset('assets/js/bootstrap/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap/moment.min.js') }}"></script>


<script src="{{ asset('assets/js/stisla.js') }}"></script>

{{--  <!-- JS Libraies -->  --}}

{{--  <!-- Template JS File -->  --}}
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

{{--  data-table  --}}

<script src="{{ asset('assets/plugins/datatable-exports/scripts.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>

{{--  buttons-datatable-exports  --}}
<script src="{{ asset('assets/plugins/datatable-exports/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable-exports/buttons/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable-exports/buttons/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable-exports/buttons/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable-exports/buttons/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable-exports/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatable-exports/buttons/buttons.print.min.js') }}"></script>

{{-- //Para configurar los el idTabla  --}}
<script src="{{ asset('assets/plugins/datatable-exports/buttons/datatables-init.js') }}"></script>
{{--  @yield('js')  --}}

{{--  pugin FullCalendar  --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/locales-all.js"></script> --}}
{{-- <script src="{{ asset('js/agenda.js') }}"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script> --}}

<x-notify::notify />
@notifyJs


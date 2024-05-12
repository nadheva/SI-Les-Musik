
  <!-- Vendor JS Files -->
<script src="{{asset('template/NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('template/NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('template/NiceAdmin/assets/vendor/chart.js/chart.umd.js')}}"></script>
<script src="{{asset('template/NiceAdmin/assets/vendor/echarts/echarts.min.js')}}"></script>
<script src="{{asset('template/NiceAdmin/assets/vendor/quill/quill.min.js')}}"></script>
<script src="{{asset('template/NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
<script src="{{asset('template/NiceAdmin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('template/NiceAdmin/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
<script src="{{asset('template/NiceAdmin/assets/js/main.js')}}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
    tinymce.init({
      selector: '#mytextarea',
      plugins: [
        'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
        'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
        'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
      ],
      toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
        'alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
    });
  </script>
@stack('scripts')

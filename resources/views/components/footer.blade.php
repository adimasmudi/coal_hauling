<footer class="main-footer">
  <strong>Copyright &copy; 2025 Coal Hauling.</strong>
  All rights reserved.
  
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('/')}}plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('/')}}plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="{{asset('/')}}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('/')}}plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('/')}}plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('/')}}plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('/')}}plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('/')}}plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('/')}}plugins/moment/moment.min.js"></script>
<script src="{{asset('/')}}plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('/')}}plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('/')}}plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('/')}}plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('/')}}dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('/')}}dist/js/pages/dashboard.js"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
  $(function(){
    $(document).on('click','#delete',function(e){
      e.preventDefault();
      var id = $(this).data('id');
      var url = $(this).data('url');
      var redirect = $(this).data('redirect');

      var link = $(this).attr("href");
      Swal.fire({
        "title" : "Apakah kamu yakin?",
        "text" : "kamu yakin ingin menghapus item ini?",
        "icon" : "warning",
        "showCancelButton" : true,
        "confirmButtonColor" : "#3085d6",
        "cancelButtonColor" : "#d33",
        "confirmButtonText" : "Ya, hapus",
      }).then((result)=>{
        if(result.isConfirmed){
          $(function() {
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                type: "POST",
                url: `{{url('/admin/${url}/${id}')}}`,
                data : {_token: '{{csrf_token()}}'},
                success: function (data) {
                  Swal.fire('Item dihapus','Data yang dipilih sudah selesai dihapus','success');
                  setTimeout(function(){
                    window.location.href = `{{url('/admin/${redirect}')}}`
                  },2000)
                },
                error : function (data, textStatus, errorThrown) {
                  Swal.fire('Terjadi error',textStatus,'error');
                },     
            })});
          
        }
      })
      })

      // verifikasi pembayaran
      $(document).on('click','#verifikasiPembayaran',function(e){
      e.preventDefault();
      var id = $(this).data('id');
      var url = $(this).data('url');
      var redirect = $(this).data('redirect');

      var link = $(this).attr("href");
      Swal.fire({
        "title" : "Apakah kamu yakin?",
        "text" : "kamu yakin ingin ingin memverifikasi pemesanan ini?",
        "icon" : "question",
        "showCancelButton" : true,
        "confirmButtonColor" : "#3085d6",
        "cancelButtonColor" : "#d33",
        "confirmButtonText" : "Ya, verifikasi",
      }).then((result)=>{
        if(result.isConfirmed){
          $(function() {
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                type: "POST",
                url: `{{url('/admin/${url}/${id}')}}`,
                data : {_token: '{{csrf_token()}}'},
                success: function (data) {
                  Swal.fire('Pemesanan terverifikasi','Data pemesanan yang ada pilih berhasil diverifikasi','success');
                  setTimeout(function(){
                    window.location.href = `{{url('/admin/${redirect}')}}`
                  },2000)
                },
                error : function (data, textStatus, errorThrown) {
                  Swal.fire('Terjadi error',textStatus,'error');
                },     
            })});
          
        }
      })
      })

      // delete image
      $(document).on('click','#deleteImage',function(e){
      e.preventDefault();
      var id = $(this).data('id');
      var url = $(this).data('url');
      var redirect = $(this).data('redirect');

      var link = $(this).attr("href");
      Swal.fire({
        "title" : "Apakah kamu yakin?",
        "text" : "kamu yakin ingin ingin menghapus gambar ini?",
        "icon" : "question",
        "showCancelButton" : true,
        "confirmButtonColor" : "#3085d6",
        "cancelButtonColor" : "#d33",
        "confirmButtonText" : "Ya, hapus",
      }).then((result)=>{
        if(result.isConfirmed){
          $(function() {
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                type: "DELETE",
                url: `{{url('/admin/${url}/${id}')}}`,
                data : {_token: '{{csrf_token()}}'},
                success: function (data) {
                  Swal.fire('Data terhapus','Gambar yang anda pilih sudah terhapus','success');
                  setTimeout(function(){
                    window.location.href = `{{url('/admin/${redirect}')}}`
                  },2000)
                },
                error : function (data, textStatus, errorThrown) {
                  Swal.fire('Terjadi error',textStatus,'error');
                },     
            })});
          
        }
      })
      })
    });
</script>
</body>
</html>
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
  
  $(document).ready(function(){
    $(document).on('click','#delete',function(e){
      e.preventDefault();
      var id = $(this).data('id');
      var url = $(this).data('url');
      var redirect = $(this).data('redirect');

      var link = $(this).attr("href");
      Swal.fire({
        "title" : "Are you sure?",
        "text" : "Are you sure want to delete this item?",
        "icon" : "warning",
        "showCancelButton" : true,
        "confirmButtonColor" : "#3085d6",
        "cancelButtonColor" : "#d33",
        "confirmButtonText" : "Yes, delete",
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
                  Swal.fire('Item deleted','Your selected item already deleted','success');
                  setTimeout(function(){
                    window.location.href = `{{url('/admin/${redirect}')}}`
                  },2000)
                },
                error : function (data, textStatus, errorThrown) {
                  Swal.fire('An error occured', data.responseJSON?.error || textStatus, errorThrown);
                },     
            })});
          
        }
      })
      })

      // deliver all
      $(document).on('click','.deliver-all',function(e){
      e.preventDefault();

      Swal.fire({
        "title" : "Are you sure?",
        "text" : "Are you sure want to deliver all using assigned vehicles?",
        "icon" : "warning",
        "showCancelButton" : true,
        "confirmButtonColor" : "#3085d6",
        "cancelButtonColor" : "#d33",
        "confirmButtonText" : "Yes, deliver",
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
                url: `{{url('/admin/delivery/assign/deliver')}}`,
                data : {_token: '{{csrf_token()}}'},
                success: function (data) {
                  Swal.fire('Delivered','Deliver all success','success');
                  setTimeout(function(){
                    window.location.href = `{{url('/admin/delivery')}}`
                  },2000)
                },
                error : function (data, textStatus, errorThrown) {
                  Swal.fire('An error occured', data.responseJSON?.error || textStatus, errorThrown);
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
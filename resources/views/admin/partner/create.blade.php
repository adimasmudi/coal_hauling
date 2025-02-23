<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add New Partner</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/admin/partner/save" enctype="multipart/form-data">
              @csrf
              <div class="card-body d-flex flex-row justify-content-between">
                
                  <div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Partner Name">
                    </div>
                   
                  </div>
                  <div>
                    <div class="form-group">
                            <label for="address">Address</label><br>
                            <textarea name="address" id="address" class="form-control" cols="40" rows="5" name="address"></textarea>
                        </div>
                  </div>
                  
                
                
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</x-layout>
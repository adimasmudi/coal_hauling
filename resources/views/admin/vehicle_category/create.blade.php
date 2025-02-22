<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add New Vehicle Category</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/admin/vehicle-category/save" enctype="multipart/form-data">
              @csrf
              <div class="card-body d-flex flex-row justify-content-between">
                
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Vehicle Name">
                  </div>
                  <div class="form-group">
                    <label for="icon">Icon</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="file" name="icon" id="icon" accept = 'image/jpeg , image/jpg, image/gif, image/png'>
                      </div>
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
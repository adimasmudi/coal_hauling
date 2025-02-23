<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Delivery</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/admin/delivery/update/{{$delivery->id}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body d-flex flex-row justify-content-between">
                
                  <div class="form-group">
                    <label for="source_address">Source Address</label>
                    <textarea name="source_address" id="source_address" class="form-control" cols="40" rows="6" name="source_address">{{$delivery->source_address}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="destination_address">Destination Address</label>
                    <textarea name="destination_address" id="destination_address" class="form-control" cols="40" rows="6" name="destination_address">{{$delivery->destination_address}}</textarea>
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
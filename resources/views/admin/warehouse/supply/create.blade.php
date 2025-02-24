<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add New Supply</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/admin/warehouse/{{$spare_part->id}}/supply/save" enctype="multipart/form-data">
              @csrf
              <div class="card-body d-flex flex-row justify-content-between">
                
                  <div>
                    <p>Supply For : {{$spare_part->name}}</p>
                    <div class="form-group">
                        <label for="partner">Supplier</label>
                        <select class="form-control select2" style="width: 100%;" name="partner_id">
                        <option selected="selected">--Select Supplier--</option>
                        @foreach ($partners as $prt)
                            <option value="{{$prt->id}}">{{$prt->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity">
                    </div>
                  </div>
                  <div>
                    <div class="form-group">
                        <label for="note">Note</label><br>
                        <textarea name="note" id="note" class="form-control" cols="40" rows="5" name="note"></textarea>
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
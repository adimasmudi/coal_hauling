<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Assign Vechicle</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/admin/delivery/assign/update/{{$assigned->id}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body d-flex flex-row justify-content-between">
                <div>
                    <div class="form-group">
                        <label for="category">Vehicle</label>
                        <select class="form-control select2" style="width: 100%;" name="vehicle_id">
                            <option value="{{$assigned->vehicle->id}}" selected>{{$assigned->vehicle->name}}</option>
                            @foreach($vehicles as $vhc)
                              <option value="{{$vhc->id}}">{{$vhc->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Delivery</label>
                        <select class="form-control select2" style="width: 100%;" name="delivery_id">
                            @foreach($deliveries as $dvs)
                              @if($assigned->delivery_id == $dvs->id)
                                <option value="{{$dvs->id}}" selected>Delivery ID : {{$dvs->id}}</option>
                              @else
                                <option value="{{$dvs->id}}">Delivery ID : {{$dvs->id}}</option>
                              @endif
                                
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="note">Delivery Note</label><br>
                    <textarea name="note" id="note" class="form-control" cols="50" rows="10" name="note">{{$assigned->note}}</textarea>
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
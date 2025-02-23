<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Vehicle</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="/admin/vehicle/update/{{$vehicle->id}}" enctype="multipart/form-data">
              @csrf
              <div class="card-body d-flex flex-row justify-content-between">
                    <div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Vehicle Name" value="{{$vehicle->name}}">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control select2" style="width: 100%;" name="vehicle_status_id">
                            @foreach ($vehicle_statusses as $vs)
                                @if($vs->name == $vehicle->status->name)
                                    <option value="{{$vs->id}}" selected>{{str_replace("_"," ",$vs->name)}}</option>
                                @else
                                    <option value="{{$vs->id}}">{{str_replace("_"," ",$vs->name)}}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="weight">Weight</label>
                            <input type="number" class="form-control" id="weight" name="weight" placeholder="Enter Weight Value" value="{{$vehicle->weight}}">
                        </div>
                        <div class="form-group">
                            <label for="height">Height</label>
                            <input type="number" class="form-control" id="height" name="height" placeholder="Enter Height Value" value="{{$vehicle->height}}">
                        </div>
                        <div class="form-group">
                            <label for="length">Length</label>
                            <input type="number" class="form-control" id="length" name="length" placeholder="Enter Length Value" value="{{$vehicle->length}}">
                        </div>
                        <div class="form-group">
                            <label for="width">Width</label>
                            <input type="number" class="form-control" id="width" name="width" placeholder="Enter Width Value" value="{{$vehicle->width}}">
                        </div>
                        <div class="form-group">
                            <label for="capacity">Capacity</label>
                            <input type="number" class="form-control" id="capacity" name="capacity" placeholder="Enter Capacity Value" value="{{$vehicle->capacity}}">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="file" name="image" id="image" accept = 'image/jpeg , image/jpg, image/gif, image/png'>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control select2" style="width: 100%;" name="vehicle_category_id">
                            @foreach ($vehicle_categories as $vc)
                                @if($vc->name == $vehicle->category->name)
                                    <option value="{{$vc->id}}" selected>{{$vc->name}}</option>
                                @else
                                    <option value="{{$vc->id}}">{{$vc->name}}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="number_plate">Number Plate</label>
                            <input type="text" class="form-control" id="number_plate" name="number_plate" placeholder="Enter Number Plate Value" value="{{$vehicle->number_plate}}">
                        </div>
                        <div class="form-group">
                            <label for="fuel_needed">Fuel Needed</label>
                            <input type="number" class="form-control" id="fuel_needed" name="fuel_needed" placeholder="Enter Fuel Needed Value" value="{{$vehicle->fuel_needed}}">
                        </div>
                        <div class="form-group">
                            <label for="fuel_remaining">Full Remaining</label>
                            <input type="number" class="form-control" id="fuel_remaining" name="fuel_remaining" placeholder="Enter Fuel Remaining Value" value="{{$vehicle->fuel_remaining}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label><br>
                            <textarea name="description" id="description" class="form-control" cols="50" rows="10" name="description">{{$vehicle->description}}</textarea>
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
</x-layout>
<x-layout>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              

              <h3 class="profile-username text-center">{{$vehicle->name}}</h3>

              <p class="text-muted text-center">{{$vehicle->category->name}}</p>
              <p class="text-muted text-center">{{str_replace("_"," ",$vehicle->status->name)}}</p>


              <div class="d-flex flex-row">
                <a href="/admin/vehicle/edit/{{$vehicle->id}}" class="btn btn-warning mx-2">
                  <i class="fas fa-edit"></i> edit
                </a>
                <a href="#" class="btn btn-danger" id="delete" data-redirect="vehicle" data-url="vehicle/delete" data-id="{{$vehicle->id}}">
                  <i class="fas fa-trash"></i> Delete
                </a>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->

          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#detail" data-toggle="tab">Detail</a></li>
                <li class="nav-item"><a class="nav-link" href="#description" data-toggle="tab">Description</a></li>
                <li class="nav-item"><a class="nav-link" href="#image" data-toggle="tab">Image</a></li>
                
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="detail">
                  <ul >
                    <li>Weight : {{$vehicle->weight}} kilo gram</li>
                    <li>Height : {{$vehicle->height}} meter</li>
                    <li>Length : {{$vehicle->length}} meter</li>
                    <li>Width : {{$vehicle->width}} meter</li>
                    <li>Capacity : {{$vehicle->capacity}} kilo gram</li>
                    <li>Number Plate : {{$vehicle->number_plate}}</li>
                    <li>Fuel Needed : {{$vehicle->fuel_needed}}</li>
                    <li>Fuel Remaining : {{$vehicle->fuel_remaining}}</li>
                    <li>
                        Last Time Service : 
                        @if($vehicle->last_time_service)
                            {{date('d-M-Y H:i:s', strtotime($vehicle->last_time_service))}}
                        @endif
                    </li>
                    <li>Created At : {{date('d-M-Y H:i:s', strtotime($vehicle->created_at))}}</li>
                    <li>Last Updated : {{date('d-M-Y H:i:s', strtotime($vehicle->updated_at))}}</li>
                  </ul>
                  
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="description">

                  {{$vehicle->description}}
                </div>
                <!-- /.tab-pane -->
                   
                <div class="tab-pane" id="image">
                  <div class="d-flex flex-row">
                    
                      @if($vehicle->image_path)
                        <div class="card w-25 d-flex flex-row m-1">
                            <img src="{{asset('storage/'. $vehicle->image_path)}}" alt="" width="80%">
                        </div>
                      @endif
                   
                  </div>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</x-layout>
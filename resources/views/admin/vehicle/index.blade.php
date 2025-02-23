<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="/admin/vehicle/add" class="btn btn-primary w-25 mb-3">Add</a>
          <div class="card">
          @if($vehicles)
           <div class="card-header">
              <h3 class="card-title">Vehicles</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">id</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Category</th>
                      <th>Status</th>
                      <th>Last Time Service</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($vehicles as $vhc)
                    <tr>
                      <td>{{$vhc->id}}</td>
                      <td>{{$vhc->name}}</td>
                      <td>               
                        <img src="{{asset('storage/'. $vhc->image_path)}}" alt="" width="100px">              
                      </td>
                      <td>{{$vhc->category->name}}</td>
                      <td>{{str_replace("_"," ",$vhc->status->name)}}</td>
                      <td>{{$vhc->last_time_service}}</td>
                      <td class="d-flex flex-row">
                        <a href="/admin/vehicle/show/{{$vhc->id}}" class="btn btn-primary mx-2">
                          detail
                        </a>
                        <a href="/admin/vehicle/edit/{{$vhc->id}}" class="btn btn-warning mx-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger" id="delete" data-redirect="vehicle" data-url="vehicle/delete" data-id="{{$vhc->id}}">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div>
                {{$vehicles->links()}}
              </div>
            </div>
           @endif

          
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>
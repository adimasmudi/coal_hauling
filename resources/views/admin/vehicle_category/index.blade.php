<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <a href="/admin/vehicle-category/add" class="btn btn-primary w-25 mb-3">Add</a>
          <div class="card">
           @if($vehicle_category)
           <div class="card-header">
              <h3 class="card-title">Vehicle Category</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">id</th>
                      <th>Name</th>
                      <th>Icon</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($vehicle_category as $vc)
                    <tr>
                      <td>{{$vc->id}}</td>
                      <td>{{$vc->name}}</td>
                      <td>               
                        <img src="{{asset('storage/'. $vc->icon_path)}}" alt="" width="100px">              
                      </td>
                      <td class="d-flex flex-row">
                        <a href="/admin/vehicle-category/edit/{{$vc->id}}" class="btn btn-warning mx-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger" id="delete" data-redirect="vehicle-category" data-url="vehicle-category/delete" data-id="{{$vc->id}}">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div>
                {{$vehicle_category->links()}}
              </div>
            </div>
           @endif
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>
<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <a href="/admin/warehouse/add" class="btn btn-primary w-25 mb-3">Add</a>
          <div class="card">
          @if($spare_parts)
           <div class="card-header">
              <h3 class="card-title">Spare Parts</h3>
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
                      <th>Quantity</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($spare_parts as $sprt)
                    <tr>
                      <td>{{$sprt->id}}</td>
                      <td>{{$sprt->name}}</td>
                      <td>{{$sprt->image_path}}</td>
                      <td>{{$sprt->quantity}}</td>
                      <td class="d-flex flex-row">
                        <a href="/admin/warehouse/edit/{{$sprt->id}}" class="btn btn-warning mx-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger" id="delete" data-redirect="warehouse" data-url="warehouse/delete" data-id="{{$sprt->id}}">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div>
                {{$spare_parts->links()}}
              </div>
            </div>
           @endif
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>
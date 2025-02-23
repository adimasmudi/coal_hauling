<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <a href="/admin/partner/add" class="btn btn-primary w-25 mb-3">Add</a>
          <div class="card">
          @if($partners)
           <div class="card-header">
              <h3 class="card-title">Partners</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">id</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($partners as $prt)
                    <tr>
                      <td>{{$prt->id}}</td>
                      <td>{{$prt->name}}</td>
                      <td>{{$prt->address}}</td>
                      <td class="d-flex flex-row">
                        <a href="/admin/partner/edit/{{$prt->id}}" class="btn btn-warning mx-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger" id="delete" data-redirect="partner" data-url="partner/delete" data-id="{{$prt->id}}">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                    
                    @endforeach
                  </tbody>
                </table>
              </div>
              <div>
                {{$partners->links()}}
              </div>
            </div>
           @endif
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>
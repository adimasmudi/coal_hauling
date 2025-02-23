<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#assigned" data-toggle="tab">Assigned</a></li>
                <li class="nav-item"><a class="nav-link" href="#delivery" data-toggle="tab">Delivery</a></li>
              </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="assigned">
                        <div>
                            <a href="/admin/delivery/assign/add" class="btn btn-primary w-25 mb-3">Assign New</a>
                            <button class="deliver-all btn btn-primary w-25 mb-3" @if(count($assigned) < 1) disabled @endif>Deliver All</button>
                        </div>
                        <div class="card">
                            @if($assigned)
                            <div class="card-header">
                                <h3 class="card-title">Assigned Vehicles</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                <div>
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">id</th>
                                            <th>Vehicle Name</th>
                                            <th>Vehicle Number</th>
                                            <th>Delivery ID</th>
                                            <th>Delivery Status</th>
                                            <th>Created At</th>
                                            <th>Last Updated</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($assigned as $asg)
                                            <tr>
                                                <td>{{$asg->id}}</td>
                                                <td>{{$asg->vehicle->name}}</td>
                                                <td>{{$asg->vehicle->number_plate}}</td>
                                                <td>{{$asg->delivery_id}}</td>
                                                <td>{{$asg->status->name}}</td>
                                                <td>{{date('d-M-Y H:i:s', strtotime($asg->created_at))}}</td>
                                                <td>{{date('d-M-Y H:i:s', strtotime($asg->updated_at))}}</td>
                                                <td class="d-flex flex-row">
                                                    <a href="/admin/delivery/assign/edit/{{$asg->id}}" class="btn btn-warning mx-2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger" id="delete" data-redirect="delivery" data-url="delivery/assign/delete" data-id="{{$asg->id}}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                                <div>
                                    {{$assigned->links()}}
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="delivery">
                        <a href="/admin/delivery/add" class="btn btn-primary w-25 mb-3">Add New Delivery</a>
                        <div class="card">
                        @if($deliveries)
                            <div class="card-header">
                                <h3 class="card-title">Deliveries</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                <div>
                                    <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th style="width: 10px">id</th>
                                        <th>Source Address</th>
                                        <th>Destination Address</th>
                                        <th>Created At</th>
                                        <th>Last Updated</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($deliveries as $dlv)
                                        <tr>
                                        <td>{{$dlv->id}}</td>
                                        <td>{{$dlv->source_address}}</td>
                                        <td>{{$dlv->destination_address}}</td>
                                        <td>{{date('d-M-Y H:i:s', strtotime($dlv->created_at))}}</td>
                                        <td>{{date('d-M-Y H:i:s', strtotime($dlv->updated_at))}}</td>
                                        <td class="d-flex flex-row">
                                            <a href="/admin/delivery/show/{{$dlv->id}}" class="btn btn-primary mx-2">
                                            detail
                                            </a>
                                            <a href="/admin/delivery/edit/{{$dlv->id}}" class="btn btn-warning mx-2">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger" id="delete" data-redirect="delivery" data-url="delivery/delete" data-id="{{$dlv->id}}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                        </tr>
                                        
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                                <div>
                                    {{$deliveries->links()}}
                                </div>
                            </div>
                        @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>
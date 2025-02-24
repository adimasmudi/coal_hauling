<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Delivery Detail</h3>
            </div>
            <div class="card-body">
                
                <div>
                    <p>Source Address : {{$delivery->source_address}}</p>
                    <p>Destination Address : {{$delivery->destination_address}}</p>
                    <p>Created At : {{date('d-M-Y H:i:s', strtotime($delivery->created_at))}}</p>
                    <p>Last Update At : {{date('d-M-Y H:i:s', strtotime($delivery->updated_at))}}</p>
                </div>
                <div>
                  
                    @if($delivery->vehicleDeliveries)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">id</th>
                                    <th>Vehicle Name</th>
                                    <th>Vehicle Number</th>
                                    <th>Delivery Status</th>
                                    <th>Created At</th>
                                    <th>Last Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($delivery->vehicleDeliveries as $dlv)
                                <tr>
                                    <td>{{$dlv->id}}</td>
                                    <td>{{$dlv->vehicle->name}}</td>
                                    <td>{{$dlv->vehicle->number_plate}}</td>
                                    <td>{{str_replace("_"," ",$dlv->status->name)}}</td>
                                    <td>{{date('d-M-Y H:i:s', strtotime($dlv->created_at))}}</td>
                                    <td>{{date('d-M-Y H:i:s', strtotime($dlv->updated_at))}}</td>
                                    <td class="d-flex flex-row">
                                        <!-- Generate a unique modal ID -->
                                        @php
                                            $modalId = "modal-".$dlv->id;
                                        @endphp

                                        <!-- Action Button -->
                                        <button type="button" class="btn btn-info mx-2" data-toggle="modal" data-target="#{{$modalId}}">
                                            Action
                                        </button>

                                        <!-- Modal -->
                                        <div id="{{$modalId}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Action Modal</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div>
                                                            <p>Current Status: {{str_replace("_"," ",$dlv->status->name)}}</p>
                                                            <form method="POST" action="/admin/delivery/{{$delivery->id}}/vehicle-delivery/{{$dlv->id}}/status/update">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="delivery_status">Delivery Status</label>
                                                                    <select class="form-control select2" style="width: 100%;" name="delivery_status_id">
                                                                        <option selected="selected">--Select Delivery Status--</option>
                                                                        @foreach ($delivery_status as $ds)
                                                                            <option value="{{$ds->id}}">{{str_replace("_"," ",$ds->name)}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div>
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="mt-4">
                                                            <h5>Notes</h5>
                                                            <p>{{$dlv->note}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</x-layout>
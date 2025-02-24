<x-layout>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Spare Part Detail</h3>
            </div>
            <div class="card-body">
                <a href="/admin/warehouse/{{$spare_part->id}}/supply/add" class="btn btn-primary w-25 mb-3">Supply</a>
                <div>
                    <p>Name : {{$spare_part->name}}</p>
                    <p>Total Quantity : {{$spare_part->quantity}}</p>
                    <p>Note : {{$spare_part->description}}</p>
                </div>
                @if($partner_supplies)
                    <div class="card-header">
                        <h3 class="card-title">Suplies</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <div>
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th style="width: 10px">id</th>
                                <th>Supplier</th>
                                <th>Quantity</th>
                                <th>Supply Date</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($partner_supplies as $prs)
                                <tr>
                                <td>{{$prs->id}}</td>
                                <td>{{$prs->partner->name}}</td>
                                <td>{{$prs->quantity}}</td>
                                <td>{{date('d-M-Y H:i:s', strtotime($prs->created_at))}}</td>
                                <td class="d-flex flex-row">
                                    <a href="#" class="btn btn-danger" id="delete" data-redirect="warehouse/show/{{$spare_part->id}}" data-url="warehouse/{{$spare_part->id}}/supply/delete" data-id="{{$prs->id}}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                                </tr>
                                
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        <div>
                            {{$partner_supplies->links()}}
                        </div>
                        </div>
                    @endif
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
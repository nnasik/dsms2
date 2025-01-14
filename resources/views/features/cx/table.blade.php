<div class="card-body">
    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
       <div class="row">
          <div class="col-sm-12">
             <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                <thead>
                   <tr>
                      <th class="sorting" tabindex="0" aria-controls="example1">Service Consumer</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" >Service</th>
                      <th class="sorting" tabindex="0" aria-controls="example1"  >Service Requested</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" >Staus Updated</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" >SR Status</th>
                      <th class="sorting" tabindex="0" aria-controls="example1">Action</th>
                   </tr>
                </thead>
                <tbody>
                    @foreach($service_requests as $service_request)
                   
                   <tr>
                      <td>{{$service_request->cs_name}} ({{$service_request->cs_phone}})</td>
                      <td>{{$service_request->service->name}}</td>
                      <td>{{$service_request->opened_on}}</td>
                      <td>{{$service_request->updated_at}}</td>
                      <td>{{$service_request->status}}</td>
                      <td>
                        <a class="btn btn-outline-secondary btn-sm" href="{{route('cx.sr.view',$service_request->id)}}">View</a>
                        <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#close-sr-modal" onclick="closeModal('{{$service_request->id}}')">Udpdate</button>
                     </td>
                   </tr>
                   @endforeach
                </tbody>
                <tfoot>
                   <tr>
                      <th >Service Consumer</th>
                      <th >Service</th>
                      <th >Service Requested</th>
                      <th >Staus Updated</th>
                      <th >SR Status</th>
                      <th >Action</th>
                   </tr>
                </tfoot>
             </table>
          </div>
       </div>
    </div>
 </div>

 @include('features.cx.modals.update_sr')

<script>
    function closeModal(id){
        document.getElementById("sr_id").value = id;
    }
</script>

 @include('features.cx.modals.update_sr')

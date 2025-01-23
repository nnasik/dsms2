<div class="row">
    <!-- left column -->
    <div class="col-md-12">
            @csrf
            <input type="hidden" name="id" value="{{$service_request->id}}">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Service Request Information</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        SR Ref ID :
                                    </span>
                                </div>

                                <input type="text" class="form-control" value="{{$service_request->id}}"  />
                            </div>
                            <!-- /input-group -->
                        </div>

                        <div class="col-md-9 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Service Requested :
                                    </span>
                                </div>

                                <input type="text" name="inward_register_reference" class="form-control" value="{{$service_request->service->name}} - {{$service_request->service->branch}}" />
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        SC Name :
                                    </span>
                                </div>

                                <input type="text" class="form-control" value="{{$service_request->cs_name}}"  />
                            </div>
                            <!-- /input-group -->
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        SC Phone :
                                    </span>
                                </div>

                                <input type="text" name="inward_register_reference" class="form-control" value="{{$service_request->cs_phone}}" />
                            </div>
                            <!-- /input-group -->
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        SC NIC :
                                    </span>
                                </div>

                                <input type="text" name="inward_register_reference" class="form-control" value="{{$service_request->cs_nic}}" />
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>

                    

                    

                    

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Status
                                    </span>
                                </div>

                                <input type="text" class="form-control" value="{{$service_request->status}}"  />
                                
                                <div class="input-group-prepend">
                                    <button class="btn-outline-primary input-group-text" data-toggle="modal" data-target="#close-sr-modal" onclick="closeModal('{{$service_request->id}}')">
                                        Update
                                </button>
                                </div>
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Request Opened by
                                    </span>
                                </div>

                                <input readonly type="text" class="form-control"
                                    value="{{$service_request->user->name}} - {{$service_request->user->designation}} @ {{$service_request->created_at}}"
                                     />
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

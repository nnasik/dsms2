<!-- Modal -->
<div class="modal fade" id="create-personal-file-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form action="{{route('frontpage.store.personalfile')}}" method="post">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Presonal File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                    @csrf
                    <input type="hidden" name="type" value="personalfile">
                <div class="row">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">File No</span>
                            <input type="text" name="file_no" class="form-control" placeholder="Eg. Mr. John Doe">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Name of the Officer</span>
                            <input type="text" name="name_of_the_officer" class="form-control" placeholder="Eg. Mr. John Doe">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Designation</span>
                            <input type="text" name="designation" class="form-control" placeholder="Eg. Development Officer">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">DoB</span>
                            <input type="date" name="dob" class="form-control" >
                        </div>
                    </div>
                    <div class="col-lg-6 mx-0">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">NIC No</span>
                            <input type="text" name="nic" class="form-control" placeholder="Eg. 871234567V">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">DoA</span>
                            <input type="date" name="date_of_appointment" class="form-control" >
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">W&OP No.</span>
                            <input type="text" name="wnop_no" class="form-control" placeholder="Eg. 60303741">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Appoint Letter No</span>
                            <input type="text" name="appoint_letter_no" class="form-control" placeholder="Eg. CS/DOS/74154">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">DoI</span>
                            <input type="text" name="date_of_increment" class="form-control" placeholder="01st September">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">DoR</span>
                            <input type="date" name="date_of_retirement" class="form-control" placeholder="01st September">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Address</span>
                            <textarea name="private_address" class="form-control" rows=3></textarea>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" >Create</button>
                <!-- You can add additional buttons here -->
            </div>
        </div>
    </div>
    </form>
</div>

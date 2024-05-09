<!-- Modal -->
<div class="modal fade" id="create-subject-file-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form action="{{route('frontpage.store.subjectfile')}}" method="post">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Front Page</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                    @csrf
                    <input type="hidden" name="type" value="subjectfile">
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">File No.</span>
                            <input type="text" name="file_no" class="form-control" placeholder="Eg. ADM/GN-WARRENT/05/03">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Branch / Unit</span>
                            <input type="text" name="branch" class="form-control" placeholder="Eg. Establishment Branch">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Heading</span>
                            <input type="text" name="heading" class="form-control" placeholder="Eg. Grama Niladhari">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Sub Heading</span>
                            <input type="text" name="sub_heading" class="form-control" placeholder="Eg. Warrents Issued">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Year</span>
                            <input type="text" name="year" class="form-control" placeholder="Eg. 2023-2024">
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

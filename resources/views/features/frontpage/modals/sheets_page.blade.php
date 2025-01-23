<!-- Modal -->
<div class="modal fade" id="create-sheets-page-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form action="{{route('sheetspage.pdf')}}" method="post">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sheets Page</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                    @csrf
                    <input type="hidden" name="sheet_page_id" id="sheet_page_id"  value="">
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">No. of Sheets</span>
                            <input type="text" name="no_of_sheets" class="form-control" placeholder="Eg. 128">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">No. of name list sheets :</span>
                            <input type="text" name="no_of_name_list_sheets" class="form-control" placeholder="Eg. 02">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">No. of total sheets : </span>
                            <input type="text" name="no_of_total_sheets" class="form-control" placeholder="Eg. 126">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Prepared by :</span>
                            <input type="text" name="prepared_by" class="form-control" placeholder="Mrs. Alice (DO)">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Checked by :</span>
                            <input type="text" name="checked_by" class="form-control" placeholder="Eg. Mr. Bob (CMSO)">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Certified by :</span>
                            <input type="text" name="certified_by" class="form-control" placeholder="Eg. Mrs. Charlie (Accountant)">
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Create</button>
                <!-- You can add additional buttons here -->
            </div>
        </div>
    </div>
    </form>
</div>

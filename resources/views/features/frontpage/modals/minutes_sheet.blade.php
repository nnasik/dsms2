<!-- Modal -->
<div class="modal fade" id="create-minutes-sheet-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form action="{{route('minutes.pdf')}}" method="get">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Minutes Sheet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    @csrf
                    <input type="hidden" name="minutes_sheet_page_id" id="minutes_sheet_page_id"  value="">
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Sheet No</span>
                            <input type="text" name="no_of_sheets" class="form-control" placeholder="Eg. 128">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a target="_blank" id="" class="btn btn-success" href="">Create</a>
                <!-- You can add additional buttons here -->
            </div>
        </div>
    </div>
    </form>
</div>

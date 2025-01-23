<!-- Modal -->
<div class="modal fade" id="close-sr-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <form action="{{route('sr.update')}}" method="post">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Service Request - Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                    @csrf
                    <input type="hidden" name="sr_no" value="">
                    <p>Do you want to close this Service Request ?</p>
                <div class="row">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Service Request No</span>
                            <input type="text" id="sr_id" name="sr_id" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Request Closed By</span>
                            <input type="text" class="form-control" value="{{Auth::user()->name}} - {{Auth::user()->designation}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Status</span>
                            <select name="status" class="form-control" id="status">
                                <option value="Completed">Completed</option>
                                <option value="Document Pending">Document Pending</option>
                                <option value="Reopen">Reopen</option>
                                <option value="Waiting for SC Action">Waiting for SC Action</option>
                                <option value="Waiting for Approval">Waiting for Approval</option>
                                <option value="Processing">Processing</option>
                                <option value="Deferred">Deferred</option>
                                <option value="Rejected">Rejected</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Reason for Update - Note</span>
                            <textarea name="note" id="note" class="form-control" rows=3>Service provided successfully, and the service consumer is satisfied with the service delivery.</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button type="submit" class="btn btn-primary">Update Service Request</button>
                <!-- You can add additional buttons here -->
            </div>
        </div>
    </div>
    </form>
    <script>
        // Add an event listener to the dropdown
        document.getElementById("status").addEventListener("change", function () {
            // Get the text area element
            const noteTextArea = document.getElementById("note");
            // Clear the text area
            if (noteTextArea) {
                noteTextArea.value = "";
            } else {
                console.error("Element with ID 'note' not found.");
            }
        });
    </script>
</div>

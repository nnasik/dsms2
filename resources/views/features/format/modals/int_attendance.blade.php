<!-- Modal -->
<div class="modal fade" id="internal-meeting-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Internal Meeting Attendance</h5>
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
                            <span class="input-group-text" id="basic-addon1">Program Name</span>
                            <input type="text" id="program_name-int" class="form-control" placeholder="Eg. Divisional Cultural Program">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Venue</span>
                            <input type="text" id="venue-int" class="form-control" placeholder="Eg. Conferece Hall- Divisional Secretariat Oddamavadi">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">Date</span>
                            <input type="date" id="date-int" class="form-control" >
                        </div>
                    </div>
                    <div class="col-lg-6 mx-0">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">Time</span>
                            <input type="time" id="time-int" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">No of Participants</span>
                            <input type="number" id="no_of_participants-int" class="form-control" >
                            <span class="input-group-text" id="basic-addon1">
                                <input type="checkbox" id="numbered-int">  Numbered
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Header Line</span>
                            <textarea id="header_line-int" class="form-control" rows=3></textarea>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  id="dismissBtn-int" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" id="submitBtn-int">Create</button>
                <!-- You can add additional buttons here -->
            </div>
        </div>
    </div>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("submitBtn-int").addEventListener("click", function () {
        // Get values from input fields
        const programName = document.getElementById("program_name-int").value;
        const venue = document.getElementById("venue-int").value;
        const date = document.getElementById("date-int").value;
        const time = document.getElementById("time-int").value;
        const headerLine = document.getElementById("header_line-int").value;
        const no_of_participants = document.getElementById("no_of_participants-int").value;
        const numbered = document.getElementById("numbered-int").checked;
        
        // Construct query parameters
        const queryParams = new URLSearchParams({
            program_name: programName,
            venue: venue,
            date: date,
            time: time,
            header_line: headerLine,
            no_of_participants: no_of_participants,
            numbered: numbered
        }).toString();

        // Define the target URL (replace with your actual endpoint)
        const url = `{{route("format.intMeetingPDF")}}?${queryParams}`;

        // Open the request in a new tab
        window.open(url, "_blank");

        // Close the Bootstrap modal
        const modalDismiss = document.getElementById("dismissBtn-int"); // Replace with actual modal ID
        modalDismiss.click(); // Programmatically click the button
    });
});

    </script>
</div>

<!-- Modal -->
<div class="modal fade" id="traning-attendance-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Traning Attendance</h5>
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
                            <span class="input-group-text" id="basic-addon1">Training Program</span>
                            <input type="text" id="program_name-tra" class="form-control" placeholder="Eg. Aswasuma Enumuration Traning">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Venue</span>
                            <input type="text" id="venue-tra" class="form-control" placeholder="Eg. Conferece Hall- Divisional Secretariat Oddamavadi">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">Date</span>
                            <input type="date" id="date-tra" class="form-control" >
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">No of Participants</span>
                            <input type="number" id="no_of_participants-tra" class="form-control" >
                            <span class="input-group-text" id="basic-addon1">
                                <input type="checkbox" id="numbered-tra">  Numbered
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="input-group mr-3">
                            <span class="input-group-text" id="basic-addon1">Header Line</span>
                            <textarea id="header_line-tra" class="form-control" rows=3 placeholder="Attendance of Participans"></textarea>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  id="dismissBtn-tra" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" id="submitBtn-tra">Create</button>
                <!-- You can add additional buttons here -->
            </div>
        </div>
    </div>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("submitBtn-tra").addEventListener("click", function () {
        // Get values from input fields
        const programName = document.getElementById("program_name-tra").value;
        const venue = document.getElementById("venue-tra").value;
        const date = document.getElementById("date-tra").value;
        const headerLine = document.getElementById("header_line-tra").value;
        const no_of_participants = document.getElementById("no_of_participants-tra").value;
        const numbered = document.getElementById("numbered-tra").checked;
        
        // Construct query parameters
        const queryParams = new URLSearchParams({
            program_name: programName,
            venue: venue,
            date: date,
            header_line: headerLine,
            no_of_participants: no_of_participants,
            numbered: numbered
        }).toString();

        // Define the target URL (replace with your actual endpoint)
        const url = `{{route("format.trainingPDF")}}?${queryParams}`;

        // Open the request in a new tab
        window.open(url, "_blank");

        // Close the Bootstrap modal
        const modalDismiss = document.getElementById("dismissBtn-tra"); // Replace with actual modal ID
        modalDismiss.click(); // Programmatically click the button
    });
});

    </script>
</div>

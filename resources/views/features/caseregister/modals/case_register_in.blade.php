<!-- Modal -->
<div class="modal fade" id="incomingModal" tabindex="-1" role="dialog" aria-labelledby="incomingModalLabel" aria-hidden="true">
  <form action="{{route('caseregister.store')}}">
    @csrf
    <input type="hidden" name="front_page_id" id="document-id" value="">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="incomingModalLabel">Add to Case Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="incomingForm">
          <div class="form-group">
            <label for="incomingType">File Incoming From</label><br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="incoming_type" id="incomingOpen" value="Open">
              <label class="form-check-label" for="incomingOpen">New File / Open</label>
            </div>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="incoming_type" id="incomingOfficers" value="Officers">
              <label class="form-check-label" for="incomingOfficers">Received from Officers</label>
            </div>
            <br>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="incoming_type" id="incomingOther" value="Other">
              <label class="form-check-label" for="incomingOther">Other / Department</label>
            </div>
          </div>
          <div id="otherInput" class="form-group" style="display: none;">
            <label for="incomingOtherText">Other / Department Name</label>
            <input type="text" class="form-control" id="incomingOtherText" name="incoming_other">
          </div>
          <div id="officersDropdown" class="form-group" style="display: none;">
            <label for="incomingOfficersSelect">Officer</label>
            <select class="form-control" id="incomingOfficersSelect" name="incoming_from">
              <!-- Options will be fetched dynamically via JavaScript -->
            </select>
          </div>
          <div class="form-group">
            <label for="incomingDate">Incoming Date</label>
            <input type="date" class="form-control" id="incomingDate" name="incoming_date">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
  </form>
</div>

<script>
  $(document).ready(function() {
    // Function to fetch active users and populate dropdown
    function fetchActiveUsers() {
      $.get('/users/list/active', function(data) {
        $('#incomingOfficersSelect').empty();
        data.forEach(function(user) {
          $('#incomingOfficersSelect').append('<option value="' + user.id + '">' + user.name + '</option>');
        });
      });
    }

    // Show or hide input fields based on selected incoming type
    $('input[name="incoming_type"]').change(function() {
      if ($(this).val() === 'Other') {
        $('#otherInput').show();
        $('#officersDropdown').hide();
      } else if ($(this).val() === 'Officers') {
        $('#otherInput').hide();
        $('#officersDropdown').show();
        // Fetch officer list from '/users/list/active' URL and populate dropdown
        fetchActiveUsers();
      } else {
        $('#otherInput').hide();
        $('#officersDropdown').hide();
      }
    });
  });
</script>


<script>
  function changeModalTitle(title,id) {
    document.getElementById('incomingModalLabel').innerText = "Add " + title + " to Case Register";
    document.getElementById('document-id').value = id;
  }
</script>

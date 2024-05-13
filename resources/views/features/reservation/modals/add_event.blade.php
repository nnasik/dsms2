<!-- Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel"
    aria-hidden="true">
    <form action="{{route('reservation.store')}}" method="post">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Request Reservation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="eventForm">
                        <div class="form-group">
                            <label for="eventDate">Date of Event</label>
                            <input type="text" name="event_date" class="form-control" id="eventDate" readonly>
                        </div>
                        <div class="form-group">
                            <label for="eventName">Name of Event</label>
                            <input type="text" name="name_of_event" class="form-control" id="eventName">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="eventStartTime">Start Time</label>
                                    <input type="time" name="start_time" class="form-control" id="eventStartTime">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="eventEndTime">End Time</label>
                                    <input type="time" name="end_time" class="form-control" id="eventEndTime">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="participations">Participations</label>
                                    <input type="number" name="participations" class="form-control" id="participations">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="eventName">Note</label>
                            <textarea type="text" name="note" class="form-control" rows="3"></textarea>
                        </div>



                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveEvent">Request</button>
                </div>
            </div>
        </div>
    </form>
</div>

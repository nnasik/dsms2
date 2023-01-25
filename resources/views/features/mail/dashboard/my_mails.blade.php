<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">From</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($my_mails as $mail)
                    @if($mail->expected_date_of_reply < date("Y-m-d") && $mail->status != 'Replied')
                        <tr class="alert-danger clickable-row" role="button"
                            onclick="window.location='/mail/view/{{$mail->id}}/'">
                            @elseif($mail->expected_date_of_reply == date("Y-m-d") && $mail->status != 'Replied')
                        <tr class="alert-warning clickable-row" role="button"
                            onclick="window.location='/mail/view/{{$mail->id}}/'">
                            @elseif($mail->status == 'Replied')
                        <tr class="alert-success clickable-row" role="button"
                            onclick="window.location='/mail/view/{{$mail->id}}/'">
                            @else
                        <tr class="" role="button" onclick="window.location='/mail/view/{{$mail->id}}/'">
                            @endif
                            <td>{{$mail->inward_register_reference}}</td>
                            <td>{{$mail->from_whom}}</td>
                            <td>{{$mail->subject}}</td>
                            <td>{{$mail->status}}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <!-- general form elements -->
    <div class="col-12">
        @if($mail->assigned_to == Auth::user()->id)
        <form action="/mail/subject" id="form" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$mail->id}}">
            @endif
            <div class="card card-{{$bg_color}}">
                <div class="card-header">
                    <h3 class="card-title">Subject Officer</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <div class="image">
                                @if(isset($mail->subject_officer))
                                @if(file_exists('storage/user/dp/'. $mail->subjectOfficer->profile_pic))
                                <img src="{{asset('storage/user/dp/'.$mail->subjectOfficer->profile_pic)}}"
                                    class="img-circle" alt="User Image" width="100">
                                @else
                                <img src="{{asset('storage/user/dp.png')}}" class="img-circle" alt="User Image"
                                    width="100">
                                @endif
                                @endif

                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Subject Officer
                                            </span>
                                        </div>

                                        <select class="custom-select form-control" id="subject_officer"
                                            name="subject_officer">
                                            <option value="">Select Officer</option>
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}" {{$user->id===$mail->subject_officer ?
                                                "selected":""}}>{{$user->name}} - {{$user->designation}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Assigned On
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" value="{{$mail->subject_officer_on}}" />
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Status
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" value="{{$mail->status}}" />
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <!-- /input-group -->
                            </div>
                            @if($mail->assigned_to == Auth::user()->id)
                            <div class="row">
                                <div class="col-md-10 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Note to Subject Officer
                                            </span>
                                        </div>
                                        <input type="text" name="note_to_subject_officer" class="form-control" value="{{$mail->note_to_subject_officer}}" />
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="submit" value="Update" class="btn btn-success float-right">
                                    </div>
                                    <!-- /input-group -->
                                </div>
                            </div>
                            @endif
                        </div>

                    </div>

                </div>

            </div>
        </form>
    </div>
</div>
<div class="row">
    <!-- general form elements -->
    <div class="col-md-12">
        <div class="card card-{{$bg_color}}">
            <div class="card-header">
                <h3 class="card-title">Reply</h3>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    Expected Date of Reply
                                </span>
                            </div>

                            <input type="text" class="form-control" value="{{$mail->expected_date_of_reply}}" />
                        </div>
                        <!-- /input-group -->
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    Current Status
                                </span>
                            </div>
                            <input type="text" class="form-control" value="{{$mail->status}}" />
                        </div>
                        <!-- /input-group -->
                    </div>
                </div>
                <form action="/mail/updatereply" id="form" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$mail->id}}" />
                    <div class="row">
                        <div class="col-md-4 mb-3">

                            <input type="hidden" name="mail_id" value="{{$mail->id}}">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Outward Mode
                                    </span>
                                </div>
                                <select class="custom-select form-control" id="outward_mode" name="outward_mode">
                                    <option value="Post" @if($mail->outward_mode=='Post') selected @endif>Post</option>
                                    <option value="Fax" @if($mail->outward_mode=='Fax') selected @endif>Fax</option>
                                    <option value="Email" @if($mail->outward_mode=='Email') selected @endif>Email
                                    </option>
                                    <option value="By Hand" @if($mail->outward_mode=='By Hand') selected @endif>By Hand
                                    </option>
                                </select>
                            </div>

                            <!-- /input-group -->
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        File No
                                    </span>

                                </div>
                                <input name="file_no" type="text" value="{{$mail->file_no}}" class="form-control" />

                            </div>
                            <!-- /input-group -->
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Reply Date
                                    </span>
                                </div>

                                <input name="replied_date" type="date"
                                    value="@if(isset($mail->replied_date)){{$mail->replied_date}}@else{{date('Y-m-d')}}@endif"
                                    class="form-control" />
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            @if($mail->assigned_to == Auth::user()->id || $mail->subject_officer == Auth::user()->id)
                            <form action="/mail/updatereply" id="reply-form" method="POST">
                                @csrf
                                <input type="hidden" name="mail_id" value="{{$mail->id}}">
                                @endif
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Change Status To
                                        </span>
                                    </div>
                                    <select class="custom-select form-control" id="status" name="status">
                                        <option value="">Select New Status</option>
                                        <option value="Temporary Reply" @if($mail->status=='Temporary Reply') selected @endif>Temporary Reply</option>
                                        <option value="Replied" @if($mail->status=='Replied') selected @endif>Replied</option>
                                    </select>
                                </div>

                                <!-- /input-group -->
                        </div>

                        <div class="col-md-5 ">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Outward Register Reference
                                    </span>

                                </div>
                                <input name="outward_register_reference" type="text" value="{{$mail->outward_register_reference}}"
                                    class="form-control" />
                            </div>
                            <!-- /input-group -->
                        </div>
                        @if($mail->assigned_to == Auth::user()->id || $mail->subject_officer == Auth::user()->id)
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
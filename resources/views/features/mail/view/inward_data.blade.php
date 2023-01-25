<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <form action="/mail/update" id="form" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$mail->id}}">
            <!-- general form elements -->
            <div class="card card-{{$bg_color}}">
                <div class="card-header">
                    <h3 class="card-title">Mail - Inward</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Inward Mode
                                    </span>
                                </div>
                                <select class="custom-select form-control" id="inward_mode" name="inward_mode">
                                    <option value="" {{$mail->inward_mode==="" ? "selected":""}}></option>
                                    <option value="Post" {{$mail->inward_mode==="Post" ? "selected":""}}>Post</option>
                                    <option value="Fax" {{$mail->inward_mode==="Fax" ? "selected":""}}>Fax</option>
                                    <option value="Phone" {{$mail->inward_mode==="Phone" ? "selected":""}}>Phone
                                    </option>
                                    <option value="Email" {{$mail->inward_mode==="Email" ? "selected":""}}>Email
                                    </option>
                                    <option value="By Hand" {{$mail->inward_mode==="By Hand" ? "selected":""}}>By Hand
                                    </option>
                                    <option value="Social Media" {{$mail->inward_mode==="Social Media" ?
                                        "selected":""}}>Social Media</option>
                                    <option value="Other" {{$mail->inward_mode==="Other" ? "selected":""}}>Other
                                    </option>
                                </select>

                                <!--<input type="text" class="form-control" value="{{$mail->inward_mode}}"  />-->
                            </div>
                            <!-- /input-group -->
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Inward Register Reference
                                    </span>
                                </div>

                                <input type="text" name="inward_register_reference" class="form-control" value="{{$mail->inward_register_reference}}" />
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Date in Letter
                                    </span>
                                </div>

                                <input type="date" name="date_in_letter" class="form-control" value="{{$mail->date_in_letter}}" />
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Received Date
                                    </span>
                                </div>

                                <input type="date" name="date_of_receipt" class="form-control" value="{{$mail->date_of_receipt}}" />
                            </div>
                            <!-- /input-group -->
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Expected Date of Reply
                                    </span>
                                </div>

                                <input type="date" name="expected_date_of_reply" class="form-control" value="{{$mail->expected_date_of_reply}}" />
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        From
                                    </span>
                                </div>

                                <input type="text" name="from_whom" class="form-control" value="{{$mail->from_whom}}" />
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Letter No
                                    </span>
                                </div>

                                <input type="text" class="form-control" name="letter_no" value="{{$mail->letter_no}}" />
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Subject
                                    </span>
                                </div>
                                <textarea name="subject" class="form-control" rows="4">{{$mail->subject}}</textarea>
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Status
                                    </span>
                                </div>

                                <input type="text" class="form-control" value="{{$mail->status}}"  />
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        Data Entry
                                    </span>
                                </div>

                                <input type="text" class="form-control"
                                    value="{{$mail->dataEnteredBy->name}} - {{$mail->dataEnteredBy->designation}} @ {{$mail->created_at}}"
                                     />
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="Update" class="btn btn-success float-right">
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <!-- general form elements -->
    <div class="col-12">
        <form action="/mail/assign" id="form" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{$mail->id}}">
            <div class="card card-{{$bg_color}}">
                <div class="card-header">
                    <h3 class="card-title">Assigned Officer</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <div class="image">
                                @if(isset($mail->assigned_to))
                                @if(file_exists('storage/user/dp/'. $mail->assignedTo->profile_pic))
                                <img src="{{asset('storage/user/dp/'.$mail->assignedTo->profile_pic)}}"
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
                                                Assigned To
                                            </span>
                                        </div>

                                        <select class="custom-select form-control" id="assigned_to" name="assigned_to">
                                            <option value="">Select Officer</option>
                                            @foreach($users as $user)
                                            <option @if(file_exists('storage/user/dp/'. $user->profile_pic))
                                                data-thumbnail={{asset('storage/user/dp/'.$user->profile_pic)}}
                                                @else
                                                data-thumbnail={{asset('storage/user/dp.png')}}
                                                @endif

                                                value="{{$user->id}}" {{$user->id===$mail->assigned_to ?
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
                                        <input type="text" class="form-control" value="{{$mail->assigned_on}}" />
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
                            </div>
                            @can('manage.mail')
                            <div class="row">
                                <div class="col-md-10 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Note to Assigned Officer
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="note_to_assigned_officer" value="{{$mail->note_to_assigned_officer}}" />
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
                            @endcan
                        </div>

                        <!-- /input-group -->
                    </div>

                </div>

            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $('#assigned_to').select2({
        ajax: {
            url: '/ajax/user-autocomplete-search',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name + " - " + item.designation,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>
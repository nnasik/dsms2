@extends('layouts.feature')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1 class="m-0">Mail</h1>
                </div><!-- /.col -->
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/mail">Mail</a></li>
                        <li class="breadcrumb-item active">{{$heading}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-9">
                    <h5 class="m-2">{{$heading}}</h5>
                </div>
                @can('manage.mail')
                <div class="col-3 float-right">
                    <a href="/mail/new" class="btn btn-block btn-success align-right"><i
                            class="fa fa-solid fa-plus"></i> New</a>
                </div>
                @endcan
            </div>
            <div class="row mt-2">
                <!-- left column -->

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
                                        <th scope="col">Assigned</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mails as $mail)

                                    @if($mail->expected_date_of_reply < date("Y-m-d") && $mail->status != 'Replied')
                                        <tr class="alert-danger clickable-row" role="button"
                                            onclick="window.location='/mail/view/{{$mail->id}}/'">
                                            @elseif($mail->expected_date_of_reply == date("Y-m-d") && $mail->status !=
                                            'Replied')
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
                                            <td>
                                                <div class="image">
                                                    @if(isset($mail->assignedTo))
                                                        @if(file_exists('storage/user/dp/'.$mail->assignedTo->profile_pic))
                                                        <img src="{{asset('storage/user/dp/'.$mail->assignedTo->profile_pic)}}"
                                                            class="img-circle" alt="User Image" width="50">
                                                        @else
                                                        <img src="{{asset('storage/user/dp.png')}}" class="img-circle"
                                                            alt="User Image" width="50">
                                                        @endif
                                                    @endif
                                                </div>
                                            </td>

                                        </tr>

                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </section>
</div>
@endsection
@extends('layouts.feature')

@php  
    $bg_color = null;
    if($mail->status =='Assigned'){
        $bg_color = "primary";
    }
    elseif($mail->status =='Temporary Reply'){
        $bg_color = "warning";
    }
    elseif($mail->status =='Due'){
        $bg_color = "danger";
    }
    elseif($mail->status =='Replied'){
        $bg_color = "success";
    }
@endphp

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1 class="m-0">View Mail - {{$mail->id}}</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="/mail">Mail</a>
                        </li>
                        <li class="breadcrumb-item">view</li>
                        <li class="breadcrumb-item active">{{$mail->id}}</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @include('features.mail.view.inward_data')
            @include('features.mail.view.mail_document')
            @include('features.mail.view.assigned_data')
            @include('features.mail.view.subject_officer')
            @include('features.mail.view.reply_data')
            @include('features.mail.view.reply_document')
            @include('features.mail.view.history')
        </div>
        <!-- /.card -->
    </section>
</div>
<script>
    function selectMailDocument(document_no) {
        $("#document_no").val(document_no);
        $("#document").click();
    }

    function uploadMailDocument() {
        $("#mail-document-form").submit();
    }

    function selectReplyDocument(document_no) {
        $("#reply-document-no").val(document_no);
        $("#reply-document").click();
    }

    function uploadReplyDocument() {
        $("#reply-document-form").submit();
    }
</script>
@endsection
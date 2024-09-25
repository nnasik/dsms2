@extends('layouts.feature')

@section('content')
<div class="content-wrapper">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Custom CSS-->
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h3 class="m-0">My Case Register</h3>
                </div>
                <!-- /.col -->
                <div class="col-sm-3">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{route('frontpage.index')}}">Frontpage</a>
                        </li>
                        <li class="breadcrumb-item">Case Register</li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="card">
                    <table class="table table-bordered mt-3">
                        <tr>
                            <th colspan="7" class="text-center text-primary">Case Register</th>
                        </tr>
                        <tr>
                            <td colspan="7" class="text-center text-dark">Registers</td>
                        </tr>

                        <tr>
                            <th>S.No</th>
                            <th>Open / Received</th>
                            <th>File No</th>
                            <th>Subject</th>
                            <th>Sent to Store / Other Department</th>
                            <th>Movement Card No</th>
                            <th>Action</th>
                        </tr>
                        @php
                        $i=1;
                        @endphp
                        @foreach($case_register_registers as $entry)
                        <tr>
                            <td>{{$i}}</td>
                            <td>
                                @if($entry->incoming_type=='Open')
                                    New file Open
                                @elseif($entry->incoming_type=='Other')
                                    Received from Other Department / Office
                                @endif
                                @if($entry->incoming_from_custom)
                                    <br>{{$entry->incoming_from_custom}}
                                @endif
                                
                                <br>on {{$entry->incoming_date}}
                            </td>
                            <td>{{$entry->file->file_no}}</td>
                            <td>{{$entry->file->heading}}<br>{{$entry->file->sub_heading}}</td>
                            <td></td>
                            <td>{{$entry->file->file_no}}</td>
                            <td>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#" onclick="">Case Reg <i class="fa-solid fa-right-from-bracket"></i></a>
                            
                            </td>
                        </tr>
                        @php $i++; @endphp
                        @endforeach
                        <tr>
                            <td colspan="7" class="text-center text-dark">Subject Files</td>
                        </tr>

                        <tr>
                            <th>S.No</th>
                            <th>Open / Received</th>
                            <th>File No</th>
                            <th>Subject</th>
                            <th>Sent to Store / Other Department</th>
                            <th>Movement Card No</th>
                            <th>Action</th>
                        </tr>
                        @php
                        $i=1;
                        @endphp
                        @foreach($case_register_sub_files as $entry)
                        <tr>
                            <td>{{$i}}</td>
                            <td>
                                @if($entry->incoming_type=='Open')
                                    New file Open
                                @elseif($entry->incoming_type=='Other')
                                    Received from Other Department / Office
                                @endif
                                @if($entry->incoming_from_custom)
                                    <br>{{$entry->incoming_from_custom}}
                                @endif
                                
                                <br>on {{$entry->incoming_date}}
                            </td>
                            <td>{{$entry->file->file_no}}</td>
                            <td>{{$entry->file->heading}}<br>{{$entry->file->sub_heading}}</td>
                            <td></td>
                            <td>{{$entry->file->file_no}}</td>
                            <td>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#" onclick="">Case Reg <i class="fa-solid fa-right-from-bracket"></i></a>
                            
                            </td>
                        </tr>
                        @php $i++; @endphp
                        @endforeach

                        <tr>
                            <td colspan="7" class="text-center text-dark">Personal Files</td>
                        </tr>

                        <tr>
                            <th>S.No</th>
                            <th>Open / Received</th>
                            <th>File No</th>
                            <th>Subject</th>
                            <th>Sent to Store / Other Department</th>
                            <th>Movement Card No</th>
                            <th>Action</th>
                        </tr>
                        @php
                        $i=1;
                        @endphp
                        @foreach($case_register_personal_files as $entry)
                        <tr>
                            <td>{{$i}}</td>
                            <td>
                                @if($entry->incoming_type=='Open')
                                    New file Open
                                @elseif($entry->incoming_type=='Other')
                                    Received from Other Department / Office
                                @endif
                                @if($entry->incoming_from_custom)
                                    <br>{{$entry->incoming_from_custom}}
                                @endif
                                
                                <br>on {{$entry->incoming_date}}
                            </td>
                            <td>{{$entry->file->file_no}}</td>
                            <td>{{$entry->file->heading}}<br>{{$entry->file->sub_heading}}</td>
                            <td></td>
                            <td>{{$entry->file->file_no}}</td>
                            <td>
                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#incomingModal" onclick="">Case Reg <i class="fa-solid fa-right-from-bracket"></i></a>
                            
                            </td>
                        </tr>
                        @php $i++; @endphp
                        @endforeach
                    </table>

                    <table class="table table-bordered mt-3">
                        <tr>
                            <th colspan="7" class="text-center text-danger">Files not in Case Register</th>
                        </tr>
                        <tr>
                            <th>S.No</th>
                            <th>Document Type</th>
                            <th>File No</th>
                            <th>Subject</th>
                            <th>Sent to Store / Other Department</th>
                            <th>Movement Card No</th>
                            <th>Action</th>
                        </tr>
                        @php
                        $i=1;
                        @endphp
                        @foreach($filteredDocuments as $document)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$document->type}}</td>
                            <td>{{$document->file_no}}</td>
                            <td>{{$document->heading}}<br>{{$document->sub_heading}}</td>
                            <td></td>
                            <td>{{$document->file_no}}</td>
                            <td>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#incomingModal" onclick="changeModalTitle('{{$document->file_no}}',{{$document->id}})"><i class="fa-solid fa-right-to-bracket" ></i> Case Reg</a>
                            </td>
                        </tr>
                        @php $i++; @endphp
                        @endforeach
                    </table>
                </div>
            </div>
        
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


</div>

@include('features.caseregister.modals.case_register_in')
@endsection

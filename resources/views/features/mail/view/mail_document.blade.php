<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-{{$bg_color}}">
            <div class="card-header">
                <h3 class="card-title">Scan Document</h3>
            </div>
            <div class="card-body">
                <form action="/mail/upload" id="mail-document-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="id" value="{{$mail->id}}" />
                        <input type="hidden" name="document_no" id="document_no" value="0" />
                        <input type="file" name="document" id="document" onchange="uploadMailDocument()" hidden />
                        <div class="col-lg-1 col-4">
                            @php
                            $pieces = explode(".", $mail->document_1);
                            @endphp

                            @if(isset($mail->document_1) && file_exists('storage/mail/'.$mail->document_1))
                                <a target="_new" href="/storage/mail/{{$mail->document_1}}">
                                    <img src="/img/mail/{{$pieces[count($pieces)-1]}}.png" role="button" width="90" />
                                    <p class="d-flex justify-content-center">{{$mail->document_1}}</p>
                                </a>
                            @else
                                @can('manage.mail')
                                <img src="/img/mail/add_file.png" role="button" width="90" onclick="selectMailDocument(1)" />
                                
                                @endcan
                            @endif
                        </div>
                        <div class="col-lg-1 col-4">
                            @php
                            $pieces = explode(".", $mail->document_2);
                            @endphp

                            @if(isset($mail->document_2) && file_exists('storage/mail/'.$mail->document_2))
                                <a target="_new" href="/storage/mail/{{$mail->document_2}}">
                                    <img src="/img/mail/{{$pieces[count($pieces)-1]}}.png" role="button" width="90" />
                                    <p class="d-flex justify-content-center">{{$mail->document_2}}</p>
                                </a>
                            @else
                                @can('manage.mail')
                                <img src="/img/mail/add_file.png" role="button" width="90" onclick="selectMailDocument(2)" />
                                @endcan
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
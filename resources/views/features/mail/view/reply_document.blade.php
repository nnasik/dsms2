<div class="row">
    <!-- general form elements -->
    <div class="col-md-12">
        <div class="card card-{{$bg_color}}">
            <div class="card-header">
                <h3 class="card-title">Reply Document</h3>
            </div>
            <div class="card-body">
                <form action="/mail/uploadreply" id="reply-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="mail_id" value="{{$mail->id}}" />
                        <input type="hidden" name="reply_document_no" id="reply-document-no" value="0" />
                        <div class="col-lg-1 col-4 mb-3">
                            @php
                            $pieces = explode(".", $mail->reply_document_1);
                            @endphp

                            @if(isset($mail->reply_document_1) &&
                            file_exists('storage/mail/'.$mail->reply_document_1))
                            <a target="_new" href="/storage/mail/{{$mail->reply_document_1}}">
                                <img src="/img/mail/{{$pieces[count($pieces)-1]}}.png" role="button" width="90" />
                                <p class="d-flex justify-content-center">{{$mail->reply_document_1}}</p>
                            </a>
                            @else
                            <img src="/img/mail/add_file.png" role="button" width="90"
                                onclick="replyDocumentSelector()" />
                            <input type="file" name="reply_document" id="reply-document"
                                onchange="uploadReplyDocument(1)" hidden />
                            @endif
                        </div>

                        <div class="col-lg-1 col-4 mb-3">
                            <img src="/img/mail/add_file.png" class="d-flex" role="button" width="90" alt=""
                                onclick="" />
                        </div>
                        <div class="col-lg-1 col-4 mb-3">
                            <img src="/img/mail/add_file.png" class="d-flex" role="button" width="90" alt=""
                                onclick="" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
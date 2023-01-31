
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    @if($mail_count_due > 0)
        <div class="small-box bg-warning">
    @else
        <div class="small-box bg-secondary">
    @endif
    
        <div class="inner">
            <h3>{{$mail_count_due}}</h3>

            <p>Due</p>
        </div>
        <div class="icon">
            <i class="fa fa-clock"></i>
        </div>
        <a href="/mail/mails-due" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    @if($mail_count_over_due > 0)
        <div class="small-box bg-danger">
    @else
        <div class="small-box bg-secondary">
    @endif
        <div class="inner">
            <h3>{{$mail_count_over_due}}</h3>

            <p>Over Due</p>
        </div>
        <div class="icon">
            <i class="fa fa-calendar"></i>
        </div>
        <a href="/mail/mails-overdue" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>


<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    @if($mail_count_non_assigned > 0)
        <div class="small-box bg-warning">
    @else
        <div class="small-box bg-secondary">
    @endif
        <div class="inner">
            <h3>{{$mail_count_non_assigned}}</h3>

            <p>Non Assigned</p>
        </div>
        <div class="icon">
            <i class="fa fa-list"></i>
        </div>
        <a href="/mail/mails-non-assigned" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
        @if($mail_count_temporary > 0)
        <div class="small-box bg-info">
        @else
            <div class="small-box bg-secondary">
        @endif
        <div class="inner">
            <h3>{{$mail_count_temporary}}</h3>

            <p>Temporary Replies</p>
        </div>
        <div class="icon">
            <i class="fa fa-stopwatch"></i>
        </div>
        <a href="/mail/mails-temporary-replied" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-3 col-6">
    <!-- small box -->
    @if($mail_count_new > 0)
        <div class="small-box bg-primary">
    @else
        <div class="small-box bg-secondary">
    @endif
    
        <div class="inner">
            <h3>{{$mail_count_new}}</h3>

            <p>New Mails</p>
        </div>
        <div class="icon">
            <i class="fa fa-envelope"></i>
        </div>
        <a href="/mail/mails-new" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    @if($mail_count_replied > 0)
        <div class="small-box bg-success">
    @else
        <div class="small-box bg-secondary">
    @endif
        <div class="inner">
            <h3>{{$mail_count_replied}}</h3>

            <p>Replied</p>
        </div>
        <div class="icon">
            <i class="fa fa-thumbs-up"></i>
        </div>
        <a href="/mail/mails-replied" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->

<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-secondary">
        <div class="inner">
            <h3>{{$mail_count_all}}</h3>

            <p>All Mails</p>
        </div>
        <div class="icon">
            <i class="fa fa-list"></i>
        </div>
        <a href="/mail/mails-all" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
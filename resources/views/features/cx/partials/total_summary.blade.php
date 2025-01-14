



<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-secondary">
        <div class="inner">
            <h3>{{$sr_count_total}}</h3>

            <p>SR Count (Total)</p>
        </div>
        <div class="icon">
        <i class="fa-solid fa-clipboard-list"></i>
        </div>
        <a href="{{route('cx.srs', ['type'=>'all','from'=>'any','to'=>'any'])}}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>


<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    @if($service_provided_total > 0)
        <div class="small-box bg-success">
    @else
        <div class="small-box bg-secondary">
    @endif
        <div class="inner">
            <h3>{{$service_provided_total}}</h3>

            <p>Service Provided (Total)</p>
        </div>
        <div class="icon">
        <i class="fa-solid fa-calendar-check"></i>
        </div>
        <a href="/mail/mails-overdue" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>


<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
        @if(0 > 0)
        <div class="small-box bg-info">
        @else
            <div class="small-box bg-secondary">
        @endif
        <div class="inner">
            <h3>0</h3>

            <p>Pending SR (Total)</p>
        </div>
        <div class="icon">
        <i class="fa-solid fa-rotate"></i>
        </div>
        <a href="/mail/mails-temporary-replied" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->



<div class="col-lg-3 col-6">
    <!-- small box -->
    @if($repeating_sr > 0)
        <div class="small-box bg-primary">
    @else
        <div class="small-box bg-secondary">
    @endif
    
        <div class="inner">
            <h3>{{$repeating_sr}}</h3>

            <p>Repeating SR (Total)</p>
        </div>
        <div class="icon">
            <i class="fa-solid fa-person-walking-arrow-loop-left"></i>
        </div>
        <a href="/mail/mails-new" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
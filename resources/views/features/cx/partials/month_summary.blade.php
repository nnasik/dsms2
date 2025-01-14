
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    @if(0 > 0)
        <div class="small-box bg-success">
    @else
        <div class="small-box bg-secondary">
    @endif
        <div class="inner">
            <h3>{{$sr_count_this_month}}</h3>

            <p>SR Count ({{date('F') ." - ". date('Y')}})</p>
        </div>
        <div class="icon">
        <i class="fa-solid fa-calendar-days"></i>
        </div>
        <a href="{{route('cx.srs', ['type'=>'all','from'=>$startOfMonth,'to'=> $endOfMonth])}}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->

<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    @if(0 > 0)
        <div class="small-box bg-success">
    @else
        <div class="small-box bg-secondary">
    @endif
        <div class="inner">
            <h3>0</h3>

            <p>Service Provided ({{date('F') ." - ". date('Y')}})</p>
        </div>
        <div class="icon">
        <i class="fa-regular fa-calendar-check"></i>
        </div>
        <a href="/mail/mails-replied" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->

<div class="col-lg-3 col-6">
    <!-- small box -->
    @if(0 > 0)
        <div class="small-box bg-success">
    @else
        <div class="small-box bg-secondary">
    @endif
        <div class="inner">
            <h3>0</h3>

            <p>Pending ({{date('F') ." - ". date('Y')}})</p>
        </div>
        <div class="icon">
        <i class="fa-regular fa-calendar-xmark"></i>
        </div>
        <a href="/mail/mails-replied" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
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

            <p>Repeating SR ({{date('F') ." - ". date('Y')}})</p>
        </div>
        <div class="icon">
            <i class="fa-solid fa-person-walking-arrow-loop-left"></i>
        </div>
        <a href="/mail/mails-new" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>


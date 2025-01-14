<!-- ./col -->
<div class="col-lg-3 col-6">
    
    <!-- small box -->
    @if($sr_count_today > 0)
        <div class="small-box bg-primary">
    @else
        <div class="small-box bg-secondary">
    @endif
    
        <div class="inner">
            <h3>{{$sr_count_today}}</h3>

            <p>SR Count (Today)</p>
        </div>
        <div class="icon">
        <i class="fa-solid fa-person-walking"></i>
        </div>
        
        <a href="{{route('cx.srs', ['type'=>'all','from'=>$startOfDay,'to'=> $endOfDay])}}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    @if($service_provided_today > 0)
        <div class="small-box bg-success">
    @else
        <div class="small-box bg-secondary">
    @endif
        <div class="inner">
            <h3>{{$service_provided_today}}</h3>

            <p>Service Provided (Today)</p>
        </div>
        <div class="icon">
        <i class="fa-solid fa-check"></i>
        </div>
        <a href="{{route('cx.srs', ['type'=>'provided','from'=>$startOfDay,'to'=> $endOfDay])}}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>


<!-- ./col -->
<div class="col-lg-3 col-6">
    <!-- small box -->
    @if(0 > 0)
        <div class="small-box bg-warning">
    @else
        <div class="small-box bg-secondary">
    @endif
        <div class="inner">
            <h3>0</h3>

            <p>Pending SR (Today)</p>
        </div>
        <div class="icon">
            <i class="fa-regular fa-clock"></i>
        </div>
        <a href="{{route('cx.srs', ['type'=>'pending','from'=>$startOfDay,'to'=> $endOfDay])}}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>

<div class="col-lg-3 col-6">
    <!-- small box -->
    @if(0 > 0)
        <div class="small-box bg-primary">
    @else
        <div class="small-box bg-secondary">
    @endif
    
        <div class="inner">
            <h3>{{$repeating_sr}}</h3>

            <p>Repeating SR ({{date('Y')}})</p>
        </div>
        <div class="icon">
            <i class="fa-solid fa-person-walking-arrow-loop-left"></i>
        </div>
        <a href="{{route('cx.srs', ['type'=>'repeating','from'=>$startOfDay,'to'=> $endOfDay])}}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
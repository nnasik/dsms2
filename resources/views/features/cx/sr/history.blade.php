<div class="timeline">
    @foreach($updates as $update)
    <div class="">
        <i class="fa">
            @if(file_exists('storage/user/dp/'.$update->user->profile_pic))
            <img src="{{asset('storage/user/dp/'.$update->user->profile_pic)}}" class="img-circle img-sm " alt="User Image">
            @else
            <img src="{{asset('storage/user/dp.png')}}" class="img-circle img-sm" alt="User Image">
            @endif
        </i>
        <div class="timeline-item">
            <span class="time"><i class="fas fa-clock"></i> {{$update->created_at}}</span>
            <h3 class="timeline-header text-primary">{{$update->user->name}}
            @if ($update->status=='Completed')
                <span class="badge bg-success">
            @elseif ($update->status=='Deferred')
                <span class="badge bg-secondary">
            @elseif ($update->status=='Rejected')
                <span class="badge bg-danger">
            @elseif ($update->status=='Cancelled')
                <span class="badge bg-info">
            @else
                <span class="badge bg-warning">
            @endif
                    {{$update->status}}
                </span>
            </h3> 
            <div class="timeline-body">
                {{$update->note}}
            </div>
        </div>
    </div>
    @endforeach
    <div>
        <i class="fas fa-clock bg-gray"></i>
    </div>
</div>
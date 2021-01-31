<div class="small-box bg-warning">
    <div class="inner">
        <h3>{{ $userCount->count() }}</h3>
        <p>User yang terdaftar</p>
    </div>
    <div class="icon">
        <i class="fas fa-user-plus"></i>
    </div>
    <a href="{{ route('user.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i>
    </a>
</div>

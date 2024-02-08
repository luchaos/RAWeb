<form action="{{ route('settings.profile.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-lg-6">
            {{ $slot }}
        </div>
        <div class="col-lg-6">
            {{ $sidebar ?? null }}
        </div>
    </div>
</form>

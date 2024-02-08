<form action="{{ route('settings.profile.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="lg:grid grid-flow-col gap-4">
        <div class="lg:col-6">
            {{ $slot }}
        </div>
        <div class="lg:col-6">
            {{ $sidebar ?? null }}
        </div>
    </div>
</form>

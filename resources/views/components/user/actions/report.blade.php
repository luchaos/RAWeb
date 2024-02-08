@can('report', $user)
    {{--TODO: can report = request()->user() != $user && !request()->user()->email_verified_at --}}
    <a class="btn btn-outline-warning border-0 text-warning" href=""
       data-toggle="tooltip" title="Report user">
        <x-fas-exclamation-triangle />
    </a>
@endcan

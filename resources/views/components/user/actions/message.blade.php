@can('sendMessage', $user)
    <a class="btn btn-outline-secondary border-0"
       href="{{ route('message.create') }}"
       data-toggle="tooltip" title="Send Private Message">
        <x-fas-envelope />
    </a>
@endcan

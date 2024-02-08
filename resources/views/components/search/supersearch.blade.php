<form class="position-relative"
      action="{{ route('search') }}"
      method="get">
    <x-input.search
        class=""
        :id="$inputId ?? 'supersearch'"
        showIcon
        loading
        :autoFocus="$autoFocus ?? false"
    />
    @if($dropdown ?? false)
        @if($results ?? false)
            <div class="dropdown-menu block"
                 style="max-width: 300px; width: 100%; top: 45px; right: 0">
                @foreach($results as $resource => $models)
                    @if($models->count())
                        <div class="dropdown-header">
                            {{ __res($resource) }}
                        </div>
                        @foreach($models as $model)
                            <div class="dropdown-item overflow-hidden">
                                @includeFirst(["components.{$resource}.list-item", 'components.resource.list-item'])
                            </div>
                        @endforeach
                    @endif
                @endforeach
            </div>
        @endif
    @else
        <div class="mt-5">
            @if($results ?? false)
                @foreach($results as $resource => $models)
                    @if($models->count())
                        <h3 class="mb-2 {{ !$loop->first ? 'mt-3' : '' }}">
                            {{ __res($resource) }}
                        </h3>
                        <div class="flex flex-wrap justify-between">
                            @foreach($models as $model)
                                <div class="m-2 flex-grow-1">
                                    @includeFirst(["components.{$resource}.card", "components.{$resource}.list-item", 'components.resource.list-item'])
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            @else
                @if($search)
                    <x-resource.empty/>
                @endif
            @endif
        </div>
    @endif
</form>

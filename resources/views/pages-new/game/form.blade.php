<x-input.text :model="$game" attribute="title" />
<x-input.text :model="$game" attribute="developer" />
<x-input.text :model="$game" attribute="publisher" />
<x-input.text :model="$game" attribute="genre" />
<x-input.text :model="$game" attribute="release" />
@if($game->hasMedia('icon'))
    <div class="form-group row">
        <div class="lg:col-9 ml-auto">
            <x-media.image :media="$game->getMedia('icon')->last()" />
        </div>
    </div>
@endif

<div class="grid grid-cols-2 gap-4">
    @foreach($results as $model)
        @includeFirst(['components.'.$resource.'.card', 'components.resource.card'], ['model' => $model])
    @endforeach
</div>

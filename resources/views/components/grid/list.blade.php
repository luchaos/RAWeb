@foreach($results as $model)
    @includeFirst(['components.'.$resource.'.list-item', 'components.resource.list-item'], ['model' => $model])
@endforeach

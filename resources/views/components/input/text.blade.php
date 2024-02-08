<x-input.input {{ $attributes->merge([
    'model' => $model ?? null,
    'type' => $type ?? 'text',
    'attribute' => $attribute ?? 'text',
]) }} />

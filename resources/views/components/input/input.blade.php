@props([
    'model' => null,
    'attribute' => null,
    'fieldId' => null,
    'help' => null,
    'inline' => false,
])
<x-form-field
    :model="$model"
    :attribute="$attribute"
    :fieldId="$fieldId"
    :help="$help"
    :inline="$inline"
>
    <x-slot name="label">
        {{ $label ?? __('validation.attributes.'.strtolower($attribute)) }} {{ $attributes->get('required') ? '*' : '' }}
    </x-slot>
    <input
        {{ $attributes->merge([
            'id' => $fieldId ?? $attribute,
            'name' => $attribute,
            'value' => old($attribute, !empty($model) ? $model->getAttribute($attribute) : null),
            'placeholder' => ($placeholder ?? false) === true ? __('validation.attributes.'.strtolower($attribute)) : ($placeholder ?? false),
            'class' => "form-control " . ($errors && $errors->has($attribute) ? 'is-invalid' : ''),
            'aria-describedby' => $errors && $errors->has($attribute) ? 'error-' . ($fieldId ?? $attribute) : false,
        ])->except([
            // exclude attributes that are meant for the form field above
            'model',
            'attribute',
            'fieldId',
            'help',
            'inline',
        ]) }}
    >
</x-form-field>

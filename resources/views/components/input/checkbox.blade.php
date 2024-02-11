<x-form-field
    :model="$model ?? null"
    :attribute="$attribute"
    :help="$help ?? null"
>
    <div>
        <input
            type="checkbox"
            class="checkbox"
            id="{{ $attribute }}"
            name="{{ $attribute }}"
            value="1"
            {{ old($attribute, !empty($model) ? $model->getAttribute($attribute) : null) ? 'checked' : '' }}
        >
        <label for="{{ $attribute }}">
            {{ $label ?? __('validation.attributes.'.$attribute) }} {{ !empty($required) ? '*' : '' }}
        </label>
    </div>
</x-form-field>

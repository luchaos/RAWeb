<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn']) }}>
    {{ $slot ?? 'Submit' }}
</button>

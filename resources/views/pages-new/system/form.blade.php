<x-input.text :model="$system ?? null" attribute="name" required />
<x-input.text :model="$system ?? null" attribute="name_short" />
<x-input.text :model="$system ?? null" attribute="name_full" />
<x-input.text :model="$system ?? null" attribute="manufacturer" />
{{--<x-input.text :model="$system ?? null" attribute="order_column"/>--}}
<x-input.checkbox :model="$system ?? null" attribute="active" />
<x-form-actions />

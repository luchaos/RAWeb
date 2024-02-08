<x-input.textarea
    :model="$comment ?? null"
    attribute="Payload"
    :placeholder="__('Your reply')"
    :shortcode="$shortcode ?? false"
    :full-width="$fullWidth ?? false"
    :label="$labels ?? true"
    required
    :rows="$rows ?? 3"
    :maxlength="$maxlength ?? 60000"
/>

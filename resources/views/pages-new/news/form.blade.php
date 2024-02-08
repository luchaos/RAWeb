<x-input.text :model="$news ?? null" attribute="Title" required />
{{--<x-input.image :model="$news ?? null" attribute="image"
               :conversions="['', '2xl']"
               help="Note: will be scaled to 470px width, and displayed in 16:9 format."
/>--}}
<x-input.text :model="$news ?? null" attribute="Image" />
<x-input.text :model="$news ?? null" attribute="Link" />
<x-input.textarea :model="$news ?? null" attribute="lead" shortcode :rows="12" />
<x-input.textarea :model="$news ?? null" attribute="Payload" shortcode :rows="12" />
<x-form-actions />

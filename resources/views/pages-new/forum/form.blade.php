<x-input.text :model="$forum" attribute="title" required />
<x-input.textarea :model="$forum" attribute="description" :rows="10" />
<x-form-actions :requiredFields="true" />

<x-input.text :model="$topic ?? null" attribute="title" required />
<x-input.textarea :model="$topic ?? null" attribute="body" required
                  :placeholder="__('Your message')" :label="($labels ?? true) === false ? false : 'Message'"
                  rows:="10" :maxlength="60000"
/>
<x-form-actions :requiredFields="true" />

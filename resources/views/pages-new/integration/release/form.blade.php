<div class="2xl:grid grid-flow-col gap-4">
    <div class="">
        <x-input.text :model="$release ?? null" attribute="version" required help="Format <code>x.y.z.r</code>" />
        <x-input.file :model="$release ?? null" attribute="build_x86" help="Accepts mime type <code>application/x-dosexec</code>" />
        <x-input.file :model="$release ?? null" attribute="build_x64" help="Accepts mime type <code>application/x-dosexec</code>" />
        <x-input.checkbox :model="$release ?? null" attribute="stable" help="Publish as latest stable version" />
        <x-input.checkbox :model="$release ?? null" attribute="minimum" help="Setting release as minimum version will automatically mark it as stable and force clients to update" />
    </div>
    <div class="">
        <x-input.textarea :model="$release ?? null" attribute="notes" help="Release Notes" :rows="12" />
    </div>
</div>
<div class="2xl:grid grid-flow-col gap-4">
    <div class="2xl:col-6">
        <x-form-actions />
    </div>
</div>

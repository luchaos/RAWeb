<tr>
    <td>
        <a href="{{ $model->canonicalUrl }}">
            <code>[#{{ $model->id }}]</code>
            {{ $model->name ?? $model->title ?? null }}
        </a>
    </td>
</tr>

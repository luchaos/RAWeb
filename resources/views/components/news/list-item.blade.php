<?php

use App\Models\News;

/** @var ?News $news */
$news ??= $model ?? null;
?>
<div>
    <a href="{{ $news->canonicalUrl }}">
        {{ $news->title }}
    </a>
</div>

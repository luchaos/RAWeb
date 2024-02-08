<?php
$currentLogo = request()->cookie('logo');
$sm = !isset($sm) || $sm;
$logos = ['default', 'retro']
?>
<div class="form-inline">
    <label for="logo-select" class="sr-only">{{ __('settings.logo') }}</label>
    <select class="form-control {{ $sm ? 'form-control-sm' : '' }}"
            id="logo-select"
            oninput="setLogo(this.value)">
        @foreach ($logos as $logo)
            <option value="{{ $logo }}" {{ $currentLogo == $logo ? 'selected' : '' }}>
                {{ __(ucwords($logo)) }}
            </option>
        @endforeach
    </select>
</div>

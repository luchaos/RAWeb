<?php
$link ??= route('user.index');
$modalId = 'userFilter';
?>
<x-section>
    <form action="{{ $link }}">
        <div class="flex flex-row">
            <x-input.search />
            {{--<button class="btn btn-primary" type="button" x-on:click="openModal('{{ $modalId }}')">
                <x-fas-filter/>
                <span class="sr-only">Filter</span>
            </button>--}}
            {{--<x:dropdown>
                <x-slot name="trigger">
                    <button class="btn btn-link" type="button">
                        <x-fas-filter/>
                        <span class="sr-only">Filter</span>
                    </button>
                </x-slot>
                [More filter options]
                --}}{{--<ul>
                    <li>
                        <button wire:click.prevent="archive"
                            class="btn btn-warning">
                            <x-fas-archive/>
                        </button>
                    </li>
                    <li>
                        <button wire:click.prevent="delete"
                            class="btn btn-danger">
                            <x-fas-delete/>
                        </button>
                    </li>
                </ul>--}}{{--
            </x:dropdown>--}}
        </div>
    </form>
</x-section>
<x-modal :id="$modalId">
    <x-input.search />
</x-modal>

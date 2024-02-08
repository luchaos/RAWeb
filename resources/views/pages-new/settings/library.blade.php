@extends('settings.page', [
    'section' => 'library',
    'title' => __res('library'),
])

@section('main')
    <div class="2xl:grid grid-flow-col gap-4">
        <div class="2xl:col-6">
            <h4>{{ __('Achievement Progress') }}</h4>
            <x-form>
                <x-input.password :label="__('Reset All Achievements')" :help="__('Enter password to confirm')" />
                <div class="form-group row">
                    <div class="lg:col-9 ml-auto">
                        <button class="btn btn-outline-warning border-0">
                            <x-fas-undo />
                            {{ __('Reset Achievements') }}
                        </button>
                    </div>
                </div>
            </x-form>
        </div>
    </div>
@endsection

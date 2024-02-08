@extends('settings.page', [
    'section' => 'root',
    'title' => __('Root'),
])

@section('main')
    <div class="2xl:grid grid-flow-col gap-4">
        <div class="2xl:col-6">
            <h4>
                Feature Toggles
            </h4>
            <div>
                Registration
            </div>
            <div>
                Beta Gate
            </div>
        </div>
        <div class="2xl:col-6">
            <h4>
                System Message
            </h4>
            <h4>
                Sync
            </h4>
        </div>
    </div>
@endsection

@extends('settings.page', [
    'section' => 'applications',
    'title' => __('Applications'),
])

@section('main')
    <div class="row">
        <div class="col-xxl-6">
            @if(auth()->user()->hasVerifiedEmail())
                <h4>Web API</h4>
                <p>
                    Note: this is your personal API Key. Handle it with care.<br><a href="{{ route('docs.api') }} ">Read the Web API Documentation</a>
                </p>
                <x-input.text :model="auth()->user()" attribute="api_token" readonly />
                {{-- TODO: Generate Web API Key --}}
                {{-- TODO: Revoke my Web API Key --}}
            @else
                <p>Verify your email address.</p>
            @endif
        </div>
    </div>
@endsection

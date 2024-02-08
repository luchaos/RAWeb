<x-section class="mt-2 py-2">
    <div class="flex items-start">
        <span class="mr-2">
            <x-user.avatar :user="request()->user()" display="icon" iconSize="sm" :link="false" :tooltip="false" />
        </span>
        <div class="flex-1">
            <x-section-header :hoverActions="true" class="mb-1">
                <x-slot name="title"><b>
                        <x-user.avatar :user="request()->user()" />
                    </b></x-slot>
            </x-section-header>
            <x-form :action="$storeUrl">
                <x-comment.form :labels="false" :shortcode="$shortcode ?? false" />
                <x-button.save icon="paper-plane">{{ __('Post') }}</x-button.save>
            </x-form>
        </div>
    </div>
</x-section>
{{--
@guest
    <p class="text-center">
        <i><a href="{{ route('login') }}">Log in to post a reply.</a></i>
    </p>
    <div class="flex justify-center">
        <div class="embedded p-3">
            <p>
                You have to be logged in to post a reply.
            </p>
            @include('auth.partials.login')
        </div>
    </div>
@endguest
@can('create', [\App\Models\Comment::class, $user])
    <div class="p-2 mt-2">
        <form method="post" action="{{ route('user.comment.store', $user) }}" class="mb-0">
            @csrf
            <div class="flex items-start">
                    <span class="mr-2">
                        @userIcon(request()->user())
                        @user(request()->user())
                    </span>
                <div class="flex-1">
                    <div class="text-small lh-1 mb-1">
                        @user(request()->user())
                    </div>
                    <textarea id="commentTextarea" class="form-control  {{ $errors->has('body') ? 'is-invalid' : '' }}"
                              rows="2" name="body" maxlength="250"
                              placeholder="Comment"></textarea>
                    @if($errors->has('body'))
                        <p class="help-block text-danger mb-0">
                            @foreach($errors->get('body') as $attributeError)
                                <x-fas-exclamation-triangle/> {{ $attributeError }}
                            @endforeach
                        </p>
                    @endif
                </div>
                <button id="submitButton" class="btn btn-sm btn-primary ml-2 mt-3">
                    <x-fas-paper-plane/> Submit
                </button>
            </div>
        </form>
    </div>
@endcan
--}}

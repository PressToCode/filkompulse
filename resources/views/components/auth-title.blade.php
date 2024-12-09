@props(['title', 'subtitle', 'link', 'googleText'])

<div class="d-flex flex-column text-center">
    <!-- Heading and Google OAUTH -->
    @if (isset($title))
        <h1 class="text-light fs-1 fw-bolder">
            {{ __($title) }}
        </h1>
    @endif
    @if (isset($subtitle))
        <h3 class="text-light fs-5">
            {{ __($subtitle) }}
        </h3>
    @endif
    @if (isset($googleText))
        <x-primary-button class="mx-3 my-3 w-50 text-center align-self-center justify-content-center">
            <a href="
                @if (isset($link))
                    @if (route::has($link))
                        {{ route($link) }}
                    @endif
                @endif
            ">
                {{ __($googleText) }}
            </a>
        </x-primary-button>
        <div class="d-flex row w-50 align-self-center justify-content-center">
            <hr class="col border border-light opacity-100 align-self-center">
            <p class="col-2 text-light py-0 px-0 my-0 mx-0">OR</p>
            <hr class="col border border-light opacity-100 align-self-center">
        </div>
    @endif
</div>
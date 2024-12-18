@props(['messages'])

@if ($messages)
    <div id="hs-static-backdrop-modal" class="tw-hs-overlay [--overlay-backdrop:static] tw-size-full tw-fixed tw-top-0 tw-start-0 tw-z-[80] tw-overflow-x-hidden tw-overflow-y-auto tw-pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-static-backdrop-modal-label" data-hs-overlay-keyboard="false">
    <div class="hs-overlay-open:tw-mt-7 hs-overlay-open:tw-opacity-100 hs-overlay-open:tw-duration-500 tw-mt-0 tw-opacity-0 tw-ease-out tw-transition-all sm:tw-max-w-lg sm:tw-w-full tw-m-3 sm:tw-mx-auto">
        <div class="tw-flex tw-flex-col tw-bg-white tw-border tw-shadow-sm tw-rounded-xl tw-pointer-events-auto dark:tw-bg-neutral-800 dark:tw-border-neutral-700 dark:tw-shadow-neutral-700/70">
        <div class="tw-flex tw-justify-between tw-items-center tw-py-3 tw-px-4 tw-border-b dark:tw-border-neutral-700">
            <h3 id="hs-static-backdrop-modal-label" class="tw-font-bold tw-text-gray-800 dark:tw-text-white">
            Modal title
            </h3>
            <button type="button" class="tw-size-8 tw-inline-flex tw-justify-center tw-items-center tw-gap-x-2 tw-rounded-full tw-border tw-border-transparent tw-bg-gray-100 tw-text-gray-800 hover:tw-bg-gray-200 focus:tw-outline-none focus:tw-bg-gray-200 disabled:tw-opacity-50 disabled:tw-pointer-events-none dark:tw-bg-neutral-700 dark:hover:tw-bg-neutral-600 dark:tw-text-neutral-400 dark:focus:tw-bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-static-backdrop-modal">
            <span class="sr-only">Close</span>
            <svg class="tw-shrink-0 tw-size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
            </svg>
            </button>
        </div>
        <div class="tw-p-4 tw-overflow-y-auto">
            <p class="tw-mt-1 tw-text-gray-800 dark:tw-text-neutral-400">
            @foreach ((array) $messages as $message)
                {{ $message }}
            @endforeach
            </p>
        </div>
        <div class="tw-flex tw-justify-end tw-items-center tw-gap-x-2 tw-py-3 tw-px-4 tw-border-t dark:tw-border-neutral-700">
            <button type="button" class="tw-py-2 tw-px-3 tw-inline-flex tw-items-center tw-gap-x-2 tw-text-sm tw-font-medium tw-rounded-lg tw-border tw-border-gray-200 tw-bg-white tw-text-gray-800 tw-shadow-sm hover:tw-bg-gray-50 focus:tw-outline-none focus:tw-bg-gray-50 disabled:tw-opacity-50 disabled:tw-pointer-events-none dark:tw-bg-neutral-800 dark:tw-border-neutral-700 dark:tw-text-white dark:hover:tw-bg-neutral-700 dark:focus:tw-bg-neutral-700" data-hs-overlay="#hs-static-backdrop-modal">
            Close
            </button>
            <button type="button" class="tw-py-2 tw-px-3 tw-inline-flex tw-items-center tw-gap-x-2 tw-text-sm tw-font-medium tw-rounded-lg tw-border tw-border-transparent tw-bg-blue-600 tw-text-white hover:tw-bg-blue-700 focus:tw-outline-none focus:tw-bg-blue-700 disabled:tw-opacity-50 disabled:tw-pointer-events-none">
            Save changes
            </button>
        </div>
        </div>
    </div>
    </div>
@endif

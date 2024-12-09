@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'tw-border-gray-700 tw-bg-gray-900 tw-text-gray-300 focus:tw-border-indigo-600 focus:tw-ring-indigo-600 tw-rounded-md tw-shadow-sm tw-form-control tw-form-control-lg tw-w-full']) }}>

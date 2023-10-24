@if ($message = Session::get('error'))
    <div
        id="alert-error"
        class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 border-solid border-2 border-red-300 dark:bg-gray-800 dark:text-red-400"
        role="alert"
        x-data="{ show: true }"
        x-show="show"
        x-transition
    >

        <div class="inline-flex ml-3 text-sm font-medium">
            <x-icons.info class="flex-shrink-0 w-4 h-4 mr-2" />
            <div>
                {!! $message !!}
            </div>
        </div>
        <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-error"
                aria-label="Close"
        >
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
@endif

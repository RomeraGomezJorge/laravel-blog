@props(['title'])
<header class="relative flex items-center h-12 font-semibold">
    <h1 class="text-lg mr-auto" >{{ $title }}</h1>
    <div id="astro-header-drawer"
         class="shadow rounded-l-lg md:bg-transparent dark:md:bg-transparent bg-white dark:bg-[#0a0910] md:shadow-none md:rounded-none md:border-none md:h-auto md:static absolute transition-transform duration-300 ease-in translate-x-96 md:translate-x-0 top-12 -right-5 pl-4 pt-6 pb-4 md:p-0 h-[200px] z-50">
        <nav class="flex h-full flex-col justify-between gap-12 text-left md:flex-row md:w-full md:gap-5">
            <div class="flex flex-col gap-4 md:flex-row md:border-r-2 border-black pr-4 dark:border-white">
                <a href="{{ route('blog.tags') }}"
                   class="text-opacity-60 flex items-center gap-1 text-2xl md:text-base"
                   rel="noopener noreferrer"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 md:w-6" viewBox="0 0 24 24"
                         stroke-width="1.25" stroke="currentColor" fill="none" >
                        <path  d="M7.859 6h-2.834a2.025 2.025 0 0 0 -2.025 2.025v2.834c0 .537 .213 1.052 .593 1.432l6.116 6.116a2.025 2.025 0 0 0 2.864 0l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-6.117 -6.116a2.025 2.025 0 0 0 -1.431 -.593z"></path>
                        <path d="M17.573 18.407l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-7.117 -7.116"></path>
                    </svg>
                    {{__('Tags')}}
                </a>
            </div>
            <div class="flex flex-col gap-4 md:flex-row md:border-r-2 border-black pr-4 dark:border-white">
                <a href="{{ route('login') }}"
                   class="text-opacity-60 flex items-center gap-1 text-2xl md:text-base"
                   rel="noopener noreferrer"
                >
                    <svg class="w-4 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 15">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 7.5h11m0 0L8 3.786M12 7.5l-4 3.714M12 1h3c.53 0 1.04.196 1.414.544.375.348.586.82.586 1.313v9.286c0 .492-.21.965-.586 1.313A2.081 2.081 0 0 1 15 14h-3"/>
                    </svg>
                    {{__('Log in')}}
                </a>
            </div>
            <div class="flex justify-center items-center md:justify-end gap-3 md:p-0">
                <x-dropdown width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center p-2 text-sm font-medium text-gray-500 rounded-md transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark-eval-1 dark:text-gray-400 dark:hover:text-gray-200">
                            <div> {{ strtoupper(app()->getLocale()) }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">

                        @foreach(config('app.languages') as $langLocale => $langName)
                            <x-dropdown-link :href="url()->current().'?change_language='.$langLocale">
                                {{ strtoupper($langLocale) }} ({{ $langName }})
                            </x-dropdown-link>
                        @endforeach
                    </x-slot>
                </x-dropdown>
            </div>
        </nav>
    </div>
</header>

@props(['title'])
<header class="relative flex items-center h-12 font-semibold">
    <h1 class="text-lg mr-auto" >{{ $title }}</h1>
    <div id="astro-header-drawer"
         class="shadow rounded-l-lg md:bg-transparent dark:md:bg-transparent bg-white dark:bg-[#0a0910] md:shadow-none md:rounded-none md:border-none md:h-auto md:static absolute transition-transform duration-300 ease-in translate-x-96 md:translate-x-0 top-12 -right-5 pl-4 pt-6 pb-4 md:p-0 h-[200px] w-[200px] z-50">
        <nav class="flex h-full flex-col justify-between gap-12 text-left md:flex-row md:w-full md:gap-5">
            <div class="flex flex-col gap-4 md:flex-row md:border-r-2 border-black pr-4 dark:border-white">
                <a href="{{ route('blog.tags') }}" class="text-opacity-60 flex items-center gap-1 text-2xl md:text-base"
                   rel="noopener noreferrer ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 md:w-6" viewBox="0 0 24 24"
                         stroke-width="1.25" stroke="currentColor" fill="none" stroke-linecap="round"
                         stroke-linejoin="round" data-darkreader-inline-stroke=""
                         style="--darkreader-inline-stroke: currentColor;">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" data-darkreader-inline-stroke=""
                              style="--darkreader-inline-stroke: none;">

                        </path>
                        <path
                            d="M7.859 6h-2.834a2.025 2.025 0 0 0 -2.025 2.025v2.834c0 .537 .213 1.052 .593 1.432l6.116 6.116a2.025 2.025 0 0 0 2.864 0l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-6.117 -6.116a2.025 2.025 0 0 0 -1.431 -.593z">

                        </path>
                        <path d="M17.573 18.407l2.834 -2.834a2.025 2.025 0 0 0 0 -2.864l-7.117 -7.116">

                        </path>
                        <path d="M6 9h-.01">

                        </path>
                    </svg>
                    {{__('Tags')}}
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
    <div class="flex items-center gap-3 md:pl-3">
        <div>
            <site-search id="search" class="ms-auto">
                <button data-open-modal="" class="flex items-center justify-center rounded-md gap-1">
                    <svg aria-label="search" class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                         data-darkreader-inline-stroke="" style="--darkreader-inline-stroke: currentColor;">
                        <path stroke="none" d="M0 0h24v24H0z" data-darkreader-inline-stroke=""
                              style="--darkreader-inline-stroke: none;">

                        </path>
                        <path d="M3 10a7 7 0 1 0 14 0 7 7 0 1 0-14 0M21 21l-6-6">

                        </path>
                    </svg>
                    <!-- <span class='md:hidden text-2xl'>
                     Search</span>
                      -->
                </button>
                <dialog aria-label="search"
                        class="h-full max-h-full w-full max-w-full border border-zinc-400 bg-white dark:bg-[#0a0910ec] shadow backdrop:backdrop-blur sm:mx-auto sm:mb-auto sm:mt-16 sm:h-max sm:max-h-[calc(100%-8rem)] sm:min-h-[15rem] sm:w-5/6 sm:max-w-[48rem] sm:rounded-md opacity-0">
                    <div class="dialog-frame flex flex-col gap-4 p-6 pt-12 sm:pt-6">
                        <button data-close-modal=""
                                class="ms-auto cursor-pointer rounded-full bg-black text-white px-4 py-2 dark:bg-white dark:text-black">
                            Close
                        </button>
                        <div class="search-container dark:text-white">
                            <div id="pagefind__search">
                                <div class="pagefind-ui svelte-1d60ae3 pagefind-ui--reset">
                                    <form class="pagefind-ui__form svelte-1d60ae3" role="search"
                                          aria-label="Search this site" action="javascript:void(0);">
                                        <input class="pagefind-ui__search-input svelte-1d60ae3" type="text"
                                               placeholder="Search" autocapitalize="none" enterkeyhint="search">
                                        <button
                                            class="pagefind-ui__search-clear svelte-1d60ae3 pagefind-ui__suppressed">
                                            Clear
                                        </button>
                                        <div class="pagefind-ui__drawer svelte-1d60ae3 pagefind-ui__hidden">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </dialog>
            </site-search>
        </div>
        <theme-toggle class="relative h-6 w-6">
            <button id="toggle-theme" class="group" aria-pressed="true">
                    <span class="absolute left-0 right-0 top-0 opacity-0 transition-all group-aria-pressed:opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun-high" width="24"
                             height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round" data-darkreader-inline-stroke=""
                             style="--darkreader-inline-stroke: currentColor;">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" data-darkreader-inline-stroke=""
                                  style="--darkreader-inline-stroke: none;">

                            </path>
                            <path d="M14.828 14.828a4 4 0 1 0 -5.656 -5.656a4 4 0 0 0 5.656 5.656z">

                            </path>
                            <path d="M6.343 17.657l-1.414 1.414">

                            </path>
                            <path d="M6.343 6.343l-1.414 -1.414">

                            </path>
                            <path d="M17.657 6.343l1.414 -1.414">

                            </path>
                            <path d="M17.657 17.657l1.414 1.414">

                            </path>
                            <path d="M4 12h-2">

                            </path>
                            <path d="M12 4v-2">

                            </path>
                            <path d="M20 12h2">

                            </path>
                            <path d="M12 20v2">

                            </path>
                        </svg>
                    </span>
                <span
                    class="absolute left-0 right-0 top-0 opacity-0 transition-transform group-aria-[pressed=false]:opacity-100 group-aria-[pressed=false]:translate-y-0 translate-y-2 group-aria-[pressed=false]:rotate-0 rotate-90 duration-500 ease-linear">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-moon" width="24"
                             height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                             stroke-linecap="round" stroke-linejoin="round" data-darkreader-inline-stroke=""
                             style="--darkreader-inline-stroke: currentColor;">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" data-darkreader-inline-stroke=""
                                  style="--darkreader-inline-stroke: none;">

                            </path>
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z">

                            </path>
                        </svg>
                    </span>
            </button>
        </theme-toggle>
        <script>

            const button = document.getElementById('toggle-theme')

            function setButtonPresssed() {
                const bodyThemeIsDark = document.documentElement.classList.contains('dark')
                button.setAttribute('aria-pressed', String(bodyThemeIsDark))
            }

            setButtonPresssed()
        </script>
        <button id="astro-header-drawer-button" type="button" class="md:ml-6 md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="24"
                 height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none"
                 stroke-linecap="round" stroke-linejoin="round" data-darkreader-inline-stroke=""
                 style="--darkreader-inline-stroke: currentColor;">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" data-darkreader-inline-stroke=""
                      style="--darkreader-inline-stroke: none;">

                </path>
                <path d="M4 6l16 0">

                </path>
                <path d="M4 12l16 0">

                </path>
                <path d="M4 18l16 0">

                </path>
            </svg>
            <span class="sr-only">
                    Show Menu</span>
        </button>
    </div>
</header>

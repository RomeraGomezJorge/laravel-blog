<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Articles') }}
            </h2>
            <x-buttons.create :href="route('articles.create')"/>
        </div>
    </x-slot>
    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <x-alerts.success/>
        <form method="get" class="flex items-end space-x-2">
            <div>
                <x-form.label>{{__('Title')}}</x-form.label>
                <x-form.input
                    id="title"
                    name="title"
                    type="text"
                    value="{{ Request::get('title') }}"
                    class="mr-2 mb-2"
                    placeholder="{{__('Filter by title')}}"
                />
            </div>
            <div>
                <x-form.label>{{__('Category')}}</x-form.label>
                <x-form.select
                    id="category_id"
                    name="category_id"
                    type="text"
                    class="mr-2 mb-2"
                    placeholder="{{ __('All categories')}}"
                >
                    @forelse($categories as $category)
                        <option
                            @selected( Request::get('category_id') == $category->id )
                            value="{{$category->id}}"
                        >
                            {{$category->name}}
                        </option>
                    @empty
                        <option disabled>{{__('No entries found')}}</option>
                    @endforelse
                </x-form.select>
            </div>
            <div>
                <x-form.label>{{__('Tag')}}</x-form.label>
                <x-form.select
                    id="tag_id"
                    name="tag_id"
                    type="text"
                    class="mr-2 mb-2"
                    placeholder="{{ __('All tags')}}"
                >
                    @forelse($tags as $tag)
                        <option
                            @selected( Request::get('tag_id') == $tag->id )
                            value="{{$tag->id}}"
                        >
                            {{$tag->name}}
                        </option>
                    @empty
                        <option disabled>{{__('No entries found')}}</option>
                    @endforelse
                </x-form.select>
            </div>
            <x-buttons.search />
            <x-buttons.clear-filter  :href="route('articles.index')"/>
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead>
                <tr>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center space-x-2">
                            @sortablelink('title',__('Title'))
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center space-x-2">
                            @sortablelink('category_name',__('Category'))
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex items-center space-x-2">
                            {{__('Tags')}}
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">{{__('Actions')}}</span>
                        {{__('Actions')}}
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($articles as $article)
                    <tr class="border-b bg-gray-50 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            {{$article->title}}
                        </td>
                        <td class="px-6 py-4">
                            {{$article->category_name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$article->tags->pluck('name')->implode(', ') }}
                        </td>

                        <td class="px-6 py-4 w-48">
                            <x-buttons.list.edit :href="route('articles.edit',$article->id)"/>
                            <x-buttons.list.delete
                                data-modal-toggle="confirmDelete{{ $article->id }}"
                            />
                            <x-modal-delete-confirmation
                                :id="$article->id"
                                :formAction="route('articles.destroy', $article->id)"
                            />
                        </td>
                    </tr>
                @empty
                    <x-no-entries-found :colspan="3"/>
                @endforelse
                </tbody>
            </table>
            <div class="ml-auto px-10 py-4">
                {{ $articles->links() }}
            </div>

        </div>
    </div>
</x-app-layout>

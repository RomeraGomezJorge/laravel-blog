<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Article') }} {{ __('Edit') }}
            </h2>
        </div>
    </x-slot>
    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <x-alerts.success/>
        @include('backoffice.article.partials.handle-article-form',[
            'method' => 'PUT',
            'url_action' => route('backoffice.articles.update',$article),
            'article' => $article,
           ])
    </div>
</x-app-layout>

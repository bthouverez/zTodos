<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your lists') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">


                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Id') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ __('Title') }}
                            </th>
                            <th scope="col" class="px-6 py-3 hidden lg:table-cell">
                                {{ __('Created at') }}
                            </th>
                            <th scope="col" class="px-6 py-3 hidden lg:table-cell">
                                {{ __('Updated at') }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\Illuminate\Support\Facades\Auth::user()->todoLists as $list)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $list->id }}
                                </th>
                                <td class="px-6 py-4">
                                    <a href="todos/{{ $list->id }}">{{ $list->title }}</a>
                                </td>
                                <td class="px-6 py-4 hidden lg:table-cell">
                                    {{ $list->created_at }}
                                </td>
                                <td class="px-6 py-4 hidden lg:table-cell">
                                    {{ $list->updated_at }}
                                </td>
                                <td>
                                    <form action="/todos/{{ $list->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button>
                                            <x-heroicon-m-trash
                                                class="w-6 hover:cursor-pointer hover:text-red-500 active:text-red-600"/>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

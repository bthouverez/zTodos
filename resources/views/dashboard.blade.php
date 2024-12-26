<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your lists') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="/todos" method="post" class="flex justify-between gap-2  mb-4 mx-2 ">
                @csrf
                <div class="w-full">
                    <input type="text" placeholder="{{ __('Add a new list') }}" name="newList"
                           class="text-lg bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    <div class="text-red-500 font-bold">@error('newList') {{ $message }} @enderror</div>
                </div>
                <button class="flex justify-around items-center  w-12 h-12 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    <x-heroicon-m-check  class="w-8 text-white"/>
                </button>
            </form>

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
                        @forelse(\Illuminate\Support\Facades\Auth::user()->todoLists as $list)
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
                            @empty
                                <tr class="text-center text-gray-500 dark:text-gray-400">
                                    <td colspan="5" class="p-4 ">{{ __('No lists yet') }}</td>
                                </tr>
                            @endforelse

                        @if(Auth::user()->is_admin)
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr class="text-center text-gray-500 dark:text-gray-400">
                                <td colspan="5" class="p-4 ">{{ __('Other users lists') }}</td>
                            </tr>
                            </thead>
                            @forelse(App\Models\TodoList::where('user_id', '<>', Auth::user()->id)->get() as $list)
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
                            @empty
                                <tr class="text-center text-gray-500 dark:text-gray-400">
                                    <td colspan="5" class="p-4 ">{{ __('No lists yet') }}</td>
                                </tr>
                            @endforelse
                        @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

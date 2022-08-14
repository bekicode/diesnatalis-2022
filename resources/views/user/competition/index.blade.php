<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Competition') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    <div class="md:grid md:grid-cols-2 md:gap-6">
                        <div class="md:mt-0 md:col-span-2">
                            <div class="px-5 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                @if(date('Y-m-d') > date('2022-08-08'))
                                <div class="flex justify-between bg-white border-b border-gray-100 pb-4">
                                    <div class="font-semibold text-xl text-gray-800 leading-tight pt-2">Daftar Tim</div>
                                    <a href="{{ route('competition.create') }}" class="border border-indigo-500 hover:bg-indigo-500 hover:text-white rounded py-2 px-3">Buat Tim</a>
                                </div>
                                <div class="pt-5">
                                    <table class="w-full">
                                        <thead class="border-b bg-gray-50 m-2 text-left">
                                            <tr>
                                                <th class="text-sm font-medium text-gray-900 px-6 py-4">Team Name</th>
                                                <th class="text-sm font-medium text-gray-900 px-6 py-4">Competitions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white border-b">
                                            @if(count($team)>0)
                                            @foreach($team as $t)
                                                <tr class="clickable-row bg-white border-b hover:bg-gray-100 hover:cursor-pointer" data-href="{{ route('competition.detail',$t->id) }}">
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 lg:whitespace-nowrap">{{ $t->name }}</td>
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4 lg:whitespace-nowrap">{{ $t->name_competitions }}</td>
                                                </tr>
                                            @endforeach
                                            @else
                                                <tr class="bg-white border-b hover:bg-gray-100">
                                                    <td class="text-sm text-gray-900 font-light px-6 py-4" colspan="2">No data</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                <div class="bg-white border-b border-gray-100 font-semibold text-xl text-gray-800 leading-tight pb-4">Closed</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            $(document).ready(function($) {
                $(".clickable-row").click(function() {
                    window.location = $(this).data("href");
                });
            });
        </script>
    @endpush
</x-app-layout>
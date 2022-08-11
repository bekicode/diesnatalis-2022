<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Daftar Team yang mengikuti UI/UX Designer Competition
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div>
          <div class="md:grid md:grid-cols-2 md:gap-6">
            <div class="md:mt-0 md:col-span-2">
              <div class="px-5 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                @if (session('sukses'))
                <div class="bg-green-300 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                  <strong class="font-bold">Sukses</strong>
                  <span class="block sm:inline">{{ session("sukses") }}</span>
                  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                  </span>
                </div>
                @endif
                <div class="flex justify-between bg-white border-b border-gray-100 pb-4">
                  <div class="font-semibold text-xl text-gray-800 leading-tight pt-2">Daftar Team</div>
                  {{-- <a href="{{ route('admin.tambah_competition') }}" class="border border-indigo-500 hover:bg-indigo-500 hover:text-white rounded py-2 px-3">Tambah Team</a> --}}
                </div>
                <a href="{{ route('admin.list_team_web') }}" class="border border-indigo-500 hover:bg-indigo-500 hover:text-white rounded py-1 px-2 m-3">Web Developer Competition</a>
                <div class="pt-2 mt-4 overflow-x-auto">
                  <table class="border-collapse table-fixed w-full text-sm">
                    <thead class="border-b bg-gray-50 m-2 text-left">
                      <tr>
                        <th class="text-sm font-medium text-gray-900 px-6 py-4">Nama Team</th>
                        <th class="text-sm font-medium text-gray-900 px-6 py-4">Tingkat</th>
                        <th class="text-sm font-medium text-gray-900 px-6 py-4">Asal</th>
                        <th class="text-sm font-medium text-gray-900 px-6 py-4">Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="bg-white border-b">
                      @if (!empty($empty))
                      @foreach($team as $t)
                        <tr class="clickable-row bg-white border-b hover:bg-gray-100 hover:cursor-pointer" data-href="{{ route('admin.team_detail', $t->id) }}">
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $t->name_team }}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $t->level }}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">{{ $t->origin }}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                              <a href="{{ route('admin.team_detail', $t->id) }}" class="border border-indigo-500 hover:bg-indigo-500 hover:text-white rounded py-2 px-3">Lihat detail Team</a>
                            </td>
                        </tr>
                      @endforeach

                    @else
                      <td colspan="4" class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">Tidak ada data</td>
                    @endif
                    </tbody>
                  </table>
                </div>
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
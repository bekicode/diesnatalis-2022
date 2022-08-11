<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Detail Team {{ $detailTeam->name_team }}
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div>
          <div class="md:grid md:grid-cols-2 md:gap-6">
            <div class="md:mt-0 md:col-span-2">
              <div class="px-5 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="flex justify-between bg-white border-b border-gray-100 pb-4">
                  <div class="font-semibold text-xl text-gray-800 leading-tight pt-2">Anggota Team</div>
                  {{-- <a href="{{ route('admin.tambah_competition') }}" class="border border-indigo-500 hover:bg-indigo-500 hover:text-white rounded py-2 px-3">Tambah Team</a> --}}
                </div>
                <div class="pt-2 mt-4">
                  disini nanti ada table buat daftar anggota team
                  {{-- TODO : Anggota Team
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
                  </table> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="py-1 mb-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div>
          <div class="md:grid md:grid-cols-2 md:gap-6">
            <div class="md:mt-0 md:col-span-2">
              <div class="px-5 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="flex justify-between bg-white border-b border-gray-100 pb-4">
                  <div class="font-semibold text-xl text-gray-800 leading-tight pt-2">Detail Data Team</div>
                  {{-- <a href="{{ route('admin.tambah_competition') }}" class="border border-indigo-500 hover:bg-indigo-500 hover:text-white rounded py-2 px-3">Tambah Team</a> --}}
                </div>
                <div class="pt-2 mt-4 overflow-x-auto">
                  <table class="w-full">
                    <tbody class="">
                      <tr class="border-b">
                        <td class="text-sm bg-white-500 font-light text-gray-900 px-6 py-4">Nama Tim</td>
                        <td class="text-sm bg-white-50 text-gray-900 font-medium px-6 py-4 lg:whitespace-nowrap">{{
                        $detailTeam->name_team }}</td>
                      </tr>
                      <tr class="border-b">
                        <td class="text-sm bg-white-500 font-light text-gray-900 px-6 py-4">Jenis Kompetisi</td>
                        <td class="text-sm bg-white-50 text-gray-900 font-medium px-6 py-4 lg:whitespace-nowrap">{{
                        $detailTeam->name_competitions }}</td>
                      </tr>
                      <tr class="border-b">
                        <td class="text-sm bg-white-500 font-light text-gray-900 px-6 py-4">Tingkat Tim</td>
                        <td class="text-sm bg-white-50 text-gray-900 font-medium px-6 py-4 lg:whitespace-nowrap">{{
                        $detailTeam->level }}</td>
                      </tr>
                      <tr class="border-b">
                        <td class="text-sm bg-white-500 font-light text-gray-900 px-6 py-4">Asal Kampus/Sekolah</td>
                        <td class="text-sm bg-white-50 text-gray-900 font-medium px-6 py-4 lg:whitespace-nowrap">{{
                        $detailTeam->origin }}</td>
                      </tr>
                      
                    @if (empty($submissionTeam))
                      <tr class="border-b">
                        <td class="text-sm bg-white-500 font-light text-gray-900 px-6 py-4">Nama submission</td>
                        <td class="text-sm bg-white-50 text-gray-900 font-medium px-6 py-4 lg:whitespace-nowrap">Tidak ada data</td>
                      </tr>
                      <tr class="border-b">
                        <td class="text-sm bg-white-500 font-light text-gray-900 px-6 py-4">Laporan submission</td>
                        <td class="text-sm bg-white-50 text-gray-900 font-medium px-6 py-4 lg:whitespace-nowrap">Tidak ada data</td>
                      </tr>
                      <tr class="border-b">
                        <td class="text-sm bg-white-500 font-light text-gray-900 px-6 py-4">Originalitas submission</td>
                        <td class="text-sm bg-white-50 text-gray-900 font-medium px-6 py-4 lg:whitespace-nowrap">Tidak ada data</td>
                      </tr>
                      <tr class="border-b">
                        <td class="text-sm bg-white-500 font-light text-gray-900 px-6 py-4">Tanggal pengumpulan submission</td>
                        <td class="text-sm bg-white-50 text-gray-900 font-medium px-6 py-4 lg:whitespace-nowrap">Tidak ada data</td>
                      </tr>
                      <tr class="border-b">
                        <td class="text-sm bg-white-500 font-light text-gray-900 px-6 py-4">Link Prototype</td>
                        <td class="text-sm bg-white-50 text-gray-900 font-medium px-6 py-4 lg:whitespace-nowrap">Tidak ada data</td>
                      </tr>
                    @else
                    {{ $submissionTeam->name }}
                      <tr class="border-b">
                        <td class="text-sm bg-white-500 font-light text-gray-900 px-6 py-4">Nama submission</td>
                        <td class="text-sm bg-white-50 text-gray-900 font-medium px-6 py-4 lg:whitespace-nowrap">
                          {{ $submissionTeam->name }}
                        </td>
                      </tr>
                      <tr class="border-b">
                        <td class="text-sm bg-white-500 font-light text-gray-900 px-6 py-4">Laporan submission</td>
                        <td class="text-sm bg-white-50 text-gray-900 font-medium px-6 py-4 lg:whitespace-nowrap">
                          <a href="{{ url($submissionTeam->laporan) }}" class="border border-indigo-500 hover:bg-indigo-500 hover:text-white rounded py-2 px-3" target="_blank">Lihat PDF Laporan</a>
                        </td>
                      </tr>
                      <tr class="border-b">
                        <td class="text-sm bg-white-500 font-light text-gray-900 px-6 py-4">Originalitas submission</td>
                        <td class="text-sm bg-white-50 text-gray-900 font-medium px-6 py-4 lg:whitespace-nowrap">
                          <a href="{{ url($submissionTeam->orginalitas) }}" class="border border-indigo-500 hover:bg-indigo-500 hover:text-white rounded py-2 px-3" target="_blank">Lihat PDF Originalitas</a>
                        </td>
                      </tr>
                      <tr class="border-b">
                        <td class="text-sm bg-white-500 font-light text-gray-900 px-6 py-4">Tanggal pengumpulan submission</td>
                        <td class="text-sm bg-white-50 text-gray-900 font-medium px-6 py-4 lg:whitespace-nowrap">
                          {{ date_format($submissionTeam->created_at,"d F Y"); }}
                        </td>
                      </tr>
                      <tr class="border-b">
                        <td class="text-sm bg-white-500 font-light text-gray-900 px-6 py-4">Link Prototype</td>
                        <td class="text-sm bg-white-50 text-gray-900 font-medium px-6 py-4 lg:whitespace-nowrap">
                          @if(empty($submissionTeam->link))
                          <a href="{{ $submissionTeam->link }}" class="border border-indigo-500 hover:bg-indigo-500 hover:text-white rounded py-2 px-3" target="_blank">Lihat Prototype </a>
                          @else
                            Tidak ada data
                          @endif
                        </td>
                      </tr>
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
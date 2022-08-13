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
                                <div class="bg-white border-b border-gray-100 pb-4">
                                    <div class="pt-2">
                                        <a href="{{ route('competition.index') }}" class="pr-4 px-2">
                                            <i class="fa-solid fa-angle-left"></i>
                                        </a>
                                        <span class="font-semibold text-xl text-gray-800 leading-tight">Edit Anggota</span>
                                    </div>
                                    
                                </div>
                                <div class="pt-2">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-4 mt-4">
                                            <form method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="input-wrapper">
                                                    <div>
                                                        <x-jet-label for="nim" value="{{ __('NIM/NIS') }}" />
                                                        <x-jet-input id="nim" class="block mt-1 w-full" type="text" name="nim" value="{{$participant->nim}}" required autofocus autocomplete="nim" placeholder="Nomor Induk Mahasiswa/Siswa" />
                                                    </div>
                                                    <div class="mt-4">
                                                        <x-jet-label for="name" value="{{ __('Name') }}" />
                                                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$participant->name}}" required autofocus autocomplete="name" placeholder="Nama Anggota" />
                                                    </div>
                                                    <div class="mt-4">
                                                        <x-jet-label for="role" value="{{ __('Role') }}" />
                                                        <select name="role" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="role" required>
                                                            <option :selected="old('role')">{{$participant->role}}</option>
                                                        </select>
                                                    </div>
                                                    <div class="mt-4">
                                                        <div class="mb-4" id="preview0">
                                                            <x-jet-label for="previewImage0" value="{{ __('Preview Image') }}" />
                                                            <img id="previewImage0" src="{{asset($participant->evidence)}}" style="max-width: 100%; height: 200px;">
                                                        </div>
                                                        <x-jet-label for="evidence" value="{{ __('Evidence') }}" />
                                                        <input name="evidence" class="block w-full px-3 py-1.5 text-base font-normal bg-white border rounded-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mt-1 focus:outline-none" id="evidence" type="file" accept="image/*" onchange="$('#preview0').show();document.getElementById('previewImage0').src = window.URL.createObjectURL(this.files[0]);">
                                                        <p class="text-red-500 text-xs italic">Kartu Tanda Mahasiswa/Kartu Pelajar (png/jpeg format, max 2mb)</p>
                                                    </div>
                                                </div>
                                                {{-- <button id="pay-button" class="mt-4 rounded border border-indigo-500 hover:text-white hover:bg-indigo-500 hover:cursor-pointer py-2 px-3">Pay</button> --}}
                                                <input type="submit" value="Submit" class="mt-4 rounded bg-indigo-500 border border-indigo-500 text-white hover:bg-indigo-900 hover:cursor-pointer py-2 px-3">
                                                <button type="submit" name="delete" value="Delete" onclick="if(!confirm('Delete participant?')){return false;}" class="mt-4 ml-4 rounded border border-red-500 hover:text-white hover:bg-red-500 hover:cursor-pointer py-2 px-3">Delete</button>
                                            </form>
                                        </div>
                                    </div>
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

    @endpush
</x-app-layout>

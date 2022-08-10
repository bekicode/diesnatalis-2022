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
                                        <span class="font-semibold text-xl text-gray-800 leading-tight">Buat Tim</span>
                                    </div>
                                    
                                </div>
                                <div class="pt-2">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-4 mt-4">
                                            <form method="POST">
                                                @csrf
                                                <div>
                                                    <x-jet-label for="name" value="{{ __('Team Name') }}" />
                                                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nama Tim" />
                                                </div>
                                                <div class="mt-4">
                                                    <x-jet-label for="type" value="{{ __('Type') }}" />
                                                    <select name="type" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="type" required>
                                                        <option :selected="old('type')">UI/UX Designer</option>
                                                        <option :selected="old('type')">Web Developer</option>
                                                    </select>
                                                </div>
                                                <div class="mt-4">
                                                    <x-jet-label for="level" value="{{ __('Level') }}" />
                                                    <select name="level" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" id="level" required>
                                                        <option :selected="old('level')">Mahasiswa</option>
                                                        <option :selected="old('level')">Pelajar</option>
                                                    </select>
                                                </div>
                                                <div class="mt-4">
                                                    <x-jet-label for="origin" value="{{ __('Origin') }}" />
                                                    <x-jet-input id="origin" class="block mt-1 w-full" type="text" name="origin" :value="old('origin')" required autocomplete="origin" placeholder="Asal Kampus/Sekolah" />
                                                </div>
                                                {{-- <button id="pay-button" class="mt-4 rounded border border-indigo-500 hover:text-white hover:bg-indigo-500 hover:cursor-pointer py-2 px-3">Pay</button> --}}
                                                <input type="submit" value="Submit" class="mt-4 rounded border border-indigo-500 hover:text-white hover:bg-indigo-500 hover:cursor-pointer py-2 px-3">
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
{{--         
    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $snapToken }}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });
    </script> --}}
    @endpush
</x-app-layout>

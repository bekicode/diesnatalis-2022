<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Kompetisi
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
                                        <a href="{{ route('admin.list_competition') }}" class="pr-4 px-2">
                                            <i class="fa-solid fa-angle-left"></i>
                                            <span class="font-semibold text-xl text-gray-800 leading-tight">List Kompetisi</span>
                                        </a>
                                    </div>
                                    
                                </div>
                                <div class="pt-2">
                                  <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4 mt-4">
                                      <form method="POST" enctype="multipart/form-data" action="{{ route('admin.tambah_competition_act') }}">
                                        @csrf
                                        <div>
                                            <x-jet-label for="name" value="Nama Kompetisi" />
                                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nama kompetisi" />
                                            @error('name') <label class="text-red-700">{{ $message }}</label> @enderror
                                        </div>
                                        <div class="mt-4">
                                            <x-jet-label for="price" value="Harga pendaftaran" />
                                            <x-jet-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required autocomplete="price" placeholder="Harga pendaftaran..." />
                                            @error('price') <label class="text-red-700">{{ $message }}</label> @enderror
                                        </div>
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

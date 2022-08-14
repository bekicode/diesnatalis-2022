<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Competition') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Session::has('success'))
            <div class="bg-green-500 overflow-hidden shadow-xl sm:rounded-lg mb-10">
                <div class="px-5 py-3 text-white">
                    <i class="fa-solid fa-check pr-3"></i>
                    {{Session::get('success')}}
                </div>
            </div>
            @endif
            @if(Session::has('error'))
            <div class="bg-red-500 overflow-hidden shadow-xl sm:rounded-lg mb-10">
                <div class="px-5 py-3 text-white">
                    <i class="fa-solid fa-x pr-3"></i>
                    {{Session::get('error')}}
                </div>
            </div>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    <div class="md:grid md:grid-cols-2 md:gap-6">
                        <div class="md:mt-0 md:col-span-2">
                            <div class="px-5 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                                <div class="flex justify-between bg-white border-b border-gray-100 pb-4">
                                    <div class="py-2">
                                        <a href="{{ route('competition.index') }}" class="pr-4 px-2">
                                            <i class="fa-solid fa-angle-left"></i>
                                        </a>
                                        <span class="font-semibold text-xl text-gray-800 leading-tight">Detail Tim</span>
                                    </div>
                                    @if(!empty($transaction))
                                        @if(count($participant) < 3 && $transaction->transaction_status == 'settlement' OR $transaction->transaction_status == 'capture')
                                            @if(date('Y-m-d') >= $team->tgl_mulai && date('Y-m-d') <= $team->submission_selesai)
                                                <a href="{{ route('competition.add',$id) }}" class="border border-indigo-500 hover:bg-indigo-500 hover:text-white rounded py-2 px-3">Tambah Anggota</a>
                                            @endif
                                        @endif
                                    @endif
                                </div>
                                <div class="lg:grid lg:grid-cols-3 lg:gap-6">
                                    <div class="py-5">
                                        <div class="overflow-x-auto">
                                            <table class="w-full">
                                                <tbody class="">
                                                    <tr class="border-b">
                                                        <td class="text-sm bg-gray-50 font-light text-gray-900 px-6 py-4">Nama Tim</td>
                                                        <td class="text-sm bg-gray-100 text-gray-900 font-medium px-6 py-4">{{ $team->name }}</td>
                                                    </tr>
                                                    <tr class="border-b">
                                                        <td class="text-sm bg-gray-50 font-light text-gray-900 px-6 py-4">Jenis Kompetisi</td>
                                                        <td class="text-sm bg-gray-100 text-gray-900 font-medium px-6 py-4">{{ $team->name_competitions }}</td>
                                                    </tr>
                                                    <tr class="border-b">
                                                        <td class="text-sm bg-gray-50 font-light text-gray-900 px-6 py-4">Tingkat Tim</td>
                                                        <td class="text-sm bg-gray-100 text-gray-900 font-medium px-6 py-4">{{ $team->level }}</td>
                                                    </tr>
                                                    <tr class="border-b">
                                                        <td class="text-sm bg-gray-50 font-light text-gray-900 px-6 py-4">Asal Kampus/Sekolah</td>
                                                        <td class="text-sm bg-gray-100 text-gray-900 font-medium px-6 py-4">{{ $team->origin }}</td>
                                                    </tr>
                                                    <tr class="border-b">
                                                        <td class="text-sm bg-gray-50 font-light text-gray-900 px-6 py-4">Status Pembayaran</td>
                                                        <td class="text-sm bg-gray-100 text-gray-900 font-medium px-6 py-4">
                                                            @if(empty($transaction) OR !empty($transaction) AND $transaction->transaction_status == 'expire' OR $transaction->transaction_status == 'cancel')
                                                                Kamu belum melakukan pembayaran 
                                                                <button id="pay-button" class="hover:text-indigo-900 text-indigo-500 hover:cursor-pointer py-1">Klik disini</button>
                                                                untuk melakukan pembayaran!
                                                            @else
                                                                @if($transaction->transaction_status == 'settlement' OR $transaction->transaction_status == 'capture')
                                                                    <span class="text-green-500">Lunas</span>
                                                                @elseif($transaction->transaction_status == 'pending')
                                                                    <span class="text-red-500">Pending</span>
                                                                    <br>
                                                                    <span>Silahkan melakukan pembayaran anda @if($transaction->payment_type == 'bank_transfer')<a href="{{$transaction->pdf_url}}" target="_BLANK" class="hover:text-indigo-900 text-indigo-500 py-1">Klik disini</a> @endif</span>
                                                                @endif
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- TANGGAL SUBMISSION DIBUKA --}}
                                    @if(count($participant) > 0 && date('Y-m-d') >= $team->submission_mulai)
                                        <div class="overflow-x-auto">
                                            <table class="w-full">
                                                <tbody class="">
                                                    <tr class="border-b">
                                                        <td colspan="2" class="text-sm bg-gray-50 font-bold text-gray-900 px-6 py-4">Submission</td>
                                                    </tr>
                                                    <tr class="border-b">
                                                        <td class="text-sm bg-gray-50 font-light text-gray-900 px-6 py-4">Nama Karya</td>
                                                        <td class="text-sm bg-gray-100 text-gray-900 font-medium px-6 py-4">{{ (!empty($submission->name) ? $submission->name : "Kamu belum mengisi submission!") }}</td>
                                                    </tr>
                                                    <tr class="border-b">
                                                        <td class="text-sm bg-gray-50 font-light text-gray-900 px-6 py-4">Hasil Karya</td>
                                                        <td class="text-sm bg-gray-100 text-gray-900 font-medium px-6 py-4">{{ (!empty($submission->laporan) ? $submission->laporan : "Kamu belum mengisi submission!") }}</td>
                                                    </tr>
                                                    <tr class="border-b">
                                                        <td class="text-sm bg-gray-50 font-light text-gray-900 px-6 py-4">Originalitas</td>
                                                        <td class="text-sm bg-gray-100 text-gray-900 font-medium px-6 py-4">{{ (!empty($submission->originalitas) ? $submission->originalitas : "Kamu belum mengisi submission!") }}</td>
                                                    </tr>
                                                    <tr class="border-b">
                                                        <td class="text-sm bg-gray-50 font-light text-gray-900 px-6 py-4">Link Karya</td>
                                                        <td class="text-sm bg-gray-100 text-gray-900 font-medium px-6 py-4">{{ (!empty($submission->link) ? $submission->link : "") }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                    </div>
                                    <div class="lg:py-4 col-span-2">
                                        {{-- TANGGAL SUBMISSION DIBUKA & DITUTUP --}}
                                        
                                        @if(count($participant) > 0 && date('Y-m-d') >= $team->submission_mulai && date('Y-m-d') <= $team->submission_selesai)
                                        <span class="font-semibold text-md text-gray-800 leading-tight">Submit Karya</span>
                                        <div class="mb-4">
                                            <form method="POST" action="{{ route('competition.detail-post',$id) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mt-2">
                                                    <x-jet-label for="name" value="{{ __('Name') }}" />
                                                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nama Karya" />
                                                </div>
                                                <div class="mt-4">
                                                    <x-jet-label for="proposal" value="{{ __('Proposal') }}" />
                                                    <input name="proposal" required class="block w-full px-3 py-1.5 text-base font-normal bg-white border rounded-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mt-1 focus:outline-none" id="proposal" type="file" accept="application/pdf">
                                                </div>
                                                <div class="mt-4">
                                                    <x-jet-label for="originalitas" value="{{ __('Originality') }}" />
                                                    <input name="originalitas" required class="block w-full px-3 py-1.5 text-base font-normal bg-white border rounded-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 shadow-sm mt-1 focus:outline-none" id="originalitas" type="file" accept="application/pdf">
                                                </div>
                                                <div class="mt-4">
                                                    <x-jet-label for="link" value="{{ __('Link') }}" />
                                                    <x-jet-input id="link" class="block mt-1 w-full" type="text" name="link" :value="old('link')" placeholder="Link Karya" />
                                                </div>
                                                <input type="submit" value="Submit" class="mt-4 rounded border border-indigo-500 hover:text-white hover:bg-indigo-500 hover:cursor-pointer py-2 px-3">
                                            </form>
                                        </div>
                                    @endif
                                        <div class="overflow-x-auto">
                                            <span class="font-semibold text-md text-gray-800 leading-tight">Anggota Tim</span>
                                            <table class="w-full mt-2">
                                                <thead class="border-b bg-gray-50 m-2 text-left">
                                                    <tr>
                                                        <th class="text-sm font-medium text-gray-900 px-6 py-4">NIM/NIS</th>
                                                        <th class="text-sm font-medium text-gray-900 px-6 py-4">Name</th>
                                                        <th class="text-sm font-medium text-gray-900 px-6 py-4">Role</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white border-b">
                                                    @if(count($participant) > 0)
                                                    @foreach($participant as $p)
                                                        <tr class="clickable-row bg-white border-b hover:bg-gray-100 hover:cursor-pointer" data-href="{{ route('competition.participant-edit',['id_teams'=>$p->id_teams,'id'=>$p->id]) }}">
                                                            <td class="text-sm text-gray-900 font-light px-6 py-4">{{ $p->nim }}</td>
                                                            <td class="text-sm text-gray-900 font-light px-6 py-4">{{ $p->name }}</td>
                                                            <td class="text-sm text-gray-900 font-light px-6 py-4">{{ $p->role }}</td>
                                                        </tr>
                                                    @endforeach
                                                    @else
                                                        <tr class="bg-white border-b hover:bg-gray-100">
                                                            <td class="text-sm text-gray-900 font-light px-6 py-4" colspan="3">No data</td>
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
        </div>
    </div>
    
@if(empty($transaction) OR !empty($transaction) AND $transaction->transaction_status == 'expire' OR $transaction->transaction_status == 'cancel')
    <form id="payment-form" method="post">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
      <input type="hidden" name="result_data" id="result-data" value=""></div>
    </form>
@endif    
    @push('js')
    <script>
        function changeResult(data){
            $("#result-data").val(JSON.stringify(data));
            //resultType.innerHTML = type;
            //resultData.innerHTML = JSON.stringify(data);
        }
        $(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
    @if(empty($transaction) OR !empty($transaction) AND $transaction->transaction_status == 'expire' OR $transaction->transaction_status == 'cancel')
            <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
        <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
        <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
        <script>
            $(document).ready(function($) {
                $("#pay-button").click(function() {
                    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                    window.snap.pay('{{ $snapToken }}', {
                        onSuccess: function(result){
                            /* You may add your own implementation here */
                            alert("payment success!"); 
                            // console.log(result);
                            changeResult(result);
                            $("#payment-form").submit();
                        },
                        onPending: function(result){
                            /* You may add your own implementation here */
                            alert("wating your payment!"); 
                            // console.log(result);
                            changeResult(result);
                            $("#payment-form").submit();
                        },
                        onError: function(result){
                            /* You may add your own implementation here */
                            alert("payment failed!"); 
                            console.log(result);
                            // changeResult(result);
                            $("#payment-form").submit();
                        },
                        onClose: function(){
                            /* You may add your own implementation here */
                            alert('you closed the popup without finishing the payment');
                        }
                    });
                });
            });
        </script>
    @endif
    @if(Session::has('checkout'))
        
        <script>
            
                $(document).ready(function($) {
                    
                    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                    window.snap.pay('{{ $snapToken }}', {
                        onSuccess: function(result){
                            /* You may add your own implementation here */
                            alert("payment success!"); 
                            console.log(result);
                            changeResult(result);
                            $("#payment-form").submit();
                        },
                        onPending: function(result){
                            /* You may add your own implementation here */
                            alert("wating your payment!"); 
                            console.log(result);
                            changeResult(result);
                            $("#payment-form").submit();
                        },
                        onError: function(result){
                            /* You may add your own implementation here */
                            alert("payment failed!"); 
                            console.log(result);
                            changeResult(result);
                            $("#payment-form").submit();
                        },
                        onClose: function(){
                            /* You may add your own implementation here */
                            alert('you closed the popup without finishing the payment');
                        }
                    });
                });
        </script>
    @endif

    @endpush
</x-app-layout>
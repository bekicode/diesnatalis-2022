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
                                    <div class="pt-2">
                                        <a href="{{ route('competition.index') }}" class="pr-4 px-2">
                                            <i class="fa-solid fa-angle-left"></i>
                                        </a>
                                        <span class="font-semibold text-xl text-gray-800 leading-tight">Detail Tim</span>
                                    </div>
                                    @if(!empty($transaction))
                                        @if(count($participant) < 3 && $transaction->transaction_status == 'settlement' OR $transaction->transaction_status == 'capture')
                                        <a href="{{ route('competition.add',$id) }}" class="border border-indigo-500 hover:bg-indigo-500 hover:text-white rounded py-2 px-3">Tambah Anggota</a>
                                        @endif
                                    @endif
                                </div>
                                <div class="lg:grid lg:grid-cols-3 lg:gap-4">
                                    <div class="py-2">
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
                                                        @if(empty($transaction) OR !empty($transaction) AND $transaction->transaction_status == 'expire' OR $transaction->payment_type == 'gopay' AND $transaction->transaction_status == 'pending')
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
                                    <div class="py-2 col-span-2">
                                        <table class="w-full">
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
    
@if(empty($transaction) OR !empty($transaction) AND $transaction->transaction_status == 'expire')
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
    @if(empty($transaction) OR !empty($transaction) AND $transaction->transaction_status == 'expire')
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
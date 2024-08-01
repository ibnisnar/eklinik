<x-app-layout>
    @if($tindakan)
        @php
            $penambahan = null;
            $perubahan = null;
            
            if (Illuminate\Support\Str::startsWith($tindakan, 'PT')) {
                $penambahan = App\Models\PermohonanPenambahan::where('application_no', $tindakan)->first();
            } elseif (Illuminate\Support\Str::startsWith($tindakan, 'PU')) {
                $perubahan = App\Models\PermohonanPerubahan::where('application_no', $tindakan)->first();
            }
        @endphp

        @if($penambahan)
            <div class="py-5">
                <div class="sm:px-6 lg:px-8 space-y-5">
                    <div class="w-full p-4 bg-white bg-opacity-50 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:bg-opacity-50 dark:border-gray-700 sm:p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Maklumat Permohonan</h5>
                        </div>
                        <div class="flow-root">
                            <div class="relative rounded">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-white bg-opacity-30 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:bg-opacity-30  dark:border-gray-700 dark:text-gray-400  sm:rounded-lg">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Pemohon
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Tarikh Mohon
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                No. Permohonan
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Klinik
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="accordion-collapse" data-accordion="collapse">
                                        <tr id="tanggungan-heading-{{ $penambahan->id }}" class="hover:bg-white hover:bg-opacity-30 dark:hover:bg-gray-800 dark:hover:bg-opacity-30">
                                            <th scope="row" class="px-6 py-4">
                                                {{ $penambahan->users->name }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ \Carbon\Carbon::parse($penambahan->application_date)->format('d-m-Y') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                #{{ $penambahan->application_no }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $penambahan->klinik->clinic_name }}
                                            </td>
                                        </tr>
                                        <tr class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <td colspan="5" class="p-5 text-left">
                                                @php
                                                    $countKeterangan = 0;
                                                    $keterangan = $penambahan->keterangan;
                                                @endphp
                                                <div class="flex items-center justify-between mb-4">
                                                    <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Senarai Keterangan {{ $penambahan->application_no }}</h5>
                                                    
                                                </div>
                                                <div class="relative rounded">
                                                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                        <thead class="text-xs text-gray-700 uppercase bg-white bg-opacity-30 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:bg-opacity-30  dark:border-gray-700 dark:text-gray-400  sm:rounded-lg">
                                                            <tr>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Bill
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Jenis
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Perkara
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Harga (RM)
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($keterangan as $item)
                                                                <tr class="hover:bg-white hover:bg-opacity-30 dark:hover:bg-gray-800 dark:hover:bg-opacity-30">
                                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                        {{ ++$countKeterangan }}
                                                                    </th>
                                                                    <td class="px-6 py-4">
                                                                        {{ $item->application_type }}
                                                                    </td>
                                                                    <td class="px-6 py-4">
                                                                        {{ $item->application_item }}
                                                                    </td>
                                                                    <td class="px-6 py-4">
                                                                        {{ $item->application_amaun }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="mt-6 flex justify-end">
                                                    <a href="{{ route('senarai-permohonan-maklumat-rawatan') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                                                        {{ __('Kembali') }}
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="w-full p-4 bg-white bg-opacity-50 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:bg-opacity-50 dark:border-gray-700 sm:p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Tindakan Agensi</h5>
                        </div>
                        <div class="flow-root">
                            <form action="{{ route('store.tindakan-penambahan-agensi') }}" method="POST" class="max-w-3xl mx-auto">
                                @csrf
                                <input type="hidden" name="application_id" value="{{ $penambahan->id }}">

                                <div class="mb-5">
                                    <label for="action_application_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarikh Semak</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                            </svg>
                                        </div>
                                        <input type="hidden" name="action_application_date" value="{{ date('d-m-y') }}">
                                        <input value="{{ date('d-m-y') }}" type="text" name="action_application_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-4 mb-5">
                                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="sokong" type="radio" value="2" name="application_status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="sokong" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sokong</label>
                                    </div>
                                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="tidak_sokong" type="radio" value="3" name="application_status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="tidak_sokong" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak Sokong</label>
                                    </div>
                                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="Kuiri" type="radio" value="4" name="application_status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="Kuiri" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kuiri</label>
                                    </div>
                                </div>

                                <div class="mb-5">
                                    <label for="action_application_remark" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                                    <textarea id="action_application_remark" name="action_application_remark" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                                </div>

                                <div class="mb-5">
                                    <label for="action_application_officer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pegawai</label>
                                    <input type="hidden" name="action_application_officer" value="{{ Auth::user()->id }}">
                                    <input type="text" id="action_application_officer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ Auth::user()->name }}" readonly />
                                </div>

                                <div class="mb-5">
                                    <label for="action_application_role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jawatan</label>
                                    <input type="text" id="action_application_role" name="action_application_role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                </div>

                                <div class="mb-5">
                                    <label for="action_application_agensi_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Agensi</label>
                                    <input type="hidden" name="action_application_agensi_name" value="Putrakop">
                                    <input type="text" id="action_application_agensi_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="Putrakop" readonly />
                                </div>

                                <div class="text-right"> <!-- Add this div -->
                                    <x-primary-button class="ms-3">
                                        {{ __('Hantar') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($perubahan)
            <div class="py-5">
                <div class="sm:px-6 lg:px-8 space-y-5">
                    <div class="w-full p-4 bg-white bg-opacity-50 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:bg-opacity-50 dark:border-gray-700 sm:p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Maklumat Permohonan</h5>
                        </div>
                        <div class="flow-root">
                            <div class="relative rounded">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-white bg-opacity-30 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:bg-opacity-30  dark:border-gray-700 dark:text-gray-400  sm:rounded-lg">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Pemohon
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Tarikh Mohon
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                No. Permohonan
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Klinik
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="accordion-collapse" data-accordion="collapse">
                                        <tr id="tanggungan-heading-{{ $perubahan->id }}" class="hover:bg-white hover:bg-opacity-30 dark:hover:bg-gray-800 dark:hover:bg-opacity-30">
                                            <th scope="row" class="px-6 py-4">
                                                {{ $perubahan->users->name }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ \Carbon\Carbon::parse($perubahan->application_date)->format('d-m-Y') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                #{{ $perubahan->application_no }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $perubahan->klinik->clinic_name }}
                                            </td>
                                        </tr>
                                        <tr class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <td colspan="5" class="p-5 text-left">
                                                @php
                                                    $countKeterangan = 0;
                                                    $keterangan = $perubahan->keterangan;
                                                @endphp
                                                <div class="flex items-center justify-between mb-4">
                                                    <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Senarai Keterangan {{ $perubahan->application_no }}</h5>
                                                    
                                                </div>
                                                <div class="relative rounded">
                                                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                        <thead class="text-xs text-gray-700 uppercase bg-white bg-opacity-30 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:bg-opacity-30  dark:border-gray-700 dark:text-gray-400  sm:rounded-lg">
                                                            <tr>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Bill
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Jenis
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Perkara
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Harga (RM)
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($keterangan as $item)
                                                                <tr class="hover:bg-white hover:bg-opacity-30 dark:hover:bg-gray-800 dark:hover:bg-opacity-30">
                                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                        {{ ++$countKeterangan }}
                                                                    </th>
                                                                    <td class="px-6 py-4">
                                                                        {{ $item->application_type }}
                                                                    </td>
                                                                    <td class="px-6 py-4">
                                                                        {{ $item->application_item }}
                                                                    </td>
                                                                    <td class="px-6 py-4">
                                                                        {{ $item->application_amaun }}
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="mt-6 flex justify-end">
                                                    <a href="{{ route('senarai-permohonan-maklumat-rawatan') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                                                        {{ __('Kembali') }}
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="w-full p-4 bg-white bg-opacity-50 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:bg-opacity-50 dark:border-gray-700 sm:p-8">
                        <div class="flex items-center justify-between mb-4">
                            <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Tindakan Agensi</h5>
                        </div>
                        <div class="flow-root">
                            <form action="{{ route('store.tindakan-perubahan-agensi') }}" method="POST" class="max-w-3xl mx-auto">
                                @csrf
                                <input type="hidden" name="application_id" value="{{ $perubahan->id }}">

                                <div class="mb-5">
                                    <label for="action_application_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarikh Semak</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                            </svg>
                                        </div>
                                        <input type="hidden" name="action_application_date" value="{{ date('d-m-y') }}">
                                        <input value="{{ date('d-m-y') }}" type="text" name="action_application_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly>
                                    </div>
                                </div>

                                <div class="grid grid-cols-3 gap-4 mb-5">
                                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="sokong" type="radio" value="2" name="application_status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="sokong" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sokong</label>
                                    </div>
                                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="tidak_sokong" type="radio" value="3" name="application_status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="tidak_sokong" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak Sokong</label>
                                    </div>
                                    <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="Kuiri" type="radio" value="4" name="application_status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="Kuiri" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kuiri</label>
                                    </div>
                                </div>

                                <div class="mb-5">
                                    <label for="action_application_remark" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                                    <textarea id="action_application_remark" name="action_application_remark" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                                </div>

                                <div class="mb-5">
                                    <label for="action_application_officer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pegawai</label>
                                    <input type="hidden" name="action_application_officer" value="{{ Auth::user()->id }}">
                                    <input type="text" id="action_application_officer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ Auth::user()->name }}" readonly />
                                </div>

                                <div class="mb-5">
                                    <label for="action_application_role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jawatan</label>
                                    <input type="text" id="action_application_role" name="action_application_role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                </div>

                                <div class="mb-5">
                                    <label for="action_application_agensi_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Agensi</label>
                                    <input type="hidden" name="action_application_agensi_name" value="Putrakop">
                                    <input type="text" id="action_application_agensi_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="Putrakop" readonly />
                                </div>

                                <div class="text-right"> <!-- Add this div -->
                                    <x-primary-button class="ms-3">
                                        {{ __('Hantar') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="py-5">
            <div class="sm:px-6 lg:px-8 space-y-5">
                <div class="w-full p-4 bg-white bg-opacity-50 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:bg-opacity-50 dark:border-gray-700 sm:p-8">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Senarai Permohonan Penambahan Maklumat Rawatan</h5>
                        <div class="flex gap-2"> 
                            <form class="flex items-center" action="{{ route('senarai-permohonan-maklumat-rawatan') }}" method="GET">   
                                <label for="search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                          <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                        </svg>
                                    </div>
                                    <input type="text" id="search" name="carian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ request()->has('carian') ? request()->carian : 'Search' }}" required />
                                    @if(request()->has('carian'))
                                        <a href="{{ route('senarai-permohonan-maklumat-rawatan') }}" class="absolute inset-y-0 end-0 flex items-center pe-3">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="flow-root">
                        <div class="relative rounded">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-white bg-opacity-30 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:bg-opacity-30  dark:border-gray-700 dark:text-gray-400  sm:rounded-lg">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Bill
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Tarikh Mohon
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            No. Permohonan
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-right">
                                            Tindakan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="accordion-collapse" data-accordion="collapse">
                                    @if($listPenambahan->isEmpty())
                                        <tr>
                                            <td colspan="5" class="p-5 text-center">
                                                No data found
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($listPenambahan as $penambahan)
                                            <tr id="tanggungan-heading-{{ $penambahan->id }}" class="hover:bg-white hover:bg-opacity-30 dark:hover:bg-gray-800 dark:hover:bg-opacity-30">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{++$countPenambahan}}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ \Carbon\Carbon::parse($penambahan->application_date)->format('d-m-Y') }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    #{{ $penambahan->application_no }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    @php
                                                        $statusClass = '';
                                                        switch($penambahan->application_status) {
                                                            case 1:
                                                                $statusClass = 'bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300';
                                                                break;
                                                            case 2:
                                                            case 5:
                                                            case 8:
                                                                $statusClass = 'bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300';
                                                                break;
                                                            case 3:
                                                            case 6:
                                                            case 9:
                                                                $statusClass = 'bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300';
                                                                break;
                                                            case 0:
                                                            case 4:
                                                            case 7:
                                                            case 10:
                                                                $statusClass = 'bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300';
                                                                break;
                                                        }
                                                    @endphp
                                                    <span class="{{ $statusClass }}">
                                                        @if($penambahan->application_status == 0)
                                                            Draft
                                                        @elseif($penambahan->application_status == 1)
                                                            Permohonan Baru
                                                        @elseif($penambahan->application_status == 2)
                                                            Disokong Agensi
                                                        @elseif($penambahan->application_status == 3)
                                                            Tidak Disokong Agensi
                                                        @elseif($penambahan->application_status == 4)
                                                            Dikuiri Agensi
                                                        @elseif($penambahan->application_status == 5)
                                                            Disokong Doktor PPJ
                                                        @elseif($penambahan->application_status == 6)
                                                            Tidak Disokong Doktor PPJ
                                                        @elseif($penambahan->application_status == 7)
                                                            Dikuiri Doktor PPJ
                                                        @elseif($penambahan->application_status == 8)
                                                            Diluluskan
                                                        @elseif($penambahan->application_status == 9)
                                                            Tidak Diluluskan
                                                        @elseif($penambahan->application_status == 10)
                                                            Dikuiri Pelulus
                                                        @endif
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 flex gap-2 justify-end">
                                                    <!-- Lihat Klinik -->
                                                    <a data-popover-target="lihat-permohonan-{{ $penambahan->id }}" data-popover-placement="top" href="{{ route('senarai-permohonan-maklumat-rawatan', ['tindakan' => $penambahan->application_no ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="lihat-permohonan-{{ $penambahan->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                        <div class="px-3 py-2">
                                                            <p>Lihat Permohonan</p>
                                                        </div>
                                                        <div data-popper-arrow></div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="w-full p-4 bg-white bg-opacity-50 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:bg-opacity-50 dark:border-gray-700 sm:p-8">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Senarai Permohonan Perubahan Maklumat Rawatan</h5>
                        <div class="flex gap-2"> 
                            <form class="flex items-center" action="{{ route('senarai-permohonan-maklumat-rawatan') }}" method="GET">   
                                <label for="search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                          <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                        </svg>
                                    </div>
                                    <input type="text" id="search" name="carian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ request()->has('carian') ? request()->carian : 'Search' }}" required />
                                    @if(request()->has('carian'))
                                        <a href="{{ route('senarai-permohonan-maklumat-rawatan') }}" class="absolute inset-y-0 end-0 flex items-center pe-3">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="flow-root">
                        <div class="relative rounded">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-white bg-opacity-30 shadow-sm sm:rounded-lg dark:bg-gray-800 dark:bg-opacity-30  dark:border-gray-700 dark:text-gray-400  sm:rounded-lg">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Bill
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Tarikh Mohon
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            No. Permohonan
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-right">
                                            Tindakan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="accordion-collapse" data-accordion="collapse">
                                    @if($listPerubahan->isEmpty())
                                        <tr>
                                            <td colspan="5" class="p-5 text-center">
                                                No data found
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($listPerubahan as $perubahan)
                                            <tr id="tanggungan-heading-{{ $perubahan->id }}" class="hover:bg-white hover:bg-opacity-30 dark:hover:bg-gray-800 dark:hover:bg-opacity-30">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{++$countPerubahan}}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ \Carbon\Carbon::parse($perubahan->application_date)->format('d-m-Y') }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    #{{ $perubahan->application_no }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    @php
                                                        $statusClass = '';
                                                        switch($perubahan->application_status) {
                                                            case 1:
                                                                $statusClass = 'bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300';
                                                                break;
                                                            case 2:
                                                            case 5:
                                                            case 8:
                                                                $statusClass = 'bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300';
                                                                break;
                                                            case 3:
                                                            case 6:
                                                            case 9:
                                                                $statusClass = 'bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300';
                                                                break;
                                                            case 0:
                                                            case 4:
                                                            case 7:
                                                            case 10:
                                                                $statusClass = 'bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300';
                                                                break;
                                                        }
                                                    @endphp
                                                    <span class="{{ $statusClass }}">
                                                        @if($perubahan->application_status == 0)
                                                            Draft
                                                        @elseif($perubahan->application_status == 1)
                                                            Permohonan Baru
                                                        @elseif($perubahan->application_status == 2)
                                                            Disokong Agensi
                                                        @elseif($perubahan->application_status == 3)
                                                            Tidak Disokong Agensi
                                                        @elseif($perubahan->application_status == 4)
                                                            Dikuiri Agensi
                                                        @elseif($perubahan->application_status == 5)
                                                            Disokong Doktor PPJ
                                                        @elseif($perubahan->application_status == 6)
                                                            Tidak Disokong Doktor PPJ
                                                        @elseif($perubahan->application_status == 7)
                                                            Dikuiri Doktor PPJ
                                                        @elseif($perubahan->application_status == 8)
                                                            Diluluskan
                                                        @elseif($perubahan->application_status == 9)
                                                            Tidak Diluluskan
                                                        @elseif($perubahan->application_status == 10)
                                                            Dikuiri Pelulus
                                                        @endif
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 flex gap-2 justify-end">
                                                    <!-- Lihat Klinik -->
                                                    <a data-popover-target="lihat-permohonan-{{ $perubahan->id }}" data-popover-placement="top" href="{{ route('senarai-permohonan-maklumat-rawatan', ['tindakan' => $perubahan->application_no ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="lihat-permohonan-{{ $perubahan->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                        <div class="px-3 py-2">
                                                            <p>Lihat Permohonan</p>
                                                        </div>
                                                        <div data-popper-arrow></div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
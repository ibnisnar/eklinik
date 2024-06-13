<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($permohonan)
                @php
                    $permohonan = App\Models\PermohonanPerubahan::where('application_no', $permohonan)->first();
                @endphp
                <x-slot name="header">
                    <li>
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('senarai-permohonan-perubahan') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Pengurusan Permohonan Perubahan</a>
                      </div>
                    </li>
                    <li aria-current="page">
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">#{{ $permohonan->application_no }}</span>
                      </div>
                    </li>
                </x-slot>
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Maklumat Permohonan Perubahan</h5>
                    </div>
                    <div class="flow-root">
                        <div class="relative rounded">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                    </tr>
                                </thead>
                                <tbody id="accordion-collapse" data-accordion="collapse">
                                    <tr id="tanggungan-heading-{{ $permohonan->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{++$countPermohonan}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ \Carbon\Carbon::parse($permohonan->application_date)->format('d-m-Y') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            #{{ $permohonan->application_no }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @php
                                                $statusClass = '';
                                                switch($permohonan->application_status) {
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
                                                @if($permohonan->application_status == 0)
                                                    Draft
                                                @elseif($permohonan->application_status == 1)
                                                    Permohonan Baru
                                                @elseif($permohonan->application_status == 2)
                                                    Disokong Agensi
                                                @elseif($permohonan->application_status == 3)
                                                    Tidak Disokong Agensi
                                                @elseif($permohonan->application_status == 4)
                                                    Dikuiri Agensi
                                                @elseif($permohonan->application_status == 5)
                                                    Disokong Doktor PPJ
                                                @elseif($permohonan->application_status == 6)
                                                    Tidak Disokong Doktor PPJ
                                                @elseif($permohonan->application_status == 7)
                                                    Dikuiri Doktor PPJ
                                                @elseif($permohonan->application_status == 8)
                                                    Diluluskan
                                                @elseif($permohonan->application_status == 9)
                                                    Tidak Diluluskan
                                                @elseif($permohonan->application_status == 10)
                                                    Dikuiri Pelulus
                                                @endif
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td colspan="5" class="p-5 text-left">
                                            @php
                                                $countKeterangan = 0;
                                                $keterangan = $permohonan->keterangan;
                                            @endphp
                                            <div class="flex items-center justify-between mb-4">
                                                <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Senarai Keterangan {{ $permohonan->application_no }}</h5>
                                                
                                            </div>
                                            <div class="relative rounded">
                                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
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
                                                <a href="{{ route('senarai-permohonan-perubahan') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
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
            @else
                <x-slot name="header">
                    <li aria-current="page">
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Pengurusan Permohonan Perubahan</span>
                      </div>
                    </li>
                </x-slot>
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Senarai Permohonan Perubahan Maklumat Rawatan</h5>
                        <div class="flex gap-2"> 
                            <form class="flex items-center" action="{{ route('senarai-permohonan-perubahan') }}" method="GET">   
                                <label for="search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                          <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                        </svg>
                                    </div>
                                    <input type="text" id="search" name="carian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ request()->has('carian') ? request()->carian : 'Search' }}" required />
                                    @if(request()->has('carian'))
                                        <a href="{{ route('senarai-permohonan-perubahan') }}" class="absolute inset-y-0 end-0 flex items-center pe-3">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </form>
                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'tambah-permohonan-perubahan')" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Permohonan Perubahan</button>
                            <x-modal name="tambah-permohonan-perubahan" focusable maxWidth="6xl">
                                @php
                                    // Get the latest application number
                                    $latestApplication = App\Models\PermohonanPerubahan::orderBy('id', 'desc')->first();
                                    $year = date('y');
                                    $number = $latestApplication ? intval(substr($latestApplication->application_no, 4)) + 1 : 1;
                                    $application_no = 'PU' . $year . str_pad($number, 3, '0', STR_PAD_LEFT);
                                @endphp
                                <form method="post" action="{{ route('store.permohonan-perubahan') }}" class="p-6">
                                    @csrf
                                    <input type="hidden" name="application_fk_user" value="{{ Auth::user()->id }}">
                                    <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('Maklumat Permohonan Perubahan Maklumat Rawatan') }}
                                    </h2>
                                    <div class="grid gap-6 md:grid-cols-2">
                                        <div>
                                            <label for="application_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarikh Mohon</label>
                                            <div class="relative">
                                              <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                 <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                  </svg>
                                              </div>
                                              <input datepicker-format="dd-mm-yyyy" datepicker datepicker-buttons datepicker-autoselect-today  type="text" name="application_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                            </div>
                                            @error('application_date')
                                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="application_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Permohonan</label>
                                            <input type="hidden" name="application_no" value="{{ $application_no }}">
                                            <input value="{{ $application_no }}" type="text" readonly class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                            @error('application_no')
                                                <span class="text-red-600 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            @php
                                                $klinik = App\Models\Klinik::all();
                                            @endphp
                                            <label for="application_fk_clinic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Klinik</label>
                                            <select id="application_fk_clinic" name="application_fk_clinic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                <option selected>Pilih Klinik</option>
                                                @foreach($klinik as $item)
                                                    <option value="{{ $item->id }}">{{ $item->clinic_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mt-8 relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="ujianTable">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">Bill</th>
                                                    <th scope="col" class="px-6 py-3">Jenis</th>
                                                    <th scope="col" class="px-6 py-3">Perkara</th>
                                                    <th scope="col" class="px-6 py-3">Harga (RM)</th>
                                                    <th scope="col" class="px-6 py-3"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="bg-gray-50 dark:bg-gray-800" id="row1">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">1</th>
                                                    <td class="px-6 py-4">
                                                        <select name="application_type[]" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            <option value="" disabled selected>Pilih Perubatan</option>
                                                            <option value="Caj Rundingan">Caj Rundingan</option>
                                                            <option value="Rawatan">Rawatan</option>
                                                            <option value="Ubatan">Ubatan</option>
                                                            <option value="Ujian Makmal">Ujian Makmal</option>
                                                        </select>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <input type="text" name="application_item[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <input type="number" name="application_amaun[]" step="0.01" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="removeRow(this)">
                                                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                                            </svg>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4 ms-4 flex justify-start">
                                        <a href="#" class="font-medium text-blue-700 dark:text-blue-500 hover:underline" onclick="addRow()">
                                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="mt-6 flex justify-end">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('Tutup') }}
                                        </x-secondary-button>

                                        <x-primary-button class="ms-3">
                                            {{ __('Simpan') }}
                                        </x-primary-button>
                                    </div>
                                </form>

                                <script>
                                    function addRow() {
                                        const table = document.getElementById('ujianTable').getElementsByTagName('tbody')[0];
                                        const rowCount = table.rows.length;
                                        const row = table.insertRow(rowCount);
                                        row.innerHTML = `
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${rowCount + 1}</th>
                                            <td class="px-6 py-4">
                                                <select name="application_type[]" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                    <option value="" disabled selected>Pilih Perubatan</option>
                                                    <option value="Caj Rundingan">Caj Rundingan</option>
                                                    <option value="Rawatan">Rawatan</option>
                                                    <option value="Ubatan">Ubatan</option>
                                                    <option value="Ujian Makmal">Ujian Makmal</option>
                                                </select>
                                            </td>
                                            <td class="px-6 py-4">
                                                <input type="text" name="application_item[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                            </td>
                                            <td class="px-6 py-4">
                                                <input type="number" name="application_amaun[]" step="0.01" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline" onclick="removeRow(this)">
                                                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                                    </svg>
                                                </a>
                                            </td>
                                        `;
                                    }

                                    function removeRow(element) {
                                        const row = element.parentNode.parentNode;
                                        row.parentNode.removeChild(row);
                                        updateRowNumbers();
                                    }

                                    function updateRowNumbers() {
                                        const rows = document.querySelectorAll('#ujianTable tbody tr');
                                        rows.forEach((row, index) => {
                                            row.querySelector('th').textContent = index + 1;
                                        });
                                    }
                                </script>
                            </x-modal>

                        </div>
                    </div>
                    <div class="flow-root">
                        <div class="relative rounded">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                    @if($listPermohonan->isEmpty())
                                        <tr>
                                            <td colspan="5" class="p-5 text-center">
                                                No data found
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($listPermohonan as $permohonan)
                                            <tr id="tanggungan-heading-{{ $permohonan->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{++$countPermohonan}}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ \Carbon\Carbon::parse($permohonan->application_date)->format('d-m-Y') }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    #{{ $permohonan->application_no }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    @php
                                                        $statusClass = '';
                                                        switch($permohonan->application_status) {
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
                                                        @if($permohonan->application_status == 0)
                                                            Draft
                                                        @elseif($permohonan->application_status == 1)
                                                            Permohonan Baru
                                                        @elseif($permohonan->application_status == 2)
                                                            Disokong Agensi
                                                        @elseif($permohonan->application_status == 3)
                                                            Tidak Disokong Agensi
                                                        @elseif($permohonan->application_status == 4)
                                                            Dikuiri Agensi
                                                        @elseif($permohonan->application_status == 5)
                                                            Disokong Doktor PPJ
                                                        @elseif($permohonan->application_status == 6)
                                                            Tidak Disokong Doktor PPJ
                                                        @elseif($permohonan->application_status == 7)
                                                            Dikuiri Doktor PPJ
                                                        @elseif($permohonan->application_status == 8)
                                                            Diluluskan
                                                        @elseif($permohonan->application_status == 9)
                                                            Tidak Diluluskan
                                                        @elseif($permohonan->application_status == 10)
                                                            Dikuiri Pelulus
                                                        @endif
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 flex gap-2 justify-end">
                                                    <!-- Lihat Klinik -->
                                                    <a data-popover-target="lihat-permohonan-{{ $permohonan->id }}" data-popover-placement="top" href="{{ route('senarai-permohonan-perubahan', ['permohonan' => $permohonan->application_no ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="lihat-permohonan-{{ $permohonan->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
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
            @endif
        </div>
    </div>
</x-app-layout>
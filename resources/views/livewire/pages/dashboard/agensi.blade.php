<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agensi Dashboard') }}
        </h2>
    </x-slot>
    @php
        $permohonanPenambahan = App\Models\PermohonanMaklumatPerubatan::where('permohonan_type', 'penambahan')->where('permohonan_status', 1)->get();
        $permohonanPerubahan = App\Models\PermohonanMaklumatPerubatan::where('permohonan_type', 'perubahan')->where('permohonan_status', 1)->get();
    @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @role('agensi')
                <div class="grid grid-cols-4 gap-4">
                    <div>
                        <ul class="space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                            <li>
                                <button id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false" class="inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <svg class="w-4 h-4 me-2 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18"><path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/></svg>
                                    Permohonan Penambahan Maklumat Perubatan
                                </button>
                            </li>
                            <li>
                                <button id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false" class="inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <svg class="w-4 h-4 me-2 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18"><path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/></svg>
                                    Permohonan Perubahan Maklumat Perubatan
                                </button>
                            </li>
                        </ul>
                    </div>

                    <div class="col-span-3">
                        <div id="default-tab-content">
                            <div class="hidden p-6 bg-gray-50 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                                Senarai Permohonan Penambahan Maklumat Perubatan
                                            </caption>
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Bill
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Tarikh Permohonan
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        No. Permohonan
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Status
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        <span class="sr-only">Edit</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($permohonanPenambahan as $item)
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $loop->iteration }}
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        {{ $item->permohonan_date }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $item->permohonan_no }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        @php
                                                            $statusClass = '';
                                                            switch($item->permohonan_status) {
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
                                                            @if($item->permohonan_status == 0)
                                                                Draft
                                                            @elseif($item->permohonan_status == 1)
                                                                Permohonan Baru
                                                            @elseif($item->permohonan_status == 2)
                                                                Disokong Agensi
                                                            @elseif($item->permohonan_status == 3)
                                                                Tidak Disokong Agensi
                                                            @elseif($item->permohonan_status == 4)
                                                                Dikuiri Agensi
                                                            @elseif($item->permohonan_status == 5)
                                                                Disokong Doktor PPJ
                                                            @elseif($item->permohonan_status == 6)
                                                                Tidak Disokong Doktor PPJ
                                                            @elseif($item->permohonan_status == 7)
                                                                Dikuiri Doktor PPJ
                                                            @elseif($item->permohonan_status == 8)
                                                                Diluluskan
                                                            @elseif($item->permohonan_status == 9)
                                                                Tidak Diluluskan
                                                            @elseif($item->permohonan_status == 10)
                                                                Dikuiri Pelulus
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 text-right">
                                                        <!-- Tindakan Agensi -->
                                                        <a href="{{ route('tindakan-agensi-permohonan.index', ['permohonan_no' => $item->permohonan_no]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd" d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd"/>
                                                            </svg>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden p-6 bg-gray-50 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                                Senarai Permohonan Perubahan Maklumat Perubatan
                                            </caption>
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Bill
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Tarikh Permohonan
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        No. Permohonan
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Status
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        <span class="sr-only">Edit</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($permohonanPerubahan as $item)
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{ $loop->iteration }}
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        {{ $item->permohonan_date }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        {{ $item->permohonan_no }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        @php
                                                            $statusClass = '';
                                                            switch($item->permohonan_status) {
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
                                                            @if($item->permohonan_status == 0)
                                                                Draft
                                                            @elseif($item->permohonan_status == 1)
                                                                Permohonan Baru
                                                            @elseif($item->permohonan_status == 2)
                                                                Disokong Agensi
                                                            @elseif($item->permohonan_status == 3)
                                                                Tidak Disokong Agensi
                                                            @elseif($item->permohonan_status == 4)
                                                                Dikuiri Agensi
                                                            @elseif($item->permohonan_status == 5)
                                                                Disokong Doktor PPJ
                                                            @elseif($item->permohonan_status == 6)
                                                                Tidak Disokong Doktor PPJ
                                                            @elseif($item->permohonan_status == 7)
                                                                Dikuiri Doktor PPJ
                                                            @elseif($item->permohonan_status == 8)
                                                                Diluluskan
                                                            @elseif($item->permohonan_status == 9)
                                                                Tidak Diluluskan
                                                            @elseif($item->permohonan_status == 10)
                                                                Dikuiri Pelulus
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 text-right">
                                                        <!-- Tindakan Agensi -->
                                                        <a href="{{ route('tindakan-agensi-permohonan.index', ['permohonan_no' => $item->permohonan_no]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd" d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd"/>
                                                            </svg>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("Cannot Access this page!") }}
                    </div>
                </div>
            @endrole
        </div>
    </div>
</x-app-layout>

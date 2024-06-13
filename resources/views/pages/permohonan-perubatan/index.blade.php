<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($kemaskini)
                @php
                    $permohonan = App\Models\PermohonanPerubatan::where('id', $kemaskini)->first();
                @endphp
                <x-slot name="header">
                    <li>
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('senarai-permohonan-perubatan') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Pengurusan Permohonan Perubatan</a>
                      </div>
                    </li>
                    <li aria-current="page">
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $permohonan->ujian_makmal_name }}</span>
                      </div>
                    </li>
                </x-slot>
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Maklumat Ujian Makmal</h5>
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
                                            Perkara
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Tempat Ujian
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Amaun (RM)
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
                                    <tr id="tanggungan-heading-{{ $permohonan->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{++$countPermohonan}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $permohonan->ujian_makmal_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $permohonan->ujian_makmal_lab }}
                                        </td>
                                        <td class="px-6 py-4">
                                            RM {{ $permohonan->ujian_makmal_amaun }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($permohonan->ujian_makmal_status == 1)
                                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Aktif</span>
                                            @else
                                                <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 flex gap-2 justify-end">
                                            <!-- Kemaskini Klinik -->
                                            <a data-popover-target="kemaskini-klinik-{{ $permohonan->id }}" data-popover-placement="top" href="{{ route('senarai-permohonan-perubatan', ['kemaskini' => $permohonan->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="kemaskini-klinik-{{ $permohonan->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Kemaskini Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Lihat Klinik -->
                                            <a data-popover-target="lihat-klinik-{{ $permohonan->id }}" data-popover-placement="top" href="{{ route('senarai-permohonan-perubatan', ['profil' => $permohonan->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="lihat-klinik-{{ $permohonan->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Lihat Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Padam Klinik -->
                                            <a data-popover-target="padam-klinik-{{ $permohonan->id }}" data-popover-placement="top" href="{{ route('senarai-permohonan-perubatan', ['hapus' => $permohonan->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-red-400 hover:border-red-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="padam-klinik-{{ $permohonan->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Padam Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td colspan="9" class="p-2 text-left">
                                            <form method="post" action="{{ route('update.permohonan-perubatan') }}" class="p-6">
                                                @csrf
                                                <input type="hidden" name="ujian_makmal_id" value="{{ $permohonan->id }}">
                                                <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                                    {{ __('Kemaskini Ubatan') }}
                                                </h2>
                                                <div class="grid gap-6 md:grid-cols-2">
                                                    <div>
                                                        <label for="ujian_makmal_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perkara</label>
                                                        <input type="text" id="ujian_makmal_name" name="ujian_makmal_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{$permohonan->ujian_makmal_name}}" />
                                                    </div>
                                                    <div>
                                                        <label for="ujian_makmal_amaun" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amaun (RM)</label>
                                                        <input type="number" step="0.01" id="ujian_makmal_amaun" name="ujian_makmal_amaun" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $permohonan->ujian_makmal_amaun }}" required />
                                                        @error('ujian_makmal_amaun')
                                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <label for="ujian_makmal_lab" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Makmal</label>
                                                        <input type="text" id="ujian_makmal_lab" name="ujian_makmal_lab" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{$permohonan->ujian_makmal_lab}}" />
                                                    </div>
                                                    <div>
                                                        @php
                                                            $klinik = App\Models\Klinik::all();
                                                        @endphp
                                                        <label for="ujian_makmal_fk_clinic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Klinik</label>
                                                        <select id="ujian_makmal_fk_clinic" name="ujian_makmal_fk_clinic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            <option value="" disabled {{ empty($permohonan->ujian_makmal_fk_clinic) ? 'selected' : '' }}>Pilih Klinik</option>
                                                            @foreach($klinik as $item)
                                                                <option value="{{ $item->id }}" {{ $permohonan->ujian_makmal_fk_clinic == $item->id ? 'selected' : '' }}>{{ $item->clinic_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label for="ujian_makmal_status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Status</label>
                                                        <select id="ujian_makmal_status" name="ujian_makmal_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            <option value="" disabled {{ $permohonan->ujian_makmal_status === null ? 'selected' : '' }}>Pilih Status</option>
                                                            <option value="1" {{ $permohonan->ujian_makmal_status == 1 ? 'selected' : '' }}>Aktif</option>
                                                            <option value="0" {{ $permohonan->ujian_makmal_status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mt-6 flex justify-end">
                                                    <a href="{{ route('senarai-permohonan-perubatan') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                                                        {{ __('Kembali') }}
                                                    </a> 

                                                    <x-primary-button class="ms-3">
                                                        {{ __('Simpan') }}
                                                    </x-primary-button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @elseif($profil)
                @php
                    $permohonan = App\Models\PermohonanPerubatan::where('id', $profil)->first();
                @endphp
                <x-slot name="header">
                    <li>
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('senarai-permohonan-perubatan') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Pengurusan Permohonan Perubatan</a>
                      </div>
                    </li>
                    <li aria-current="page">
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $permohonan->ujian_makmal_name }}</span>
                      </div>
                    </li>
                </x-slot>
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Maklumat Ujian Makmal</h5>
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
                                            Perkara
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Tempat Ujian
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Amaun (RM)
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
                                    <tr id="tanggungan-heading-{{ $permohonan->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{++$countPermohonan}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $permohonan->ujian_makmal_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $permohonan->ujian_makmal_lab }}
                                        </td>
                                        <td class="px-6 py-4">
                                            RM {{ $permohonan->ujian_makmal_amaun }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($permohonan->ujian_makmal_status == 1)
                                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Aktif</span>
                                            @else
                                                <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 flex gap-2 justify-end">
                                            <!-- Kemaskini Klinik -->
                                            <a data-popover-target="kemaskini-klinik-{{ $permohonan->id }}" data-popover-placement="top" href="{{ route('senarai-permohonan-perubatan', ['kemaskini' => $permohonan->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="kemaskini-klinik-{{ $permohonan->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Kemaskini Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Lihat Klinik -->
                                            <a data-popover-target="lihat-klinik-{{ $permohonan->id }}" data-popover-placement="top" href="{{ route('senarai-permohonan-perubatan', ['profil' => $permohonan->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="lihat-klinik-{{ $permohonan->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Lihat Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Padam Klinik -->
                                            <a data-popover-target="padam-klinik-{{ $permohonan->id }}" data-popover-placement="top" href="{{ route('senarai-permohonan-perubatan', ['hapus' => $permohonan->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-red-400 hover:border-red-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="padam-klinik-{{ $permohonan->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Padam Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td colspan="9" class="p-2 text-left">
                                            <div class="text-left p-6">
                                                <div class="grid grid-cols-2 gap-4">
                                                    <div>
                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            Perkara
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            {{ $permohonan->ujian_makmal_name }}
                                                        </dd>
                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            Tempat Ujian
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            {{ $permohonan->ujian_makmal_lab }}
                                                        </dd>
                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            Harga Maksimum
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            RM {{ $permohonan->ujian_makmal_amaun }}
                                                        </dd>
                                                    </div>

                                                    <div>
                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            Nama Klinik
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            {{ $permohonan->klinik->clinic_name }}
                                                        </dd>
                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            Status
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            @if($permohonan->ujian_makmal_status == 1)
                                                                Aktif
                                                            @else
                                                                Tidak Aktif
                                                            @endif
                                                        </dd>
                                                    </div>
                                                </div>
                                                <div class="mt-6 flex justify-end">
                                                    <a href="{{ route('senarai-permohonan-perubatan') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                                                        {{ __('Kembali') }}
                                                    </a>    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @elseif($hapus)
                @php
                    $permohonan = App\Models\PermohonanPerubatan::where('id', $hapus)->first();
                @endphp
                <x-slot name="header">
                    <li>
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('senarai-permohonan-perubatan') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Pengurusan Permohonan Perubatan</a>
                      </div>
                    </li>
                    <li aria-current="page">
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $permohonan->ujian_makmal_name }}</span>
                      </div>
                    </li>
                </x-slot>
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Maklumat Ujian Makmal</h5>
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
                                            Perkara
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Tempat Ujian
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Amaun (RM)
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
                                    <tr id="tanggungan-heading-{{ $permohonan->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{++$countPermohonan}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $permohonan->ujian_makmal_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $permohonan->ujian_makmal_lab }}
                                        </td>
                                        <td class="px-6 py-4">
                                            RM {{ $permohonan->ujian_makmal_amaun }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($permohonan->ujian_makmal_status == 1)
                                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Aktif</span>
                                            @else
                                                <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 flex gap-2 justify-end">
                                            <!-- Kemaskini Klinik -->
                                            <a data-popover-target="kemaskini-klinik-{{ $permohonan->id }}" data-popover-placement="top" href="{{ route('senarai-permohonan-perubatan', ['kemaskini' => $permohonan->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="kemaskini-klinik-{{ $permohonan->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Kemaskini Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Lihat Klinik -->
                                            <a data-popover-target="lihat-klinik-{{ $permohonan->id }}" data-popover-placement="top" href="{{ route('senarai-permohonan-perubatan', ['profil' => $permohonan->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="lihat-klinik-{{ $permohonan->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Lihat Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Padam Klinik -->
                                            <a data-popover-target="padam-klinik-{{ $permohonan->id }}" data-popover-placement="top" href="{{ route('senarai-permohonan-perubatan', ['hapus' => $permohonan->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-red-400 hover:border-red-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="padam-klinik-{{ $permohonan->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Padam Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td colspan="9" class="p-2 text-left">
                                            <form method="post" action="{{ route('delete.permohonan-perubatan') }}" class="text-left p-6">
                                                @csrf
                                                <input type="hidden" name="ujian_makmal_id" value="{{ $permohonan->id }}">
                                                <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                                    {{ __('Anda Pasti ingin menghapus Ujian Makmal ini?') }}
                                                </h2>
                                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                    Setelah Ujian Makmal ini dipadamkan, semua sumber dan datanya akan dipadamkan secara kekal.
                                                </p>

                                                <div class="mt-6 flex justify-end">
                                                    <a href="{{ route('senarai-permohonan-perubatan') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                                                        {{ __('Kembali') }}
                                                    </a> 

                                                    <x-danger-button class="ms-3">
                                                        {{ __('Padam') }}
                                                    </x-danger-button>
                                                </div>
                                            </form>
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Pengurusan Permohonan Penambahan</span>
                      </div>
                    </li>
                </x-slot>
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Senarai Permohonan Penambahan Maklumat Rawatan</h5>
                        <div class="flex gap-2"> 
                            <form class="flex items-center" action="{{ route('senarai-permohonan-perubatan') }}" method="GET">   
                                <label for="search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                          <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                        </svg>
                                    </div>
                                    <input type="text" id="search" name="carian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ request()->has('carian') ? request()->carian : 'Search' }}" required />
                                    @if(request()->has('carian'))
                                        <a href="{{ route('senarai-permohonan-perubatan') }}" class="absolute inset-y-0 end-0 flex items-center pe-3">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </form>
                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'tambah-permohonan-perubatan')" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah</button>
                            <x-modal name="tambah-permohonan-perubatan" focusable maxWidth="6xl">
                                @php
                                    // Get the latest application number
                                    $latestApplication = App\Models\PermohonanPenambahan::orderBy('id', 'desc')->first();
                                    $year = date('y');
                                    $number = $latestApplication ? intval(substr($latestApplication->application_no, 4)) + 1 : 1;
                                    $application_no = 'PT' . $year . str_pad($number, 3, '0', STR_PAD_LEFT);
                                @endphp
                                <form method="post" action="{{ route('store.permohonan-perubatan') }}" class="p-6">
                                    @csrf
                                    <input type="hidden" name="application_fk_user" value="{{ Auth::user()->id }}">
                                    <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('Maklumat Permohonan Perubatan') }}
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
                                                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="removeRow(this)">
                                                            <svg class="w-6 h-6 text-red-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                                            </svg>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mt-4 ms-4 flex justify-start">
                                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="addRow()">
                                            <svg class="w-6 h-6 text-blue-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
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
                                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="removeRow(this)">
                                                    <svg class="w-6 h-6 text-red-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
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
                                                            case 0:
                                                                $statusClass = 'bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300';
                                                                break;
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
                                                    <a data-popover-target="lihat-klinik-{{ $permohonan->id }}" data-popover-placement="top" href="{{ route('senarai-permohonan-perubatan', ['profil' => $permohonan->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="lihat-klinik-{{ $permohonan->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                        <div class="px-3 py-2">
                                                            <p>Lihat Klinik</p>
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
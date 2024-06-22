<x-app-layout>
    <div class="py-12">
        <div class="sm:px-6 lg:px-8">
            @if($idpekerja)
                @php
                    $malumatBOD = App\Models\ProfilBod::where('id', $idpekerja)->first();
                @endphp
                <x-slot name="header">
                    <li>
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('senarai-profil-bod') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Pengurusan Profil BOD</a>
                      </div>
                    </li>
                    <li aria-current="page">
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $malumatBOD->bod_dependents_name }}</span>
                      </div>
                    </li>
                </x-slot>
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Maklumat Profil BOD</h5>
                        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'tambah-profil-tanggungan-bod')" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Tanggungan</button>
                        <x-modal name="tambah-profil-tanggungan-bod" focusable>
                            <form method="post" action="{{ route('store.tanggungan') }}" class="p-6">
                                @csrf
                                <input type="hidden" name="bod_id" value="{{ $malumatBOD->id }}">
                                <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Maklumat Tanggungan BOD') }}
                                </h2>
                                <div class="grid gap-6 md:grid-cols-2">
                                    <div>
                                        <label for="bod_dependents_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                        <input type="text" id="bod_dependents_name" name="bod_dependents_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                    </div>
                                    <div>
                                        <label for="bod_dependents_ic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Pengenalan</label>
                                        <input type="text" id="bod_dependents_ic" name="bod_dependents_ic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                    </div>
                                    <div>
                                        <label for="bod_dependents_age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                                        <input type="text" id="bod_dependents_age" name="bod_dependents_age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                    </div>
                                    <div>
                                        <label for="bod_dependents_relations" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hubungan</label>
                                        <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                                <div class="flex items-center px-3 py-2.5">
                                                    <input id="bod_dependents_relations_Istri" type="radio" value="Istri" name="bod_dependents_relations" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    <label for="bod_dependents_relations_Istri" class="w-full ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Istri</label>
                                                </div>
                                            </li>
                                            <li class="w-full dark:border-gray-600">
                                                <div class="flex items-center px-3 py-2.5">
                                                    <input id="bod_dependents_relations_Anak" type="radio" value="Anak" name="bod_dependents_relations" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                    <label for="bod_dependents_relations_Anak" class="w-full ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Anak</label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <label for="bod_dependents_remark" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lain-lain</label>
                                    <textarea id="bod_dependents_remark" name="bod_dependents_remark" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
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
                        </x-modal>
                    </div>
                    <div class="flow-root">
                        <div class="relative rounded">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nama
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ID Pekerja
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
                                    <tr id="tanggungan-heading-{{ $malumatBOD->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            {{ $malumatBOD->bod_dependents_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            #{{ $malumatBOD->bod_staff_id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($malumatBOD->bod_status == 1)
                                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Aktif</span>
                                            @else
                                                <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 flex gap-2 justify-end">
                                            <!-- Kemaskini Profil -->
                                            <a data-popover-target="kemaskini-profil-{{ $malumatBOD->id }}" data-popover-placement="top" x-data="" href="{{ route('senarai-profil-bod', ['kemaskini' => $malumatBOD->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="kemaskini-profil-{{ $malumatBOD->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Kemaskini Profil</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Lihat Profil -->
                                            <a data-popover-target="lihat-profil-{{ $malumatBOD->id }}" data-popover-placement="top" href="{{ route('senarai-profil-bod', ['profil' => $malumatBOD->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="lihat-profil-{{ $malumatBOD->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Lihat Profil</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Tanggungan Profil -->
                                            <a data-popover-target="tanggungan-profil-{{ $malumatBOD->id }}" data-popover-placement="top" href="{{ route('senarai-profil-bod', ['idpekerja' => $malumatBOD->id ]) }}" class="inline-flex items-center gap-2 text-gray-900 dark:bg-gray-800 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="tanggungan-profil-{{ $malumatBOD->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Tanggungan Profil</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Padam Profil -->
                                            <a data-popover-target="padam-profil-{{ $malumatBOD->id }}" data-popover-placement="top" href="{{ route('senarai-profil-bod', ['hapus' => $malumatBOD->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-red-400 hover:border-red-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="padam-profil-{{ $malumatBOD->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Padam Profil</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td colspan="5" class="p-5 text-left">
                                            @php
                                                $countTanggungan = 0;
                                                $tanggunganBOD = $malumatBOD->tanggungans;
                                            @endphp
                                            <div class="flex items-center justify-between mb-4">
                                                <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Senarai Tanggungan {{ $malumatBOD->bod_dependents_name }}</h5>
                                                
                                            </div>
                                            <div class="relative rounded">
                                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3">
                                                                Bill
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                Nama Tanggungan
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                Hubungan
                                                            </th>
                                                            <th scope="col" class="px-6 py-3">
                                                                Status
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-right">
                                                                Tindakan
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if($tanggunganBOD->isEmpty())
                                                            <tr>
                                                                <td colspan="5" class="p-5 text-center">
                                                                    No data found
                                                                </td>
                                                            </tr>
                                                        @else
                                                            @foreach($tanggunganBOD as $tanggungan)
                                                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                                        {{ ++$countTanggungan }}
                                                                    </th>
                                                                    <td class="px-6 py-4">
                                                                        {{ $tanggungan->bod_dependents_name }}
                                                                    </td>
                                                                    <td class="px-6 py-4">
                                                                        {{ $tanggungan->bod_dependents_relations }}
                                                                    </td>
                                                                    <td class="px-6 py-4">
                                                                        @if($tanggungan->bod_dependents_status == 1)
                                                                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Aktif</span>
                                                                        @else
                                                                            <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Tidak Aktif</span>
                                                                        @endif
                                                                    </td>
                                                                    <td class="px-6 py-4 space-x-1 text-right">
                                                                        <!-- Kemaskini Profil -->
                                                                        <button data-popover-target="kemaskini-tanggungan-{{ $tanggungan->id }}" data-popover-placement="top" x-data="" x-on:click.prevent="$dispatch('open-modal', 'kemaskini-tanggungan-bod-{{ $tanggungan->id }}')" type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                                            </svg>
                                                                        </button>
                                                                        <div data-popover id="kemaskini-tanggungan-{{ $tanggungan->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                                            <div class="px-3 py-2">
                                                                                <p>Kemaskini Profil</p>
                                                                            </div>
                                                                            <div data-popper-arrow></div>
                                                                        </div>
                                                                        <x-modal name="kemaskini-tanggungan-bod-{{ $tanggungan->id }}" focusable>
                                                                            <form method="post" action="{{ route('update.tanggungan') }}" class="text-left p-6">
                                                                                @csrf
                                                                                <input type="hidden" name="tanggungan_id" value="{{ $tanggungan->id }}">
                                                                                <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                                                                    {{ __('Maklumat BOD') }}
                                                                                </h2>
                                                                                <div class="grid gap-6 md:grid-cols-2">
                                                                                    <div>
                                                                                        <label for="bod_dependents_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                                                                        <input type="text" id="bod_dependents_name" name="bod_dependents_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ $tanggungan->bod_dependents_name }}" />
                                                                                    </div>
                                                                                    <div>
                                                                                        <label for="bod_dependents_ic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Pengenalan</label>
                                                                                        <input type="text" id="bod_dependents_ic" name="bod_dependents_ic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ $tanggungan->bod_dependents_ic }}" />
                                                                                    </div>
                                                                                    <div>
                                                                                        <label for="bod_dependents_age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                                                                                        <input type="text" id="bod_dependents_age" name="bod_dependents_age" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ $tanggungan->bod_dependents_age }}"/>
                                                                                    </div>
                                                                                    <div>
                                                                                        <label for="bod_dependents_relations" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hubungan</label>
                                                                                        <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                                                                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                                                                                <div class="flex items-center px-3 py-2.5">
                                                                                                    <input id="bod_dependents_relations_Istri" type="radio" value="Istri" name="bod_dependents_relations" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" {{ $tanggungan->bod_dependents_relations == 'Istri' ? 'checked' : '' }}>
                                                                                                    <label for="bod_dependents_relations_Istri" class="w-full ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Istri</label>
                                                                                                </div>
                                                                                            </li>
                                                                                            <li class="w-full dark:border-gray-600">
                                                                                                <div class="flex items-center px-3 py-2.5">
                                                                                                    <input id="bod_dependents_relations_Anak" type="radio" value="Anak" name="bod_dependents_relations" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" {{ $tanggungan->bod_dependents_relations == 'Anak' ? 'checked' : '' }}>
                                                                                                    <label for="bod_dependents_relations_Anak" class="w-full ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Anak</label>
                                                                                                </div>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mt-6">
                                                                                    <label for="bod_dependents_remark" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lain-lain</label>
                                                                                    <textarea id="bod_dependents_remark" name="bod_dependents_remark" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{ $tanggungan->bod_dependents_remark }}</textarea>
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
                                                                        </x-modal>
                                                                        <!-- Lihat Profil -->
                                                                        <button data-popover-target="lihat-tanggungan-{{ $tanggungan->id }}" data-popover-placement="top" x-data="" x-on:click.prevent="$dispatch('open-modal', 'lihat-tanggungan-bod-{{ $tanggungan->id }}')" type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                                <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                                            </svg>
                                                                        </button>
                                                                        <div data-popover id="lihat-tanggungan-{{ $tanggungan->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                                            <div class="px-3 py-2">
                                                                                <p>Lihat Profil</p>
                                                                            </div>
                                                                            <div data-popper-arrow></div>
                                                                        </div>
                                                                        <x-modal name="lihat-tanggungan-bod-{{ $tanggungan->id }}" focusable>
                                                                            <div class="text-left p-6">
                                                                                <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                                                                    {{ __('Maklumat BOD') }}
                                                                                </h2>
                                                                                <div class="grid grid-cols-2 gap-4">
                                                                                    <div>
                                                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                                                            Nama
                                                                                        </dt>
                                                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                                                            {{ $tanggungan->bod_dependents_name }}
                                                                                        </dd>
                                                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                                                            Hubungan
                                                                                        </dt>
                                                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                                                            {{ $tanggungan->bod_dependents_relations }}
                                                                                        </dd>
                                                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                                                            Status
                                                                                        </dt>
                                                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                                                            @if($tanggungan->bod_dependents_status == 1)
                                                                                                Aktif
                                                                                            @else
                                                                                                Tidak Aktif
                                                                                            @endif
                                                                                        </dd>
                                                                                    </div>

                                                                                    <div>
                                                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                                                            No. Kad Pengenalan
                                                                                        </dt>
                                                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                                                            {{ $tanggungan->bod_dependents_ic }}
                                                                                        </dd>

                                                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                                                            Umur
                                                                                        </dt>
                                                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                                                            {{ $tanggungan->bod_dependents_age }} Tahun
                                                                                        </dd>

                                                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                                                            Lain-lain
                                                                                        </dt>
                                                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                                                            {{ $tanggungan->bod_dependents_remark }}
                                                                                        </dd>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="mt-6 flex justify-end">
                                                                                    <x-secondary-button x-on:click="$dispatch('close')" class="me-2">
                                                                                        {{ __('Tutup') }}
                                                                                    </x-secondary-button>
                                                                                </div>
                                                                            </div>
                                                                        </x-modal>
                                                                        <!-- Padam Profil -->
                                                                        <button data-popover-target="padam-profil-{{ $tanggungan->id }}" data-popover-placement="top" x-data="" x-on:click.prevent="$dispatch('open-modal', 'padam-profil-bod-{{ $tanggungan->id }}')" type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-red-400 hover:border-red-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                                            <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                                            </svg>
                                                                        </button>
                                                                        <div data-popover id="padam-profil-{{ $tanggungan->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                                            <div class="px-3 py-2">
                                                                                <p>Padam Profil</p>
                                                                            </div>
                                                                            <div data-popper-arrow></div>
                                                                        </div>
                                                                        <x-modal name="padam-profil-bod-{{ $tanggungan->id }}" focusable>
                                                                            <form method="post" action="{{ route('delete.tanggungan') }}" class="text-left p-6">
                                                                                @csrf
                                                                                <input type="hidden" name="tanggungan_id" value="{{ $tanggungan->id }}">
                                                                                <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                                                                    {{ __('Anda Pasti ingin menghapus profil ini?') }}
                                                                                </h2>
                                                                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                                                    Setelah data ini dipadamkan, semua sumber dan datanya akan dipadamkan secara kekal. Sila masukkan id pekerja untuk mengesahkan anda ingin memadamkan data ini secara kekal.
                                                                                </p>

                                                                                <div class="mt-6 flex justify-end">
                                                                                    <x-secondary-button x-on:click="$dispatch('close')">
                                                                                        {{ __('Tutup') }}
                                                                                    </x-secondary-button>

                                                                                    <x-danger-button class="ms-3">
                                                                                        {{ __('Padam') }}
                                                                                    </x-danger-button>
                                                                                </div>
                                                                            </form>
                                                                        </x-modal>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="mt-6 flex justify-end">
                                                <a href="{{ route('senarai-profil-bod') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
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
            @elseif($kemaskini)
                @php
                    $malumatBOD = App\Models\ProfilBod::where('id', $kemaskini)->first();
                @endphp
                <x-slot name="header">
                    <li>
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('senarai-profil-bod') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Pengurusan Profil BOD</a>
                      </div>
                    </li>
                    <li aria-current="page">
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $malumatBOD->bod_dependents_name }}</span>
                      </div>
                    </li>
                </x-slot>
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Maklumat Profil BOD</h5>
                    </div>
                    <div class="flow-root">
                        <div class="relative rounded">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nama
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ID Pekerja
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
                                    <tr id="tanggungan-heading-{{ $malumatBOD->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            {{ $malumatBOD->bod_dependents_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            #{{ $malumatBOD->bod_staff_id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($malumatBOD->bod_status == 1)
                                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Aktif</span>
                                            @else
                                                <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 flex gap-2 justify-end">
                                            <!-- Kemaskini Profil -->
                                            <a data-popover-target="kemaskini-profil-{{ $malumatBOD->id }}" data-popover-placement="top" x-data="" href="{{ route('senarai-profil-bod', ['kemaskini' => $malumatBOD->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="kemaskini-profil-{{ $malumatBOD->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Kemaskini Profil</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Lihat Profil -->
                                            <a data-popover-target="lihat-profil-{{ $malumatBOD->id }}" data-popover-placement="top" href="{{ route('senarai-profil-bod', ['profil' => $malumatBOD->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="lihat-profil-{{ $malumatBOD->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Lihat Profil</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Tanggungan Profil -->
                                            <a data-popover-target="tanggungan-profil-{{ $malumatBOD->id }}" data-popover-placement="top" href="{{ route('senarai-profil-bod', ['idpekerja' => $malumatBOD->id ]) }}" class="inline-flex items-center gap-2 text-gray-900 dark:bg-gray-800 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="tanggungan-profil-{{ $malumatBOD->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Tanggungan Profil</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Padam Profil -->
                                            <a data-popover-target="padam-profil-{{ $malumatBOD->id }}" data-popover-placement="top" href="{{ route('senarai-profil-bod', ['hapus' => $malumatBOD->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-red-400 hover:border-red-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="padam-profil-{{ $malumatBOD->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Padam Profil</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td colspan="5" class="p-2 text-left">
                                            <form method="post" action="{{ route('update.bod') }}" class="text-left p-6">
                                                @csrf
                                                <input type="hidden" name="bod_id" value="{{ $malumatBOD->id }}">
                                                <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                                    {{ __('Maklumat BOD') }}
                                                </h2>
                                                <div class="grid gap-6 md:grid-cols-2">
                                                    <div>
                                                        <label for="bod_staff_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Pekerja</label>
                                                        <input type="text" id="bod_staff_id" name="bod_staff_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ $malumatBOD->bod_staff_id }}" />
                                                    </div>
                                                    <div>
                                                        <label for="bod_dependents_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                                        <input type="text" id="bod_dependents_name" name="bod_dependents_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ $malumatBOD->bod_dependents_name }}"/>
                                                    </div>
                                                    <div>
                                                        <label for="bod_ic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Pengenalan</label>
                                                        <input type="text" id="bod_ic" name="bod_ic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ $malumatBOD->bod_ic }}"/>
                                                    </div>
                                                    <div>
                                                        <label for="bod_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Telefon</label>
                                                        <input type="text" id="bod_phone" name="bod_phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ $malumatBOD->bod_phone }}"/>
                                                    </div>
                                                    <div>
                                                        <label for="bod_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                                        <textarea id="bod_address" name="bod_address" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{ $malumatBOD->bod_address }}</textarea>
                                                    </div>
                                                    <div>
                                                        <label for="bod_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                                        <input type="email" id="bod_email" name="bod_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ $malumatBOD->bod_email }}"/>
                                                    </div>
                                                </div>

                                                <div class="mt-6 flex justify-end">
                                                    <a href="{{ route('senarai-profil-bod') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
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
                    $malumatBOD = App\Models\ProfilBod::where('id', $profil)->first();
                @endphp
                <x-slot name="header">
                    <li>
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('senarai-profil-bod') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Pengurusan Profil BOD</a>
                      </div>
                    </li>
                    <li aria-current="page">
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $malumatBOD->bod_dependents_name }}</span>
                      </div>
                    </li>
                </x-slot>
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Maklumat Profil BOD</h5>
                    </div>
                    <div class="flow-root">
                        <div class="relative rounded">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nama
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ID Pekerja
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
                                    <tr id="tanggungan-heading-{{ $malumatBOD->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            {{ $malumatBOD->bod_dependents_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            #{{ $malumatBOD->bod_staff_id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($malumatBOD->bod_status == 1)
                                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Aktif</span>
                                            @else
                                                <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 flex gap-2 justify-end">
                                            <!-- Kemaskini Profil -->
                                            <a data-popover-target="kemaskini-profil-{{ $malumatBOD->id }}" data-popover-placement="top" href="{{ route('senarai-profil-bod', ['kemaskini' => $malumatBOD->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="kemaskini-profil-{{ $malumatBOD->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Kemaskini Profil</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Lihat Profil -->
                                            <a data-popover-target="lihat-profil-{{ $malumatBOD->id }}" data-popover-placement="top" href="{{ route('senarai-profil-bod', ['profil' => $malumatBOD->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="lihat-profil-{{ $malumatBOD->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Lihat Profil</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Tanggungan Profil -->
                                            <a data-popover-target="tanggungan-profil-{{ $malumatBOD->id }}" data-popover-placement="top" href="{{ route('senarai-profil-bod', ['idpekerja' => $malumatBOD->id ]) }}" class="inline-flex items-center gap-2 text-gray-900 dark:bg-gray-800 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="tanggungan-profil-{{ $malumatBOD->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Tanggungan Profil</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Padam Profil -->
                                            <a data-popover-target="padam-profil-{{ $malumatBOD->id }}" data-popover-placement="top" href="{{ route('senarai-profil-bod', ['hapus' => $malumatBOD->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-red-400 hover:border-red-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="padam-profil-{{ $malumatBOD->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Padam Profil</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td colspan="5" class="p-2 text-left">
                                            <div class="text-left p-6">
                                                <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                                    {{ __('Maklumat BOD') }}
                                                </h2>
                                                <div class="grid grid-cols-2 gap-4">
                                                    <div>
                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            Nama
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            {{ $malumatBOD->bod_dependents_name }}
                                                        </dd>

                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            No. Pekerja
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            #{{ $malumatBOD->bod_staff_id }}
                                                        </dd>

                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            Email
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            {{ $malumatBOD->bod_email }}
                                                        </dd>
                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            Status
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            @if($malumatBOD->bod_status == 1)
                                                                Aktif
                                                            @else
                                                                Tidak Aktif
                                                            @endif
                                                        </dd>
                                                    </div>

                                                    <div>
                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            No. Kad Pengenalan
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            {{ $malumatBOD->bod_ic }}
                                                        </dd>

                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            No. Telefon
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            {{ $malumatBOD->bod_phone }}
                                                        </dd>

                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            Alamat
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            {{ $malumatBOD->bod_address }}
                                                        </dd>
                                                    </div>
                                                </div>
                                                <div class="mt-6 flex justify-end">
                                                    <a href="{{ route('senarai-profil-bod') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
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
                    $malumatBOD = App\Models\ProfilBod::where('id', $hapus)->first();
                @endphp
                <x-slot name="header">
                    <li>
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('senarai-profil-bod') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Pengurusan Profil BOD</a>
                      </div>
                    </li>
                    <li aria-current="page">
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $malumatBOD->bod_dependents_name }}</span>
                      </div>
                    </li>
                </x-slot>
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Maklumat Profil BOD</h5>
                    </div>
                    <div class="flow-root">
                        <div class="relative rounded">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nama
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ID Pekerja
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
                                    <tr id="tanggungan-heading-{{ $malumatBOD->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            {{ $malumatBOD->bod_dependents_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            #{{ $malumatBOD->bod_staff_id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($malumatBOD->bod_status == 1)
                                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Aktif</span>
                                            @else
                                                <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 flex gap-2 justify-end">
                                            <!-- Kemaskini Profil -->
                                            <a data-popover-target="kemaskini-profil-{{ $malumatBOD->id }}" data-popover-placement="top" href="{{ route('senarai-profil-bod', ['kemaskini' => $malumatBOD->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="kemaskini-profil-{{ $malumatBOD->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Kemaskini Profil</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Lihat Profil -->
                                            <a data-popover-target="lihat-profil-{{ $malumatBOD->id }}" data-popover-placement="top" href="{{ route('senarai-profil-bod', ['profil' => $malumatBOD->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="lihat-profil-{{ $malumatBOD->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Lihat Profil</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Tanggungan Profil -->
                                            <a data-popover-target="tanggungan-profil-{{ $malumatBOD->id }}" data-popover-placement="top" href="{{ route('senarai-profil-bod', ['idpekerja' => $malumatBOD->id ]) }}" class="inline-flex items-center gap-2 text-gray-900 dark:bg-gray-800 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="tanggungan-profil-{{ $malumatBOD->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Tanggungan Profil</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Padam Profil -->
                                            <a data-popover-target="padam-profil-{{ $malumatBOD->id }}" data-popover-placement="top" href="{{ route('senarai-profil-bod', ['hapus' => $malumatBOD->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-red-400 hover:border-red-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="padam-profil-{{ $malumatBOD->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Padam Profil</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td colspan="5" class="p-2 text-left">
                                            <form method="post" action="{{ route('delete.bod') }}" class="text-left p-6">
                                                @csrf
                                                <input type="hidden" name="bod_id" value="{{ $malumatBOD->id }}">
                                                <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                                    {{ __('Anda Pasti ingin menghapus profil ini?') }}
                                                </h2>
                                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                    Setelah profil ini dipadamkan, semua sumber dan datanya akan dipadamkan secara kekal. Sila masukkan no pekerja untuk mengesahkan anda ingin memadamkan profil ini secara kekal. 
                                                </p>

                                                <div class="mt-6">
                                                    <x-input-label for="bod_staff_id" value="{{ $malumatBOD->bod_staff_id }}" class="sr-only" />

                                                    <x-text-input
                                                        id="bod_staff_id"
                                                        name="bod_staff_id"
                                                        type="text"
                                                        class="mt-1 block w-3/4"
                                                        placeholder="{{ $malumatBOD->bod_staff_id }}"
                                                        required
                                                    />

                                                    <x-input-error :messages="$errors->bodDeletion->get('bod_staff_id')" class="mt-2" />
                                                </div>

                                                <div class="mt-6 flex justify-end">
                                                    <a href="{{ route('senarai-profil-bod') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Pengurusan Profil BOD</span>
                      </div>
                    </li>
                </x-slot>
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Senarai BOD</h5>
                        <div class="flex gap-2"> 
                            <form class="flex items-center" action="{{ route('senarai-profil-bod') }}" method="GET">   
                                <label for="search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                          <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                        </svg>
                                    </div>
                                    <input type="text" id="search" name="carian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ request()->has('carian') ? request()->carian : 'Search' }}" required />
                                    @if(request()->has('carian'))
                                        <a href="{{ route('senarai-profil-bod') }}" class="absolute inset-y-0 end-0 flex items-center pe-3">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </form>
                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'tambah-profil-bod')" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah</button>
                            <x-modal name="tambah-profil-bod" focusable>
                                <form method="post" action="{{ route('store.bod') }}" class="p-6">
                                    @csrf
                                    <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('Maklumat BOD') }}
                                    </h2>
                                    <div class="grid gap-6 md:grid-cols-2">
                                        <div>
                                            <label for="bod_staff_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Pekerja</label>
                                            <input type="text" id="bod_staff_id" name="bod_staff_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div>
                                            <label for="bod_dependents_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                            <input type="text" id="bod_dependents_name" name="bod_dependents_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div>
                                            <label for="bod_ic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Pengenalan</label>
                                            <input type="text" id="bod_ic" name="bod_ic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div>
                                            <label for="bod_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Telefon</label>
                                            <input type="text" id="bod_phone" name="bod_phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div>
                                            <label for="bod_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                            <textarea id="bod_address" name="bod_address" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
                                        </div>
                                        <div>
                                            <label for="bod_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                            <input type="email" id="bod_email" name="bod_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
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
                                            Nama
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            ID Pekerja
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
                                    @if($listBOD->isEmpty())
                                        <tr>
                                            <td colspan="5" class="p-5 text-center">
                                                No data found
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($listBOD as $bod)
                                            <tr id="tanggungan-heading-{{ $bod->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{++$countBOD}}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ $bod->bod_dependents_name }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    #{{ $bod->bod_staff_id }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    @if($bod->bod_status == 1)
                                                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Aktif</span>
                                                    @else
                                                        <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Tidak Aktif</span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 flex gap-2 justify-end">
                                                    <!-- Kemaskini Profil -->
                                                    <a data-popover-target="kemaskini-profil-{{ $bod->id }}" data-popover-placement="top" href="{{ route('senarai-profil-bod', ['kemaskini' => $bod->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="kemaskini-profil-{{ $bod->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                        <div class="px-3 py-2">
                                                            <p>Kemaskini Profil</p>
                                                        </div>
                                                        <div data-popper-arrow></div>
                                                    </div>
                                                    <!-- Lihat Profil -->
                                                    <a data-popover-target="lihat-profil-{{ $bod->id }}" data-popover-placement="top" href="{{ route('senarai-profil-bod', ['profil' => $bod->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="lihat-profil-{{ $bod->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                        <div class="px-3 py-2">
                                                            <p>Lihat Profil</p>
                                                        </div>
                                                        <div data-popper-arrow></div>
                                                    </div>
                                                    <!-- Tanggungan Profil -->
                                                    <a data-popover-target="tanggungan-profil-{{ $bod->id }}" data-popover-placement="top" data-twe-ripple-init data-twe-ripple-color="light" href="{{ route('senarai-profil-bod', ['idpekerja' => $bod->id]) }}" class="inline-flex items-center gap-2 text-gray-900 dark:bg-gray-800 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="tanggungan-profil-{{ $bod->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                        <div class="px-3 py-2">
                                                            <p>Tanggungan Profil</p>
                                                        </div>
                                                        <div data-popper-arrow></div>
                                                    </div>
                                                    <!-- Padam Profil -->
                                                    <a data-popover-target="padam-profil-{{ $bod->id }}" data-popover-placement="top" href="{{ route('senarai-profil-bod', ['hapus' => $bod->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-red-400 hover:border-red-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="padam-profil-{{ $bod->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                        <div class="px-3 py-2">
                                                            <p>Padam Profil</p>
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

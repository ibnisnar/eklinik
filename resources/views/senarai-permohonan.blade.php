<x-app-layout>
    <x-slot name="header">
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Permohonan</span>
          </div>
        </li>
    </x-slot>

    <div class="py-12">
        <div class="sm:px-6 lg:px-8">
            

        <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Senarai Profil BOD</h5>
                <div class="flex gap-2"> 
                    <form class="flex items-center">   
                        <label for="voice-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>
                            </div>
                            <input type="text" id="voice-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required />
                        </div>
                    </form>
                    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'tambah-profil-bod')" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah BOD</button>
                    <x-modal name="tambah-profil-bod" focusable>
                        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                            @csrf

                            <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Maklumat BOD') }}
                            </h2>
                            <div class="grid gap-6 md:grid-cols-2">
                                <div>
                                    <label for="no_pekerja" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Pekerja</label>
                                    <input type="text" id="no_pekerja" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                </div>
                                <div>
                                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                    <input type="text" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                </div>
                                <div>
                                    <label for="no_pengenalan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Pengenalan</label>
                                    <input type="text" id="no_pengenalan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                </div>
                                <div>
                                    <label for="no_telefon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Telefon</label>
                                    <input type="text" id="no_telefon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                </div>
                                <div>
                                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                    <textarea id="alamat" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
                                </div>
                                <div>
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                </div>
                            </div>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>

                                <x-primary-button class="ms-3">
                                    {{ __('Tambah') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </x-modal>
                </div>
            </div>
            <div class="flow-root">
                <div class="relative overflow-x-auto rounded">
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
                        <tbody >
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    1
                                </th>
                                <td class="px-6 py-4">
                                    Ali Bin Abu
                                </td>
                                <td class="px-6 py-4">
                                    121234
                                </td>
                                <td class="px-6 py-4">
                                    Aktif
                                </td>
                                <td class="px-6 py-4 space-x-1 text-right">
                                    <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Kemaskini</button>
                                    <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Lihat</button>
                                    <button data-twe-collapse-init data-twe-ripple-init data-twe-ripple-color="light" data-twe-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" type="button" class="inline-flex items-center gap-2 text-gray-900 bg-white dark:bg-gray-800 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Tanggungan
                                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <tr class="!visible hidden text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700" id="collapseExample" data-twe-collapse-item>
                                <td colspan="5" class="p-5 text-left">
                                    <div class="flex items-center justify-between mb-4">
                                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Senarai Tanggungan Ali Bin Abu</h5>
                                        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'tambah-profil-tanggungan-bod')" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Tanggungan</button>
                                        <x-modal name="tambah-profil-tanggungan-bod" focusable>
                                            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                                @csrf

                                                <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                                    {{ __('Maklumat Tanggungan BOD') }}
                                                </h2>
                                                <div class="grid gap-6 md:grid-cols-2">
                                                    <div>
                                                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                                        <input type="text" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                                    </div>
                                                    <div>
                                                        <label for="no_pengenalan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Pengenalan</label>
                                                        <input type="text" id="no_pengenalan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                                    </div>
                                                    <div>
                                                        <label for="umur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                                                        <input type="text" id="umur" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                                    </div>
                                                    <div>
                                                        <label for="hubungan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hubungan</label>
                                                        <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                                                <div class="flex items-center px-3 py-2.5">
                                                                    <input id="horizontal-list-radio-license" type="radio" value="Istri" name="list-radio" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                                    <label for="horizontal-list-radio-license" class="w-full ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Istri</label>
                                                                </div>
                                                            </li>
                                                            <li class="w-full dark:border-gray-600">
                                                                <div class="flex items-center px-3 py-2.5">
                                                                    <input id="horizontal-list-radio-passport" type="radio" value="Anak" name="list-radio" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                                                    <label for="horizontal-list-radio-passport" class="w-full ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Anak</label>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="mt-6">
                                                    <label for="lain_lain" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lain-lain</label>
                                                    <textarea id="lain_lain" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
                                                </div>

                                                <div class="mt-6 flex justify-end">
                                                    <x-secondary-button x-on:click="$dispatch('close')">
                                                        {{ __('Cancel') }}
                                                    </x-secondary-button>

                                                    <x-primary-button class="ms-3">
                                                        {{ __('Tambah') }}
                                                    </x-primary-button>
                                                </div>
                                            </form>
                                        </x-modal>
                                    </div>
                                    <div class="relative overflow-x-auto rounded">
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
                                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        1
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        Siti Aminah Binti Talib
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        Istri
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        Aktif
                                                    </td>
                                                    <td class="px-6 py-4 space-x-1 text-right">
                                                        <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Kemaskini</button>
                                                        <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Lihat</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <div class="py-12">
        <div class="sm:px-6 lg:px-8">
            @if($kemaskini)
                @php
                    $maklumatKlinik = App\Models\Klinik::where('id', $kemaskini)->first();
                @endphp
                <x-slot name="header">
                    <li>
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('senarai-klinik') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Pengurusan Klinik</a>
                      </div>
                    </li>
                    <li aria-current="page">
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $maklumatKlinik->clinic_name }}</span>
                      </div>
                    </li>
                </x-slot>
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Maklumat Klinik</h5>
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
                                            Cawangan
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            No. SSM
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Alamat
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Kategori
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Prefix
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-right">
                                            Tindakan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="accordion-collapse" data-accordion="collapse">
                                    <tr id="tanggungan-heading-{{ $maklumatKlinik->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            {{ $maklumatKlinik->clinic_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            #{{ $maklumatKlinik->clinic_branch }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $maklumatKlinik->clinic_ssm }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $maklumatKlinik->clinic_address }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $maklumatKlinik->clinic_type }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $maklumatKlinik->clinic_prefix }}
                                        </td>
                                        <td class="px-6 py-4 flex gap-2 justify-end">
                                            <!-- Kemaskini Klinik -->
                                            <a data-popover-target="kemaskini-klinik-{{ $maklumatKlinik->id }}" data-popover-placement="top" href="{{ route('senarai-klinik', ['kemaskini' => $maklumatKlinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="kemaskini-klinik-{{ $maklumatKlinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Kemaskini Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Lihat Klinik -->
                                            <a data-popover-target="lihat-klinik-{{ $maklumatKlinik->id }}" data-popover-placement="top" href="{{ route('senarai-klinik', ['profil' => $maklumatKlinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="lihat-klinik-{{ $maklumatKlinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Lihat Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Padam Klinik -->
                                            <a data-popover-target="padam-klinik-{{ $maklumatKlinik->id }}" data-popover-placement="top" href="{{ route('senarai-klinik', ['hapus' => $maklumatKlinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-red-400 hover:border-red-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="padam-klinik-{{ $maklumatKlinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Padam Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td colspan="9" class="p-2 text-left">
                                            <form method="post" action="{{ route('update.klinik') }}" class="text-left p-6">
                                                @csrf
                                                <input type="hidden" name="clinic_id" value="{{ $maklumatKlinik->id }}">
                                                <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                                    {{ __('Kemaskini Klinik') }}
                                                </h2>
                                                <div class="grid gap-6 md:grid-cols-2">
                                                    <div>
                                                        <label for="clinic_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Klinik</label>
                                                        <input type="text" id="clinic_name" name="clinic_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ $maklumatKlinik->clinic_name }}"/>
                                                    </div>
                                                    <div>
                                                        <label for="clinic_branch" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cawangan</label>
                                                        <input type="text" id="clinic_branch" name="clinic_branch" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ $maklumatKlinik->clinic_branch }}"/>
                                                    </div>
                                                    <div>
                                                        <label for="clinic_ssm" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. SSM</label>
                                                        <input type="text" id="clinic_ssm" name="clinic_ssm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ $maklumatKlinik->clinic_ssm }}"/>
                                                    </div>
                                                    <div>
                                                        <label for="clinic_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                                        <select id="clinic_type" name="clinic_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            <option value="" disabled {{ empty($maklumatKlinik->clinic_type) ? 'selected' : '' }}>Pilih Kategori</option>
                                                            <option value="HQ" {{ $maklumatKlinik->clinic_type == 'HQ' ? 'selected' : '' }}>HQ</option>
                                                            <option value="Cawangan" {{ $maklumatKlinik->clinic_type == 'Cawangan' ? 'selected' : '' }}>Cawangan</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label for="clinic_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                                        <textarea id="clinic_address" name="clinic_address" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{ $maklumatKlinik->clinic_address }}</textarea>
                                                    </div>
                                                    <div>
                                                        <label for="clinic_prefix" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prefix</label>
                                                        <input type="text" id="clinic_prefix" name="clinic_prefix" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ $maklumatKlinik->clinic_prefix }}"/>
                                                    </div>
                                                </div>

                                                <div class="mt-6 flex justify-end">
                                                    <a href="{{ route('senarai-klinik') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
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
                    $maklumatKlinik = App\Models\Klinik::where('id', $profil)->first();
                @endphp
                <x-slot name="header">
                    <li>
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('senarai-klinik') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Pengurusan Klinik</a>
                      </div>
                    </li>
                    <li aria-current="page">
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $maklumatKlinik->clinic_name }}</span>
                      </div>
                    </li>
                </x-slot>
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Maklumat Klinik</h5>
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
                                            Cawangan
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            No. SSM
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Alamat
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Kategori
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Prefix
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-right">
                                            Tindakan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="accordion-collapse" data-accordion="collapse">
                                    <tr id="tanggungan-heading-{{ $maklumatKlinik->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            {{ $maklumatKlinik->clinic_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            #{{ $maklumatKlinik->clinic_branch }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $maklumatKlinik->clinic_ssm }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $maklumatKlinik->clinic_address }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $maklumatKlinik->clinic_type }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $maklumatKlinik->clinic_prefix }}
                                        </td>
                                        <td class="px-6 py-4 flex gap-2 justify-end">
                                            <!-- Kemaskini Klinik -->
                                            <a data-popover-target="kemaskini-klinik-{{ $maklumatKlinik->id }}" data-popover-placement="top" href="{{ route('senarai-klinik', ['kemaskini' => $maklumatKlinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="kemaskini-klinik-{{ $maklumatKlinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Kemaskini Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Lihat Klinik -->
                                            <a data-popover-target="lihat-klinik-{{ $maklumatKlinik->id }}" data-popover-placement="top" href="{{ route('senarai-klinik', ['profil' => $maklumatKlinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="lihat-klinik-{{ $maklumatKlinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Lihat Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Padam Klinik -->
                                            <a data-popover-target="padam-klinik-{{ $maklumatKlinik->id }}" data-popover-placement="top" href="{{ route('senarai-klinik', ['hapus' => $maklumatKlinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-red-400 hover:border-red-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="padam-klinik-{{ $maklumatKlinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
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
                                                            Nama
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            {{ $maklumatKlinik->clinic_name }}
                                                        </dd>

                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            Cawangan
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            {{ $maklumatKlinik->clinic_branch }}
                                                        </dd>

                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            No. SSM
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            {{ $maklumatKlinik->clinic_ssm }}
                                                        </dd>
                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            Kategori
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            {{ $maklumatKlinik->clinic_type }}
                                                        </dd>
                                                    </div>

                                                    <div>
                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            Alamat
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            {{ $maklumatKlinik->clinic_address }}
                                                        </dd>

                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            Prefix
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            {{ $maklumatKlinik->clinic_prefix }}
                                                        </dd>

                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            Status
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            @if($maklumatKlinik->clinic_status == 1)
                                                                Aktif
                                                            @else
                                                                Tidak Aktif
                                                            @endif
                                                        </dd>
                                                    </div>
                                                </div>
                                                <div class="mt-6 flex justify-end">
                                                    <a href="{{ route('senarai-klinik') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
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
                    $maklumatKlinik = App\Models\Klinik::where('id', $hapus)->first();
                @endphp
                <x-slot name="header">
                    <li>
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('senarai-klinik') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Pengurusan Klinik</a>
                      </div>
                    </li>
                    <li aria-current="page">
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $maklumatKlinik->clinic_name }}</span>
                      </div>
                    </li>
                </x-slot>
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Maklumat Klinik</h5>
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
                                            Cawangan
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            No. SSM
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Alamat
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Kategori
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Prefix
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-right">
                                            Tindakan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="accordion-collapse" data-accordion="collapse">
                                    <tr id="tanggungan-heading-{{ $maklumatKlinik->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            {{ $maklumatKlinik->clinic_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            #{{ $maklumatKlinik->clinic_branch }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $maklumatKlinik->clinic_ssm }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $maklumatKlinik->clinic_address }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $maklumatKlinik->clinic_type }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $maklumatKlinik->clinic_prefix }}
                                        </td>
                                        <td class="px-6 py-4 flex gap-2 justify-end">
                                            <!-- Kemaskini Klinik -->
                                            <a data-popover-target="kemaskini-klinik-{{ $maklumatKlinik->id }}" data-popover-placement="top" href="{{ route('senarai-klinik', ['kemaskini' => $maklumatKlinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="kemaskini-klinik-{{ $maklumatKlinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Kemaskini Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Lihat Klinik -->
                                            <a data-popover-target="lihat-klinik-{{ $maklumatKlinik->id }}" data-popover-placement="top" href="{{ route('senarai-klinik', ['profil' => $maklumatKlinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="lihat-klinik-{{ $maklumatKlinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Lihat Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Padam Klinik -->
                                            <a data-popover-target="padam-klinik-{{ $maklumatKlinik->id }}" data-popover-placement="top" href="{{ route('senarai-klinik', ['hapus' => $maklumatKlinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-red-400 hover:border-red-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="padam-klinik-{{ $maklumatKlinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Padam Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td colspan="9" class="p-2 text-left">
                                            <form method="post" action="{{ route('delete.klinik') }}" class="text-left p-6">
                                                @csrf
                                                <input type="hidden" name="clinic_id" value="{{ $maklumatKlinik->id }}">
                                                <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                                    {{ __('Anda Pasti ingin menghapus profil ini?') }}
                                                </h2>
                                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                    Setelah klinik ini dipadamkan, semua sumber dan datanya akan dipadamkan secara kekal. Sila masukkan no ssm untuk mengesahkan anda ingin memadamkan klinik ini secara kekal. 
                                                </p>

                                                <div class="mt-6">
                                                    <x-input-label for="clinic_ssm" value="{{ $maklumatKlinik->clinic_ssm }}" class="sr-only" />
                                                    <x-text-input
                                                        id="clinic_ssm"
                                                        name="clinic_ssm"
                                                        type="text"
                                                        class="mt-1 block w-3/4"
                                                        placeholder="Masukkan No. SSM"
                                                        required
                                                    />
                                                    <x-input-error :messages="$errors->get('clinic_ssm')" class="mt-2" />
                                                </div>

                                                <div class="mt-6 flex justify-end">
                                                    <a href="{{ route('senarai-klinik') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Pengurusan Klinik</span>
                      </div>
                    </li>
                </x-slot>
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Senarai Klinik</h5>
                        <div class="flex gap-2"> 
                            <form class="flex items-center" action="{{ route('senarai-klinik') }}" method="GET">   
                                <label for="search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 4h12M6 4v16M6 4H5m13 0v16m0-16h1m-1 16H6m12 0h1M6 20H5M9 7h1v1H9V7Zm5 0h1v1h-1V7Zm-5 4h1v1H9v-1Zm5 0h1v1h-1v-1Zm-3 4h2a1 1 0 0 1 1 1v4h-4v-4a1 1 0 0 1 1-1Z"/>
                                        </svg>
                                    </div>
                                    <input type="text" id="search" name="carian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ request()->has('carian') ? request()->carian : 'Search' }}" required />
                                    @if(request()->has('carian'))
                                        <a href="{{ route('senarai-klinik') }}" class="absolute inset-y-0 end-0 flex items-center pe-3">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </form>
                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'tambah-klinik')" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah</button>
                            <x-modal name="tambah-klinik" focusable>
                                <form method="post" action="{{ route('store.klinik') }}" class="p-6">
                                    @csrf
                                    <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('Maklumat Klinik') }}
                                    </h2>
                                    <div class="grid gap-6 md:grid-cols-2">
                                        <div>
                                            <label for="clinic_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Klinik</label>
                                            <input type="text" id="clinic_name" name="clinic_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div>
                                            <label for="clinic_branch" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cawangan</label>
                                            <input type="text" id="clinic_branch" name="clinic_branch" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div>
                                            <label for="clinic_ssm" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. SSM</label>
                                            <input type="text" id="clinic_ssm" name="clinic_ssm" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div>
                                            <label for="clinic_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Kategori</label>
                                            <select id="clinic_type" name="clinic_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                <option selected>Pilih Kategori</option>
                                                <option value="HQ">HQ</option>
                                                <option value="Cawangan">Cawangan</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="clinic_prefix" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prefix</label>
                                            <input type="text" id="clinic_prefix" name="clinic_prefix" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div>
                                            <label for="clinic_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                            <textarea id="clinic_address" name="clinic_address" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
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
                                            Cawangan
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            No. SSM
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Alamat
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Kategori
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Prefix
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-right">
                                            Tindakan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="accordion-collapse" data-accordion="collapse">
                                    @if($listKlinik->isEmpty())
                                        <tr>
                                            <td colspan="9" class="p-5 text-center">
                                                No data found
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($listKlinik as $klinik)
                                            <tr id="tanggungan-heading-{{ $klinik->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{++$countKlinik}}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ $klinik->clinic_name }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $klinik->clinic_branch }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $klinik->clinic_ssm }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $klinik->clinic_address }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $klinik->clinic_type }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $klinik->clinic_prefix }}
                                                </td>
                                                <td class="px-6 py-4 flex gap-2 justify-end">
                                                    <!-- Kemaskini Klinik -->
                                                    <a data-popover-target="kemaskini-klinik-{{ $klinik->id }}" data-popover-placement="top" href="{{ route('senarai-klinik', ['kemaskini' => $klinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="kemaskini-klinik-{{ $klinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                        <div class="px-3 py-2">
                                                            <p>Kemaskini Klinik</p>
                                                        </div>
                                                        <div data-popper-arrow></div>
                                                    </div>
                                                    <!-- Lihat Klinik -->
                                                    <a data-popover-target="lihat-klinik-{{ $klinik->id }}" data-popover-placement="top" href="{{ route('senarai-klinik', ['profil' => $klinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="lihat-klinik-{{ $klinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                        <div class="px-3 py-2">
                                                            <p>Lihat Klinik</p>
                                                        </div>
                                                        <div data-popper-arrow></div>
                                                    </div>
                                                    <!-- Padam Klinik -->
                                                    <a data-popover-target="padam-klinik-{{ $klinik->id }}" data-popover-placement="top" href="{{ route('senarai-klinik', ['hapus' => $klinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-red-400 hover:border-red-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="padam-klinik-{{ $klinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                        <div class="px-3 py-2">
                                                            <p>Padam Klinik</p>
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
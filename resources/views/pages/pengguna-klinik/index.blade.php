<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($kemaskini)
                @php
                    $maklumatPenggunaKlinik = App\Models\UserKlinik::where('id', $kemaskini)->first();
                @endphp
                <x-slot name="header">
                    <li>
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('senarai-pengguna-klinik') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Pengurusan Pengguna Klinik</a>
                      </div>
                    </li>
                    <li aria-current="page">
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $maklumatPenggunaKlinik->clinic_name }}</span>
                      </div>
                    </li>
                </x-slot>
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Maklumat Pengguna Klinik</h5>
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
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Klinik
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Peranan
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-right">
                                            Tindakan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="accordion-collapse" data-accordion="collapse">
                                    <tr id="tanggungan-heading-{{ $maklumatPenggunaKlinik->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                <td class="px-6 py-4">
                                                    {{ $maklumatPenggunaKlinik->user_clinic_name }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $maklumatPenggunaKlinik->user_clinic_email }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $maklumatPenggunaKlinik->klinik->clinic_name }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $maklumatPenggunaKlinik->user_clinic_roles }}
                                                </td>
                                                <td class="px-6 py-4 flex gap-2 justify-end">
                                                    <!-- Kemaskini Klinik -->
                                                    <a data-popover-target="kemaskini-klinik-{{ $maklumatPenggunaKlinik->id }}" data-popover-placement="top" href="{{ route('senarai-pengguna-klinik', ['kemaskini' => $maklumatPenggunaKlinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="kemaskini-klinik-{{ $maklumatPenggunaKlinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                        <div class="px-3 py-2">
                                                            <p>Kemaskini Klinik</p>
                                                        </div>
                                                        <div data-popper-arrow></div>
                                                    </div>
                                                    <!-- Lihat Klinik -->
                                                    <a data-popover-target="lihat-klinik-{{ $maklumatPenggunaKlinik->id }}" data-popover-placement="top" href="{{ route('senarai-pengguna-klinik', ['profil' => $maklumatPenggunaKlinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="lihat-klinik-{{ $maklumatPenggunaKlinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                        <div class="px-3 py-2">
                                                            <p>Lihat Klinik</p>
                                                        </div>
                                                        <div data-popper-arrow></div>
                                                    </div>
                                                    <!-- Padam Klinik -->
                                                    <a data-popover-target="padam-klinik-{{ $maklumatPenggunaKlinik->id }}" data-popover-placement="top" href="{{ route('senarai-pengguna-klinik', ['hapus' => $maklumatPenggunaKlinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-red-400 hover:border-red-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="padam-klinik-{{ $maklumatPenggunaKlinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                        <div class="px-3 py-2">
                                                            <p>Padam Klinik</p>
                                                        </div>
                                                        <div data-popper-arrow></div>
                                                    </div>
                                                </td>
                                            </tr>
                                    <tr class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td colspan="9" class="p-2 text-left">
                                            <form method="post" action="{{ route('update.pengguna-klinik') }}" class="p-6">
                                                @csrf
                                                <input type="hidden" name="user_clinic_id" value="{{ $maklumatPenggunaKlinik->id }}">
                                                <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                                    {{ __('Kemaskini Pengguna Klinik') }}
                                                </h2>
                                                <div class="grid gap-6 md:grid-cols-2">
                                                    <div>
                                                        <label for="user_clinic_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                                        <input type="text" id="user_clinic_name" name="user_clinic_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ $maklumatPenggunaKlinik->user_clinic_name }}"/>
                                                    </div>
                                                    <div>
                                                        <label for="user_clinic_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Pengenalan</label>
                                                        <select id="user_clinic_type" name="user_clinic_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            <option value="" disabled {{ empty($maklumatPenggunaKlinik->user_clinic_type) ? 'selected' : '' }}>Jenis Pengenalan</option>
                                                            <option value="Individu" {{ $maklumatPenggunaKlinik->user_clinic_type == 'Individu' ? 'selected' : '' }}>Individu</option>
                                                            <option value="Syarikat" {{ $maklumatPenggunaKlinik->user_clinic_type == 'Syarikat' ? 'selected' : '' }}>Syarikat</option>
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label for="user_clinic_reference_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Pengenalan</label>
                                                        <input type="text" id="user_clinic_reference_id" name="user_clinic_reference_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ $maklumatPenggunaKlinik->user_clinic_reference_id }}"/>
                                                    </div>
                                                    <div>
                                                        <label for="user_clinic_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                                        <input type="email" id="user_clinic_email" name="user_clinic_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required value="{{ $maklumatPenggunaKlinik->user_clinic_email }}"/>
                                                    </div>
                                                    <div>
                                                        @php
                                                            $klinik = App\Models\Klinik::all();
                                                        @endphp
                                                        <label for="user_clinic_fk_clinic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Klinik</label>
                                                        <select id="user_clinic_fk_clinic" name="user_clinic_fk_clinic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            <option value="" disabled {{ empty($maklumatPenggunaKlinik->user_clinic_fk_clinic) ? 'selected' : '' }}>Pilih Klinik</option>
                                                            @foreach($klinik as $item)
                                                                <option value="{{ $item->id }}" {{ $maklumatPenggunaKlinik->user_clinic_fk_clinic == $item->id ? 'selected' : '' }}>{{ $item->clinic_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div>
                                                        <label for="user_clinic_roles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Peranan</label>
                                                        <select id="user_clinic_roles" name="user_clinic_roles" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                            <option value="" disabled {{ empty($maklumatPenggunaKlinik->user_clinic_roles) ? 'selected' : '' }}>Pilih Peranan</option>
                                                            <option value="Super Admin" {{ $maklumatPenggunaKlinik->user_clinic_roles == 'Super Admin' ? 'selected' : '' }}>Super Admin</option>
                                                            <option value="HQ Klinik" {{ $maklumatPenggunaKlinik->user_clinic_roles == 'HQ Klinik' ? 'selected' : '' }}>HQ Klinik</option>
                                                            <option value="Pembantu Klinik" {{ $maklumatPenggunaKlinik->user_clinic_roles == 'Pembantu Klinik' ? 'selected' : '' }}>Pembantu Klinik</option>
                                                            <option value="Penyemak HR" {{ $maklumatPenggunaKlinik->user_clinic_roles == 'Penyemak HR' ? 'selected' : '' }}>Penyemak HR</option>
                                                            <option value="Penyokong HR" {{ $maklumatPenggunaKlinik->user_clinic_roles == 'Penyokong HR' ? 'selected' : '' }}>Penyokong HR</option>
                                                            <option value="Pelulus HR" {{ $maklumatPenggunaKlinik->user_clinic_roles == 'Pelulus HR' ? 'selected' : '' }}>Pelulus HR</option>
                                                            <option value="Admin JU" {{ $maklumatPenggunaKlinik->user_clinic_roles == 'Admin JU' ? 'selected' : '' }}>Admin JU</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="mt-6 flex justify-end">
                                                    <a href="{{ route('senarai-pengguna-klinik') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
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
                    $maklumatPenggunaKlinik = App\Models\UserKlinik::where('id', $profil)->first();
                @endphp
                <x-slot name="header">
                    <li>
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('senarai-pengguna-klinik') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Pengurusan Pengguna Klinik</a>
                      </div>
                    </li>
                    <li aria-current="page">
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $maklumatPenggunaKlinik->user_clinic_name }}</span>
                      </div>
                    </li>
                </x-slot>
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Maklumat Pengguna Klinik</h5>
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
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Klinik
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Peranan
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-right">
                                            Tindakan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="accordion-collapse" data-accordion="collapse">
                                    <tr id="tanggungan-heading-{{ $maklumatPenggunaKlinik->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                <td class="px-6 py-4">
                                                    {{ $maklumatPenggunaKlinik->user_clinic_name }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $maklumatPenggunaKlinik->user_clinic_email }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $maklumatPenggunaKlinik->klinik->clinic_name }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $maklumatPenggunaKlinik->user_clinic_roles }}
                                                </td>
                                                <td class="px-6 py-4 flex gap-2 justify-end">
                                                    <!-- Kemaskini Klinik -->
                                                    <a data-popover-target="kemaskini-klinik-{{ $maklumatPenggunaKlinik->id }}" data-popover-placement="top" href="{{ route('senarai-pengguna-klinik', ['kemaskini' => $maklumatPenggunaKlinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="kemaskini-klinik-{{ $maklumatPenggunaKlinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                        <div class="px-3 py-2">
                                                            <p>Kemaskini Klinik</p>
                                                        </div>
                                                        <div data-popper-arrow></div>
                                                    </div>
                                                    <!-- Lihat Klinik -->
                                                    <a data-popover-target="lihat-klinik-{{ $maklumatPenggunaKlinik->id }}" data-popover-placement="top" href="{{ route('senarai-pengguna-klinik', ['profil' => $maklumatPenggunaKlinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="lihat-klinik-{{ $maklumatPenggunaKlinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                        <div class="px-3 py-2">
                                                            <p>Lihat Klinik</p>
                                                        </div>
                                                        <div data-popper-arrow></div>
                                                    </div>
                                                    <!-- Padam Klinik -->
                                                    <a data-popover-target="padam-klinik-{{ $maklumatPenggunaKlinik->id }}" data-popover-placement="top" href="{{ route('senarai-pengguna-klinik', ['hapus' => $maklumatPenggunaKlinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-red-400 hover:border-red-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="padam-klinik-{{ $maklumatPenggunaKlinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
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
                                                            {{ $maklumatPenggunaKlinik->user_clinic_name }}
                                                        </dd>

                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            Jenis Pengenalan
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            {{ $maklumatPenggunaKlinik->user_clinic_type }}
                                                        </dd>

                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            No. Pengenalan
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            {{ $maklumatPenggunaKlinik->user_clinic_reference_id }}
                                                        </dd>
                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            Email
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            {{ $maklumatPenggunaKlinik->user_clinic_email }}
                                                        </dd>
                                                    </div>

                                                    <div>
                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            Nama Klinik
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            {{ $maklumatPenggunaKlinik->klinik->clinic_name }}
                                                        </dd>

                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            Peranan
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            {{ $maklumatPenggunaKlinik->user_clinic_roles }}
                                                        </dd>

                                                        <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">
                                                            Status
                                                        </dt>
                                                        <dd class="mb-4 font-light text-gray-500 sm:mb-5 dark:text-gray-400">
                                                            @if($maklumatPenggunaKlinik->user_clinic_status == 1)
                                                                Aktif
                                                            @else
                                                                Tidak Aktif
                                                            @endif
                                                        </dd>
                                                    </div>
                                                </div>
                                                <div class="mt-6 flex justify-end">
                                                    <a href="{{ route('senarai-pengguna-klinik') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
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
                    $maklumatPenggunaKlinik = App\Models\UserKlinik::where('id', $hapus)->first();
                @endphp
                <x-slot name="header">
                    <li>
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{ route('senarai-pengguna-klinik') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Pengurusan Pengguna Klinik</a>
                      </div>
                    </li>
                    <li aria-current="page">
                      <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">{{ $maklumatPenggunaKlinik->user_clinic_name }}</span>
                      </div>
                    </li>
                </x-slot>
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Maklumat Pengguna Klinik</h5>
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
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Klinik
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Peranan
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-right">
                                            Tindakan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="accordion-collapse" data-accordion="collapse">
                                    <tr id="tanggungan-heading-{{ $maklumatPenggunaKlinik->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            {{ $maklumatPenggunaKlinik->user_clinic_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $maklumatPenggunaKlinik->user_clinic_email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $maklumatPenggunaKlinik->klinik->clinic_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $maklumatPenggunaKlinik->user_clinic_roles }}
                                        </td>
                                        <td class="px-6 py-4 flex gap-2 justify-end">
                                            <!-- Kemaskini Klinik -->
                                            <a data-popover-target="kemaskini-klinik-{{ $maklumatPenggunaKlinik->id }}" data-popover-placement="top" href="{{ route('senarai-pengguna-klinik', ['kemaskini' => $maklumatPenggunaKlinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="kemaskini-klinik-{{ $maklumatPenggunaKlinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Kemaskini Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Lihat Klinik -->
                                            <a data-popover-target="lihat-klinik-{{ $maklumatPenggunaKlinik->id }}" data-popover-placement="top" href="{{ route('senarai-pengguna-klinik', ['profil' => $maklumatPenggunaKlinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                    <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="lihat-klinik-{{ $maklumatPenggunaKlinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Lihat Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                            <!-- Padam Klinik -->
                                            <a data-popover-target="padam-klinik-{{ $maklumatPenggunaKlinik->id }}" data-popover-placement="top" href="{{ route('senarai-pengguna-klinik', ['hapus' => $maklumatPenggunaKlinik->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-red-400 hover:border-red-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                </svg>
                                            </a>
                                            <div data-popover id="padam-klinik-{{ $maklumatPenggunaKlinik->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                <div class="px-3 py-2">
                                                    <p>Padam Klinik</p>
                                                </div>
                                                <div data-popper-arrow></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="text-center odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <td colspan="9" class="p-2 text-left">
                                            <form method="post" action="{{ route('delete.pengguna-klinik') }}" class="text-left p-6">
                                                @csrf
                                                <input type="hidden" name="user_clinic_id" value="{{ $maklumatPenggunaKlinik->id }}">
                                                <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                                    {{ __('Anda Pasti ingin menghapus pengguna klinik ini?') }}
                                                </h2>
                                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                    Setelah pengguna klinik ini dipadamkan, semua sumber dan datanya akan dipadamkan secara kekal. Sila masukkan email untuk mengesahkan anda ingin memadamkan klinik ini secara kekal. 
                                                </p>

                                                <div class="mt-6">
                                                    <x-input-label for="user_clinic_email" value="{{ $maklumatPenggunaKlinik->user_clinic_email }}" class="sr-only" />

                                                    <x-text-input
                                                        id="user_clinic_email"
                                                        name="user_clinic_email"
                                                        type="text"
                                                        class="mt-1 block w-3/4"
                                                        placeholder="{{ $maklumatPenggunaKlinik->user_clinic_email }}"
                                                        required
                                                    />

                                                    <x-input-error :messages="$errors->klinikDeletion->get('user_clinic_email')" class="mt-2" />
                                                </div>

                                                <div class="mt-6 flex justify-end">
                                                    <a href="{{ route('senarai-pengguna-klinik') }}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
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
                        <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Pengurusan Pengguna Klinik</span>
                      </div>
                    </li>
                </x-slot>
                <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-md font-medium leading-none text-gray-900 dark:text-white">Senarai Pengguna Klinik</h5>
                        <div class="flex gap-2"> 
                            <form class="flex items-center" action="{{ route('senarai-pengguna-klinik') }}" method="GET">   
                                <label for="search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                          <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                        </svg>
                                    </div>
                                    <input type="text" id="search" name="carian" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ request()->has('carian') ? request()->carian : 'Search' }}" required />
                                    @if(request()->has('carian'))
                                        <a href="{{ route('senarai-pengguna-klinik') }}" class="absolute inset-y-0 end-0 flex items-center pe-3">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
                                            </svg>
                                        </a>
                                    @endif
                                </div>
                            </form>
                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'tambah-pengguna-klinik')" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah</button>
                            <x-modal name="tambah-pengguna-klinik" focusable>
                                <form method="post" action="{{ route('store.pengguna-klinik') }}" class="p-6">
                                    @csrf
                                    <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('Maklumat Pengguna Klinik') }}
                                    </h2>
                                    <div class="grid gap-6 md:grid-cols-2">
                                        <div>
                                            <label for="user_clinic_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                            <input type="text" id="user_clinic_name" name="user_clinic_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div>
                                            <label for="user_clinic_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Pengenalan</label>
                                            <select id="user_clinic_type" name="user_clinic_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                <option selected>Jenis Pengenalan</option>
                                                <option value="Individu">Individu</option>
                                                <option value="Syarikat">Syarikat</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="user_clinic_reference_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Pengenalan</label>
                                            <input type="text" id="user_clinic_reference_id" name="user_clinic_reference_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div>
                                            <label for="user_clinic_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                            <input type="email" id="user_clinic_email" name="user_clinic_email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                        <div>
                                            @php
                                                $klinik = App\Models\Klinik::all();
                                            @endphp
                                            <label for="user_clinic_fk_clinic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Klinik</label>
                                            <select id="user_clinic_fk_clinic" name="user_clinic_fk_clinic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                <option selected>Pilih Klinik</option>
                                                @foreach($klinik as $item)
                                                    <option value="{{ $item->id }}">{{ $item->clinic_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label for="user_clinic_roles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Peranan</label>
                                            <select id="user_clinic_roles" name="user_clinic_roles" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                                <option selected>Pilih Peranan</option>
                                                <option value="Super Admin">Super Admin</option>
                                                <option value="HQ Klinik">HQ Klinik</option>
                                                <option value="Pembantu Klinik">Pembantu Klinik</option>
                                                <option value="Penyemak HR">Penyemak HR</option>
                                                <option value="Penyokong HR">Penyokong HR</option>
                                                <option value="Pelulus HR">Pelulus HR</option>
                                                <option value="Admin JU">Admin JU</option>
                                            </select>
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
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Klinik
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Peranan
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-right">
                                            Tindakan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="accordion-collapse" data-accordion="collapse">
                                    @if($listPengguna->isEmpty())
                                        <tr>
                                            <td colspan="6" class="p-5 text-center">
                                                No data found
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($listPengguna as $pengguna)
                                            <tr id="tanggungan-heading-{{ $pengguna->id }}" class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{++$countPengguna}}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ $pengguna->user_clinic_name }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $pengguna->user_clinic_email }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $pengguna->klinik->clinic_name }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ $pengguna->user_clinic_roles }}
                                                </td>
                                                <td class="px-6 py-4 flex gap-2 justify-end">
                                                    <!-- Kemaskini Klinik -->
                                                    <a data-popover-target="kemaskini-klinik-{{ $pengguna->id }}" data-popover-placement="top" href="{{ route('senarai-pengguna-klinik', ['kemaskini' => $pengguna->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="kemaskini-klinik-{{ $pengguna->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                        <div class="px-3 py-2">
                                                            <p>Kemaskini Klinik</p>
                                                        </div>
                                                        <div data-popper-arrow></div>
                                                    </div>
                                                    <!-- Lihat Klinik -->
                                                    <a data-popover-target="lihat-klinik-{{ $pengguna->id }}" data-popover-placement="top" href="{{ route('senarai-pengguna-klinik', ['profil' => $pengguna->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z"/>
                                                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="lihat-klinik-{{ $pengguna->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                                        <div class="px-3 py-2">
                                                            <p>Lihat Klinik</p>
                                                        </div>
                                                        <div data-popper-arrow></div>
                                                    </div>
                                                    <!-- Padam Klinik -->
                                                    <a data-popover-target="padam-klinik-{{ $pengguna->id }}" data-popover-placement="top" href="{{ route('senarai-pengguna-klinik', ['hapus' => $pengguna->id ]) }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-red-400 hover:border-red-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                        <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                        </svg>
                                                    </a>
                                                    <div data-popover id="padam-klinik-{{ $pengguna->id }}" role="tooltip" class="absolute z-10 invisible inline-block text-md font-medium text-gray-600 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
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
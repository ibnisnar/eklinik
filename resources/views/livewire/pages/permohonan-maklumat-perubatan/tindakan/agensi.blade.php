<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Permohonan Penambahan Maklumat Perubatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h5 class="mb-2 text-md font-semibold tracking-tight text-gray-900 dark:text-white">Permohonan</h5>
                    <div class="p-4 md:p-5" >
                        <div class="grid gap-4 mb-4 grid-cols-3">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="permohonan_date_display" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarikh Permohonan</label>
                                <input type="text" id="permohonan_date_display" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly value="{{ $permohonan->permohonan_date }}">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="permohonan_no_display" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Permohonan</label>
                                <input type="text" id="permohonan_no_display" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly value="{{ $permohonan->permohonan_no }}">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="permohonan_fk_user_display" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pemohon</label>
                                <input type="text" id="permohonan_fk_user_display" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly value="{{ $permohonan->user->name }}">
                            </div>
                        </div>
                        <div class="mt-8 relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-800 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Bill</th>
                                        <th scope="col" class="px-6 py-3">Jenis</th>
                                        <th scope="col" class="px-6 py-3">Perkara</th>
                                        <th scope="col" class="px-6 py-3">Harga (RM)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permohonan->keterangan as $item)
                                        <tr class="dark:bg-gray-700">
                                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</th>
                                            <td class="px-6 py-4">
                                                {{ $item->permohonan_perubatan }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $item->permohonan_item }}
                                            </td>
                                            <td class="px-6 py-4">
                                                RM{{ $item->permohonan_amaun }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                    <h5 class="mb-2 text-md font-semibold tracking-tight text-gray-900 dark:text-white">Tindakan Agensi (Putrakop)</h5>
                    <div class="p-4 md:p-5" >
                        <div class="grid gap-4 mb-4 grid-cols-3">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="permohonan_date_display" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarikh Semak</label>
                                <input type="text" id="permohonan_date_display" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly value="{{ $permohonan->permohonan_date }}">
                            </div>
                            <div class="col-span-2 sm:col-span-2">
                                <label for="permohonan_no_display" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tindakan</label>
                                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white divide-y sm:divide-y-0 sm:flex sm:divide-x">
                                    <li class="w-full">
                                        <div class="flex items-center p-2.5">
                                            <input id="horizontal-list-radio-license" type="radio" value="license" name="list-radio" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="horizontal-list-radio-license" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sokong</label>
                                        </div>
                                    </li>
                                    <li class="w-full">
                                        <div class="flex items-center p-2.5">
                                            <input id="horizontal-list-radio-id" type="radio" value="id" name="list-radio" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="horizontal-list-radio-id" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak Sokong</label>
                                        </div>
                                    </li>
                                    <li class="w-full">
                                        <div class="flex items-center p-2.5">
                                            <input id="horizontal-list-radio-passport" type="radio" value="passport" name="list-radio" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="horizontal-list-radio-passport" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kuiri</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="permohonan_fk_user_display" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                                <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                            </div>
                            <div class="col-span-2 sm:col-span-2">
                                <div class="grid gap-4 mb-4 grid-cols-3">
                                    <div>
                                        <label for="permohonan_fk_user_display" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pegawai</label>
                                        <input type="text" id="permohonan_date_display" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly value="{{ $permohonan->permohonan_date }}">
                                    </div>
                                    <div>
                                        <label for="permohonan_fk_user_display" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jawatan</label>
                                        <input type="text" id="permohonan_date_display" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly value="{{ $permohonan->permohonan_date }}">
                                    </div>
                                    <div>
                                        <label for="permohonan_fk_user_display" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Agensi</label>
                                        <input type="text" id="permohonan_date_display" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly value="{{ $permohonan->permohonan_date }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('senarai-permohonan-penambahan-maklumat-perubatan.index') }}" class="inline-flex py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            <svg class="me-1 -ms-1 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
                            </svg>
                            Kembali
                        </a>
                        <button type="submit" class="mt-4 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24" transform="rotate(90)">
                                <path fill-rule="evenodd" d="M12 2a1 1 0 0 1 .932.638l7 18a1 1 0 0 1-1.326 1.281L13 19.517V13a1 1 0 1 0-2 0v6.517l-5.606 2.402a1 1 0 0 1-1.326-1.281l7-18A1 1 0 0 1 12 2Z" clip-rule="evenodd"/>
                            </svg>
                            Hantar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

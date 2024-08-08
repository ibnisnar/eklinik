<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Permohonan Penambahan Maklumat Perubatan') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                

                <form wire:submit.prevent="createPermohonanMaklumatPerubatan" class="p-4 md:p-5" >
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-3">
                        <div class="col-span-2 sm:col-span-1">
                            <label for="permohonan_date_display" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarikh Permohonan</label>
                            <input type="text" id="permohonan_date_display" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly value="{{ now()->format('d-m-Y') }}">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="permohonan_no_display" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Permohonan</label>
                            <input type="text" id="permohonan_no_display" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly value="{{ $permohonan_no }}">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="permohonan_fk_user_display" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pemohon</label>
                            <input type="text" id="permohonan_fk_user_display" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly value="{{ auth()->user()->name }}">
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
                                    <th scope="col" class="px-6 py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rows as $index => $row)
                                <tr class="dark:bg-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</th>
                                    <td class="px-6 py-4">
                                        <select wire:model="rows.{{ $index }}.permohonan_perubatan" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                            <option value="" disabled>Pilih Perubatan</option>
                                            <option value="Caj Rundingan">Caj Rundingan</option>
                                            <option value="Rawatan">Rawatan</option>
                                            <option value="Ubatan">Ubatan</option>
                                            <option value="Ujian Makmal">Ujian Makmal</option>
                                        </select>
                                    </td>
                                    <td class="px-6 py-4">
                                        <input type="text" wire:model="rows.{{ $index }}.permohonan_item" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                    </td>
                                    <td class="px-6 py-4">
                                        <input type="number" wire:model="rows.{{ $index }}.permohonan_amaun" step="0.01" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#" wire:click.prevent="removeRow({{ $index }})" class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm7.707-3.707a1 1 0 0 0-1.414 1.414L10.586 12l-2.293 2.293a1 1 0 1 0 1.414 1.414L12 13.414l2.293 2.293a1 1 0 0 0 1.414-1.414L13.414 12l2.293-2.293a1 1 0 0 0-1.414-1.414L12 10.586 9.707 8.293Z" clip-rule="evenodd"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 ms-4 flex justify-start">
                        <a href="#" wire:click.prevent="addRow" class="font-medium text-blue-700 dark:text-blue-500 hover:underline">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('senarai-permohonan-penambahan-maklumat-perubatan.index') }}" class="inline-flex py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            <svg class="me-1 -ms-1 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
                            </svg>
                            Kembali
                        </a>
                        <button type="submit" class="mt-4 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

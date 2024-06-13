<x-app-layout>
    <x-slot name="header">
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Laman Utama</span>
          </div>
        </li>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
              <div class="flex items-center justify-between mb-4">
                  <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Senarai Profil BOD</h5>

              </div>
          </div>
        </div>
    </div>
</x-app-layout>
<x-modal name="tambah-permohonan-perubatan" focusable maxWidth="6xl">
    <form method="post" action="{{ route('store.permohonan-perubatan') }}" class="p-6">
        @csrf
        <input type="hidden" name="application_fk_user" value="{{ Auth::user()->id }}">
        <h2 class="text-lg mb-6 font-medium text-gray-900 dark:text-gray-100">
            {{ __('Maklumat Permohonan Perubatan') }}
        </h2>
        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label for="application_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tarikh Mohon</label>
                <!-- Display the current date in the desired format -->
                <input type="text" id="application_date" name="application_date" value="{{ date('d-m-Y') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                @error('application_date')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="application_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Permohonan</label>
                <input type="text" id="application_no" name="application_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
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
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700" id="row1">
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

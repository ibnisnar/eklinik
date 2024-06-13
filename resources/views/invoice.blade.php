<x-app-layout>
    <x-slot name="header">
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Invoice</span>
          </div>
        </li>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="sm:w-11/12 lg:w-3/4 mx-auto">
                <!-- Card -->
                <div class="flex flex-col p-4 sm:p-10 bg-white shadow-md rounded-xl dark:bg-neutral-800">
                  <!-- Grid -->
                  <div class="flex justify-between">
                    <div>
                      <h1 class="mt-2 text-lg md:text-xl font-semibold text-blue-600 dark:text-white">Muhammad Tantowi Isnar.</h1>
                    </div>
                    <!-- Col -->

                    <div class="text-end">
                      <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 dark:text-neutral-200">Invoice #</h2>
                      <span class="mt-1 block text-gray-500 dark:text-neutral-500">23-005</span>

                      <address class="mt-4 not-italic text-gray-800 dark:text-neutral-200">
                        No.7062 Taman Semarak<br>
                        Lorong 31 Jalan Kuhara<br>
                        Tawau, Sabah 91000<br>
                      </address>
                    </div>
                    <!-- Col -->
                  </div>
                  <!-- End Grid -->

                  <!-- Grid -->
                  <div class="mt-8 grid sm:grid-cols-2 gap-3">
                    <div>
                      <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Bill to:</h3>
                      <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">3F Resources Sdn Bhd</h3>
                      <address class="mt-2 not-italic text-gray-500 dark:text-neutral-500">
                        No. 78, Jalan Wangsa Delima 6,<br>
                        Pusat Bandar Wangsa Maju (KLSC),<br>
                        53300 Kuala Lumpur<br>
                      </address>
                    </div>
                    <!-- Col -->

                    <div class="sm:text-end space-y-2">
                      <!-- Grid -->
                      <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                        <dl class="grid sm:grid-cols-5 gap-x-3">
                          <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Invoice date:</dt>
                          <dd class="col-span-2 text-gray-500 dark:text-neutral-500">07/05/2024</dd>
                        </dl>
                        <dl class="grid sm:grid-cols-5 gap-x-3">
                          <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Purchase Order:</dt>
                          <dd class="col-span-2 text-gray-500 dark:text-neutral-500">3F/PO/859/24-012</dd>
                        </dl>
                      </div>
                      <!-- End Grid -->
                    </div>
                    <!-- Col -->
                  </div>
                  <!-- End Grid -->

                  <!-- Table -->
                  <div class="mt-6">
                    <div class="border border-gray-200 p-4 rounded-lg space-y-4 dark:border-neutral-700">
                      <div class="hidden sm:grid sm:grid-cols-5">
                        <div class="sm:col-span-3 text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Item</div>
                        <div class="text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Qty</div>
                        <div class="text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Amount</div>
                      </div>

                      <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>

                      <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
                        <div class="col-span-full sm:col-span-3">
                          <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Item</h5>
                          <p class="font-medium text-gray-800 dark:text-neutral-200">Development of e-Klinik PPJ, June 2024</p>
                        </div>
                        <div>
                          <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Qty</h5>
                          <p class="text-gray-800 dark:text-neutral-200">1</p>
                        </div>
                        <div>
                          <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Amount</h5>
                          <p class="sm:text-end text-gray-800 dark:text-neutral-200">RM 4000,00</p>
                        </div>
                      </div>

                      <div class="sm:hidden border-b border-gray-200 dark:border-neutral-700"></div>

                    </div>
                  </div>
                  <!-- End Table -->

                  <!-- Flex -->
                  <div class="mt-8 flex sm:justify-end">
                    <div class="w-full max-w-2xl sm:text-end space-y-2">
                      <!-- Grid -->
                      <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                        <dl class="grid sm:grid-cols-5 gap-x-3">
                          <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Total:</dt>
                          <dd class="col-span-2 text-gray-500 dark:text-neutral-500">RM 4000,00</dd>
                        </dl>
                      </div>
                      <!-- End Grid -->
                    </div>
                  </div>
                  <!-- End Flex -->

                  <div class="mt-8 sm:mt-12">
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Thank you!</h4>
                    <div class="mt-2">
                      <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">CIMB Bank</p>
                      <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">7074921241</p>
                    </div>
                  </div>

                  <p class="mt-5 text-sm text-gray-500 dark:text-neutral-500">© 2024 IbnIsnar.</p>
                </div>
                <!-- End Card -->

                <!-- Buttons -->
                <div class="mt-6 flex justify-end gap-x-3">
                  <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-neutral-800 dark:hover:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-white dark:focus:ring-offset-gray-800" href="#">
                  <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                    Invoice PDF
                  </a>
                  <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/></svg>
                    Print
                  </a>
                </div>
                <!-- End Buttons -->
            </div>
        </div>
    </div>
</x-app-layout>

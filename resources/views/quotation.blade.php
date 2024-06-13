<x-app-layout>
    <x-slot name="header">
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Quotation</span>
          </div>
        </li>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="sm:w-11/12 lg:w-3/4 mx-auto">
                <div class="flex flex-col p-4 sm:p-10 bg-white shadow-md rounded-xl dark:bg-neutral-800">
                  <div class="flex justify-between">
                    <div>
                      <h1 class="mt-2 text-lg md:text-xl font-semibold text-blue-600 dark:text-white">Muhammad Tantowi Isnar.</h1>
                      <address class="mt-2 not-italic text-gray-500 dark:text-neutral-500">
                        Taman Semarak 31 Jalan Kuhara,<br>
                        Tawau, Sabah 91000<br>
                      </address>
                    </div>
                    <div class="text-end">
                      <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 dark:text-neutral-200">Quote</h2>
                    </div>
                  </div>
                  <div class="hidden sm:block mt-20 border-b border-gray-200 dark:border-neutral-700"></div>
                  <div class="mt-20 grid sm:grid-cols-2 gap-3">
                    <div>
                      <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">3F Resources Sdn Bhd</h3>
                      <address class="mt-2 not-italic text-gray-500 dark:text-neutral-500">
                        No. 78, Jalan Wangsa Delima 6,<br>
                        Pusat Bandar Wangsa Maju (KLSC),<br>
                        53300 Kuala Lumpur<br>
                      </address>
                    </div>
                    <div class="sm:text-end space-y-2">
                      <!-- Grid -->
                      <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                        <dl class="grid sm:grid-cols-5 gap-x-3">
                          <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Quote:</dt>
                          <dd class="col-span-2 text-gray-500 dark:text-neutral-500">#Q00003</dd>
                        </dl>
                        <dl class="grid sm:grid-cols-5 gap-x-3">
                          <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Quote Date:</dt>
                          <dd class="col-span-2 text-gray-500 dark:text-neutral-500">June 10, 2024</dd>
                        </dl>
                      </div>
                      <!-- End Grid -->
                    </div>
                  </div>
                  <div class="mt-28">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Website Development Service</h3>
                    <div class="mt-4 border border-gray-200 p-4 rounded-lg space-y-4 dark:border-neutral-700">
                      <div class="hidden sm:grid sm:grid-cols-5">
                        <div class="text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Qty</div>
                        <div class="sm:col-span-3 text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Description</div>
                        <div class="text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Unit Price</div>
                      </div>
                      <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>
                      <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
                        <div>
                          <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Qty</h5>
                          <p class="text-gray-800 dark:text-neutral-200">3</p>
                        </div>
                        <div class="col-span-full sm:col-span-3">
                          <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Item</h5>
                          <p class="font-medium text-gray-800 dark:text-neutral-200">E-Klinik - PPJ</p>
                        </div>
                        <div>
                          <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Unit Price</h5>
                          <p class="sm:text-end text-gray-800 dark:text-neutral-200">RM 5000,00</p>
                        </div>
                      </div>
                      <div class="sm:hidden border-b border-gray-200 dark:border-neutral-700"></div>
                    </div>
                  </div>
                  <div class="mt-8 flex sm:justify-end">
                    <div class="sm:text-end me-2 space-y-2">
                      <!-- Grid -->
                      <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                        <dl class="grid sm:grid-cols-5 gap-x-3">
                          <dt class="col-span-3 font-semibold text-gray-800 dark:text-neutral-200">Total :</dt>
                          <dd class="col-span-2 text-gray-500 dark:text-neutral-500">RM 15,000,00</dd>
                        </dl>
                      </div>
                    </div>
                  </div>
                  <div class="mt-8 sm:mt-12">
                    <h4 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Terms & Conditions</h4>
                    <div class="mt-2">
                      <p class="block text-sm font-medium text-gray-800 dark:text-neutral-200">Payment in due within 15 days</p>
                    </div>
                  </div>

                  <p class="mt-5 text-sm text-gray-500 dark:text-neutral-500">© 2024 IbnIsnar.</p>
                </div>
                <div class="mt-6 flex justify-end gap-x-3">
                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/>
                        </svg>
                        Quote PDF
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

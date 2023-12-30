@if(session('success'))
    <div class="bg-green-50 rounded-md p-4">
        <div class="flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true" class="h-5 w-5 text-green-400"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" fill="currentColor"></path></svg>
            </div>
            <div class="ml-3">
                <h3 class="text-green-800 text-sm font-medium">Success!</h3>
                <div class="text-green-700 text-sm mt-2"><p>{{ session('success') }}</p></div>
            </div>
        </div>
    </div>

@endif

@if(session('warning'))
    <div class="bg-yellow-50 rounded-md p-4">
        <div class="flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true" class="h-5 w-5 text-yellow-400"><path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" fill="currentColor"></path></svg>
            </div>
            <div class="ml-3">
                <h3 class="text-yellow-800 text-sm font-medium">Warning!</h3>
                <div class="text-yellow-700 text-sm mt-2"><p>{{ session('warning') }}</p></div>
            </div>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="bg-red-50 rounded-md p-4">
        <div class="flex">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true" class="h-5 w-5 text-red-400"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" fill="currentColor"></path></svg>
            </div>
            <div class="ml-3">
                <h3 class="text-red-800 text-sm font-medium">Error!</h3>
                <div class="text-red-700 text-sm mt-2">
                    {{ session('error') }}
                </div>
            </div>
        </div>
    </div>
@endif

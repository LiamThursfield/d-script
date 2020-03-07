@if (session('status'))
    <div class="bg-gray-900 border-green-800 border-l-4 mt-8 p-6 rounded-l rounded-r-lg shadow-lg">
        <p>
            {{ session('status') }}
        </p>
    </div>
@endif

@if (session('success'))
    <div class="bg-gray-900 border-green-800 border-l-4 mt-8 p-6 rounded-l rounded-r-lg shadow-lg">
        <p>
            {{ session('success') }}
        </p>
    </div>
@endif
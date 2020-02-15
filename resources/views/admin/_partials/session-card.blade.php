@if (session('status'))
    <div class="bg-white border-green-600 border-l-4 mt-8 p-6 rounded-l rounded-r-lg shadow-lg">
        <p>
            {{ session('status') }}
        </p>
    </div>
@endif
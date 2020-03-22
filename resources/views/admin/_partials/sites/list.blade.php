<div class="bg-gray-900 mt-8 overflow-hidden py-1 rounded-lg shadow-lg">
    <ul class="my-2">
        @foreach($sites as $site)
            <li>
                <a
                    class="
                        block px-6 py-3 font-mono
                        duration-300 ease-in-out transition-all
                        hover:text-green-700 hover:pl-8
                    "
                    href="{{ route('admin.sites.show', $site) }}"
                >
                    <span class="font-mono opacity-50"> > </span>
                    {{ $site->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
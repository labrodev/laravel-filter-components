<a
    href="{{ query_sort($name) }}"
    class=""
>
    {{ $slot }}

    <span class="text-lg">
        @if(query_sort_active($name))
            &#9662;
        @elseif(query_sort_active('-' . $name))
            &#9652;
        @else
            <span class="text-gray-400">&#9652; &#9662;</span>
        @endif
    </span>
</a>

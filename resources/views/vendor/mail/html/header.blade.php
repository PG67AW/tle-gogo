@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            {{-- <x-ui.logo style="fill:#343439; height:50px"></x-ui.logo> --}}
            <img src="/images/bean-logo.png" alt="bean"
                class="block w-auto text-gray-800 fill-current h-7 dark:text-gray-200">
        </a>
    </td>
</tr>

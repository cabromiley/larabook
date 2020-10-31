@props(['active' => false])
<a class="px-3 py-2 font-medium text-sm leading-5 rounded-md cursor-pointer {{ $active ? 'text-gray-700 hover:text-gray-800 bg-gray-100' : 'text-gray-500 hover:text-gray-700 focus:outline-none'  }}" {{ $attributes }}>
    {{ $slot }}
</a>

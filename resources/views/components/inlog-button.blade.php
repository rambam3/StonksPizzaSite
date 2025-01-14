<button {{ $attributes->merge(['type' => 'submit', 'class' => ' mb-4 inline-flex items-center text-center py-2 px-7 bg-[#B2BF84] hover:bg-[#8c9562] border border-transparent rounded-md font-semibold text-lg uppercase tracking-widest focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

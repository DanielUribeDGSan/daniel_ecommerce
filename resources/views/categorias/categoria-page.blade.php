<x-web-layout>
    @livewire('banner-products',['category' => $category])
    @livewire('content-filter',['category' => $category, 'subcategoryQuery' => $subcategory])

</x-web-layout>

<x-layout_component>
    <x-slot:title>{{ $product->name }} - Detalhes</x-slot:title>

    <x-slot:content>
        <x-card_details :name="$product->name" :description="$product->description" :id="$product->id"
            :price="$product->price" :photo="$product->photo" />
    </x-slot:content>
</x-layout_component>
<x-layout_component>
    <x-slot:title>Gerenciador de produtos</x-slot:title>

    <x-slot:content>

        <div class="container mt-4">
            <div class="row g-4">
                <div class="col-md-4 col-sm-6">

                    <x-card_product :title="$product->name" :description="$product->description"
                        :price="$product->price" :id="$product->id" />

                </div>
            </div>
        </div>
    </x-slot:content>


</x-layout_component>
<x-layout_component>
    <x-slot:title>Gerenciador de produtos</x-slot:title>

    <x-slot:content>

        <div class="p-5 w-100 text-end">

            <a href="{{ route('products.create') }}">
                <button type="submit" class="btn btn-custom">novo produto</button>
            </a>

        </div>

        @if(session('success'))
        <x-alert.alert_success :text="session('success')" />
        @endif

        <div class="container mt-4">
            <div class="row g-4">
                @foreach ($data as $product)
                <div class="col-md-4 col-sm-6">
                    <a href="{{ route('products.show', ['product' => $product->id]) }}" class="card-product-link">

                        <x-card_product :title="$product->name" :description="$product->description" :id="$product->id"
                            :price="$product->price" :photo="$product->photo" />

                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </x-slot:content>


</x-layout_component>
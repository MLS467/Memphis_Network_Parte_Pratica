<x-layout_component>
    <x-slot:title>Gerenciador de produtos</x-slot:title>

    <x-slot:content>

        <a href="{{ route('products.create') }}">
            <button type="submit" class="btn btn-primary">novo produto</button>
        </a>


        @if(session('success'))
        <x-alert.alert_success :text="session('success')" />
        @endif

        <div class="container mt-4">
            <div class="row g-4">
                @foreach ($data as $product)
                <div class="col-md-4 col-sm-6">
                    <a class="d-inline" href={{ 
                route('products.show', ['product' => $product->id])
                 }}>

                        <x-card_product :title="$product->name" :description="$product->description" :id="$product->id"
                            :price="$product->price" />


                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </x-slot:content>


</x-layout_component>
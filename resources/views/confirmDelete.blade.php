@php
use Illuminate\Support\Facades\Crypt;
@endphp

<x-layout_component>
    <x-slot:title>Confirmar Exclusão</x-slot:title>

    <x-slot:content>
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-danger text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                Confirmar Exclusão
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="mb-3">Tem certeza que deseja excluir o produto:</p>

                            <div class="alert alert-info">
                                <strong>{{ $product->name }}</strong><br>
                                <small class="text-muted">{{ $product->description }}</small><br>
                                <span class="text-primary fw-bold">R$
                                    {{ number_format($product->price, 2, ',', '.') }}</span>
                            </div>

                            <div class="alert alert-warning">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Atenção:</strong> Esta ação não pode ser desfeita!
                            </div>

                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-1"></i>
                                    Cancelar
                                </a>

                                <form action="{{ route('products.destroy', Crypt::encrypt($product->id)) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash me-1"></i>
                                        Confirmar Exclusão
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:content>
</x-layout_component>
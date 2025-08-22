@php
use Illuminate\Support\Facades\Crypt;
@endphp

<x-layout_component>
    <x-slot:title>Confirmar Exclusão</x-slot:title>

    <x-slot:content>
        <div class="container-fluid p-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm" style="border-radius: 16px; background: #ffffff;">
                        <div class="card-header bg-transparent border-0 pb-0" style="padding: 2rem 2rem 1rem 2rem;">
                            <div class="d-flex align-items-center mb-2">
                                <div class="rounded-circle me-3"
                                    style="width: 48px; height: 48px; background: rgba(239, 68, 68, 0.1); display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-exclamation-triangle" style="color: #ef4444; font-size: 20px;"></i>
                                </div>
                                <div>
                                    <h4 class="mb-1 fw-bold" style="color: #1e293b;">Confirmar Exclusão</h4>
                                    <p class="text-muted mb-0" style="font-size: 14px;">Esta ação não pode ser desfeita
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card-body" style="padding: 1rem 2rem 2rem 2rem;">
                            <p class="mb-4" style="color: #374151; font-size: 15px;">Tem certeza que deseja excluir o
                                produto:</p>

                            <div class="card border-0 mb-4" style="background: #f8fafc; border-radius: 12px;">
                                <div class="card-body p-3">
                                    <h6 class="fw-bold mb-2" style="color: #1e293b;">{{ $product->name }}</h6>
                                    <p class="text-muted mb-2" style="font-size: 14px;">{{ $product->description }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge rounded-pill px-3 py-1"
                                            style="background: rgba(99, 102, 241, 0.1); color: rgba(99, 102, 241, 1); font-size: 12px;">Produto</span>
                                        <h5 class="mb-0 fw-bold" style="color: #6366f1;">R$
                                            {{ number_format($product->price, 2, ',', '.') }}
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="alert border-0 mb-4"
                                style="background: rgba(239, 68, 68, 0.05); border-radius: 12px;">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-exclamation-triangle me-3" style="color: #ef4444;"></i>
                                    <div>
                                        <strong style="color: #ef4444;">Atenção!</strong>
                                        <p class="mb-0 mt-1" style="color: #7f1d1d; font-size: 14px;">Esta ação removerá
                                            permanentemente o produto do sistema.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-3 justify-content-end pt-3" style="border-top: 1px solid #f1f5f9;">
                                <a href="{{ route('products.index') }}" class="btn btn-light px-4 py-2"
                                    style="border-radius: 10px; font-weight: 500; color: #6b7280; border: 1px solid #e5e7eb;">
                                    <i class="fas fa-times me-2"></i>Cancelar
                                </a>

                                <form action="{{ route('products.destroy', Crypt::encrypt($product->id)) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn px-4 py-2"
                                        style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white; border: none; border-radius: 10px; font-weight: 500; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);">
                                        <i class="fas fa-trash me-2"></i>Confirmar Exclusão
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
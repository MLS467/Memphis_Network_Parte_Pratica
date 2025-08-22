@php
use Illuminate\Support\Facades\Crypt;
@endphp

@props(['title', 'description', 'price', 'id'])

<div class="card h-100 shadow-sm border-0" style="border-radius: 16px; background: #f8fafc; min-height: 350px;">
    <div class="card-body p-4 d-flex flex-column">
        <!-- Header com ícone e categoria -->
        <div class="d-flex align-items-start justify-content-between mb-3">
            <div class="d-flex align-items-center">
                <div class="rounded-3 me-3"
                    style="width: 48px; height: 48px; background: rgba(99, 102, 241, 0.1); display: flex; align-items: center; justify-content: center;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 7H4L2 4H1V2H4.25L6.25 7H20L17 14H7L5 9" stroke="rgba(99, 102, 241, 1)"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div>
                    <h5 class="mb-1 fw-bold" style="color: #1e293b; font-size: 18px;">{{ $title }}</h5>
                    <small class="text-muted" style="font-size: 12px;">{{ date('d \d\e M. \d\e Y') }}</small>
                </div>
            </div>
            <span class="badge rounded-pill px-3 py-1"
                style="background: rgba(99, 102, 241, 0.1); color: rgba(99, 102, 241, 1); font-size: 12px; font-weight: 500;">Eletrônicos</span>
        </div>

        <!-- Descrição -->
        <p class="mb-4 flex-grow-1" style="color: #64748b; font-size: 14px; line-height: 1.5;">
            {{ $description }}
        </p>

        <!-- Preço em destaque -->
        <div class="mb-3">
            <h4 class="mb-0 fw-bold" style="color: rgba(99, 102, 241, 1); font-size: 24px;">
                R$ {{ number_format($price, 2, ',', '.') }}
            </h4>
        </div>

        <!-- Botões de ação no final -->
        <div class="d-flex gap-2 mt-auto">
            <a href="{{ route('products.edit', ['product'=> Crypt::encrypt($id) ]) }}"
                class="btn btn-outline-secondary btn-sm flex-fill" style="border-radius: 8px;">
                Editar
            </a>
            <a href="{{ route('confirm', ['id'=> Crypt::encrypt($id)]) }}"
                class="btn btn-outline-danger btn-sm flex-fill" style="border-radius: 8px;">
                Excluir
            </a>
        </div>
    </div>
</div>
@props(['name', 'description', 'price', 'id', 'photo'])

@php
use Illuminate\Support\Facades\Crypt;
@endphp

<div class="container-fluid p-5"
    style="background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%); min-height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card border-0"
                style="border-radius: 32px; background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);">

                <div class="position-relative overflow-hidden"
                    style="border-radius: 32px 32px 0 0; background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); padding: 4rem 3rem 3rem 3rem;">
                    <div class="position-absolute top-0 start-0 w-100 h-100"
                        style="background-image: radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 1px, transparent 1px), radial-gradient(circle at 80% 20%, rgba(255,255,255,0.1) 1px, transparent 1px); background-size: 30px 30px;">
                    </div>

                    <div class="row align-items-center position-relative">
                        <div class="col-md-8">
                            <div class="d-flex align-items-center mb-4">
                                <div class="rounded-4 me-4"
                                    style="width: 80px; height: 80px; background: rgba(255, 255, 255, 0.2); display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);">
                                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 7H4L2 4H1V2H4.25L6.25 7H20L17 14H7L5 9" stroke="white"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div>
                                    <h1 class="text-white fw-bold mb-2"
                                        style="font-size: 2.5rem; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">{{ $name }}
                                    </h1>
                                    <p class="text-white mb-0" style="opacity: 0.9; font-size: 1.1rem;">Produto
                                        #{{ str_pad($id, 4, '0', STR_PAD_LEFT) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <div class="badge rounded-pill px-4 py-2"
                                style="background: rgba(255, 255, 255, 0.2); color: white; font-size: 1rem; font-weight: 500; backdrop-filter: blur(10px);">
                                Eletrônicos
                            </div>
                        </div>
                    </div>

                    @if($photo)
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="position-relative"
                                style="overflow: hidden; height: 300px; background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px);">
                                <img src="{{ asset('storage/' . $photo) }}" alt="{{ $name }}" class="w-100 h-100"
                                    style="object-fit: cover;">
                                <div class="position-absolute bottom-0 start-0 w-100"
                                    style="height: 80px; background: linear-gradient(transparent, rgba(0,0,0,0.3));">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <h2 class="text-white fw-bold mb-0"
                                style="font-size: 3rem; text-shadow: 0 2px 4px rgba(0,0,0,0.2);">
                                R$ {{ number_format($price, 2, ',', '.') }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="card-body" style="padding: 3rem;">
                    <div class="row">
                        <div class="col-lg-8 mb-4">
                            <div class="card border-0 h-100"
                                style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); border-radius: 20px;">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="rounded-3 me-3"
                                            style="width: 48px; height: 48px; background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-align-left text-white"></i>
                                        </div>
                                        <h4 class="fw-bold mb-0" style="color: #1e293b;">Descrição do Produto</h4>
                                    </div>
                                    <p style="color: #64748b; font-size: 16px; line-height: 1.7; margin-bottom: 0;">
                                        {{ $description }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="card border-0"
                                        style="background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%); border-radius: 16px;">
                                        <div class="card-body p-3 text-white">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-check-circle me-3" style="font-size: 24px;"></i>
                                                <div>
                                                    <h6 class="fw-bold mb-0">Status</h6>
                                                    <small class="opacity-75">Disponível</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="card border-0"
                                        style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); border-radius: 16px;">
                                        <div class="card-body p-3 text-white">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-calendar-alt me-3" style="font-size: 24px;"></i>
                                                <div>
                                                    <h6 class="fw-bold mb-0">Cadastrado</h6>
                                                    <small class="opacity-75">{{ date('d/m/Y') }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="card border-0"
                                        style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); border-radius: 16px;">
                                        <div class="card-body p-3 text-white">
                                            <div class="d-flex align-items-center">
                                                <i class="fas fa-hashtag me-3" style="font-size: 24px;"></i>
                                                <div>
                                                    <h6 class="fw-bold mb-0">ID</h6>
                                                    <small
                                                        class="opacity-75">#{{ str_pad($id, 4, '0', STR_PAD_LEFT) }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="d-flex gap-3 justify-content-center">
                                <a href="{{ route('products.index') }}" class="btn px-5 py-3"
                                    style="background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%); color: white; border: none; border-radius: 16px; font-weight: 600; font-size: 16px; box-shadow: 0 8px 25px rgba(107, 114, 128, 0.3); transition: all 0.3s ease;">
                                    <i class="fas fa-arrow-left me-2"></i>Voltar à Lista
                                </a>

                                <a href="{{ route('products.edit', ['product'=> Crypt::encrypt($id) ]) }}"
                                    class="btn px-5 py-3"
                                    style="background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); color: white; border: none; border-radius: 16px; font-weight: 600; font-size: 16px; box-shadow: 0 8px 25px rgba(99, 102, 241, 0.3); transition: all 0.3s ease;">
                                    <i class="fas fa-edit me-2"></i>Editar Produto
                                </a>

                                <a href="{{ route('confirm', ['id'=> Crypt::encrypt($id)]) }}" class="btn px-5 py-3"
                                    style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: white; border: none; border-radius: 16px; font-weight: 600; font-size: 16px; box-shadow: 0 8px 25px rgba(239, 68, 68, 0.3); transition: all 0.3s ease;">
                                    <i class="fas fa-trash me-2"></i>Excluir
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.4) !important;
}

.card:hover {
    transform: translateY(-2px);
    transition: all 0.3s ease;
}
</style>
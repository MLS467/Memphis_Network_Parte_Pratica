@props(['text'])

<div class="container px-0 mb-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="alert border-0 p-0 mb-0" style="background: transparent;">
                <div class="card border-0 shadow-sm"
                    style="border-radius: 12px; background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%); overflow: hidden;">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-center">
                            <!-- Ícone animado -->
                            <div class="rounded-circle me-3 floating"
                                style="width: 36px; height: 36px; background: rgba(255, 255, 255, 0.2); display: flex; align-items: center; justify-content: center; backdrop-filter: blur(10px);">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 12l2 2 4-4" stroke="white" stroke-width="3" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <circle cx="12" cy="12" r="10" stroke="white" stroke-width="2" />
                                </svg>
                            </div>

                            <!-- Conteúdo -->
                            <div class="flex-grow-1">
                                <p class="text-white mb-0 fw-medium"
                                    style="font-size: 14px; opacity: 0.95; line-height: 1.3;">
                                    <i class="fas fa-check-circle me-2"></i>{{ $text }}
                                </p>
                            </div>

                            <!-- Botão fechar -->
                            <button type="button" class="btn-close ms-3" data-bs-dismiss="alert" aria-label="Close"
                                style="filter: brightness(0) invert(1); opacity: 0.7; transform: scale(0.8);"></button>
                        </div>
                    </div>

                    <!-- Efeito de brilho -->
                    <div class="position-absolute top-0 start-0 w-100 h-100"
                        style="background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%); pointer-events: none;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes progressSuccess {
    0% {
        width: 0%;
    }

    100% {
        width: 100%;
    }
}

@keyframes float {

    0%,
    100% {
        transform: translateY(0px) rotate(0deg);
    }

    50% {
        transform: translateY(-5px) rotate(5deg);
    }
}

.floating {
    animation: float 2s ease-in-out infinite;
}

.alert-success-modern {
    animation: slideInDown 0.5s ease-out;
}

@keyframes slideInDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
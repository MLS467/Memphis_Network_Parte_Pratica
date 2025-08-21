@props(['title', 'description', 'price', 'id'])

<div class="card h-100 shadow-sm bg-light">
    <div class="card-body p-4">
        <div class="d-flex align-items-start mb-3">
            <div class="bg-primary bg-opacity-10 rounded p-2 me-3">
                <i class="fas fa-box text-primary"></i>
            </div>
            <div class="flex-grow-1">
                <h5 class="card-title mb-1 fw-bold text-primary">{{ $title }}</h5>
                <small class="text-muted">{{ date('d \d\e M. \d\e Y') }}</small>
            </div>
            <span class="badge bg-light text-primary">Produtos</span>
        </div>

        <p class="card-text text-primary mb-3">
            {{ $description }}
        </p>


        <div class="h4 text-primary fw-bold mb-0">
            R$ {{ number_format($price, 2, ',', '.') }}
        </div>
        <a href="{{ route('products.edit', ['product'=>  Crypt::encrypt($id) ]) }}">
            <button type="button" class="btn btn-secondary ">
                Editar
            </button>
        </a>

        <a href="{{ route('confirm', ['id'=> Crypt::encrypt($id)]) }}">
            <button type="button" class="btn btn-danger ">Excluir</button>
        </a>
    </div>
</div>
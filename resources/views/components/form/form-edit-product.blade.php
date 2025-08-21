@props(['product'])

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nome do Produto</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name}}"
            placeholder="Digite o nome do produto">
        @error('name')
        <span class="text-danger p-2">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Preço</label>
        <input type="number" step="0.01" class="form-control" id="price" value="{{ $product->price}}" name="price"
            placeholder="Digite o preço">
        @error('price')
        <span class="text-danger p-2">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrição</label>
        <textarea class="form-control" id="description" name="description" rows="3"
            placeholder="Digite a descrição do produto">{{ $product->description}}</textarea>
        @error('description')
        <span class="text-danger p-2">
            {{ $message }}
        </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Editar</button>

    <a href="{{ route('products.index') }}">
        <button type="button" class="btn btn-primary">Cancelar</button>
    </a>


</form>
<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nome do Produto</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}"
            placeholder="Digite o nome do produto">
        @error('name')
        <span class="text-danger p-2">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Preço</label>
        <input type="number" step="0.01" class="form-control" id="price" value="{{ old('price')}}" name="price"
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
            placeholder="Digite a descrição do produto">{{ old('description')}}</textarea>
        @error('description')
        <span class="text-danger p-2">
            {{ $message }}
        </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Salvar Produto</button>
    <a href="{{ route('products.index') }}">
        <button type="button" class="btn btn-primary">Cancelar</button>
    </a>


</form>
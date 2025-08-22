@props(['product'])

<div class="container-fluid p-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm" style="border-radius: 16px; background: #ffffff;">
                <div class="card-header bg-transparent border-0 pb-0" style="padding: 2rem 2rem 1rem 2rem;">
                    <h4 class="mb-1 fw-bold" style="color: #1e293b;">Editar Produto</h4>
                    <p class="text-muted mb-0" style="font-size: 14px;">Atualize as informações do produto</p>
                </div>

                <div class="card-body" style="padding: 1rem 2rem 2rem 2rem;">
                    <form action="{{ route('products.update', ['product'=>$product->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8 mb-4">
                                <label for="name" class="form-label fw-semibold mb-2"
                                    style="color: #374151; font-size: 14px;">Nome do Produto</label>
                                <input type="text" class="form-control border-0 bg-light" id="name" name="name"
                                    value="{{ $product->name}}" placeholder="Digite o nome do produto"
                                    style="border-radius: 12px; padding: 0.875rem 1rem; font-size: 15px; box-shadow: none;">
                                @error('name')
                                <div class="text-danger mt-2" style="font-size: 13px;">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-4">
                                <label for="price" class="form-label fw-semibold mb-2"
                                    style="color: #374151; font-size: 14px;">Preço</label>
                                <div class="input-group">
                                    <span class="input-group-text border-0 bg-light"
                                        style="border-radius: 12px 0 0 12px; color: #6b7280;">R$</span>
                                    <input type="number" step="0.01" class="form-control border-0 bg-light" id="price"
                                        value="{{ $product->price}}" name="price" placeholder="0,00"
                                        style="border-radius: 0 12px 12px 0; padding: 0.875rem 1rem; font-size: 15px; box-shadow: none;">
                                </div>
                                @error('price')
                                <div class="text-danger mt-2" style="font-size: 13px;">
                                    <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold mb-2"
                                style="color: #374151; font-size: 14px;">Descrição</label>
                            <textarea class="form-control border-0 bg-light" id="description" name="description"
                                rows="4" placeholder="Digite a descrição do produto"
                                style="border-radius: 12px; padding: 0.875rem 1rem; font-size: 15px; box-shadow: none; resize: none;">{{ $product->description}}</textarea>
                            @error('description')
                            <div class="text-danger mt-2" style="font-size: 13px;">
                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="photo" class="form-label fw-semibold mb-2"
                                style="color: #374151; font-size: 14px;">Imagem do Produto</label>

                            @if($product->photo)
                            <div class="mb-3">
                                <p class="text-muted small">Imagem atual:</p>
                                <img src="{{ asset('storage/' . $product->photo) }}" alt="Imagem atual"
                                    style="max-width: 150px; height: auto; border-radius: 8px; border: 2px solid #e5e7eb;">
                            </div>
                            @endif

                            <input type="file" class="form-control border-0 bg-light" id="photo" name="photo"
                                accept="image/*" onchange="previewEditImage(this)"
                                style="border-radius: 12px; padding: 0.875rem 1rem; font-size: 15px; box-shadow: none;">

                            <div id="editImagePreview" style="display: none; margin-top: 15px;">
                                <p class="text-muted small">Nova imagem selecionada:</p>
                                <img id="editPreviewImg" src="" alt="Preview"
                                    style="max-width: 150px; height: auto; border-radius: 8px; border: 2px solid #6366f1;">
                            </div>

                            <small class="text-muted">Escolha uma nova imagem para substituir a atual. Formatos aceitos:
                                JPG, PNG, GIF (máx. 2MB)</small>

                            @error('photo')
                            <div class="text-danger mt-2" style="font-size: 13px;">
                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="d-flex gap-3 justify-content-end pt-3" style="border-top: 1px solid #f1f5f9;">
                            <a href="{{ route('products.index') }}" class="btn btn-light px-4 py-2"
                                style="border-radius: 10px; font-weight: 500; color: #6b7280; border: 1px solid #e5e7eb;">
                                <i class="fas fa-times me-2"></i>Cancelar
                            </a>
                            <button type="submit" class="btn px-4 py-2"
                                style="background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); color: white; border: none; border-radius: 10px; font-weight: 500; box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);">
                                <i class="fas fa-save me-2"></i>Salvar Alterações
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewEditImage(input) {
        const preview = document.getElementById('editImagePreview');
        const previewImg = document.getElementById('editPreviewImg');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.style.display = 'none';
        }
    }
</script>
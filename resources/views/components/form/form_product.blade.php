<div class="container-fluid p-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm" style="border-radius: 16px; background: #ffffff;">
                <div class="card-header bg-transparent border-0 pb-0" style="padding: 2rem 2rem 1rem 2rem;">
                    <h4 class="mb-1 fw-bold" style="color: #1e293b;">Novo Produto</h4>
                    <p class="text-muted mb-0" style="font-size: 14px;">Preencha as informações para criar um novo
                        produto</p>
                </div>

                <div class="card-body" style="padding: 1rem 2rem 2rem 2rem;">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-8 mb-4">
                                <label for="name" class="form-label fw-semibold mb-2"
                                    style="color: #374151; font-size: 14px;">Nome do Produto</label>
                                <input type="text" class="form-control border-0 bg-light" id="name" name="name"
                                    value="{{ old('name')}}" placeholder="Digite o nome do produto"
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
                                        value="{{ old('price')}}" name="price" placeholder="0,00"
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
                                style="border-radius: 12px; padding: 0.875rem 1rem; font-size: 15px; box-shadow: none; resize: none;">{{ old('description')}}</textarea>
                            @error('description')
                            <div class="text-danger mt-2" style="font-size: 13px;">
                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="photo" class="form-label fw-semibold mb-2"
                                style="color: #374151; font-size: 14px;">Imagem do Produto</label>
                            <input type="file" class="form-control border-0 bg-light" id="photo" name="photo"
                                accept="image/*" onchange="previewImage(this)"
                                style="border-radius: 12px; padding: 0.875rem 1rem; font-size: 15px; box-shadow: none;">
                            <div class="form-text mt-2" style="font-size: 12px; color: #6b7280;">
                                <i class="fas fa-info-circle me-1"></i>Selecione uma imagem (PNG, JPG, JPEG, GIF)
                            </div>

                            <div id="imagePreview" class="mt-3" style="display: none;">
                                <img id="preview" src="" alt="Preview"
                                    style="max-width: 200px; max-height: 200px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                            </div>

                            @error('photo')
                            <div class="text-danger mt-2" style="font-size: 13px;">
                                <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                            </div>
                            @enderror
                        </div>

                        <script>
                            function previewImage(input) {
                                const preview = document.getElementById('preview');
                                const previewContainer = document.getElementById('imagePreview');

                                if (input.files && input.files[0]) {
                                    const reader = new FileReader();

                                    reader.onload = function(e) {
                                        preview.src = e.target.result;
                                        previewContainer.style.display = 'block';
                                    }

                                    reader.readAsDataURL(input.files[0]);
                                } else {
                                    previewContainer.style.display = 'none';
                                }
                            }
                        </script>

                        <div class="d-flex gap-3 justify-content-end pt-3" style="border-top: 1px solid #f1f5f9;">
                            <a href="{{ route('products.index') }}" class="btn btn-light px-4 py-2"
                                style="border-radius: 10px; font-weight: 500; color: #6b7280; border: 1px solid #e5e7eb;">
                                <i class="fas fa-times me-2"></i>Cancelar
                            </a>
                            <button type="submit" class="btn px-4 py-2"
                                style="background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); color: white; border: none; border-radius: 10px; font-weight: 500; box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);">
                                <i class="fas fa-plus me-2"></i>Criar Produto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
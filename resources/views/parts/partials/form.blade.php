<div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $part->name ?? '') }}" required>
    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="sku" class="form-label">SKU</label>
    <input type="text" name="sku" id="sku" class="form-control" value="{{ old('sku', $part->sku ?? '') }}" required>
    @error('sku')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="description" class="form-label">Descripción</label>
    <textarea name="description" id="description" class="form-control">{{ old('description', $part->description ?? '') }}</textarea>
    @error('description')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="stock" class="form-label">Stock</label>
    <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $part->stock ?? 0) }}" min="0" required>
    @error('stock')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="price" class="form-label">Precio</label>
    <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $part->price ?? 0) }}" min="0" step="0.01" required>
    @error('price')<div class="text-danger">{{ $message }}</div>@enderror
</div>

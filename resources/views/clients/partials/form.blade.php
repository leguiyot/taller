<div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $client->name ?? '') }}" required>
    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="last_name" class="form-label">Apellido</label>
    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $client->last_name ?? '') }}" required>
    @error('last_name')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="dni" class="form-label">DNI</label>
    <input type="text" name="dni" id="dni" class="form-control" value="{{ old('dni', $client->dni ?? '') }}" required>
    @error('dni')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $client->email ?? '') }}" required>
    @error('email')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="phone" class="form-label">Teléfono</label>
    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $client->phone ?? '') }}">
    @error('phone')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="address" class="form-label">Dirección</label>
    <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $client->address ?? '') }}">
    @error('address')<div class="text-danger">{{ $message }}</div>@enderror
</div>

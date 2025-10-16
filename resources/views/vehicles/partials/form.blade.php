<div class="mb-3">
    <label for="client_id" class="form-label">Cliente</label>
    <select name="client_id" id="client_id" class="form-control" required>
        <option value="">Seleccione un cliente</option>
        @foreach($clients as $client)
            <option value="{{ $client->id }}" {{ old('client_id', $vehicle->client_id ?? '') == $client->id ? 'selected' : '' }}>{{ $client->name }} {{ $client->last_name }}</option>
        @endforeach
    </select>
    @error('client_id')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="brand" class="form-label">Marca</label>
    <input type="text" name="brand" id="brand" class="form-control" value="{{ old('brand', $vehicle->brand ?? '') }}" required>
    @error('brand')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="model" class="form-label">Modelo</label>
    <input type="text" name="model" id="model" class="form-control" value="{{ old('model', $vehicle->model ?? '') }}" required>
    @error('model')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="year" class="form-label">Año</label>
    <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $vehicle->year ?? '') }}" required min="1900" max="{{ date('Y')+1 }}">
    @error('year')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="license_plate" class="form-label">Patente</label>
    <input type="text" name="license_plate" id="license_plate" class="form-control" value="{{ old('license_plate', $vehicle->license_plate ?? '') }}" required>
    @error('license_plate')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="vin_number" class="form-label">VIN</label>
    <input type="text" name="vin_number" id="vin_number" class="form-control" value="{{ old('vin_number', $vehicle->vin_number ?? '') }}" required>
    @error('vin_number')<div class="text-danger">{{ $message }}</div>@enderror
</div>

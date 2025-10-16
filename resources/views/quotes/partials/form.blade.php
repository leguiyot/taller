<div class="mb-3">
    <label for="client_id" class="form-label">Cliente</label>
    <select name="client_id" id="client_id" class="form-control" required>
        <option value="">Seleccione un cliente</option>
        @foreach($clients as $client)
            <option value="{{ $client->id }}" {{ old('client_id', $quote->client_id ?? '') == $client->id ? 'selected' : '' }}>{{ $client->name }} {{ $client->last_name }}</option>
        @endforeach
    </select>
    @error('client_id')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="vehicle_id" class="form-label">Vehículo</label>
    <select name="vehicle_id" id="vehicle_id" class="form-control" required>
        <option value="">Seleccione un vehículo</option>
        @foreach($vehicles as $vehicle)
            <option value="{{ $vehicle->id }}" {{ old('vehicle_id', $quote->vehicle_id ?? '') == $vehicle->id ? 'selected' : '' }}>{{ $vehicle->brand }} {{ $vehicle->model }} ({{ $vehicle->year }})</option>
        @endforeach
    </select>
    @error('vehicle_id')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="description" class="form-label">Descripción</label>
    <textarea name="description" id="description" class="form-control" required>{{ old('description', $quote->description ?? '') }}</textarea>
    @error('description')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="total_amount" class="form-label">Total</label>
    <input type="number" name="total_amount" id="total_amount" class="form-control" value="{{ old('total_amount', $quote->total_amount ?? 0) }}" min="0" step="0.01" required>
    @error('total_amount')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="status" class="form-label">Estado</label>
    <select name="status" id="status" class="form-control" required>
        <option value="Pendiente" {{ old('status', $quote->status ?? '') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
        <option value="Aprobado" {{ old('status', $quote->status ?? '') == 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
        <option value="Rechazado" {{ old('status', $quote->status ?? '') == 'Rechazado' ? 'selected' : '' }}>Rechazado</option>
    </select>
    @error('status')<div class="text-danger">{{ $message }}</div>@enderror
</div>

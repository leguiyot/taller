<div class="mb-3">
    <label for="client_id" class="form-label">Cliente</label>
    <select name="client_id" id="client_id" class="form-control" required>
        <option value="">Seleccione un cliente</option>
        @foreach($clients as $client)
            <option value="{{ $client->id }}" {{ old('client_id', $workOrder->client_id ?? '') == $client->id ? 'selected' : '' }}>{{ $client->name }} {{ $client->last_name }}</option>
        @endforeach
    </select>
    @error('client_id')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="vehicle_id" class="form-label">Vehículo</label>
    <select name="vehicle_id" id="vehicle_id" class="form-control" required>
        <option value="">Seleccione un vehículo</option>
        @foreach($vehicles as $vehicle)
            <option value="{{ $vehicle->id }}" {{ old('vehicle_id', $workOrder->vehicle_id ?? '') == $vehicle->id ? 'selected' : '' }}>{{ $vehicle->brand }} {{ $vehicle->model }} ({{ $vehicle->year }})</option>
        @endforeach
    </select>
    @error('vehicle_id')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="quote_id" class="form-label">Presupuesto</label>
    <select name="quote_id" id="quote_id" class="form-control">
        <option value="">Sin presupuesto</option>
        @foreach($quotes as $quote)
            <option value="{{ $quote->id }}" {{ old('quote_id', $workOrder->quote_id ?? '') == $quote->id ? 'selected' : '' }}>#{{ $quote->id }} - {{ $quote->description }}</option>
        @endforeach
    </select>
    @error('quote_id')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="description" class="form-label">Descripción</label>
    <textarea name="description" id="description" class="form-control" required>{{ old('description', $workOrder->description ?? '') }}</textarea>
    @error('description')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="status" class="form-label">Estado</label>
    <select name="status" id="status" class="form-control" required>
        <option value="En espera" {{ old('status', $workOrder->status ?? '') == 'En espera' ? 'selected' : '' }}>En espera</option>
        <option value="En proceso" {{ old('status', $workOrder->status ?? '') == 'En proceso' ? 'selected' : '' }}>En proceso</option>
        <option value="Finalizada" {{ old('status', $workOrder->status ?? '') == 'Finalizada' ? 'selected' : '' }}>Finalizada</option>
        <option value="Facturada" {{ old('status', $workOrder->status ?? '') == 'Facturada' ? 'selected' : '' }}>Facturada</option>
    </select>
    @error('status')<div class="text-danger">{{ $message }}</div>@enderror
</div>

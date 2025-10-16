<div class="mb-3">
    <label for="work_order_id" class="form-label">Orden de Trabajo</label>
    <select name="work_order_id" id="work_order_id" class="form-control" required>
        <option value="">Seleccione una OT</option>
        @foreach($workOrders as $wo)
            <option value="{{ $wo->id }}" {{ old('work_order_id', $invoice->work_order_id ?? '') == $wo->id ? 'selected' : '' }}>#{{ $wo->id }}</option>
        @endforeach
    </select>
    @error('work_order_id')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="client_id" class="form-label">Cliente</label>
    <select name="client_id" id="client_id" class="form-control" required>
        <option value="">Seleccione un cliente</option>
        @foreach($clients as $client)
            <option value="{{ $client->id }}" {{ old('client_id', $invoice->client_id ?? '') == $client->id ? 'selected' : '' }}>{{ $client->name }} {{ $client->last_name }}</option>
        @endforeach
    </select>
    @error('client_id')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="total" class="form-label">Total</label>
    <input type="number" name="total" id="total" class="form-control" value="{{ old('total', $invoice->total ?? 0) }}" min="0" step="0.01" required>
    @error('total')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="tax_amount" class="form-label">Impuesto</label>
    <input type="number" name="tax_amount" id="tax_amount" class="form-control" value="{{ old('tax_amount', $invoice->tax_amount ?? 0) }}" min="0" step="0.01" required>
    @error('tax_amount')<div class="text-danger">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
    <label for="issue_date" class="form-label">Fecha</label>
    <input type="date" name="issue_date" id="issue_date" class="form-control" value="{{ old('issue_date', $invoice->issue_date ?? '') }}" required>
    @error('issue_date')<div class="text-danger">{{ $message }}</div>@enderror
</div>

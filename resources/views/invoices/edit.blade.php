@extends('layouts.app')

@section('content')
    <h2>Edit Invoice</h2>

    <form method="POST" action="{{ route('invoices.update', $invoice) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="client_name">Client Name</label>
            <input type="text" id="client_name" name="client_name" value="{{ old('client_name', $invoice->client_name) }}" required>
        </div>

        <div>
            <label for="client_email">Client Email</label>
            <input type="email" id="client_email" name="client_email" value="{{ old('client_email', $invoice->client_email) }}" required>
        </div>

        <div>
            <label for="amount">Amount</label>
            <input type="number" id="amount" name="amount" value="{{ old('amount', $invoice->amount) }}" required>
        </div>

        <div>
            <label for="due_date">Due Date</label>
            <input type="date" id="due_date" name="due_date" value="{{ old('due_date', $invoice->due_date) }}" required>
        </div>

        <button type="submit">Update Invoice</button>
    </form>
@endsection

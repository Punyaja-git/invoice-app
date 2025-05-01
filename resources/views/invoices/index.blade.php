<h2>My Invoices</h2>
<a href="{{ route('invoices.create') }}">Create Invoice</a>

@foreach ($invoices as $invoice)
    <div>
        <p>{{ $invoice->client_name }} - ${{ $invoice->amount }} - {{ $invoice->status }}</p>
        <a href="{{ route('invoices.edit', $invoice) }}">Edit</a>
        <form method="POST" action="{{ route('invoices.destroy', $invoice) }}">
            @csrf @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach

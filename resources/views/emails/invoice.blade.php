<!-- resources/views/emails/invoice.blade.php -->
<h1>Invoice for {{ $invoice->client_name }}</h1>
<p>Amount: ${{ number_format($invoice->amount, 2) }}</p>
<p>Status: {{ $invoice->status }}</p>
<p>Due Date: {{ \Carbon\Carbon::parse($invoice->due_date)->format('M d, Y') }}</p>

<p>Thank you for your business!</p>

<!-- resources/views/emails/invoice.blade.php -->

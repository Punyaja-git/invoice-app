<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice PDF</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .invoice-box { padding: 30px; }
        h2 { border-bottom: 1px solid #ccc; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <h2>Invoice #{{ $invoice->id }}</h2>
        <p><strong>Client:</strong> {{ $invoice->client_name }}</p>
        <p><strong>Email:</strong> {{ $invoice->client_email }}</p>
        <p><strong>Amount:</strong> ${{ number_format($invoice->amount, 2) }}</p>
        <p><strong>Status:</strong> {{ ucfirst($invoice->status) }}</p>
        <p><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($invoice->due_date)->format('M d, Y') }}</p>
    </div>
</body>
</html>

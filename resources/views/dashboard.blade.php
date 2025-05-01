@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h1>Welcome, {{ auth()->user()->name }}</h1>
        </div>
        <div class="col text-end">
            <!-- Button trigger Create Invoice Modal -->
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createInvoiceModal">Create Invoice</button>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Invoices -->
    <div class="row">
        <div class="col">
            <h3>Your Invoices</h3>

            @if($invoices->isEmpty())
                <div class="alert alert-warning">No invoices found. Start by creating one!</div>
            @else
                @foreach($invoices as $invoice)
                    <div class="card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5>{{ $invoice->client_name }}</h5>
                                <p class="mb-1">${{ number_format($invoice->amount, 2) }} - <strong>{{ ucfirst($invoice->status) }}</strong></p>
                                <small>Due: {{ \Carbon\Carbon::parse($invoice->due_date)->format('M d, Y') }}</small>
                            </div>
                            <div class="text-end">
                                <!-- Edit Button -->
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editInvoiceModal{{ $invoice->id }}">Edit</button>

                                <!-- Delete Form -->
                                <form action="{{ route('dashboard.invoice.destroy', $invoice) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this invoice?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                            <div class="text-end">
                                <!-- View PDF Button -->
                                <a href="{{ route('dashboard.invoice.pdf', $invoice) }}" class="btn btn-info btn-sm" target="_blank">View PDF</a>
                        </div>
                            {{-- <div class="text-end">
                                <!-- Download PDF Button -->
                                <a href="{{ route('dashboard.invoice.download', $invoice) }}" class="btn btn-secondary btn-sm" target="_blank">Download PDF</a>
                            </div> --}}
                            <div class="text-end">
                                <a href="{{ route('dashboard.invoice.email', $invoice) }}" class="btn btn-primary btn-sm">Email</a>
                            </div>
                                <!-- Email Invoice Button -->






                    </div>

                    <!-- Edit Invoice Modal -->
                    <div class="modal fade" id="editInvoiceModal{{ $invoice->id }}" tabindex="-1" aria-labelledby="editInvoiceLabel{{ $invoice->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('dashboard.invoice.update', $invoice) }}" method="POST" class="modal-content">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editInvoiceLabel{{ $invoice->id }}">Edit Invoice</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label>Client Name</label>
                                        <input type="text" name="client_name" class="form-control" value="{{ $invoice->client_name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Client Email</label>
                                        <input type="email" name="client_email" class="form-control" value="{{ $invoice->client_email }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Amount</label>
                                        <input type="number" name="amount" class="form-control" value="{{ $invoice->amount }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label>Due Date</label>
                                        <input type="date" name="due_date" class="form-control" value="{{ \Carbon\Carbon::parse($invoice->due_date)->format('Y-m-d') }}" required>

                                    </div>
                                    <div class="mb-3">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="unpaid" {{ $invoice->status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
                                            <option value="paid" {{ $invoice->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

<!-- Create Invoice Modal -->
<div class="modal fade" id="createInvoiceModal" tabindex="-1" aria-labelledby="createInvoiceLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('dashboard.invoice.store') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="createInvoiceLabel">Create New Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Client Name</label>
                    <input type="text" name="client_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Client Email</label>
                    <input type="email" name="client_email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Amount</label>
                    <input type="number" name="amount" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Due Date</label>
                    <input type="date" name="due_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="unpaid" selected>Unpaid</option>
                        <option value="paid">Paid</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection

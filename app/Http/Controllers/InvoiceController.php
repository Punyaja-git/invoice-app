<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    // Show form to create a new invoice
    public function create()
    {
        return view('invoices.create');
    }

    // Store the new invoice in the database
    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required',
            'client_email' => 'required|email',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
        ]);

        auth()->user()->invoices()->create($request->all());

        return redirect()->route('dashboard');
    }

    // Show form to edit an existing invoice
    public function edit(Invoice $invoice)
    {
        return view('invoices.edit', compact('invoice'));
    }

    // Update an existing invoice
    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'client_name' => 'required',
            'client_email' => 'required|email',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
        ]);

        $invoice->update($request->all());

        return redirect()->route('dashboard');
    }

    // Delete an invoice
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        return redirect()->route('dashboard');
    }
}

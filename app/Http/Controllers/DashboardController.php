<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;

class DashboardController extends Controller
{
    public function sendEmail(Invoice $invoice)
    {
        Mail::to($invoice->client_email)->send(new InvoiceMail($invoice));
        return back()->with('success', 'Invoice email sent successfully.');
    }
public function downloadPDF(Invoice $invoice)
{
    $pdf = Pdf::loadView('invoices.pdf', compact('invoice'));
    return $pdf->download('invoice_'.$invoice->id.'.pdf');
}

    // Show dashboard with list of invoices
    public function index()
    {
        $invoices = Auth::user()->invoices()->latest()->get();
        return view('dashboard', compact('invoices'));
    }

    // Show the dashboard with form for creating invoice
    public function create()
    {
        $invoices = auth()->user()->invoices;
        return view('dashboard', compact('invoices'))->with('showForm', true);
    }

    // Store a new invoice
    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_email' => 'required|email',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
        ]);

        Auth::user()->invoices()->create([
            'client_name' => $request->client_name,
            'client_email' => $request->client_email,
            'amount' => $request->amount,
            'due_date' => $request->due_date,
            'status' => $request->status ?? 'unpaid',
        ]);

        return redirect()->route('dashboard')->with('success', 'Invoice created successfully.');
    }

    // Show form to edit an invoice
    public function edit(Invoice $invoice)
    {
        $this->authorize('update', $invoice);

        $invoices = Auth::user()->invoices()->latest()->get();
        return view('dashboard', compact('invoices', 'invoice'));
    }

    // Update an existing invoice
    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'client_name' => 'required',
            'client_email' => 'required|email',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
            'status' => 'required|string',
        ]);

        $invoice->update($request->only(['client_name', 'client_email', 'amount', 'due_date', 'status']));

        return redirect()->route('dashboard')->with('success', 'Invoice updated successfully.');
    }


    // Delete an invoice
    public function destroy(Invoice $invoice)
    {
        $this->authorize('delete', $invoice);
        $invoice->delete();

        return redirect()->route('dashboard')->with('success', 'Invoice deleted successfully.');
    }
}

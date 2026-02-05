@extends('Student.layouts.app')
@section('title', 'My Payment | IrsDesign Academy')
@push('styles')
    <link rel="stylesheet" href="{{ asset('student/css/payment.css') }}">
@endpush

@section('content')

    <div class="wrap">

        <!-- Header -->
        <div class="page-title">
            <h3>My Payment</h3>
        </div>

        @foreach ($payments as $index => $payment)
            <div class="p-card">
                <div class="sec-head">
                    <h6 class="sec-title">
                        <span class="sec-icn"><i class="bi bi-bullseye"></i></span>
                        Attempt {{ $index + 1 }} - History
                    </h6>
                    <span class="sec-badge">
                        <i class="bi bi-shield-check"></i> Secured Payments
                    </span>
                </div>

                <div class="scroll-x">
                    <table class="p-table">
                        <thead>
                            <tr>
                                <th class="text-center">Description</th>
                                <th class="text-center">Payment Date</th>
                                <th class="text-center">Method</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Transaction ID</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Invoice</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($payment->installments->where('status', 'paid') as $installment)
                                <tr>
                                    <td class="text-center">
                                        {{ ucfirst($installment->installment_number) }} Installment
                                    </td>
                                    <td class="text-center">
                                        {{ $installment->updated_at->format('d-m-Y') }}
                                    </td>
                                    <td class="text-center">Online</td>
                                    <td class="text-center">
                                        ₹{{ number_format($installment->amount, 2) }}
                                    </td>
                                    <td class="text-center">
                                        {{ $payment->razorpay_order_id }}
                                    </td>
                                    <td class="text-center">
                                        <span class="status-paid">
                                            <i class="bi bi-check-circle-fill"></i> Paid
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-invoice"
                                            onclick="downloadInvoicePDF({
                                desc:'Installment {{ $installment->installment_number }}',
                                date:'{{ $installment->updated_at->format('d-m-Y') }}',
                                method:'Online',
                                amount:'₹{{ number_format($installment->amount, 2) }}',
                                txn:'{{ $payment->razorpay_order_id }}',
                                status:'Paid'
                            })">
                                            <i class="bi bi-download"></i> Invoice
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach


        <!--  2) Attempt Payments -->
        @foreach ($payments as $index => $payment)
            <div class="p-card">
                <div class="sec-head">
                    <h6 class="sec-title">
                        <span class="sec-icn"><i class="bi bi-cash-coin"></i></span>
                        Attempt {{ $index + 1 }} - Payments
                    </h6>
                    <span class="sec-badge">
                        <i class="bi bi-lock-fill"></i> Payment Secured
                    </span>
                </div>

                <div class="scroll-x">
                    <table class="p-table" style="min-width:900px;">
                        <thead>
                            <tr>
                                <th class="text-center">Installment</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Due Date</th>
                                <th class="text-center">Paid On</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($payment->installments as $installment)
                                <tr>
                                    <td class="text-center">
                                        {{ $installment->installment_number }} Installment
                                    </td>
                                    <td class="text-center">
                                        ₹{{ number_format($installment->amount, 2) }}
                                    </td>
                                    <td class="text-center">
                                        {{ optional($installment->due_date)->format('d-m-Y') ?? '-' }}
                                    </td>
                                    <td class="text-center">
                                        {{ $installment->status === 'paid' ? $installment->updated_at->format('d-m-Y') : '-' }}
                                    </td>
                                    <td class="text-center">
                                        @if ($installment->status === 'paid')
                                            <span class="pill paid">
                                                <i class="bi bi-check-circle-fill"></i> Paid
                                            </span>
                                        @else
                                            <span class="pill pending">
                                                <i class="bi bi-clock-fill"></i> Pending
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($installment->status === 'paid')
                                            <span class="pill complete">
                                                <i class="bi bi-clipboard-check-fill"></i> Completed
                                            </span>
                                        @else
                                            <button class="btn btn-warning btn-sm"
                                                onclick="payInstallment({{ $payment->course_id }})">
                                                Pay Now
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach

    </div>

@endsection
@push('scripts')
    <!--  jsPDF CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    {{-- <script>
        function downloadInvoicePDF(data) {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF("p", "mm", "a4");

            const pageWidth = doc.internal.pageSize.getWidth();
            const pageHeight = doc.internal.pageSize.getHeight();

            /* ===============================
               1) FULL PAGE BLACK BACKGROUND
            ================================ */
            doc.setFillColor(0, 0, 0); // RGB Black
            doc.rect(0, 0, pageWidth, pageHeight, "F"); // F = Fill

            /* ===============================
                2) PREMIUM TOP HEADER STRIP
               Orange + Yellow
            ================================ */
            doc.setFillColor(255, 122, 24); // Orange
            doc.rect(0, 0, pageWidth, 22, "F");

            doc.setFillColor(255, 204, 0); // Yellow
            doc.rect(0, 22, pageWidth, 6, "F");

            /* ===============================
               3) CENTER TITLE (White Text)
            ================================ */
            doc.setTextColor(255, 255, 255); // White

            doc.setFontSize(18);
            doc.text("IRSDESIGN ACADEMY INVOICE", pageWidth / 2, 15, {
                align: "center"
            });

            doc.setFontSize(11);
            doc.text("This is a computer generated invoice for payment confirmation.", pageWidth / 2, 34, {
                align: "center"
            });

            /* ===============================
                4) WHITE CONTENT BOX
            ================================ */
            doc.setFillColor(20, 20, 20); // dark gray box
            doc.roundedRect(14, 45, pageWidth - 28, 95, 6, 6, "F");

            /* ===============================
               Example details text inside box
            ================================ */
            doc.setFontSize(12);
            doc.setTextColor(255, 255, 255); // white text

            let y = 58;
            doc.text("Description : Registration Fee", 22, y);
            y += 10;
            doc.text("Payment Date : 19-12-2024", 22, y);
            y += 10;
            doc.text("Payment Method : Offline", 22, y);
            y += 10;
            doc.text("Amount : ₹5,000.00", 22, y);
            y += 10;
            doc.text("Transaction ID : order_GRT4bko0SrGCKR", 22, y);
            y += 10;
            doc.text("Status : Paid", 22, y);

            /*  Download */
            doc.save("invoice.pdf");

        }
    </script> --}}
@endpush

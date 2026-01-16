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

            <!--  1) Attempt History -->
            <div class="p-card">
                <div class="sec-head">
                    <h6 class="sec-title">
                        <span class="sec-icn"><i class="bi bi-bullseye"></i></span>
                        Attempt 1 - History
                    </h6>
                    <span class="sec-badge"><i class="bi bi-shield-check"></i> Secured Payments</span>
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
                            <tr>
                                <td class="text-center">Registration Fee</td>
                                <td class="text-center">19-12-2025</td>
                                <td class="text-center">Offline</td>
                                <td class="text-center">₹5,000.00</td>
                                <td class="text-center">order_GRT4bko0SrGCKR</td>
                                <td class="text-center"><span class="status-paid"><i
                                            class="bi bi-check-circle-fill"></i> Paid</span></td>
                                <td class="text-center">
                                    <button class="btn btn-invoice" onclick="downloadInvoicePDF({
                  desc:'Registration Fee',
                  date:'19-12-2024',
                  method:'Offline',
                  amount:'₹5,000.00',
                  txn:'order_GRT4bko0SrGCKR',
                  status:'Paid'
                })">
                                        <i class="bi bi-download"></i> Invoice
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">1st Installment</td>
                                <td class="text-center">19-12-2025</td>
                                <td class="text-center">Offline</td>
                                <td class="text-center">₹22,500.00</td>
                                <td class="text-center">order_TyIKtorvcPv5Kl</td>
                                <td class="text-center"><span class="status-paid"><i
                                            class="bi bi-check-circle-fill"></i> Paid</span></td>
                                <td class="text-center">
                                    <button class="btn btn-invoice" onclick="downloadInvoicePDF({
                  desc:'1st Installment',
                  date:'19-12-2024',
                  method:'Offline',
                  amount:'₹22,500.00',
                  txn:'order_TyIKtorvcPv5Kl',
                  status:'Paid'
                })">
                                        <i class="bi bi-download"></i> Invoice
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">2nd Installment</td>
                                <td class="text-center">19-12-2025</td>
                                <td class="text-center">Offline</td>
                                <td class="text-center">₹22,500.00</td>
                                <td class="text-center">order_Lp25Drq3lE_xqf</td>
                                <td class="text-center"><span class="status-paid"><i
                                            class="bi bi-check-circle-fill"></i> Paid</span></td>
                                <td class="text-center">
                                    <button class="btn btn-invoice" onclick="downloadInvoicePDF({
                  desc:'2nd Installment',
                  date:'19-12-2024',
                  method:'Offline',
                  amount:'₹22,500.00',
                  txn:'order_Lp25Drq3lE_xqf',
                  status:'Paid'
                })">
                                        <i class="bi bi-download"></i> Invoice
                                    </button>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

            <!--  2) Attempt Payments -->
            <div class="p-card">
                <div class="sec-head">
                    <h6 class="sec-title">
                        <span class="sec-icn"><i class="bi bi-cash-coin"></i></span>
                        Attempt 1 - Payments
                    </h6>
                    <span class="sec-badge"><i class="bi bi-lock-fill"></i> Payment Secured</span>
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
                            <tr>
                                <td class="text-center">1st Installment</td>
                                <td class="text-center">₹22,500.00</td>
                                <td class="text-center">15-03-2025</td>
                                <td class="text-center">15-03-2025</td>
                                <td class="text-center"><span class="pill paid"><i class="bi bi-check-circle-fill"></i>
                                        Paid</span></td>
                                <td class="text-center"><span class="pill complete"><i
                                            class="bi bi-clipboard-check-fill"></i>
                                        Completed</span>
                                </td>
                            </tr>

                            <tr>
                                <td class="text-center">2nd Installment</td>
                                <td class="text-center">₹22,500.00</td>
                                <td class="text-center">15-04-2025</td>
                                <td class="text-center">15-04-2025</td>
                                <td class="text-center"><span class="pill paid"><i class="bi bi-check-circle-fill"></i>
                                        Paid</span></td>
                                <td class="text-center"><span class="pill complete"><i
                                            class="bi bi-clipboard-check-fill"></i>
                                        Completed</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>

            <!-- 3) Other Payments -->
            <div class="p-card">
                <div class="sec-head">
                    <h6 class="sec-title">
                        <span class="sec-icn"><i class="bi bi-wallet2"></i></span>
                        Other Payments
                    </h6>
                    <span class="sec-badge"><i class="bi bi-info-circle-fill"></i> Extra Payments</span>
                </div>

                <div class="scroll-x">
                    <table class="p-table" style="min-width: 700px;">
                        <thead>
                            <tr>
                                <th class="text-center">Description</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="text-center" colspan="5">
                                    <div class="no-data">No data</div>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

        </div>

@endsection
@push('scripts')

 <!--  jsPDF CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
     <script>
        function downloadInvoicePDF(data) {
            const { jsPDF } = window.jspdf;
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
            doc.text("IRSDESIGN ACADEMY INVOICE", pageWidth / 2, 15, { align: "center" });

            doc.setFontSize(11);
            doc.text("This is a computer generated invoice for payment confirmation.", pageWidth / 2, 34, { align: "center" });

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
            doc.text("Description : Registration Fee", 22, y); y += 10;
            doc.text("Payment Date : 19-12-2024", 22, y); y += 10;
            doc.text("Payment Method : Offline", 22, y); y += 10;
            doc.text("Amount : ₹5,000.00", 22, y); y += 10;
            doc.text("Transaction ID : order_GRT4bko0SrGCKR", 22, y); y += 10;
            doc.text("Status : Paid", 22, y);

            /*  Download */
            doc.save("invoice.pdf");

        }
    </script>

@endpush
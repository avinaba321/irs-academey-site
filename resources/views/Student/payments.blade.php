@extends('Student.layouts.app')
@section('title', 'My Payment | IrsDesign Academy')
@push('styles')
    <link rel="stylesheet" href="{{ asset('student/css/payment.css') }}">
    <style>
        .pill.locked {
            background: rgba(255, 255, 255, 0.08);
            color: #aaa;
            padding: 6px 10px;
            border-radius: 12px;
            font-size: 0.85rem;
        }
    </style>
@endpush

@section('content')

    <div class="wrap">

        <!-- Header -->
        <div class="page-title">
            <h3>My Payment</h3>
        </div>

        @forelse ($payments as $index => $payment)

    @php
        $activeInstallmentId = optional(
            $payment->installments->where('status', 'pending')->sortBy('installment_number')->first(),
        )->id;
    @endphp

    <div class="p-card">
        <div class="sec-head">
            <h6 class="sec-title">
                <span class="sec-icn"><i class="bi bi-cash-coin"></i></span>
                Payment {{ $index + 1 }} - {{ $payment->course->title ?? 'Course' }}
            </h6>
            <span class="sec-badge">
                <i class="bi bi-lock-fill"></i> Payment Secured
            </span>
        </div>

        {{-- ✅ PAYMENT SUMMARY --}}
        <div class="p-summary mb-3">
            <div class="row">
                <div class="col-md-2">
                    <small class="text-white">Payment Type</small>
                    <h6>
                        @if($payment->payment_type === 'full')
                            <span class="badge bg-primary">Full Payment</span>
                        @else
                            <span class="badge bg-info">Installment</span>
                        @endif
                    </h6>
                </div>
                <div class="col-md-2">
                    <small class="text-white">Total</small>
                    <h6>₹{{ number_format($payment->total_amount, 2) }}</h6>
                </div>
                <div class="col-md-2">
                    <small class="text-white">Paid</small>
                    <h6 class="text-success">₹{{ number_format($payment->paid_amount, 2) }}</h6>
                </div>
                <div class="col-md-2">
                    <small class="text-white">Remaining</small>
                    <h6 class="text-danger">₹{{ number_format($payment->remaining_amount, 2) }}</h6>
                </div>
                <div class="col-md-2">
                    <small class="text-white">Status</small>
                    <h6>
                        @if($payment->payment_status === 'completed')
                            <span class="badge bg-success">Completed</span>
                        @elseif($payment->payment_status === 'pending')
                            <span class="badge bg-warning">Pending</span>
                        @else
                            <span class="badge bg-danger">Failed</span>
                        @endif
                    </h6>
                </div>
                <div class="col-md-2">
                    <small class="text-white">Date</small>
                    <h6>{{ $payment->created_at->format('d-m-Y') }}</h6>
                </div>
            </div>
        </div>

        {{-- ✅ FULL PAYMENT TABLE --}}
        @if($payment->payment_type === 'full')
        <div class="scroll-x">
            <table class="p-table" style="min-width:900px;">
                <thead>
                    <tr>
                        <th class="text-center">Payment Type</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Paid On</th>
                        <th class="text-center">Transaction ID</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">
                            <strong>Full Payment</strong>
                        </td>
                        <td class="text-center">
                            ₹{{ number_format($payment->total_amount, 2) }}
                        </td>
                        <td class="text-center">
                            {{ $payment->updated_at->format('d-m-Y h:i A') }}
                        </td>
                        <td class="text-center">
                            <small class="text-white font-monospace">
                                {{ Str::limit($payment->razorpay_order_id, 20) }}
                            </small>
                        </td>
                        <td class="text-center">
                            @if ($payment->payment_status === 'completed')
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
                            @if($payment->payment_status === 'completed')
                                <a href="{{ route('student.invoice.download', $payment->id) }}" 
                                   class="btn btn-invoice">
                                    <i class="bi bi-download"></i> Invoice
                                </a>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @endif

        {{-- ✅ INSTALLMENT PAYMENT TABLE --}}
        @if($payment->payment_type === 'installment')
        <div class="scroll-x">
            <table class="p-table" style="min-width:900px;">
                <thead>
                    <tr>
                        <th class="text-center">Installment</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Paid On</th>
                        <th class="text-center">Transaction ID</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                        <th class="text-center">Invoice</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($payment->installments as $installment)
                        <tr>
                            <td class="text-center">
                                <strong>Installment {{ $installment->installment_number }}</strong>
                                <small class="text-muted d-block">of {{ $payment->total_installments }}</small>
                            </td>
                            <td class="text-center">
                                ₹{{ number_format($installment->amount, 2) }}
                            </td>
                            <td class="text-center">
                                {{ $installment->paid_at ? $installment->paid_at->format('d-m-Y h:i A') : '-' }}
                            </td>
                            <td class="text-center">
                                @if($installment->razorpay_payment_id)
                                    <small class="text-muted font-monospace">
                                        {{ Str::limit($installment->razorpay_payment_id, 20) }}
                                    </small>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
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
                                @elseif ($installment->id === $activeInstallmentId)
                                    <button class="btn btn-warning btn-sm payInstallmentBtn"
                                        data-course-id="{{ $payment->course_id }}" 
                                        data-payment-type="installment">
                                        <i class="bi bi-credit-card"></i> Pay Now
                                    </button>
                                @else
                                    <span class="pill locked">
                                        <i class="bi bi-lock-fill"></i> Locked
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($installment->status === 'paid')
                                    <a href="{{ route('student.invoice.download', $installment->id) }}"
                                        class="btn btn-invoice">
                                        <i class="bi bi-download"></i> Invoice
                                    </a>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                <i class="bi bi-inbox" style="font-size:30px;"></i>
                                <p class="mb-0 mt-2">No installments found</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @endif
    </div>

@empty
    {{-- ✅ NO PAYMENTS AT ALL --}}
    <div class="p-card text-center">
        <div class="no-data py-5">
            <i class="bi bi-wallet2" style="font-size:40px; color: #ccc;"></i>
            <h5 class="mt-3">No payments found</h5>
            <p class="text-muted">You haven't made any payments yet.</p>
        </div>
    </div>
@endforelse


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
    {{-- <script>
        let selectedCourseId = null;

        document.querySelectorAll('.purchaseBtn').forEach(btn => {
            btn.addEventListener('click', function() {

                const profileComplete = this.dataset.profileComplete === '1';

                if (!profileComplete) {
                    openEditModal();
                    return;
                }

                selectedCourseId = this.dataset.courseId;

                new bootstrap.Modal(
                    document.getElementById('paymentChoiceModal')
                ).show();
            });
        });

        function payNow(type) {

            fetch("{{ route('student.payment.initiate') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        course_id: selectedCourseId,
                        payment_type: type
                    })
                })
                .then(res => res.json())
                .then(data => {

                    if (!data.success) {
                        alert(data.message || 'Payment failed');
                        return;
                    }

                    const options = {
                        key: data.key,
                        amount: data.amount,
                        currency: "INR",
                        name: "Your Academy",
                        description: "Course Payment",
                        order_id: data.order_id,

                        // ✅ SUCCESS
                        handler: function(response) {

                            fetch("{{ route('student.payment.verify') }}", {
                                    method: "POST",
                                    headers: {
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                        "Content-Type": "application/json",
                                        "Accept": "application/json"
                                    },
                                    body: JSON.stringify({
                                        razorpay_payment_id: response.razorpay_payment_id,
                                        razorpay_order_id: response.razorpay_order_id,
                                        razorpay_signature: response.razorpay_signature
                                    })
                                })
                                .then(res => res.json())
                                .then(result => {
                                    if (result.success) {
                                        alert("Payment successful 🎉");
                                        location.reload();
                                    } else {
                                        alert("Payment verification failed");
                                    }
                                });
                        },

                        // ❌ USER CLOSED POPUP
                        modal: {
                            ondismiss: function() {
                                fetch("{{ route('student.payment.fail') }}", {
                                    method: "POST",
                                    headers: {
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                        "Content-Type": "application/json"
                                    },
                                    body: JSON.stringify({
                                        razorpay_order_id: data.order_id,
                                        reason: 'User closed payment popup'
                                    })
                                });
                            }
                        }
                    };

                    // ✅ CREATE INSTANCE FIRST
                    const rzp = new Razorpay(options);

                    // ❌ PAYMENT FAILED EVENT
                    rzp.on('payment.failed', function(response) {

                        fetch("{{ route('student.payment.fail') }}", {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({
                                razorpay_order_id: response.error.metadata.order_id,
                                reason: response.error.reason
                            })
                        });

                        alert(response.error.description || 'Payment failed');
                    });

                    // 🚀 OPEN RAZORPAY
                    rzp.open();
                })
                .catch(() => {
                    alert("Payment initiation failed");
                });
        }
    </script>  --}}

    {{-- <script src="https://checkout.razorpay.com/v1/checkout.js"></script> --}}
    <script>
        // Handle installment payment buttons
        document.querySelectorAll('.payInstallmentBtn').forEach(btn => {
            btn.addEventListener('click', function() {
                const courseId = this.dataset.courseId;
                const paymentType = this.dataset.paymentType;

                payNow(paymentType, courseId);
            });
        });

        function payNow(type, courseId) {

            // Validate course ID
            if (!courseId) {
                alert('Course ID is missing');
                return;
            }

            fetch("{{ route('student.payment.initiate') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        course_id: courseId,
                        payment_type: type
                    })
                })
                .then(res => res.json())
                .then(data => {

                    if (!data.success) {
                        alert(data.message || 'Payment failed');
                        return;
                    }

                    const options = {
                        key: data.key,
                        amount: data.amount,
                        currency: "INR",
                        name: "IRS Academy",
                        description: type === 'full' ? "Full Course Payment" : "Installment Payment",
                        order_id: data.order_id,

                        // ✅ SUCCESS
                        handler: function(response) {
                            fetch("{{ route('student.payment.verify') }}", {
                                    method: "POST",
                                    headers: {
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                        "Content-Type": "application/json",
                                        "Accept": "application/json"
                                    },
                                    body: JSON.stringify({
                                        razorpay_payment_id: response.razorpay_payment_id,
                                        razorpay_order_id: response.razorpay_order_id,
                                        razorpay_signature: response.razorpay_signature
                                    })
                                })
                                .then(res => res.json())
                                .then(result => {
                                    if (result.success) {
                                        alert("Payment successful 🎉");
                                        location.reload();
                                    } else {
                                        alert("Payment verification failed");
                                    }
                                })
                                .catch(error => {
                                    console.error('Verification error:', error);
                                    alert("Payment verification failed");
                                });
                        },

                        // ❌ USER CLOSED POPUP
                        modal: {
                            ondismiss: function() {
                                fetch("{{ route('student.payment.fail') }}", {
                                    method: "POST",
                                    headers: {
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                        "Content-Type": "application/json"
                                    },
                                    body: JSON.stringify({
                                        razorpay_order_id: data.order_id,
                                        reason: 'User closed payment popup'
                                    })
                                });
                            }
                        },

                        theme: {
                            color: "#3399cc"
                        }
                    };

                    // ✅ CREATE RAZORPAY INSTANCE
                    const rzp = new Razorpay(options);

                    // ❌ PAYMENT FAILED EVENT
                    rzp.on('payment.failed', function(response) {
                        fetch("{{ route('student.payment.fail') }}", {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({
                                razorpay_order_id: response.error.metadata.order_id,
                                reason: response.error.reason
                            })
                        });

                        alert(response.error.description || 'Payment failed');
                    });

                    // 🚀 OPEN RAZORPAY
                    rzp.open();
                })
                .catch(error => {
                    console.error('Payment initiation error:', error);
                    alert("Payment initiation failed");
                });
        }
    </script>
    {{-- <script>
function downloadInvoicePDF(data) {

    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    const pageWidth = doc.internal.pageSize.getWidth();

    /* ================= HEADER ================= */
    doc.setFillColor(0, 0, 0);
    doc.rect(0, 0, pageWidth, 25, 'F');

    doc.setTextColor(255, 255, 255);
    doc.setFontSize(16);
    doc.text("IRSDESIGN ACADEMY", pageWidth / 2, 15, { align: 'center' });

    /* ================= BODY ================= */
    doc.setTextColor(0, 0, 0);
    doc.setFontSize(12);

    let y = 40;

    doc.text(`Course          : ${data.course}`, 20, y); y += 8;
    doc.text(`Description     : ${data.desc}`, 20, y); y += 8;
    doc.text(`Payment Date    : ${data.date}`, 20, y); y += 8;
    doc.text(`Payment Method  : ${data.method}`, 20, y); y += 8;
    doc.text(`Amount Paid     : ${data.amount}`, 20, y); y += 8;
    doc.text(`Transaction ID  : ${data.txn}`, 20, y); y += 8;
    doc.text(`Status          : ${data.status}`, 20, y);

    /* ================= FOOTER ================= */
    doc.setFontSize(10);
    doc.setTextColor(120);
    doc.text(
        "This is a system generated invoice. No signature required.",
        pageWidth / 2,
        280,
        { align: 'center' }
    );

    doc.save(`${data.desc.replace(' ', '_')}_Invoice.pdf`);
}
</script> --}}
@endpush

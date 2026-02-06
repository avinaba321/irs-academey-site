<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background: #000;
            color: #fff;
            padding: 30px;
        }

        .header {
            background: #ffcc00;
            padding: 15px;
            text-align: center;
        }

        .header img {
            height: 60px;
            margin-bottom: 10px;
        }

        .header h2 {
            margin: 0;
            color: #000;
        }

        .box {
            background: #111;
            padding: 25px;
            margin-top: 20px;
            border-radius: 8px;
        }

        .row {
            margin-bottom: 10px;
        }

        .label {
            color: #ffcc00;
            font-weight: bold;
            width: 180px;
            display: inline-block;
        }

        .footer {
            margin-top: 40px;
            font-size: 12px;
            text-align: center;
            color: #aaa;
        }
    </style>
</head>

<body>

    <div class="header">
        {{-- LOGO --}}
        <img src="{{ public_path('student/images/logo.png') }}" alt="Logo">

        <h2>IRSDESIGN ACADEMY</h2>
        <p>Payment Invoice</p>
    </div>

    <div class="box">
        <div class="row">
            <span class="label">Student Name:</span>
            {{ $student->full_name }}
        </div>

        <div class="row">
            <span class="label">Course:</span>
            {{ $payment->course->title ?? 'Course' }}
        </div>

        <div class="row">
            <span class="label">Installment:</span>
            {{ $installment->installment_number }}
        </div>

        <div class="row">
            <span class="label">Amount Paid:</span>
            ₹{{ number_format($installment->amount, 2) }}
        </div>

        <div class="row">
            <span class="label">Payment Date:</span>
            {{ $installment->paid_at->format('d M Y, h:i A') }}
        </div>

        <div class="row">
            <span class="label">Transaction ID:</span>
            {{ $installment->razorpay_payment_id }}
        </div>

        <div class="row">
            <span class="label">Status:</span>
            PAID
        </div>
    </div>

    <div class="footer">
        This is a system-generated invoice. No signature required.<br>
        © {{ date('Y') }} IRSDESIGN Academy
    </div>

</body>
</html>

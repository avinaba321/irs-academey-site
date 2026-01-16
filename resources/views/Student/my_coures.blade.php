@extends('Student.layouts.app')
@section('title', 'My Courses | IrsDesign Academy')
@push('styles')
<link rel="stylesheet" href="{{ asset('student/css/myCourse.css') }}">
@endpush

@section('content')

<div class="page-wrap">

            <!-- Header -->
            <div class="page-title">
                <h3>My Courses</h3>
                <span class="attempt-pill">
                    <i class="bi bi-lightning-charge-fill"></i> Attempt No : 1
                </span>
            </div>

            <!-- Premium Course Card -->
            <div class="course-card">

                <!-- header -->
                <div class="course-head">
                    <div class="left">
                        <h5>Course Fee Summary</h5>
                        <p>All fees shown below include GST & payment breakdown.</p>
                    </div>
                </div>

                <!-- chips -->
                <div class="chip-row">
                    <span class="chip blue">
                        <i class="bi bi-code-slash"></i> Full Fullstack  Course & Training
                    </span>
                </div>

                <div class="card-divider"></div>

                <!-- fee list -->
                <div class="fee-wrap">

                    <div class="fee-row">
                        <div class="fee-left">
                            <div class="fee-title"><i class="bi bi-cash-stack"></i> Total Course Fee</div>
                            <div class="fee-sub">(Including 18% GST)</div>
                        </div>
                        <div class="fee-right">₹45,000.00</div>
                    </div>

                    <div class="fee-row">
                        <div class="fee-left">
                            <div class="fee-title"><i class="bi bi-receipt-cutoff"></i> Registration Fee</div>
                            <div class="fee-sub">(Including 18% GST)</div>
                        </div>
                        <div class="fee-right">₹5,000.00</div>
                    </div>

                    <div class="fee-row">
                        <div class="fee-left">
                            <div class="fee-title"><i class="bi bi-wallet2"></i> Total Fee Due</div>
                            <div class="fee-sub">Payable remaining amount</div>
                        </div>
                        <div class="fee-right due">₹0.00</div>
                    </div>

                    <div class="fee-row">
                        <div class="fee-left">
                            <div class="fee-title"><i class="bi bi-percent"></i> Discount</div>
                            <div class="fee-sub">Scholarship / offer applied</div>
                        </div>
                        <div class="fee-right discount">- ₹20,127.11</div>
                    </div>

                </div>

                <!-- bottom strip -->
                <div class="bottom-strip">
                    <div class="strip-item">
                        <i class="bi bi-credit-card-2-front-fill"></i>
                        <div>
                            Next Payment Amount: <b>N/A</b>
                        </div>
                    </div>

                    <div class="strip-item">
                        <i class="bi bi-calendar-event-fill"></i>
                        <div>
                            Next Payment Date: <b>N/A</b>
                        </div>
                    </div>
                </div>

            </div>

        </div>

@endsection
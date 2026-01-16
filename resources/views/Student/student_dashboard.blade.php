@extends('Student.layouts.app')

@section('content')

 <div class="dash-wrap">

            <!--  Welcome -->
            <div class="welcome-card">
                <div class="welcome-title">Welcome, Sumon Maity</div>
                <p class="welcome-sub">
                    Welcome to your dashboard Sumon Maity, here is your final onboarding date and time.
                </p>
            </div>

            <!--  Top grid -->
            <div class="row g-3">

                <!--  Personal Info -->
                <div class="col-lg-4">
                    <div class="dash-card">
                        <div class="card-head">
                            <h6 class="card-title">Personal Information</h6>
                        </div>

                        <table class="info-table">
                            <tr>
                                <td>Name:</td>
                                <td>Sumon Maity</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td>sumon123@gmail.com</td>
                            </tr>
                            <tr>
                                <td>DOB:</td>
                                <td>1999-11-09</td>
                            </tr>
                            <tr>
                                <td>Contact:</td>
                                <td>9932980326</td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td>MALE</td>
                            </tr>
                            <tr>
                                <td>Blood:</td>
                                <td>AB+</td>
                            </tr>
                            <tr>
                                <td>Guardian:</td>
                                <td>Sudharsan Maity</td>
                            </tr>
                            <tr>
                                <td>Guardian Mobile:</td>
                                <td>9593039722</td>
                            </tr>
                            <tr>
                                <td>Guardian Email:</td>
                                <td>sumon123@gmail.com</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- ✅ Batch Allotment -->
                <div class="col-lg-8">
                    <div class="dash-card">

                        <div class="card-head">
                            <h6 class="card-title">Batch Allotment</h6>
                            <div class="top-dd">
                                FULL STACK COURSE &amp; TRAINING <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>

                        <!-- ✅ Mobile scroll wrapper -->
                        <div class="batch-table scroll-x">
                            <table>
                                <thead>
                                    <tr>
                                        <th style="width: 16%;">Day</th>
                                        <th style="width: 22%;">Time</th>
                                        <th>Batch ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tuesday</td>
                                        <td>11:00 AM - 1:00 PM</td>
                                        <td>WA-087-RAKA-IT-FRJCT-JUL-2025-1</td>
                                    </tr>
                                    <tr>
                                        <td>Thursday</td>
                                        <td>11:00 AM - 1:00 PM</td>
                                        <td>WA-087-RAKA-IT-FRJCT-JUL-2025-1</td>
                                    </tr>
                                    <tr>
                                        <td>Friday</td>
                                        <td>11:00 AM - 1:00 PM</td>
                                        <td>WA-087-RAKA-IT-FRJCT-JUL-2025-1</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <a class="card-link" href="#">View All Batch Allotment</a>
                    </div>
                </div>

            </div>

            <!-- ✅ Bottom grid -->
            <div class="row g-3 mt-1">

                <!-- ✅ Payment History -->
                <div class="col-lg-8">
                    <div class="dash-card">
                        <div class="card-head">
                            <h6 class="card-title">Payment History</h6>
                            <div class="top-dd">
                                Attempt No 1 <i class="bi bi-chevron-down"></i>
                            </div>
                        </div>

                        <div class="payment-wrap">
                            <!-- ✅ Mobile scroll wrapper -->
                            <div class="payment-table scroll-x">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="width: 20%;">Payment Date</th>
                                            <th style="width: 18%;">Method</th>
                                            <th style="width: 18%;">Amount</th>
                                            <th style="width: 24%;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>19/12/2024</td>
                                            <td>Cash</td>
                                            <td>₹ 22500</td>
                                            <td>
                                                <span class="status-pill">
                                                    <i class="bi bi-check-circle-fill"></i> Paid
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>19/12/2024</td>
                                            <td>Cash</td>
                                            <td>₹ 22500</td>
                                            <td>
                                                <span class="status-pill">
                                                    <i class="bi bi-check-circle-fill"></i> Paid
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>19/12/2024</td>
                                            <td>Cash</td>
                                            <td>₹ 5000</td>
                                            <td>
                                                <span class="status-pill">
                                                    <i class="bi bi-check-circle-fill"></i> Paid
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <a class="card-link" href="#">View All History</a>
                        </div>
                    </div>
                </div>

                <!-- ✅ Documentation Progress -->
                <div class="col-lg-4">
                    <div class="dash-card">
                        <div class="card-head">
                            <h6 class="card-title">Documentation Progress Status</h6>
                        </div>

                        <div class="progress-wrap">
                            <div class="doc-item">
                                <div class="doc-left">
                                    <i class="bi bi-geo-alt"></i>
                                    Address Details
                                </div>
                                <span class="done-pill"><i class="bi bi-check-circle-fill"></i> Completed</span>
                            </div>

                            <div class="doc-item">
                                <div class="doc-left">
                                    <i class="bi bi-mortarboard"></i>
                                    Educational Qualification Details
                                </div>
                                <span class="done-pill"><i class="bi bi-check-circle-fill"></i> Completed</span>
                            </div>

                            <div class="doc-item">
                                <div class="doc-left">
                                    <i class="bi bi-upload"></i>
                                    Upload Documents
                                </div>
                                <span class="done-pill"><i class="bi bi-check-circle-fill"></i> Completed</span>
                            </div>

                            <div class="doc-item">
                                <div class="doc-left">
                                    <i class="bi bi-file-earmark-check"></i>
                                    Declaration
                                </div>
                                <span class="done-pill"><i class="bi bi-check-circle-fill"></i> Completed</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
      
@endsection

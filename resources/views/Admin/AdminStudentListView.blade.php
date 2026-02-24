@extends('Admin.layouts.app')

@section('content')

 <div class="container-fluid px-3 px-md-4 mt-4">

            <!-- HEADER -->
            <div class="d-flex flex-column flex-lg-row 
            justify-content-between 
            align-items-start align-items-lg-center 
            gap-3 mb-3">

                <!-- LEFT : TITLE -->
                <div class="text-center text-lg-start w-100">
                    <h5 class="mb-0">Students</h5>
                    <small class="text-muted">Manage all enrolled students</small>
                </div>

                <!-- RIGHT : CONTROLS -->
                <div class="d-flex flex-column flex-sm-row 
                gap-2 gap-sm-3 
                w-100 w-lg-50 w-xl-auto">

                    <select class="form-select form-select-sm shadow-lg">
                        <option>All Course</option>
                        <option>Website Development</option>
                        <option>App Development</option>
                        <option>Big Data</option>
                        <option>Cloud Hosting</option>
                        <option>Content Writing</option>
                        <option>Digital Marketing</option>    
                        <option>Graphic Design</option>    
                        <option>Graphic Design</option>    
                        <option>UI & UX Design</option>    
                    </select>

                    <select class="form-select form-select-sm shadow-lg">
                        <option>All Status</option>
                        <option>Active</option>
                        <option>Inactive</option>
                    </select>

                    <button class="btn btn-primary shadow-lg w-100 w-sm-auto" style="min-width:250px"
                        data-bs-toggle="modal" data-bs-target="#studentModal">
                        <i class="bi bi-plus-lg"></i> Add Student
                    </button>

                </div>
            </div>


            <!-- TABLE -->
            <div class="card border-0 shadow-lg rounded-3">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="text-muted small">
                            <tr>
                                <th class="text-center">#Sl Id</th>
                                <th class="text-center">Student</th>
                                <th class="text-center">Course / Batch</th>
                                <th class="text-center">Contact</th>
                                <th class="text-center">Fee</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            <!-- ROW 1 -->
                            <tr>
                                <td>
                                    <div class="text-center">1</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar">RK</div>
                                        <div>
                                            <div class="fw-semibold">Rahul Kumar</div>
                                            <small class="text-muted">Joined 2024</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold">Full Stack</div>
                                    <small class="text-muted">Batch 2024-A</small>
                                </td>
                                <td>
                                    <div><i class="bi bi-envelope"></i> rahul@email.com</div>
                                    <small class="text-muted"><i class="bi bi-telephone"></i> +91 98765 43210</small>
                                </td>
                                <td>₹45,000 / ₹50,000</td>
                                <td><span class="badge-status active">Active</span></td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-2">

                                        <a href="./student-profile.html" class="action-icon text-success"
                                            data-tooltip="View">
                                            <i class="bi bi-eye fs-5"></i>
                                        </a>

                                        <a class="action-icon text-primary" data-bs-toggle="modal"
                                            data-bs-target="#studentModal" data-tooltip="Edit">
                                            <i class="bi bi-pencil-square fs-5"></i>
                                        </a>
                                        <a href="./../enquiries/enquiries-list.html" class="action-icon text-primary"
                                            data-bs-toggle="modal" data-bs-target="#studentModal"
                                            data-tooltip="Queries"><i class="bi bi-chat-left-dots"></i></a>

                                        <a class="action-icon text-danger" data-tooltip="Remove">
                                            <i class="bi bi-trash fs-5"></i>
                                        </a>


                                    </div>
                                </td>


                            </tr>

                            <!-- ROW 2 -->
                            <tr>
                                <td>
                                    <div class="text-center">2</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar">PS</div>
                                        <div>
                                            <div class="fw-semibold">Priya Sharma</div>
                                            <small class="text-muted">Joined 2024</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold">Python</div>
                                    <small class="text-muted">Batch 2024-B</small>
                                </td>
                                <td>
                                    <div><i class="bi bi-envelope"></i> priya@email.com</div>
                                    <small class="text-muted"><i class="bi bi-telephone"></i> +91 98765 43211</small>
                                </td>
                                <td>₹30,000 / ₹30,000</td>
                                <td><span class="badge-status active">Active</span></td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-2">

                                        <a href="./student-profile.html" class="action-icon text-success"
                                            data-tooltip="View">
                                            <i class="bi bi-eye fs-5"></i>
                                        </a>

                                        <a class="action-icon text-primary" data-bs-toggle="modal"
                                            data-bs-target="#studentModal" data-tooltip="Edit">
                                            <i class="bi bi-pencil-square fs-5"></i>
                                        </a>
                                        <a href="./../enquiries/enquiries-list.html" class="action-icon text-primary"
                                            data-bs-toggle="modal" data-bs-target="#studentModal"
                                            data-tooltip="Queries"><i class="bi bi-chat-left-dots"></i></a>

                                        <a class="action-icon text-danger" data-tooltip="Remove">
                                            <i class="bi bi-trash fs-5"></i>
                                        </a>


                                    </div>
                                </td>
                            </tr>

                            <!-- ROW 3 -->
                            <tr>
                                <td>
                                    <div class="text-center">3</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar">AS</div>
                                        <div>
                                            <div class="fw-semibold">Amit Singh</div>
                                            <small class="text-muted">Joined 2024</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold">React</div>
                                    <small class="text-muted">Batch 2024-A</small>
                                </td>
                                <td>
                                    <div><i class="bi bi-envelope"></i> amit@email.com</div>
                                    <small class="text-muted"><i class="bi bi-telephone"></i> +91 98765 43212</small>
                                </td>
                                <td>₹15,000 / ₹35,000</td>
                                <td><span class="badge-status inactive">Inactive</span></td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-2">

                                        <a href="./student-profile.html" class="action-icon text-success"
                                            data-tooltip="View">
                                            <i class="bi bi-eye fs-5"></i>
                                        </a>

                                        <a class="action-icon text-primary" data-bs-toggle="modal"
                                            data-bs-target="#studentModal" data-tooltip="Edit">
                                            <i class="bi bi-pencil-square fs-5"></i>
                                        </a>
                                        <a href="./../enquiries/enquiries-list.html" class="action-icon text-primary"
                                            data-bs-toggle="modal" data-bs-target="#studentModal"
                                            data-tooltip="Queries"><i class="bi bi-chat-left-dots"></i></a>

                                        <a class="action-icon text-danger" data-tooltip="Remove">
                                            <i class="bi bi-trash fs-5"></i>
                                        </a>


                                    </div>
                                </td>
                            </tr>

                            <!-- ROW 4 -->
                            <tr>
                                <td>
                                    <div class="text-center">4</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar">RK</div>
                                        <div>
                                            <div class="fw-semibold">Rahul Kumar</div>
                                            <small class="text-muted">Joined 2024</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold">Full Stack</div>
                                    <small class="text-muted">Batch 2024-A</small>
                                </td>
                                <td>
                                    <div><i class="bi bi-envelope"></i> rahul@email.com</div>
                                    <small class="text-muted"><i class="bi bi-telephone"></i> +91 98765 43210</small>
                                </td>
                                <td>₹45,000 / ₹50,000</td>
                                <td><span class="badge-status active">Active</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-2">

                                        <a href="./student-profile.html" class="action-icon text-success"
                                            data-tooltip="View">
                                            <i class="bi bi-eye fs-5"></i>
                                        </a>

                                        <a class="action-icon text-primary" data-bs-toggle="modal"
                                            data-bs-target="#studentModal" data-tooltip="Edit">
                                            <i class="bi bi-pencil-square fs-5"></i>
                                        </a>
                                        <a href="./../enquiries/enquiries-list.html" class="action-icon text-primary"
                                            data-bs-toggle="modal" data-bs-target="#studentModal"
                                            data-tooltip="Queries"><i class="bi bi-chat-left-dots"></i></a>

                                        <a class="action-icon text-danger" data-tooltip="Remove">
                                            <i class="bi bi-trash fs-5"></i>
                                        </a>


                                    </div>
                                </td>
                            </tr>

                            <!-- ROW 5 -->
                            <tr>
                                <td>
                                    <div class="text-center">5</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar">PS</div>
                                        <div>
                                            <div class="fw-semibold">Priya Sharma</div>
                                            <small class="text-muted">Joined 2023</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold">Python</div>
                                    <small class="text-muted">Batch 2023-B</small>
                                </td>
                                <td>
                                    <div><i class="bi bi-envelope"></i> priya@email.com</div>
                                    <small class="text-muted"><i class="bi bi-telephone"></i> +91 98765 43211</small>
                                </td>
                                <td>₹30,000 / ₹30,000</td>
                                <td><span class="badge-status active">Active</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-2">

                                        <a href="./student-profile.html" class="action-icon text-success"
                                            data-tooltip="View">
                                            <i class="bi bi-eye fs-5"></i>
                                        </a>

                                        <a class="action-icon text-primary" data-bs-toggle="modal"
                                            data-bs-target="#studentModal" data-tooltip="Edit">
                                            <i class="bi bi-pencil-square fs-5"></i>
                                        </a>
                                        <a href="./../enquiries/enquiries-list.html" class="action-icon text-primary"
                                            data-bs-toggle="modal" data-bs-target="#studentModal"
                                            data-tooltip="Queries"><i class="bi bi-chat-left-dots"></i></a>

                                        <a class="action-icon text-danger" data-tooltip="Remove">
                                            <i class="bi bi-trash fs-5"></i>
                                        </a>


                                    </div>
                                </td>
                            </tr>

                            <!-- ROW 6 -->
                            <tr>
                                <td>
                                    <div class="text-center">6</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar">AS</div>
                                        <div>
                                            <div class="fw-semibold">Amit Singh</div>
                                            <small class="text-muted">Joined 2024</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold">React</div>
                                    <small class="text-muted">Batch 2024-A</small>
                                </td>
                                <td>
                                    <div><i class="bi bi-envelope"></i> amit@email.com</div>
                                    <small class="text-muted"><i class="bi bi-telephone"></i> +91 98765 43212</small>
                                </td>
                                <td>₹15,000 / ₹35,000</td>
                                <td><span class="badge-status inactive">Inactive</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-2">

                                        <a href="./student-profile.html" class="action-icon text-success"
                                            data-tooltip="View">
                                            <i class="bi bi-eye fs-5"></i>
                                        </a>

                                        <a class="action-icon text-primary" data-bs-toggle="modal"
                                            data-bs-target="#studentModal" data-tooltip="Edit">
                                            <i class="bi bi-pencil-square fs-5"></i>
                                        </a>
                                        <a href="./../enquiries/enquiries-list.html" class="action-icon text-primary"
                                            data-bs-toggle="modal" data-bs-target="#studentModal"
                                            data-tooltip="Queries"><i class="bi bi-chat-left-dots"></i></a>

                                        <a class="action-icon text-danger" data-tooltip="Remove">
                                            <i class="bi bi-trash fs-5"></i>
                                        </a>


                                    </div>
                                </td>
                            </tr>

                            <!-- ROW 7 -->
                            <tr>
                                <td>
                                    <div class="text-center">7</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar">SP</div>
                                        <div>
                                            <div class="fw-semibold">Sneha Patel</div>
                                            <small class="text-muted">Joined 2022</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold">AWS</div>
                                    <small class="text-muted">Batch 2022-C</small>
                                </td>
                                <td>
                                    <div><i class="bi bi-envelope"></i> sneha@email.com</div>
                                    <small class="text-muted"><i class="bi bi-telephone"></i> +91 98765 43213</small>
                                </td>
                                <td>₹40,000 / ₹40,000</td>
                                <td><span class="badge-status completed">Completed</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-2">

                                        <a href="./student-profile.html" class="action-icon text-success"
                                            data-tooltip="View">
                                            <i class="bi bi-eye fs-5"></i>
                                        </a>

                                        <a class="action-icon text-primary" data-bs-toggle="modal"
                                            data-bs-target="#studentModal" data-tooltip="Edit">
                                            <i class="bi bi-pencil-square fs-5"></i>
                                        </a>
                                        <a href="./../enquiries/enquiries-list.html" class="action-icon text-primary"
                                            data-bs-toggle="modal" data-bs-target="#studentModal"
                                            data-tooltip="Queries"><i class="bi bi-chat-left-dots"></i></a>

                                        <a class="action-icon text-danger" data-tooltip="Remove">
                                            <i class="bi bi-trash fs-5"></i>
                                        </a>


                                    </div>
                                </td>
                            </tr>

                            <!-- ROW 8 -->
                            <tr>
                                <td>
                                    <div class="text-center">8</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar">VR</div>
                                        <div>
                                            <div class="fw-semibold">Vikram Reddy</div>
                                            <small class="text-muted">Joined 2023</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold">Java</div>
                                    <small class="text-muted">Batch 2023-B</small>
                                </td>
                                <td>
                                    <div><i class="bi bi-envelope"></i> vikram@email.com</div>
                                    <small class="text-muted"><i class="bi bi-telephone"></i> +91 98765 43214</small>
                                </td>
                                <td>₹25,000 / ₹45,000</td>
                                <td><span class="badge-status active">Active</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-2">

                                        <a href="./student-profile.html" class="action-icon text-success"
                                            data-tooltip="View">
                                            <i class="bi bi-eye fs-5"></i>
                                        </a>

                                        <a class="action-icon text-primary" data-bs-toggle="modal"
                                            data-bs-target="#studentModal" data-tooltip="Edit">
                                            <i class="bi bi-pencil-square fs-5"></i>
                                        </a>
                                        <a href="./../enquiries/enquiries-list.html" class="action-icon text-primary"
                                            data-bs-toggle="modal" data-bs-target="#studentModal"
                                            data-tooltip="Queries"><i class="bi bi-chat-left-dots"></i></a>

                                        <a class="action-icon text-danger" data-tooltip="Remove">
                                            <i class="bi bi-trash fs-5"></i>
                                        </a>


                                    </div>
                                </td>
                            </tr>

                            <!-- ROW 9 -->
                            <tr>
                                <td>
                                    <div class="text-center">9</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div class="avatar">AV</div>
                                        <div>
                                            <div class="fw-semibold">Anjali Verma</div>
                                            <small class="text-muted">Joined 2024</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold">Data Science</div>
                                    <small class="text-muted">Batch 2024-A</small>
                                </td>
                                <td>
                                    <div><i class="bi bi-envelope"></i> anjali@email.com</div>
                                    <small class="text-muted"><i class="bi bi-telephone"></i> +91 98765 43215</small>
                                </td>
                                <td>₹55,000 / ₹55,000</td>
                                <td><span class="badge-status completed">Completed</span></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center gap-2">

                                        <a href="./student-profile.html" class="action-icon text-success"
                                            data-tooltip="View">
                                            <i class="bi bi-eye fs-5"></i>
                                        </a>

                                        <a class="action-icon text-primary" data-bs-toggle="modal"
                                            data-bs-target="#studentModal" data-tooltip="Edit">
                                            <i class="bi bi-pencil-square fs-5"></i>
                                        </a>
                                        <a href="./../enquiries/enquiries-list.html" class="action-icon text-primary"
                                            data-bs-toggle="modal" data-bs-target="#studentModal"
                                            data-tooltip="Queries"><i class="bi bi-chat-left-dots"></i></a>

                                        <a class="action-icon text-danger" data-tooltip="Remove">
                                            <i class="bi bi-trash fs-5"></i>
                                        </a>


                                    </div>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ADD / EDIT MODAL (UI ONLY) -->
        <div class="modal fade" id="studentModal" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content rounded-4">

                    <div class="modal-header border-0">
                        <h5 class="modal-title">Student Details</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label>Name</label>
                                <input type="text" class="form-control" placeholder="Rahul Kumar">
                            </div>
                            <div class="col-md-6">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="rahul@email.com">
                            </div>
                            <div class="col-md-6">
                                <label>Phone</label>
                                <input type="text" class="form-control" placeholder="+91 98765 43210">
                            </div>
                            <div class="col-md-6">
                                <label>Joined Year</label>
                                <input type="number" class="form-control" placeholder="2024">
                            </div>
                            <div class="col-md-6">
                                <label>Course</label>
                                <input type="text" class="form-control" placeholder="Full Stack">
                            </div>
                            <div class="col-md-6">
                                <label>Batch</label>
                                <input type="text" class="form-control" placeholder="2024-A">
                            </div>
                            <div class="col-md-6">
                                <label>Paid Amount</label>
                                <input type="number" class="form-control" placeholder="45000">
                            </div>
                            <div class="col-md-6">
                                <label>Total Fees</label>
                                <input type="number" class="form-control" placeholder="50000">
                            </div>
                            <div class="col-md-6">
                                <label>Status</label>
                                <select class="form-select">
                                    <option>Active</option>
                                    <option>Inactive</option>
                                    <option>Completed</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-0">
                        <button class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                    </div>

                </div>
            </div>
        </div>

@endsection

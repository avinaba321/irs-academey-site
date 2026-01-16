@extends('Student.layouts.app')
@section('title', 'My Profile | IrsDesign Academy')
@push('styles')
<link rel="stylesheet" href="{{ asset('student/css/certificate.css') }}">
@endpush

@section('content')

 <div class="wrap">

            <!-- Header -->
            <div class="page-title">
                <h3>My Certificate</h3>
            </div>

            <!-- Premium Empty Certificates Section -->
            <div class="empty-card">

                <div class="empty-inner">
                    <div class="empty-icn">
                        <i class="bi bi-folder2-open"></i>
                    </div>

                    <h5 class="empty-title">No certificates found</h5>
                    <p class="empty-sub">
                        Upload certificates to see them here. Your certificates will be stored securely and available
                        anytime.
                    </p>

                    <!-- optional button -->
                    <button class="btn btn-upload">
                        <i class="bi bi-download"></i> Download Certificate
                    </button>
                </div>

            </div>

        </div>

@endsection
{{-- @extends('Student.layouts.app')
@section('title', 'My Metiral | IrsDesign Academy')
@push('styles')
<link rel="stylesheet" href="{{ asset('student/css/courseMaterial.css') }}">
@endpush

@section('content')

   <div class="wrap">

            <!--  Header -->
            <div class="page-head">
                <div>
                    <h3 class="page-title">Enrolled Courses</h3>
                    <p class="page-sub">Explore all enrolled courses & track your progress.</p>
                </div>

                <!-- Toolbar -->
                <div class="tool-bar">
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="text" placeholder="Search courses..." />
                    </div>

                    <div class="filter-select">
                        <select>
                            <option>All</option>
                            <option>Active</option>
                            <option>Completed</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Courses Grid -->
            <div class="row g-3">

                <!-- Course 1 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="course-card">
                        <div class="course-top">
                            <div>
                                <h5 class="course-name">Full React JS Course & Training</h5>
                                <div class="course-meta"><i class="bi bi-calendar2-week me-1"></i> Started: 10-12-2024
                                </div>
                            </div>
                            <span class="badge-status active">ACTIVE</span>
                        </div>

                        <div class="divider"></div>

                        <p class="progress-title">Progress</p>
                        <div class="progress">
                            <div class="progress-bar" style="width: 68%;">68%</div>
                        </div>

                        <div class="course-actions">
                            <a href="" class="btn btn-soft">
                                <i class="bi bi-eye-fill"></i> View Details
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Course 2 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="course-card">
                        <div class="course-top">
                            <div>
                                <h5 class="course-name">Advance JavaScript & TypeScript</h5>
                                <div class="course-meta"><i class="bi bi-calendar2-week me-1"></i> Started: 15-01-2025
                                </div>
                            </div>
                            <span class="badge-status active">ACTIVE</span>
                        </div>

                        <div class="divider"></div>

                        <p class="progress-title">Progress</p>
                        <div class="progress">
                            <div class="progress-bar" style="width: 42%;">42%</div>
                        </div>

                        <div class="course-actions">
                            <a href="" class="btn btn-soft">
                                <i class="bi bi-eye-fill"></i> View Details
                            </a>

                        </div>
                    </div>
                </div>

                <!-- Course 3 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="course-card">
                        <div class="course-top">
                            <div>
                                <h5 class="course-name">HTML CSS Bootstrap Masterclass</h5>
                                <div class="course-meta"><i class="bi bi-calendar2-week me-1"></i> Completed: 07-10-2024
                                </div>
                            </div>
                            <span class="badge-status completed">COMPLETED</span>
                        </div>

                        <div class="divider"></div>

                        <p class="progress-title">Progress</p>
                        <div class="progress">
                            <div class="progress-bar" style="width: 100%;">100%</div>
                        </div>

                        <div class="course-actions">
                            <a href="./../certificate.html" class="btn btn-soft">
                                <i class="bi bi-award-fill"></i> Certificate
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

@endsection --}}

{{-- @extends('Student.layouts.app')
@section('title', 'Course Materials | IrsDesign Academy')

@push('styles')
<style>
    body { background:#f4f6f9; }

    .classroom-card{
        background:#fff;
        border-radius:14px;
        padding:18px;
        box-shadow:0 5px 20px rgba(0,0,0,.05);
        margin-bottom:20px;
    }

    .material-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:10px;
    }

    .material-title{
        font-weight:600;
        font-size:16px;
    }

    .material-meta{
        font-size:13px;
        color:#6b7280;
    }

    .preview-box{
        border-radius:10px;
        overflow:hidden;
        border:1px solid #eee;
        margin-top:10px;
    }

    .comment-box{
        margin-top:15px;
        border-top:1px solid #eee;
        padding-top:15px;
    }

    .comment{
        background:#f8fafc;
        padding:10px;
        border-radius:8px;
        margin-bottom:8px;
    }

    .comment small{
        color:#6b7280;
    }
</style>
@endpush

@section('content')

<div class="container py-4">

    <h4 class="mb-4">📚 Course Materials</h4>

    @forelse($materials as $material)

        <div class="classroom-card">

            <div class="material-header">
                <div>
                    <div class="material-title">
                        {{ $material->title }}
                    </div>
                    <div class="material-meta">
                        Posted {{ $material->created_at->diffForHumans() }}
                    </div>
                </div>

                <a href="{{ asset('storage/'.$material->file_path) }}"
                   class="btn btn-sm btn-primary"
                   download>
                   <i class="bi bi-download"></i> Download
                </a>
            </div>

            @if($material->description)
                <p class="text-muted">{{ $material->description }}</p>
            @endif


            <div class="preview-box">

                @if(Str::endsWith($material->file_path, '.pdf'))
                    <iframe src="{{ asset('storage/'.$material->file_path) }}"
                            width="100%"
                            height="400px">
                    </iframe>

                @elseif(Str::endsWith($material->file_path, ['.jpg','.jpeg','.png']))
                    <img src="{{ asset('storage/'.$material->file_path) }}"
                         width="100%">
                @else
                    <div class="p-3 text-muted">
                        Preview not available. Please download.
                    </div>
                @endif

            </div>

            <!-- Comments -->
            <div class="comment-box">
                <h6>Comments</h6>

                @forelse($material->comments as $comment)
                    <div class="comment">
                        <strong>{{ $comment->student->full_name }}</strong><br>
                        {{ $comment->comment }}
                        <br>
                        <small>{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                @empty
                    <p class="text-muted">No comments yet.</p>
                @endforelse
                
                <form method="POST" 
                      action="{{ route('materials.comment', $material->id) }}">
                    @csrf
                    <div class="input-group mt-2">
                        <input type="text" name="comment"
                               class="form-control"
                               placeholder="Add a comment..."
                               required>
                        <button class="btn btn-dark">
                            Post
                        </button>
                    </div>
                </form>
            </div>

        </div>

    @empty
        <div class="alert alert-info">
            No materials uploaded yet.
        </div>
    @endforelse

</div>

@endsection --}}

@extends('Student.layouts.app')
@section('title', 'Course Materials | IrsDesign Academy')

@push('styles')
<style>
    body { background:#f4f6f9; }

    /* Meeting Links Section */
    .meeting-links-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 14px;
        padding: 20px;
        margin-bottom: 25px;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

     .meeting-links-title {
        color: #fff;
        font-weight: 600;
        font-size: 18px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .meeting-links-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 15px;
    }

    .meeting-card {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 10px;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: all 0.3s;
    }

    .meeting-card:hover {
        background: #fff;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .meeting-info {
        flex: 1;
    }

    .meeting-batch-name {
        font-weight: 600;
        color: #1f2937;
        font-size: 15px;
        margin-bottom: 3px;
    }

    .meeting-course-name {
        color: #6b7280;
        font-size: 13px;
    }

    .meeting-timing {
        color: #9ca3af;
        font-size: 12px;
        display: flex;
        align-items: center;
        gap: 5px;
        margin-top: 5px;
    }

    .join-btn {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s;
        text-decoration: none;
        white-space: nowrap;
    }

    .join-btn:hover {
        background: linear-gradient(135deg, #059669 0%, #047857 100%);
        color: #fff;
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
    }

    .join-btn i {
        font-size: 16px;
    }

    .no-meetings {
        background: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        padding: 30px;
        text-align: center;
        color: #6b7280;
    }

    .no-meetings i {
        font-size: 48px;
        color: rgba(255, 255, 255, 0.5);
        margin-bottom: 10px;
    }

    .classroom-card{
        background:#fff;
        border-radius:14px;
        padding:20px;
        box-shadow:0 2px 8px rgba(0,0,0,.08);
        margin-bottom:20px;
        transition: transform 0.2s;
    }

    .classroom-card:hover {
        transform: translateY(-2px);
        box-shadow:0 4px 12px rgba(0,0,0,.12);
    }

    .material-header{
        display:flex;
        justify-content:space-between;
        align-items:start;
        margin-bottom:15px;
        padding-bottom:15px;
        border-bottom: 2px solid #f3f4f6;
    }

    .material-title{
        font-weight:600;
        font-size:18px;
        color:#1f2937;
        margin-bottom:5px;
    }

    .material-meta{
        font-size:13px;
        color:#6b7280;
        display:flex;
        align-items:center;
        gap:15px;
    }

    .material-meta i {
        color:#9ca3af;
    }

    /* Description with code formatting */
    .material-description {
        background:#f9fafb;
        padding:15px;
        border-radius:8px;
        margin-bottom:15px;
        line-height:1.6;
        color:#374151;
        white-space: pre-wrap; /* Preserve line breaks */
        word-wrap: break-word;
    }

    .material-description code {
        background:#1f2937;
        color:#10b981;
        padding:2px 6px;
        border-radius:4px;
        font-family:'Courier New', monospace;
        font-size:13px;
    }

    .material-description pre {
        background:#1f2937;
        color:#e5e7eb;
        padding:12px;
        border-radius:6px;
        overflow-x:auto;
        margin:10px 0;
    }

    .material-description pre code {
        background:transparent;
        color:#10b981;
        padding:0;
    }

    /* Preview Box */
    .preview-box{
        border-radius:10px;
        overflow:hidden;
        border:1px solid #e5e7eb;
        margin-top:15px;
        background:#000;
    }

    .preview-box iframe,
    .preview-box video {
        display:block;
        width:100%;
        border:none;
    }

    .preview-box img {
        display:block;
        width:100%;
        height:auto;
    }

    .no-preview {
        padding:40px 20px;
        text-align:center;
        background:#f9fafb;
        color:#6b7280;
    }

    .no-preview i {
        font-size:48px;
        color:#d1d5db;
        margin-bottom:10px;
    }

    /* File Type Badge */
    .file-badge {
        display:inline-block;
        padding:4px 10px;
        border-radius:6px;
        font-size:11px;
        font-weight:600;
        text-transform:uppercase;
    }

    .file-badge.pdf { background:#ef4444; color:#fff; }
    .file-badge.video { background:#8b5cf6; color:#fff; }
    .file-badge.image { background:#10b981; color:#fff; }
    .file-badge.doc { background:#3b82f6; color:#fff; }
    .file-badge.other { background:#6b7280; color:#fff; }

    /* Comments Section */
    .comment-box{
        margin-top:20px;
        padding-top:20px;
        border-top:2px solid #f3f4f6;
    }

    .comment-box h6 {
        font-weight:600;
        margin-bottom:15px;
        color:#1f2937;
    }

    .comment{
        background:#f9fafb;
        padding:12px 15px;
        border-radius:10px;
        margin-bottom:10px;
        border-left:3px solid #3b82f6;
    }

    .comment-author {
        font-weight:600;
        color:#1f2937;
        font-size:14px;
    }

    .comment-text {
        margin:5px 0;
        color:#4b5563;
        line-height:1.5;
    }

    .comment-time {
        font-size:12px;
        color:#9ca3af;
    }

    .comment-form {
        margin-top:15px;
    }

    .comment-form .input-group {
        box-shadow:0 1px 3px rgba(0,0,0,.1);
        border-radius:8px;
        overflow:hidden;
    }

    .comment-form input {
        border:1px solid #e5e7eb;
        padding:12px 15px;
    }

    .comment-form button {
        padding:12px 20px;
        font-weight:600;
    }

    .download-btn {
        display:flex;
        align-items:center;
        gap:8px;
        padding:8px 16px;
        font-weight:500;
    }
</style>
@endpush

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">📚 Course Materials</h4>
        <span class="badge bg-primary">{{ $materials->count() }} Materials</span>
    </div>

    <!-- ✅ Meeting Links Section -->
    @if($batches->isNotEmpty())
    <div class="meeting-links-section">
        <div class="meeting-links-title">
            <i class="bi bi-camera-video"></i>
            Live Classes
        </div>

        <div class="meeting-links-grid">
            @foreach($batches as $batch)
                @if($batch->meeting_link)
                <div class="meeting-card">
                    <div class="meeting-info">
                        <div class="meeting-batch-name">
                            {{ $batch->batch_name }}
                        </div>
                        <div class="meeting-course-name">
                            {{ $batch->course->title ?? $batch->course_name }}
                        </div>
                        @if($batch->batch_timing)
                        <div class="meeting-timing">
                            <i class="bi bi-clock"></i>
                            {{ $batch->batch_timing }}
                        </div>
                        @endif
                    </div>
                    <a href="{{ $batch->meeting_link }}" 
                       target="_blank" 
                       class="join-btn">
                        <i class="bi bi-box-arrow-up-right"></i>
                        Join
                    </a>
                </div>
                @endif
            @endforeach

            @if($batches->where('meeting_link', '!=', null)->count() === 0)
            <div class="no-meetings">
                <i class="bi bi-camera-video-off"></i>
                <p class="mb-0">No live classes scheduled at the moment</p>
            </div>
            @endif
        </div>
    </div>
    @endif

    @forelse($materials as $material)

        <div class="classroom-card">

            <!-- Header -->
            <div class="material-header">
                <div class="flex-grow-1">
                    <div class="material-title">
                        {{ $material->title }}
                    </div>
                    <div class="material-meta">
                        <span>
                            <i class="bi bi-clock"></i> 
                            {{ $material->created_at->diffForHumans() }}
                        </span>
                        @if($material->file_size)
                        <span>
                            <i class="bi bi-file-earmark"></i> 
                            {{ formatBytes($material->file_size) }}
                        </span>
                        @endif
                        <span>
                            @php
                                $extension = pathinfo($material->file_path, PATHINFO_EXTENSION);
                                $badgeClass = 'other';
                                
                                if (in_array($extension, ['pdf'])) $badgeClass = 'pdf';
                                elseif (in_array($extension, ['mp4', 'webm', 'mov', 'avi'])) $badgeClass = 'video';
                                elseif (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) $badgeClass = 'image';
                                elseif (in_array($extension, ['doc', 'docx'])) $badgeClass = 'doc';
                            @endphp
                            <span class="file-badge {{ $badgeClass }}">
                                {{ strtoupper($extension) }}
                            </span>
                        </span>
                    </div>
                </div>

                <a href="{{ asset('storage/'.$material->file_path) }}"
                   class="btn btn-sm btn-primary download-btn"
                   download>
                   <i class="bi bi-download"></i> Download
                </a>
            </div>

            <!-- Description with Code Formatting -->
            @if($material->description)
                <div class="material-description">
                    {!! nl2br(e($material->description)) !!}
                </div>
            @endif

            <!-- Preview Section -->
            <div class="preview-box">

                {{-- PDF Preview --}}
                @if(Str::endsWith($material->file_path, '.pdf'))
                    <iframe src="{{ asset('storage/'.$material->file_path) }}"
                            width="100%"
                            height="600px">
                    </iframe>

                {{-- Video Preview --}}
                @elseif(Str::endsWith($material->file_path, ['.mp4', '.webm', '.mov', '.avi', '.mkv']))
                    <video controls 
                           controlsList="nodownload"
                           style="max-height:600px;">
                        <source src="{{ asset('storage/'.$material->file_path) }}" 
                                type="video/{{ pathinfo($material->file_path, PATHINFO_EXTENSION) }}">
                        Your browser does not support the video tag.
                    </video>

                {{-- Image Preview --}}
                @elseif(Str::endsWith($material->file_path, ['.jpg','.jpeg','.png','.gif','.webp']))
                    <img src="{{ asset('storage/'.$material->file_path) }}"
                         alt="{{ $material->title }}">

                {{-- Audio Preview --}}
                @elseif(Str::endsWith($material->file_path, ['.mp3', '.wav', '.ogg']))
                    <div class="p-3" style="background:#fff;">
                        <audio controls style="width:100%;">
                            <source src="{{ asset('storage/'.$material->file_path) }}" 
                                    type="audio/{{ pathinfo($material->file_path, PATHINFO_EXTENSION) }}">
                            Your browser does not support the audio tag.
                        </audio>
                    </div>

                {{-- No Preview --}}
                @else
                    <div class="no-preview">
                        <i class="bi bi-file-earmark-text"></i>
                        <p class="mb-0">Preview not available for this file type.</p>
                        <small>Click download to view the file.</small>
                    </div>
                @endif

            </div>

            <!-- Comments -->
            <div class="comment-box">
                <h6>
                    <i class="bi bi-chat-dots"></i> 
                    Comments ({{ $material->comments->count() }})
                </h6>

                @forelse($material->comments as $comment)
                    <div class="comment">
                        <div class="comment-author">
                            {{ $comment->student->full_name ?? $comment->student->name }}
                        </div>
                        <div class="comment-text">
                            {{ $comment->comment }}
                        </div>
                        <div class="comment-time">
                            <i class="bi bi-clock"></i> 
                            {{ $comment->created_at->diffForHumans() }}
                        </div>
                    </div>
                @empty
                    <p class="text-muted">
                        <i class="bi bi-chat"></i> 
                        No comments yet. Be the first to comment!
                    </p>
                @endforelse

                <!-- Add Comment Form -->
                <form method="POST" 
                      action="{{ route('materials.comment', $material->id) }}"
                      class="comment-form">
                    @csrf
                    <div class="input-group">
                        <input type="text" 
                               name="comment"
                               class="form-control"
                               placeholder="Add a comment..."
                               required>
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-send"></i> Post
                        </button>
                    </div>
                </form>
            </div>

        </div>

    @empty
        <div class="classroom-card text-center py-5">
            <i class="bi bi-inbox" style="font-size:64px; color:#d1d5db;"></i>
            <h5 class="mt-3 text-muted">No materials uploaded yet</h5>
            <p class="text-muted">Check back later for course materials</p>
        </div>
    @endforelse

</div>

@endsection

@push('scripts')
<script>
    // Auto-play prevention for videos
    document.querySelectorAll('video').forEach(video => {
        video.addEventListener('loadedmetadata', function() {
            this.currentTime = 0;
        });
    });
</script>
@endpush
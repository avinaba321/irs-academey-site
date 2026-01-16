@extends('Student.layouts.app')
@section('title', 'My Coures Module | IrsDesign Academy')
@push('styles')
<link rel="stylesheet" href="{{ asset('student/css/courseModule.css') }}">
@endpush

@section('content')

  <div class="page">

            <a href="#" class="top-back">
                <i class="bi bi-arrow-left"></i> Back to Course
            </a>

            <div class="viewer">

                <!-- SIDEBAR -->
                <aside class="side">

                    <!-- warmup -->
                    <div class="warm-card">
                        <div class="warm-head">
                            Warm-Up Classes
                            <i class="bi bi-chevron-up"></i>
                        </div>

                        <div class="lesson-list" id="lessonList">
                            <div class="lesson-item active" data-title="Introduction: Introduction about the course"
                                data-desc="In this lesson you will understand the course roadmap, outcomes, and how to follow classes.">
                                <div class="lesson-left">
                                    <i class="bi bi-play-fill"></i>
                                    Introduction: Introduction about the course
                                </div>
                                <span class="tick"><i class="bi bi-check2"></i></span>
                            </div>

                            <div class="lesson-item" data-title="Computer Fundamentals, fundamental of OS"
                                data-desc="This lesson covers computer fundamentals, operating system fundamentals, file system, and basic commands.">
                                <div class="lesson-left">
                                    <i class="bi bi-play-fill"></i>
                                    Computer Fundamentals, fundamental of OS
                                </div>
                                <span class="tick"><i class="bi bi-check2"></i></span>
                            </div>

                            <div class="lesson-item" data-title="Software Requirements specification (SRS)"
                                data-desc="Learn how SRS works, what to include, requirement types, and practical examples.">
                                <div class="lesson-left">
                                    <i class="bi bi-play-fill"></i>
                                    Software Requirements specification (SRS)
                                </div>
                                <span class="tick"><i class="bi bi-check2"></i></span>
                            </div>

                            <div class="lesson-item" data-title="GIT knowledge"
                                data-desc="Git basics: init, clone, add, commit, branch, merge, and workflow.">
                                <div class="lesson-left">
                                    <i class="bi bi-play-fill"></i>
                                    GIT knowledge
                                </div>
                                <span class="tick"><i class="bi bi-check2"></i></span>
                            </div>

                            <div class="lesson-item" data-title="GIT Knowledge - 2"
                                data-desc="Advanced Git: stash, rebase, cherry-pick, resolving conflicts and best practices.">
                                <div class="lesson-left">
                                    <i class="bi bi-play-fill"></i>
                                    GIT Knowledge - 2
                                </div>
                                <span class="tick"><i class="bi bi-check2"></i></span>
                            </div>

                            <div class="lesson-item" data-title="Basic knowledge of Client Server Architecture (SDLC)"
                                data-desc="Client-server architecture, SDLC phases, project workflow and fundamentals.">
                                <div class="lesson-left">
                                    <i class="bi bi-play-fill"></i>
                                    Basic knowledge of Client Server Architecture (SDLC)
                                </div>
                                <span class="tick"><i class="bi bi-check2"></i></span>
                            </div>
                        </div>
                    </div>

                    <!-- other modules -->
                    <button class="mod-btn" type="button">MODULE 1 <i class="bi bi-chevron-down"></i></button>
                    <button class="mod-btn" type="button">MODULE 2 <i class="bi bi-chevron-down"></i></button>
                    <button class="mod-btn" type="button">MODULE 3 <i class="bi bi-chevron-down"></i></button>
                    <button class="mod-btn" type="button">MODULE 4 <i class="bi bi-chevron-down"></i></button>
                    <button class="mod-btn" type="button">MODULE 5 <i class="bi bi-chevron-down"></i></button>
                    <button class="mod-btn" type="button">MODULE 6 <i class="bi bi-chevron-down"></i></button>
                    <button class="mod-btn" type="button">MODULE 7 <i class="bi bi-chevron-down"></i></button>
                    <button class="mod-btn" type="button">MODULE 8 <i class="bi bi-chevron-down"></i></button>
                    <button class="mod-btn" type="button">OpenAI <i class="bi bi-chevron-down"></i></button>

                </aside>

                <!-- CONTENT -->
                <main class="content">

                    <div class="content-card">
                        <h4 class="content-title" id="lessonTitle">Introduction: Introduction about the course</h4>

                        <div class="desc-label">Description :</div>
                        <div class="desc-text" id="lessonDesc">
                            In this lesson you will understand the course roadmap, outcomes, and how to follow classes.
                        </div>
                    </div>

                    <!-- nav -->
                    <div class="nav-row">
                        <button class="btn btn-nav" id="prevBtn">
                            <i class="bi bi-arrow-left"></i> Previous
                        </button>

                        <button class="btn btn-nav btn-next" id="nextBtn">
                            Next <span class="text-truncate" id="nextText" style="max-width:180px;">Computer
                                Fundamentals...</span>
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>

                </main>

            </div>
        </div>

        <!-- Offcanvas (Mobile Modules) -->
        <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="moduleOffcanvas">
            <div class="offcanvas-header border-bottom border-secondary">
                <h6 class="offcanvas-title fw-bold">Modules</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <div id="mobileLessonWrap"></div>
            </div>
        </div>

@endsection
@push('scripts')

 <script>
        // Lesson logic
        const lessons = Array.from(document.querySelectorAll(".lesson-item"));
        let current = 0;

        function setActive(index) {
            if (index < 0 || index >= lessons.length) return;

            current = index;

            lessons.forEach(l => l.classList.remove("active"));
            lessons[current].classList.add("active");

            document.getElementById("lessonTitle").innerText = lessons[current].dataset.title;
            document.getElementById("lessonDesc").innerText = lessons[current].dataset.desc;

            // next preview
            const nextLesson = lessons[current + 1];
            document.getElementById("nextText").innerText = nextLesson
                ? (nextLesson.dataset.title.length > 24 ? nextLesson.dataset.title.slice(0, 24) + "..." : nextLesson.dataset.title)
                : "Completed";
        }

        lessons.forEach((item, idx) => {
            item.addEventListener("click", () => setActive(idx));
        });

        document.getElementById("prevBtn").addEventListener("click", () => setActive(current - 1));
        document.getElementById("nextBtn").addEventListener("click", () => setActive(current + 1));

        setActive(0);
    </script>
    
@endpush
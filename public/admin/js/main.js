const sidebar = document.getElementById("sidebar");
const overlay = document.getElementById("overlay");
const icon = document.getElementById("toggleIcon");

function toggleSidebar() {
    if (window.innerWidth <= 768) {
        sidebar.classList.toggle("show");
        overlay.classList.toggle("show");
    } else {
        sidebar.classList.toggle("collapsed");
        icon.classList.toggle("bi-chevron-left");
        icon.classList.toggle("bi-chevron-right");
    }
}

function closeSidebar() {
    sidebar.classList.remove("show");
    overlay.classList.remove("show");
}



// course add and edit popup //

function openAddCourse(){
    document.getElementById("courseModalTitle").innerText = "Add Course";
    document.getElementById("courseForm").reset();
    new bootstrap.Modal(document.getElementById("courseModal")).show();
}

function openEditCourse(name, duration, modules, status){
    document.getElementById("courseModalTitle").innerText = "Edit Course";

    document.getElementById("cName").value = name;
    document.getElementById("cDuration").value = duration;
    document.getElementById("cModules").value = modules;
    document.getElementById("cStatus").value = status;

    new bootstrap.Modal(document.getElementById("courseModal")).show();
}


// course details edit method //

function openEditCourse(){
    // preload data
    cName.value = viewName.innerText;
    cDesc.value = viewDesc.innerText;
    cDuration.value = viewDuration.innerText;
    cModules.value = viewModules.innerText;
    cFee.value = viewFee.innerText;
    cStatus.value = viewStatus.innerText;

    new bootstrap.Modal(courseModal).show();
}

function saveCourse(){
    viewName.innerText = cName.value;
    viewDesc.innerText = cDesc.value;
    viewDuration.innerText = cDuration.value;
    viewModules.innerText = cModules.value;
    viewFee.innerText = cFee.value;
    viewStatus.innerText = cStatus.value;

    viewStatus.className = "status " + (cStatus.value === "Active" ? "active" : "draft");

    bootstrap.Modal.getInstance(courseModal).hide();
}




// certificate genarate function //


function generatePDF() {
    const element = document.querySelector('.certificate');
    html2pdf()
        .set({
            margin: 0,
            filename: 'Certificate-Adline-Palmerston.pdf',
            image: { type: 'jpeg', quality: 1 },
            html2canvas: { scale: 3 },
            jsPDF: { unit: 'px', }
        })
        .from(element)
        .save();
}




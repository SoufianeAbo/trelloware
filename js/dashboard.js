const projectsBtn = document.getElementById("ProjectsBtn");
const projectsBtn2 = document.getElementById("ProjectsBtn2");
const projectsTable = document.getElementById("ProjectsTable");

function showProjects() {
    projectsTable.classList.remove("hidden");
    projectsBtn.classList.add("bg-blue-700");
    projectsBtn2.classList.add("bg-blue-700");
}

projectsBtn.addEventListener("click", showProjects);
projectsBtn2.addEventListener("click", showProjects);
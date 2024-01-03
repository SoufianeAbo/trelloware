const projectsBtn = document.getElementById("ProjectsBtn");
const projectsBtn2 = document.getElementById("ProjectsBtn2");
const projectsTable = document.getElementById("ProjectsTable");

function showTable(argument) {
    const argumentTable = document.getElementById(argument + "Table");
    const argumentBtn = document.getElementById(argument + "Btn");
    const argumentBtn2 = document.getElementById(argument + "Btn2");

    argumentTable.classList.remove("hidden");
    argumentBtn.classList.add("bg-blue-700");
    argumentBtn2.classList.add("bg-blue-700");
}

function hideTable(argument) {
    const argumentTable = document.getElementById(argument + "Table");
    const argumentBtn = document.getElementById(argument + "Btn");
    const argumentBtn2 = document.getElementById(argument + "Btn2");

    argumentTable.classList.add("hidden");
    argumentBtn.classList.remove("bg-blue-700");
    argumentBtn2.classList.remove("bg-blue-700");
}

projectsBtn.addEventListener("click", function() { showTable("Projects"); });
projectsBtn2.addEventListener("click", function() { hideTable("Projects"); });

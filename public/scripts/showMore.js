document.addEventListener("DOMContentLoaded", function () {
    const dataRows = document.querySelectorAll(".data-row");
    const showMoreBtn = document.getElementById("showMoreBtn");
    const maxRowsToShow = 5;

    showMoreBtn.addEventListener("click", function () {
        for (let i = maxRowsToShow; i < dataRows.length; i++) {
            dataRows[i].style.display = "table-row";
        }
        showMoreBtn.style.display = "none";
    });

    for (let i = maxRowsToShow; i < dataRows.length; i++) {
        dataRows[i].style.display = "none";
    }
});
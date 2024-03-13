const draggables = document.querySelectorAll(".draggable-lang");
const containers = document.querySelectorAll(".lang-container");

// Ajax request

draggables.forEach((draggable) => {
    draggable.addEventListener("dragstart", () => {
        draggable.classList.add("dragging");
    });

    // UPDATE VALUES OF INPUTS and SEND AJAX
    draggable.addEventListener("dragend", () => {
        draggable.classList.remove("dragging");values
        updateDataAttributes();

        updatePosition()
    });
});

containers.forEach((container) => {
    container.addEventListener("dragover", (e) => {
        e.preventDefault();
        const afterElement = getDragAfterElement(container, e.clientY);
        const draggable = document.querySelector(".dragging");
        if (afterElement == null) {
            container.appendChild(draggable);

        } else {
            container.insertBefore(draggable, afterElement);
        }
    });
});

function getDragAfterElement(container, y) {
    const draggableElements = [
        ...container.querySelectorAll(".draggable-lang:not(.dragging)"),
    ];

    return draggableElements.reduce(
        (closest, child) => {
            const box = child.getBoundingClientRect();
            const offset = y - box.top - box.height / 2;
            if (offset < 0 && offset > closest.offset) {
                return { offset: offset, element: child };
            } else {
                return closest;
            }
        },
        { offset: Number.NEGATIVE_INFINITY }
    ).element;
}

function updateDataAttributes() {
    // Get all draggable elements
    const draggables = document.querySelectorAll(".position");
    // Loop through each draggable element
    draggables.forEach((draggable, index) => {
        // Update data-data attribute value
        draggable.value=index + 1;
    });
}
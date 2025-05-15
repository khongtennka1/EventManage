document.addEventListener("DOMContentLoaded", function () {
    const user_event_searchInput = document.getElementById("searchInput");
    const user_event_searchBtn = document.getElementById("searchBtn");
    const user_event_eventType = document.getElementById("eventType");
    const user_event_organizer = document.getElementById("organizer");
    const user_event_classFilter = document.getElementById("classFilter");
    const user_event_requiredFilter = document.getElementById("requiredFilter");
    const user_event_eventContainer = document.getElementById("eventContainer");
    const user_event_eventCount = document.getElementById("eventCount");
    const user_event_noResults = document.getElementById("noResults");
    const user_event_exportBtn = document.getElementById("exportBtn");

    function user_event_filterEvents() {
        const searchTerm = user_event_searchInput.value.toLowerCase();
        const selectedType = user_event_eventType.value;
        const selectedOrganizer = user_event_organizer.value;
        const selectedClass = user_event_classFilter.value;
        const selectedRequired = user_event_requiredFilter.value;

        const events = user_event_eventContainer.querySelectorAll(".col-lg-4");
        let visibleCount = 0;

        events.forEach((event) => {
            const eventTitle = event
                .querySelector(".card-title")
                .textContent.toLowerCase();
            const eventTypeValue = event.dataset.eventType;
            const eventOrganizerValue = event.dataset.organizer;
            const eventRequiredValue = event.dataset.required;

            const matchesSearch =
                searchTerm === "" || eventTitle.includes(searchTerm);
            const matchesType =
                selectedType === "" || eventTypeValue === selectedType;
            const matchesOrganizer =
                selectedOrganizer === "" ||
                eventOrganizerValue === selectedOrganizer;
            const matchesRequired =
                selectedRequired === "" ||
                eventRequiredValue === selectedRequired;
            const matchesClass = selectedClass === "" || true;

            if (
                matchesSearch &&
                matchesType &&
                matchesOrganizer &&
                matchesClass &&
                matchesRequired
            ) {
                event.classList.remove("d-none");
                visibleCount++;
            } else {
                event.classList.add("d-none");
            }
        });

        user_event_eventCount.textContent = visibleCount;
        user_event_noResults.classList.toggle("d-none", visibleCount > 0);
    }

    user_event_searchBtn.addEventListener("click", user_event_filterEvents);
    user_event_searchInput.addEventListener("keyup", (e) => {
        if (e.key === "Enter") user_event_filterEvents();
    });

    [
        user_event_eventType,
        user_event_organizer,
        user_event_classFilter,
        user_event_requiredFilter,
    ].forEach((filter) => {
        filter.addEventListener("change", user_event_filterEvents);
    });

    user_event_exportBtn.addEventListener("click", () => {
        const events = Array.from(
            user_event_eventContainer.querySelectorAll(".col-lg-4:not(.d-none)")
        );
        const data = events.map((event) => {
            const title = event.querySelector(".card-title").textContent;
            const dateInfo = event
                .querySelector(".text-muted:first-child")
                .textContent.trim();
            const timeInfo = event
                .querySelector(".text-muted:nth-child(2)")
                .textContent.trim();
            const location = event
                .querySelector(".card-text.text-muted")
                .textContent.trim();
            const organizer = event
                .querySelector(".badge.bg-light.text-dark:first-child")
                .textContent.trim();
            const registerDate = event
                .querySelector(".badge.bg-light.text-dark:last-child")
                .textContent.trim();
            const required =
                event.dataset.required === "required" ? "Required" : "Optional";
            return {
                "Tên sự kiện": title,
                Ngày: dateInfo.replace(/.*\s/, ""),
                "Thời gian": timeInfo.replace(/.*\s/, ""),
                "Địa điểm": location.replace(/^\s*[^\s]+\s*/, ""),
                "Đơn vị tổ chức": organizer.replace(/.*\s/, ""),
                "Ngày đăng ký": registerDate.replace(/.*\s/, ""),
                "Yêu cầu": required,
            };
        });

        const ws = XLSX.utils.json_to_sheet(data);
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Events");
        const fileName = `events_export_${
            new Date().toISOString().split("T")[0]
        }.xlsx`;
        XLSX.writeFile(wb, fileName);
    });
});

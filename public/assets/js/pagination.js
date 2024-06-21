function initPagination(totalRecords, tableId, paginationContainerId, defaultRecordsPerPage = 10) {
    let currentPage = 1;
    let recordsPerPage = defaultRecordsPerPage;
    const table = document.getElementById(tableId);
    const paginationContainer = document.getElementById(paginationContainerId);
    const recordsPerPageSelect = document.getElementById('records-per-page');

    function displayRecords() {
        const startIndex = (currentPage - 1) * recordsPerPage;
        const endIndex = startIndex + recordsPerPage;
        const tableRows = table.querySelectorAll('tbody tr');

        tableRows.forEach((row, index) => {
            row.style.display = index >= startIndex && index < endIndex ? '' : 'none';
        });
    }

    function renderPaginationNumbers() {
        paginationContainer.innerHTML = '';
        const totalPages = Math.ceil(totalRecords / recordsPerPage);

        for (let i = 1; i <= totalPages; i++) {
            const pageLink = document.createElement('a');
            pageLink.href = '#';
            pageLink.classList.add('tw-px-3', 'tw-py-2', 'tw-leading-tight', 'tw-text-gray-500', 'tw-bg-white',
                'tw-border', 'tw-border-gray-300', 'tw-rounded-md', 'hover:tw-bg-gray-100', 'hover:tw-text-gray-700');
            if (i === currentPage) {
                pageLink.classList.add('tw-text-gray-700', 'tw-bg-gray-100');
            }
            pageLink.textContent = i;
            pageLink.addEventListener('click', (event) => {
                event.preventDefault();
                currentPage = i;
                displayRecords();
                renderPaginationNumbers();
            });

            paginationContainer.appendChild(pageLink);
        }
    }

    function handleRecordsPerPageChange(event) {
        recordsPerPage = parseInt(event.target.value);
        currentPage = 1;
        displayRecords();
        renderPaginationNumbers();
    }

    recordsPerPageSelect.value = defaultRecordsPerPage;
    recordsPerPageSelect.addEventListener('change', handleRecordsPerPageChange);

    displayRecords();
    renderPaginationNumbers();
}

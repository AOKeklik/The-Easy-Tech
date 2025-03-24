import { useState } from "react"

const usePagination = (data, itemsPerPage) => {
    const [currentPage, setCurrentPage] = useState(1)
    const totalPages = Math.ceil(data.length / itemsPerPage)

    const currentData = data.slice(
        (currentPage - 1) * itemsPerPage,
        currentPage * itemsPerPage
    )

    const goToNextPage = () => setCurrentPage((prev) => Math.min(prev + 1, totalPages))
    const goToPrevPage = () => setCurrentPage((prev) => Math.max(prev - 1, 1))
    const goToPage = (page) => setCurrentPage(Math.max(1, Math.min(page, totalPages)))

    const paginationControls = (
        <div className="flex gap-2 mt-4">
            <button onClick={goToPrevPage} disabled={currentPage === 1} className="px-3 py-1 border rounded bg-gray-200">
                Prev
            </button>

            {[...Array(totalPages)].map((_, i) => (
                <button
                    key={i}
                    onClick={() => goToPage(i + 1)}
                    className={`px-3 py-1 border rounded ${currentPage === i + 1 ? "bg-blue-500 text-white" : "bg-gray-200"}`}
                >
                    {i + 1}
                </button>
            ))}

            <button onClick={goToNextPage} disabled={currentPage === totalPages} className="px-3 py-1 border rounded bg-gray-200">
                Next
            </button>
        </div>
    )

    return { currentData, currentPage, totalPages, paginationControls }
}

export default usePagination
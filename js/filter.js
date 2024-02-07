// Ensure the DOM content is fully loaded before executing JavaScript
document.addEventListener("DOMContentLoaded", function() {
    // Call the function to initialize filter options
    getUniqueValuesFromColumn();

    // Bind filter_rows() function to onchange event of filter select elements
    const filterSelects = document.querySelectorAll(".table-filter");
    filterSelects.forEach(select => {
        select.addEventListener("change", filter_rows);
    });
});

// Get unique values for the desired columns
function getUniqueValuesFromColumn() {
    var unique_col_values_dict = {};
    allFilters = document.querySelectorAll(".table-filter");
    allFilters.forEach((filter_i) => {
        col_index = filter_i.parentElement.getAttribute("col-index");
        const rows = document.querySelectorAll("#productsTable > tbody > tr");
        rows.forEach((row) => {
            cell_value = row.querySelector("td:nth-child("+col_index+")").innerHTML;
            if (col_index in unique_col_values_dict) {
                if (!unique_col_values_dict[col_index].includes(cell_value)) {
                    unique_col_values_dict[col_index].push(cell_value);
                }
            } else {
                unique_col_values_dict[col_index] = [cell_value];
            }
        });
    });

    updateSelectOptions(unique_col_values_dict);
}

// Add <option> tags to the desired columns based on the unique values
function updateSelectOptions(unique_col_values_dict) {
    allFilters = document.querySelectorAll(".table-filter");
    allFilters.forEach((filter_i) => {
        col_index = filter_i.parentElement.getAttribute('col-index');
        if (col_index in unique_col_values_dict) {
            filter_i.innerHTML = "<option value='all'>All</option>";
            unique_col_values_dict[col_index].forEach((value) => {
                filter_i.innerHTML += `<option value="${value}">${value}</option>`;
            });
        }
    });
}

// Create filter_rows() function
function filter_rows() {
    allFilters = document.querySelectorAll(".table-filter");
    var filter_value_dict = {};
    allFilters.forEach((filter_i) => {
        col_index = filter_i.parentElement.getAttribute('col-index');
        value = filter_i.value;
        if (value != "all") {
            filter_value_dict[col_index] = value;
        }
    });

    const rows = document.querySelectorAll("#productsTable tbody tr");
    rows.forEach((row) => {
        var display_row = true;
        for (var col_index in filter_value_dict) {
            col_cell_value = row.querySelector("td:nth-child(" + col_index+ ")").innerHTML;
            filter_value = filter_value_dict[col_index];
            if (filter_value && col_cell_value != filter_value) {
                display_row = false;
                break; // Exit the loop early if a mismatch is found
            }
        }

        if (display_row) {
            row.style.display = "table-row";
        } else {
            row.style.display = "none";
        }
    });
}

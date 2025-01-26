// Define functions for further use

// AJAX to pass order data to PHP handler
function createOrder(orderData) {
    fetch('index.php?controller=order&action=submit', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: orderData,
    })
        .then(response => response.json())
        .then(data => {
            // Output debug data, trigger refreshing of table
            console.log(data);
            appendOrder(data);
            updateSum();
        });
}

// Create a row with new order data and append it to the table
function appendOrder(rowData) {

        const table = document.getElementById("orderTable");
        const tableBody = table.querySelector("tbody")
        const row = document.createElement("tr");

        const LinkCell0 = document.createElement("a");
        LinkCell0.href = "/?controller=order&action=order&id=" + rowData.id;
        LinkCell0.textContent = rowData.id.toString();
        const idCell = document.createElement("td");
        idCell.appendChild(LinkCell0);
        row.appendChild(idCell);

        const LinkCell1 = document.createElement("a");
        LinkCell1.href = "/?controller=user&action=user&id=" + rowData.user_id;
        LinkCell1.textContent = rowData.user_id.toString();
        const UserIdCell = document.createElement("td");
        UserIdCell.appendChild(LinkCell1);
        row.appendChild(UserIdCell);

        const LinkCell2 = document.createElement("a");
        LinkCell2.href = "/?controller=user&action=user&id=" + rowData.user_id;
        LinkCell2.textContent = rowData.user_full_name.replaceAll('\"', '');
        const UserFullNameCell = document.createElement("td");
        UserFullNameCell.appendChild(LinkCell2);
        row.appendChild(UserFullNameCell);

        const DescriptionCell = document.createElement("td");
        DescriptionCell.innerHTML = rowData.description;
        row.appendChild(DescriptionCell);

        const FullPriceCell = document.createElement("td");
        FullPriceCell.innerHTML = rowData.full_price;
        row.appendChild(FullPriceCell);

        const PaidAmountCell = document.createElement("td");
        PaidAmountCell.innerHTML = '0.00';
        row.appendChild(PaidAmountCell);

        const OutstandingAmountCell = document.createElement("td");
        OutstandingAmountCell.innerHTML = '0.00';
        row.appendChild(OutstandingAmountCell);

        tableBody.appendChild(row);
}

// Refresh totals on table
function updateSum() {
    const totalFullPrice = document.getElementById('totalFullPrice');
    const totalPaid = document.getElementById('totalPaid');
    const totalOutstanding = document.getElementById('totalOutstanding');

    totalFullPrice.innerHTML = calculateColumnSum(4);
    totalPaid.innerHTML = calculateColumnSum(5);
    totalOutstanding.innerHTML = calculateColumnSum(6);
}

// Calculate a sum of column floatvals
function calculateColumnSum(columnIndex){
    const table = document.getElementById("orderTable");
    const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
    let totalSum = 0;

    for (let i = 0; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName('td');

        if (cells.length > columnIndex) {
            const cellValue = parseFloat(cells[columnIndex].innerText);
            if (!isNaN(cellValue)) {
                totalSum += cellValue;
            }
        }
    }
    return totalSum.toFixed(2);
}

// Validate 'full_price' on 'add new order' form
function validatePrice(price){

    if (isNaN(price)) {
        alert('Please enter a valid numeric value.');
        return false;
    }

    const isCorrectFormat = /^\d+(\.\d{2})?$/.test(price.toString());

    if (!isCorrectFormat) {
        alert('Two decimals max. Enter correct value.');
        return false;
    }


    return true;

}

// Main listener
document.addEventListener('DOMContentLoaded', function() {

    // Define main elements
    const orderTable = document.getElementById('orderTable');
    if (orderTable) updateSum(); // Update totals if we're on the orders page

    const userDropdown = document.getElementById('userDropdown');
    let selectedUserId = userDropdown.value;
    let selectedUserName = userDropdown.options[0].text;

    // Correction of dropdown values
    userDropdown.addEventListener("change", function () {
        selectedUserId = userDropdown.value;
        selectedUserName = userDropdown.options[userDropdown.selectedIndex].text;
    });

    // Listener for order submit
    document.getElementById('submitOrder')?.addEventListener('click', function (e) {

        e.preventDefault();

        const orderForm = document.getElementById('orderForm')
        const orderFormData = new FormData(orderForm);
        let data = {};

        // Form data formatting
        orderFormData.forEach(function (value, key) {
            data[key] = value;
        });

        // Price validator
        if (!validatePrice(parseFloat(data.full_price))) return false;

        data['user_id'] = selectedUserId;
        data['user_full_name'] = selectedUserName;
        data['full_price'] = parseFloat(data.full_price);

        data = JSON.stringify(data);
        console.log(data);
        createOrder(data);
    });

});



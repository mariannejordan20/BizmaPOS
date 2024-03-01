function addItem() {
    const table = document.getElementById('itemTable').getElementsByTagName('tbody')[0];
    const newRow = table.insertRow();
    const cells = Array.from({ length: 4 }, () => newRow.insertCell());
    cells[0].innerHTML = '<input type="number" class="quantity">';
    cells[1].innerHTML = '<input type="text" class="itemName">';
    cells[2].innerHTML = '<input type="text" class="serial">';
    cells[3].innerHTML = '<input type="text" class="status">';
}

function updateTime() {
    const now = new Date();
    document.getElementById('date').textContent = now.toLocaleDateString();
    document.getElementById('time').textContent = now.toLocaleTimeString();
}

updateTime();
setInterval(updateTime, 1000);

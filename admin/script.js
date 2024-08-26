document.getElementById('add-item').addEventListener('click', function() {
    document.getElementById('content-area').innerHTML = `
        <h3>Add Item</h3>
        <form method="post" action="./add_process.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="item_name">Item Name:</label>
                <input type="text" id="item_name" name="item_name" required>
            </div>
            <div class="form-group">
                <label for="item_description">Item Description:</label>
                <textarea id="item_description" name="item_description" required></textarea>
            </div>
            <div class="form-group">
                <label for="item_price">Item Price:</label>
                <input type="number" id="item_price" name="item_price" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="item_image">Item Image:</label>
                <input type="file" id="item_image" name="item_image" required>
            </div>
            <input type="submit" value="Add Item">
        </form>
    `;
});

document.getElementById('update-item').addEventListener('click', function() {
    document.getElementById('content-area').innerHTML = `
        <h3>Update Item</h3>
        <form method="post" action="./update_process.php">
            <div class="form-group">
                <label for="item_id">Item ID:</label>
                <input type="text" id="item_id" name="item_id" required>
            </div>
            <div class="form-group">
                <label for="item_name">Item Name:</label>
                <input type="text" id="item_name" name="item_name" required>
            </div>
            <div class="form-group">
                <label for="item_description">Item Description:</label>
                <textarea id="item_description" name="item_description" required></textarea>
            </div>
            <div class="form-group">
                <label for="item_price">Item Price:</label>
                <input type="number" id="item_price" name="item_price" step="0.01" required>
            </div>
            <input type="submit" value="Update Item">
        </form>
    `;
});

document.getElementById('delete-item').addEventListener('click', function() {
    document.getElementById('content-area').innerHTML = `
        <h3>Delete Item</h3>
        <form method="post" action="./delete_process.php">
            <div class="form-group">
                <label for="item_id">Item ID:</label>
                <input type="text" id="item_id" name="item_id" required>
            </div>
            <input type="submit" value="Delete Item">
        </form>
    `;
});

document.getElementById('completed-processes').addEventListener('click', function() {
    document.getElementById('content-area').innerHTML = `
        <h3>Completed Processes</h3>
        <table>
            <tr>
                <th>Process ID</th>
                <th>Process Name</th>
                <th>Completion Date</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Item Added</td>
                <td>2024-08-26</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Item Updated</td>
                <td>2024-08-26</td>
            </tr>
            <!-- Add more rows as needed -->
        </table>
    `;
});

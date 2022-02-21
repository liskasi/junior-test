<form id="addform" method="POST">
    <div id = "h1_buttons">
        <h1 id="heading_productList">Product Add</h1>
        <div>
            <!-- Save action to save a new product -->
            <a>Save</a>
            <!-- Cancel action that cancels adding a new product -->
            <a>Cancel</a>
        </div>
    </div>

    <hr id="hr1">

    <ul id="form_list">
        <li>
            <label for="sku">SKU</label>
            <input type="text" id="sku" name="sku">
        </li>
        <li>
            <label for="name">Name</label>
            <input type="text" id="name" name="name">
        </li>
        <li>
            <label for="price">Price ($)</label>
            <input type="text" id="price" name="price">
        </li>
        <li>
            <label for="dropdown_type">Type Switcher</label>
            <select name="TypeSw" id="dropdown_type">
                <option label=" "></option>
            </select>
        </li>
        <li id="addingFields">
        </li>
    </ul>
</form>
<div>
    <h1>Category administration</h1>
    <div>
        <h2>Add new Category</h2>
        <div>
            <div>Name</div>
            <div><input type="text" name="category_name" id="category_name"></div>
            <div>Parent</div>
            <div>
                <select name="parent_category" id="parent_category">
                    <option value="">-- No Parent --</option>
                </select>
            </div>
        </div>
    </div>
    <div>
        <h2>Current Category List</h2>
        <div>
            @livewire('paksuco-table::table', $config)
        </div>
    </div>
</div>

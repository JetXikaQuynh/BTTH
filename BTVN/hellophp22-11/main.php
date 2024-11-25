<table class="table table-striped table-hover">
<thead>
    <tr>
        <th>
            <span class="custom-checkbox">
	            <input type="checkbox" id="selectAll">
	            <label for="selectAll"></label>
            </span>
        </th>
        <th>Product</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
</thead>
    <?php
        $products = [
            ['name' => 'Sản phẩm 1', 'price' => 1000],
            ['name' => 'Sản phẩm 2', 'price' => 2000],
            ['name' => 'Sản phẩm 3', 'price' => 3000]
        ];
        foreach ($products as $product): ?>
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox_<?php echo $product['name']; ?>" name="options[]" value="1">
                        <label for="checkbox_<?php echo $product['name']; ?>"></label>
                    </span>
                 </td>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo htmlspecialchars($product['price']); ?></td>
                <td>
                    <a href="#editProductModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a href="#deleteProductModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</a>
                </td>
            </tr>
    <?php endforeach; ?>
</table>
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal"
    data-target="#exampleModal<?php echo $product['id'] ?>">
    Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $product['id'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <span style="color:red;"><?php echo $product['name'] ?></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="functions/products/delete_product.php?id=<?php echo $product['id'] ?>"
                    class="btn btn-danger">delete</a>
            </div>
        </div>
    </div>
</div>
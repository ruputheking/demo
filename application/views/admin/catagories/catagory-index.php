<table class="table table-bordered table-hover table-striped table-dark data-table" id="myTable">
    <thead>
        <tr>
            <td>#</td>
            <td>Catagory Name</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($catagories as $key => $catagory): ?>
            <tr>
                <td><?php echo ++$key; ?></td>
                <td><?php echo $catagory['catagory_name'] ?></td>
                <td>
                    <a href="welcome/show/<?php echo $catagory['id']; ?>" class="btn btn-warning btn-sm ajax-modal" data-title="View Catagory"><i class="fa fa-eye"></i></a>
                    <a href="welcome/edit/<?php echo $catagory['id']; ?>" class="btn btn-primary btn-sm ajax-modal me-2 ms-2" data-title="Edit Catagory"><i class="fa fa-pen"></i></a>
                    <a href="welcome/delete/<?php echo $catagory['id']; ?>" class="btn btn-danger btn-sm ajax-delete" data-title="View Catagory"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

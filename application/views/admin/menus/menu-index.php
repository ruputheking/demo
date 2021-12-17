<table class="table table-bordered table-hover table-striped table-dark data-table" id="myTable">
    <thead>
        <tr>
            <td>#</td>
            <td>Menu Name</td>
            <td>Catagory</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($menus as $key => $menu): ?>
            <tr>
                <td><?php echo ++$key; ?></td>
                <td><?php echo $menu['title']; ?></td>
                <td><?php echo $menu['catagory_name']; ?></td>
                <td>
                    <a href="menu/show/<?php echo $menu['id']; ?>" class="btn btn-warning btn-sm ajax-modal" data-title="View Menu"><i class="fa fa-eye"></i></a>
                    <a href="menu/edit/<?php echo $menu['id']; ?>" class="btn btn-primary btn-sm ajax-modal me-2 ms-2" data-title="Edit Menu"><i class="fa fa-pen"></i></a>
                    <a href="menu/delete/<?php echo $menu['id']; ?>" class="btn btn-danger btn-sm ajax-delete" data-title="View Menu"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

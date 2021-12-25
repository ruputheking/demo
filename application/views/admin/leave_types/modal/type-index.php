<table class="table table-bordered table-hover table-striped table-dark data-table" id="myTable">
    <thead>
        <tr>
            <td>#</td>
            <td>Vacation Name</td>
            <td>Vacation Days</td>
            <td>Per</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($types as $key => $type): ?>
            <tr>
                <td><?php echo ++$key; ?></td>
                <td><?php echo $type['title']; ?></td>
                <td><?php echo $type['vacation']; ?></td>
                <td><?php echo $type['per_type']; ?></td>
                <td>
                    <a href="leavetypes/show/<?php echo $type['id']; ?>" class="btn btn-warning btn-sm ajax-modal" data-title="View Applciation"><i class="fa fa-eye"></i> </a>
                    <a href="leavetypes/edit/<?php echo $type['id']; ?>" class="btn btn-primary btn-sm ajax-modal" data-title="Edit Application"><i class="fa fa-pen"></i> </a>
                    <a href="leavetypes/delete/<?php echo $type['id']; ?>" class="btn btn-danger btn-sm ajax-delete"><i class="fa fa-trash"></i> </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

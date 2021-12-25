<table class="table table-bordered table-hover table-striped table-dark data-table" id="myTable">
    <thead>
        <tr>
            <td>#</td>
            <td>Title</td>
            <td>Leave Type</td>
            <td>Date</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($applications as $key => $application): ?>
            <tr>
                <td><?php echo ++$key; ?></td>
                <td><?php echo $application['title']; ?></td>
                <td><?php echo $application['leave_title']; ?></td>
                <td><?php echo date('d-M, Y', strtotime($application['from_date'])) . " to " . date('d-M, Y',strtotime($application['to_date'])); ?></td>
                <td>
                    <?php if ($application['status'] == 0): ?>
                        <label class="badge badge-warning">Pending</label>
                    <?php endif; ?>
                    <?php if ($application['status'] == 1): ?>
                        <label class="badge badge-success">Approved</label>
                    <?php endif; ?>
                    <?php if ($application['status'] == 2): ?>
                        <label class="badge badge-danger">Rejected</label>
                    <?php endif; ?>
                    <?php if ($application['status'] == 3): ?>
                        <label class="badge badge-primary">Canceled</label>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="leaveapplications/show/<?php echo $application['id']; ?>" class="btn btn-warning btn-sm ajax-modal" data-title="View Applciation"><i class="fa fa-eye"></i></a>
                    <?php if ($application['status'] == 0): ?>
                        <a href="leaveapplications/edit/<?php echo $application['id']; ?>" class="btn btn-primary btn-sm ajax-modal" data-title="Edit Applciation"><i class="fa fa-pen"></i></a>
                        <a href="leaveapplications/cancel/<?php echo $application['id']; ?>" class="btn btn-danger btn-sm ajax-delete" title="Cancel"><i class="fa fa-times"></i></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

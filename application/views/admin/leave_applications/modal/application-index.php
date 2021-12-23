<table class="table table-bordered table-hover table-striped table-dark data-table" id="myTable">
    <thead>
        <tr>
            <td>#</td>
            <td>Applied By</td>
            <td>Title</td>
            <td>Date</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($applications as $key => $application): ?>
            <tr>
                <td><?php echo ++$key; ?></td>
                <td><?php echo $application['name']; ?></td>
                <td><?php echo $application['title']; ?></td>
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
                    <a href="leaveapplications/show/<?php echo $application['id']; ?>" class="btn btn-warning btn-sm ajax-modal" data-title="View Applciation"><i class="fa fa-eye"></i> View</a>
                    <a href="leaveapplications/approved/<?php echo $application['id']; ?>?status=1" class="btn btn-primary btn-sm ajax-delete"><i class="fa fa-check"></i> Approved</a>
                    <a href="leaveapplications/reject/<?php echo $application['id']; ?>?status=2" class="btn btn-danger btn-sm ajax-delete"><i class="fa fa-times"></i> Reject</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

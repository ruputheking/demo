<table class="table table-bordered">
    <tr>
        <td>Subject</td>
        <td>
            <?php echo $application[0]['title']; ?>
        </td>
    </tr>
    <tr>
        <td>Leave Type</td>
        <td><?php echo $application[0]['leave_title']; ?></td>
    </tr>
    <tr>
        <td>Applied For</td>
        <td><?php echo date('d M Y', strtotime($application[0]['from_date'])) . " to " . date('d M Y',strtotime($application[0]['to_date'])); ?></td>
    </tr>
    <tr>
        <td>Applied In</td>
        <td>
            <?php echo date('d M Y', strtotime($application[0]['created_at'])); ?>
        </td>
    </tr>
    <tr>
        <td>Status</td>
        <td>
            <?php if ($application[0]['status'] == 0): ?>
                <label class="label text-warning">Pending</label>
            <?php endif; ?>
            <?php if ($application[0]['status'] == 1): ?>
                <label class="label text-success">Approved</label>
            <?php endif; ?>
            <?php if ($application[0]['status'] == 2): ?>
                <label class="label text-danger">Rejected</label>
            <?php endif; ?>
            <?php if ($application[0]['status'] == 3): ?>
                <label class="label text-primary">Canceled</label>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <?php echo $application[0]['description']; ?>
        </td>
    </tr>
</table>

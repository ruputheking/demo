@extends(layouts/frontend/main)

@section(content)
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default bg-dark text-white">
                <div class="card-header">
                    <div class="card-title mb-0">
                        Attendance Reports
                    </div>
                </div>
                <div class="card-body">
                    <form class="" action="" method="get">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Month</label>
                                    <input type="month" name="month" class="form-control" value="<?php echo $month; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block" style="margin-top:24px;">View Report</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php if ((!empty($report_data)) || !(empty($month))): ?>
            <div class="col-md-12 mt-4">
                <div class="card card-default bg-dark text-white">
                    <div class="card-body">
                        <div class="text-center clear">
                            <h4>Attendance Report of <?php echo $month ?> </h4><br>
                            <?php if (!empty($report_data)): ?>
                                (CheckIn - CheckOut) time
                            <?php endif; ?>
                        </div>
                        <div class="table-responsive">
                            <?php if (! empty($report_data)): ?>
                                <table class="table table-bordered text-white">
                                    <thead>
                                        <th>Name List</th>
                                        <?php for ($day=1; $day < $num_of_days; $day++) {
                                            echo "<th>" . $day . '</th>';
                                        } ?>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($report_data as $key => $value): ?>
                                            <tr>
                                                <td><?php echo $users[$key]['name'] ?></td>
                                                <?php foreach ($value as $user => $attendance): ?>
                                                    <td class="text-center"><?php echo $attendance; ?></td>
                                                <?php endforeach; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <h5 class="text-center">No records found</h5>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
@endsection

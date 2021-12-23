<?php if ($attendance): ?>

    <?php if ($attendance[0]['checkin_time'] == null): ?>
        <li class="nav-item"><a class="nav-link ajax-submit" href="attendances/checkin">Check In</a></li>
    <?php else: ?>
        <li class="nav-item">
            <a class="nav-link ajax-submit" href="attendances/checkout">Check Out</a>
        </li>
    <?php endif; ?>

<?php else: ?>
    <li class="nav-item">
        <a class="nav-link ajax-submit" href="attendances/checkin">Check In</a>
    </li>
<?php endif; ?>

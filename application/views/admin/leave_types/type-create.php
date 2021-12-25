<form class="appsvan-submit" action="leavetypes/store" method="post">
    <div class="form-group">
        <label class="control-label">Vacation Title <span class="required">*</span></label>
        <input type="text" class="form-control mt-2" name="title" required>
    </div>
    <div class="form-group">
        <label class="control-label">Vacation Days <span class="required">*</span></label>
        <input type="number" class="form-control mt-2" name="vacation" required>
    </div>
    <div class="form-group">
        <label class="control-label">Per</label>
        <select class="form-control" name="per_type" required>
            <option value="">Select One</option>
            <option value="Week">Week</option>
            <option value="Month">Month</option>
            <option value="Year">Year</option>
        </select>
    </div>
    <div class="form-group mt-4">
        <button type="submit" class="btn btn-success btn-sm" name="submit">Save Vacation</button>
    </div>
</form>

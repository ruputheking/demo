@extends(layouts/frontend/main)

@section(content)
<input type="hidden" name="href" value="leaveapplications/lists">
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default bg-dark text-white">
                <div class="card-header">
                    <div class="card-title mb-0">
                        Leave Application List
                    </div>
                </div>
                <div class="card-body">
                    <div id="table-data"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

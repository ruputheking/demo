@extends(layouts/frontend/main)

@section(content)
<input type="hidden" name="href" value="menu/menus">
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default bg-dark text-white">
                <div class="card-header">
                    <div class="card-title">
                        Menu List
                        <div class="float-end">
                            <a href="menu/create" class="btn btn-primary btn-sm ajax-modal">Add New Menu</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="table-data">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

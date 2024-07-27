@include('layouts.header')


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Company data</h3>
                        <input class="form-control" type="search" id="search" name="search" placeholder="Search">
                    <div class="card-body">
                        <table class="table  table-hover table-valign-middle table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>company</th>
                                    <th>email</th>
                                    <th>address</th>
                                    <th>phone number</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('layouts.footer')
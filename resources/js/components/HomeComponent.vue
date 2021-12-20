<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10 offset-sm-1">
                <h3><b>Patient Lists</b></h3>
            </div>

            <div class="col-sm-12">
                <a href=""><button class="btn btn-sm btn-danger"><b>Home</b></button></a>
                <a href="/patient-create"><button class="btn btn-sm btn-primary"><b>Create</b></button></a>
                <a href="/doctors"><button class="btn btn-sm btn-primary"><b>Doctors</b></button></a>
            </div>

            <div class="col-sm-12 my-5">
                <div class="table-responsive">
                    <table class="datatable table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>Jan</td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Jun</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

    }
</script>

<?php
require_once('includes/config.php');
require('header.php');
?>




<body class="bg-light">

    <div class="container pt-5 my-5 ml-3 border border-warning shadow-lg p-3 mb-5 bg-body rounded">

        <h1 class="display-1 text-center text-uppercase fw-bolder">Rabbi Network Outreach</h1>

        <div id="msg"></div>

        <div class="row my-5 justify-content-center">

            <div class="col-md-3">

                <form id="form-submit">
                    <fieldset>
                        <legend class="text-center">New Souls Registration</legend>
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">Full Name</label>
                            <input type="text" name="ns_fname" class="form-control" autofocus id="ns_fname">
                            <span id="ns_fname_err" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">Contact</label>
                            <input type="text" name="ns_contact" class="form-control">
                            <span id="ns_contact_err" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="disabledTextInput" class="form-label">Area</label>
                            <input type="text" name="ns_origin" class="form-control" value="Tema">
                            <span id="ns_origin_err" class="text-danger"></span>
                        </div>

                        <button type="button" class="btn btn-primary">Submit</button>
                    </fieldset>
                </form>

            </div>

            <div class="col-md-9">

                <div style="overflow-x:auto;">
                    <legend class="text-center">Table List</legend>

                    <table class="table table-striped" id="New_Souls_List">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Contact</th>
                                <th>Area</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Contact</th>
                                <th>Area</th>
                            </tr>
                        </tfoot>

                    </table>
                </div>

            </div>

        </div>

    </div>







    <?php
    require('footer.php');
    ?>
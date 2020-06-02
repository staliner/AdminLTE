<?php /*
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2017 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license. */
    require "scripts/pi-hole/php/header.php";
?>


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="m-0 text-dark">Audit log (showing live data)</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-secondary" id="domain-frequency">
                    <div class="card-header">
                        <h3 class="card-title">Allowed queries</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Domain</th>
                                        <th>Hits</th>
                                        <th>Actions</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="overlay">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="card card-outline card-secondary" id="ad-frequency">
                    <div class="card-header">
                        <h3 class="card-title">Blocked queries</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Domain</th>
                                        <th>Hits</th>
                                        <th>Actions</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="overlay">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div>
            </div> <!-- /.col -->
        </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
</div> <!-- /.content -->

<script src="scripts/pi-hole/js/utils.js"></script>
<script src="scripts/pi-hole/js/auditlog.js"></script>

<?php
    require "scripts/pi-hole/php/footer.php";
?>

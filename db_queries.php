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
                <h1 class="m-0 text-dark">Specify date range to be queried from the Pi-hole query database</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card card-outline card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Select date and time range</h3>
                    </div>
                    <div class="card-body">
                        <label class="sr-only" for="querytime">Click to select date and time range</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="far fa-clock"></i>
                                </div>
                            </div>
                            <input type="button" class="form-control" id="querytime" value="Click to select date and time range">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <h3>Query status:</h3>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="row"> <!-- TODO -->
                        <div class="col-md-3">
                            <div><input type="checkbox" id="type_forwarded" checked><label for="type_forwarded">Permitted: forwarded</label><br></div>
                            <div><input type="checkbox" id="type_cached" checked><label for="type_cached">Permitted: cached</label></div>
                        </div>
                        <div class="col-md-3">
                            <div><input type="checkbox" id="type_gravity" checked><label for="type_gravity">Blocked: gravity</label><br></div>
                            <div><input type="checkbox" id="type_external" checked><label for="type_external">Blocked: external</label></div>
                        </div>
                        <div class="col-md-3">
                            <div><input type="checkbox" id="type_blacklist" checked><label for="type_blacklist">Blocked: exact blacklist</label><br></div>
                            <div><input type="checkbox" id="type_regex" checked><label for="type_regex">Blocked: regex blacklist</label></div>
                        </div>
                        <div class="col-md-3">
                            <div><input type="checkbox" id="type_gravity_CNAME" checked><label for="type_gravity_CNAME">Blocked: gravity (CNAME)</label><br></div>
                            <div><input type="checkbox" id="type_blacklist_CNAME" checked><label for="type_blacklist_CNAME">Blocked: exact blacklist (CNAME)</label><br></div>
                            <div><input type="checkbox" id="type_regex_CNAME" checked><label for="type_regex_CNAME">Blocked: regex blacklist (CNAME)</label></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="timeoutWarning" class="alert alert-warning alert-dismissible fade d-none" role="alert">
            Depending on how large of a range you specified, the request may time out while Pi-hole tries to retrieve all the data.
            <br/><span id="err"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <!-- Small boxes (Stat box) -->
        <div class="row mb-3">
            <div class="col-sm-6 col-lg-3">
                <!-- small box -->
                <div class="small-box bg-info no-user-select">
                    <div class="inner">
                        <h3 class="statistic" id="ads_blocked_exact">---</h3>
                        <p>Queries Blocked</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hand-paper"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-sm-6 col-lg-3">
                <!-- small box -->
                <div class="small-box bg-info no-user-select">
                    <div class="inner">
                        <h3 class="statistic" id="ads_wildcard_blocked">---</h3>
                        <p>Queries Blocked (Wildcards)</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hand-paper"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-sm-6 col-lg-3">
                <!-- small box -->
                <div class="small-box bg-success no-user-select">
                    <div class="inner">
                        <h3 class="statistic" id="dns_queries">---</h3>
                        <p>Queries Total</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-globe-americas"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-sm-6 col-lg-3">
                <!-- small box -->
                <div class="small-box bg-warning no-user-select">
                    <div class="inner">
                        <h3 class="statistic" id="ads_percentage_today">---</h3>
                        <p>Queries Blocked</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
              <div class="card card-outline card-secondary" id="recent-queries">
                <div class="card-header">
                  <h3 class="card-title">Recent Queries</h3>
                </div>
                <div class="card-body">
                    <table id="all-queries" class="table table-striped table-bordered w-100">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Type</th>
                                <th>Domain</th>
                                <th>Client</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Time</th>
                                <th>Type</th>
                                <th>Domain</th>
                                <th>Client</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
              </div>
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
</div> <!-- /.content -->

<script src="scripts/vendor/daterangepicker.min.js"></script>
<script src="scripts/pi-hole/js/db_queries.js"></script>

<?php
    require "scripts/pi-hole/php/footer.php";
?>

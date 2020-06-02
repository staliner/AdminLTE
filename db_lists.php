<?php /*
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2017 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license. */
    require "scripts/pi-hole/php/header.php";
?>

<!-- Sourceing CSS colors from stylesheet to be used in JS code -->
<span class="queries-permitted"></span>
<span class="queries-blocked"></span>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="m-0 text-dark">Compute Top Lists from the Pi-hole query database</h1>
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

        <div id="timeoutWarning" class="alert alert-warning alert-dismissible fade d-none" role="alert">
            Depending on how large of a range you specified, the request may time out while Pi-hole tries to retrieve all the data.
            <br/>
            <span id="err"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <?php
        if ($boxedlayout) {
            $tablelayout = "col-md-6";
        } else {
            $tablelayout = "col-md-6 col-lg-4";
        }
        ?>
        <div class="row">
            <div class="<?php echo $tablelayout; ?>">
              <div class="card card-outline card-secondary" id="domain-frequency">
                <div class="card-header">
                  <h3 class="card-title">Top Domains</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                          <tbody>
                            <tr>
                            <th>Domain</th>
                            <th>Hits</th>
                            <th>Frequency</th>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="overlay" hidden>
                  <i class="fas fa-2x fa-sync fa-spin"></i>
                </div>
              </div>
            </div>
            <!-- /.col -->
            <div class="<?php echo $tablelayout; ?>">
              <div class="card card-outline card-secondary" id="ad-frequency">
                <div class="card-header">
                  <h3 class="card-title">Top Blocked Domains</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                          <tbody>
                            <tr>
                            <th>Domain</th>
                            <th>Hits</th>
                            <th>Frequency</th>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="overlay" hidden>
                  <i class="fas fa-2x fa-sync fa-spin"></i>
                </div>
              </div>
            </div>
            <!-- /.col -->
            <div class="<?php echo $tablelayout; ?>">
              <div class="card card-outline card-secondary" id="client-frequency">
                <div class="card-header">
                  <h3 class="card-title">Top Clients</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                          <tbody>
                            <tr>
                            <th>Client</th>
                            <th>Requests</th>
                            <th>Frequency</th>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="overlay" hidden>
                  <i class="fas fa-2x fa-sync fa-spin"></i>
                </div>
              </div>
            </div><!-- /.col -->
        </div>
    </div> <!-- /.container-fluid -->
</div> <!-- /.content -->

<script src="scripts/vendor/daterangepicker.min.js"></script>
<script src="scripts/pi-hole/js/utils.js"></script>
<script src="scripts/pi-hole/js/db_lists.js"></script>

<?php
    require "scripts/pi-hole/php/footer.php";
?>

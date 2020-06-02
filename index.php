<?php /*
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2017 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license. */
    $indexpage = true;
    require "scripts/pi-hole/php/header.php";
    require_once("scripts/pi-hole/php/gravity.php");

    function getinterval() {
        global $piholeFTLConf;
        if (isset($piholeFTLConf["MAXLOGAGE"])) {
             return round(floatval($piholeFTLConf["MAXLOGAGE"]), 1);
        } else {
             return "24";
        }
    }
?>

<!-- Sourceing CSS colors from stylesheet to be used in JS code -->
<span class="queries-permitted"></span>
<span class="queries-blocked"></span>
<span class="graphs-grid"></span>
<span class="graphs-ticks"></span>

<div class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row pt-4">
            <div class="col-sm-6 col-lg-3">
                <div class="small-box bg-success no-user-select" id="total_queries" title="only A + AAAA queries">
                    <div class="inner">
                        <p>Total queries (<span id="unique_clients">-</span> clients)</p>
                        <h3 class="statistic"><span id="dns_queries_today">---</span></h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-globe-americas"></i>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="small-box bg-info no-user-select">
                    <div class="inner">
                        <p>Queries Blocked</p>
                        <h3 class="statistic"><span id="queries_blocked_today">---</span></h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-hand-paper"></i>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="small-box bg-warning no-user-select">
                    <div class="inner">
                        <p>Percent Blocked</p>
                        <h3 class="statistic"><span id="percentage_blocked_today">---</span></h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="small-box bg-danger no-user-select" title="<?php echo gravity_last_update(); ?>">
                    <div class="inner">
                        <p>Domains on Blocklist</p>
                        <h3 class="statistic"><span id="domains_being_blocked">---</span></h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-list-alt"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
            <div class="card card-outline card-secondary" id="queries-over-time">
                <div class="card-header">
                  <h3 class="card-title">Total queries over last <?php echo getinterval(); ?> hours</h3>
                </div>
                <div class="card-body">
                  <div class="chart">
                    <canvas id="queryOverTimeChart" width="800" height="140"></canvas>
                  </div>
                </div>
                <div class="overlay">
                  <i class="fas fa-2x fa-sync fa-spin"></i>
                </div>
              </div>
            </div>
        </div>

        <?php
          // If the user is logged in, then we show the more detailed index page.
          // Even if we would include them here anyhow, there would be nothing to
          // show since the API will respect the privacy of the user if he defines
          // a password
          if($auth){ ?>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card card-outline card-secondary" id="clients">
                    <div class="card-header">
                        <h3 class="card-title">Client activity over last <?php echo getinterval(); ?> hours</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart">
            <canvas id="clientsChart" width="800" height="140" class="extratooltipcanvas no-user-select"></canvas>
                        </div>
                    </div>
                    <div class="overlay">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card card-outline card-secondary" id="query-types-pie">
                    <div class="card-header">
                        <h3 class="card-title">Query Types</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-6">
                                <canvas id="queryTypePieChart" width="120" height="120"></canvas>
                            </div>
                            <div class="col-6">
                                <div id="query-types-legend" class="chart-legend"></div>
                            </div>
                        </div>
                    </div>
                    <div class="overlay">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-outline card-secondary" id="forward-destinations-pie">
                    <div class="card-header">
                      <h3 class="card-title">Queries answered by</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-6">
            <canvas id="forwardDestinationPieChart" width="120" height="120" class="extratooltipcanvas no-user-select"></canvas>
                            </div>
                            <div class="col-6">
            <div id="forward-destinations-legend" class="chart-legend extratooltipcanvas no-user-select"></div>
                            </div>
                        </div>
                    </div>
                    <div class="overlay">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div>
            </div>
        </div>

        <?php
            if ($boxedlayout) {
              $tablelayout = "col-md-6";
            } else {
              $tablelayout = "col-md-6 col-lg-6";
            }
        ?>

        <div class="row mt-3">
            <div class="<?php echo $tablelayout; ?>">
                <div class="card card-outline card-secondary" id="domain-frequency">
                    <div class="card-header">
                        <h3 class="card-title">Top Permitted Domains</h3>
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
                    <div class="overlay">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div>
            </div>

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
                    <div class="overlay">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="<?php echo $tablelayout; ?>">
                <div class="card card-outline card-secondary" id="client-frequency">
                    <div class="card-header">
                        <h3 class="card-title">Top Clients (total)</h3>
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
                    <div class="overlay">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div>
            </div>

              <div class="<?php echo $tablelayout; ?>">
                <div class="card card-outline card-secondary" id="client-frequency-blocked">
                    <div class="card-header">
                        <h3 class="card-title">Top Clients (blocked only)</h3>
                    </div>
                    <!-- /.card-header -->
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
                    <div class="overlay">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div>
            </div>
        </div>

        <?php } ?>
    </div> <!-- /.container-fluid -->
</div> <!-- /.content -->

<script src="scripts/pi-hole/js/utils.js"></script>
<script src="scripts/pi-hole/js/index.js"></script>

<?php
    require "scripts/pi-hole/php/footer.php";
?>

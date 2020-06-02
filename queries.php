<?php /*
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2017 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license. */
    require "scripts/pi-hole/php/header.php";

$showing = "";

if(isset($setupVars["API_QUERY_LOG_SHOW"]))
{
    if($setupVars["API_QUERY_LOG_SHOW"] === "all")
    {
        $showing = "showing";
    }
    elseif($setupVars["API_QUERY_LOG_SHOW"] === "permittedonly")
    {
        $showing = "showing permitted";
    }
    elseif($setupVars["API_QUERY_LOG_SHOW"] === "blockedonly")
    {
        $showing = "showing blocked";
    }
    elseif($setupVars["API_QUERY_LOG_SHOW"] === "nothing")
    {
        $showing = "showing no queries (due to setting)";
    }
}
else
{
    // If filter variable is not set, we
    // automatically show all queries
    $showing = "showing";
}

$showall = false;
if(isset($_GET["all"]))
{
    $showing .= " all queries within the Pi-hole log";
}
else if(isset($_GET["client"]))
{
    $showing .= " queries for client ".htmlentities($_GET["client"]);
}
else if(isset($_GET["domain"]))
{
    $showing .= " queries for domain ".htmlentities($_GET["domain"]);
}
else if(isset($_GET["from"]) || isset($_GET["until"]))
{
    $showing .= " queries within specified time interval";
}
else
{
    $showing .= " up to 100 queries";
    $showall = true;
}

if(isset($setupVars["API_PRIVACY_MODE"]))
{
    if($setupVars["API_PRIVACY_MODE"])
    {
        // Overwrite string from above
        $showing .= ", privacy mode enabled";
    }
}

if(strlen($showing) > 0)
{
    $showing = "(".$showing.")";
    if($showall)
        $showing .= ", <a href=\"?all\">show all</a>";
}
?>

<div class="content">
    <div class="container-fluid">
        <!-- Alert Modal -->
        <div id="alertModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="fa-stack fa-2x mb-2">
                            <div class="alProcessing">
                                <i class="fa-stack-2x alSpinner"></i>
                            </div>
                            <div class="alSuccess d-none">
                                <i class="fas fa-circle fa-stack-2x text-green"></i>
                                <i class="fas fa-check fa-stack-1x fa-inverse"></i>
                            </div>
                            <div class="alFailure d-none">
                                <i class="fas fa-circle fa-stack-2x text-red"></i>
                                <i class="fas fa-times fa-stack-1x fa-inverse"></i>
                            </div>
                        </div>
                        <div class="alProcessing">Adding <span id="alDomain"></span> to the <span id="alList"></span>...</div>
                        <div class="alSuccess font-weight-bold text-green d-none"><span id="alDomain"></span> successfully added to the <span id="alList"></span></div>
                        <div class="alFailure font-weight-bold text-red d-none">
                            <span id="alNetErr">Timeout or Network Connection Error!</span>
                            <span id="alCustomErr"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-md-12">
              <div class="card card-outline card-secondary" id="recent-queries">
                <div class="card-header">
                  <h3 class="card-title">Recent Queries <?php echo $showing; ?></h3>
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
                                <th>Reply</th>
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
                                <th>Reply</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                    <div> <!-- TODO -->
                        <input type="checkbox" id="autofilter">
                        <label for="autofilter">Apply filtering on click on Type, Domain, and Clients</label>
                    </div>
                    <button type="button" id="resetButton" class="btn btn-danger btn-sm my-2 d-none">Clear Filters</button>
                </div>
              </div>
            </div>
        </div> <!-- /.row -->
    </div> <!-- /.container-fluid -->
</div> <!-- /.content -->

<script src="scripts/pi-hole/js/utils.js"></script>
<script src="scripts/pi-hole/js/queries.js"></script>

<?php
    require "scripts/pi-hole/php/footer.php";
?>

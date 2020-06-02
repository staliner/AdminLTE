<?php /*
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2019 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license. */
    require "scripts/pi-hole/php/header.php";
    $type = "all";
    $pagetitle = "Domain";
    $adjective = "";
    if (isset($_GET['type']) && ($_GET['type'] === "white" || $_GET['type'] === "black")) {
        $type = $_GET['type'];
        $pagetitle = ucfirst($type)."list";
        $adjective = $type."listed";
    }
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="m-0 text-dark"><?php echo $pagetitle; ?> management</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <!-- Domain Input -->
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card card-outline card-secondary" id="add-group">
                    <div class="card-header">
                        <h3 class="card-title">Add a new <?php echo $adjective; ?> domain or regex filter</h3>
                    </div>

                    <div class="card-body">
                        <ul class="nav nav-tabs">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" href="#tab_domain" aria-controls="tab_domain" aria-expanded="true" role="tab" data-toggle="tab">Domain</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="#tab_regex" aria-controls="tab_regex" aria-expanded="false" role="tab" data-toggle="tab">RegEx filter</a>
                            </li>
                        </ul>
                        <div class="tab-content mt-3">
                            <!-- Domain tab -->
                            <div id="tab_domain" class="tab-pane active fade show">
                                <div class="row"> <!-- TODO -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="new_domain">Domain:</label>
                                            <input id="new_domain" type="url" class="form-control active" placeholder="Domain to be added" autocomplete="off" spellcheck="false" autocapitalize="none" autocorrect="off">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="new_domain_comment">Comment:</label>
                                            <input id="new_domain_comment" type="text" class="form-control" placeholder="Description (optional)">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <div>
                                            <input type="checkbox" id="wildcard_checkbox">
                                            <label for="wildcard_checkbox"><strong>Add domain as wildcard</strong></label>
                                            <p>Check this checkbox if you want to involve all subdomains. The entered domain will be converted to a RegEx filter while adding.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- RegEx tab -->
                            <div id="tab_regex" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="new_regex">Regular Expression:</label>
                                            <input id="new_regex" type="text" class="form-control active" placeholder="RegEx to be added">
                                        </div>
                                        <div class="form-group">
                                            <strong>Hint:</strong> Need help to write a proper RegEx rule? Have a look at our online
                                            <a href="https://docs.pi-hole.net/ftldns/regex/tutorial" rel="noopener" target="_blank">regular expressions tutorial</a>.
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="new_regex_comment">Comment:</label>
                                        <input id="new_regex_comment" type="text" class="form-control" placeholder="Description (optional)">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center text-md-right">
                                <?php if ($type !== "white") { ?>
                                <button type="button" class="btn btn-primary" id="add2black">Add to Blacklist</button>
                                <?php } if ($type !== "black") { ?>
                                <button type="button" class="btn btn-primary ml-4" id="add2white">Add to Whitelist</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Domain List -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-secondary" id="domains-list">
                    <div class="card-header">
                        <h3 class="card-title">List of <?php echo $adjective; ?> entries</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="domainsTable" class="table table-striped table-bordered w-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Domain/RegEx</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Comment</th>
                                        <th>Group assignment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <button type="button" id="resetButton" class="btn btn-danger btn-sm my-2 d-none">Reset sorting</button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /.container-fluid -->
</div> <!-- /.content -->

<script src="scripts/vendor/bootstrap-select.min.js"></script>
<script src="scripts/vendor/bootstrap-toggle.min.js"></script>
<script src="scripts/pi-hole/js/utils.js"></script>
<script src="scripts/pi-hole/js/groups-domains.js"></script>

<?php
    require "scripts/pi-hole/php/footer.php";
?>

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
                <h1 class="m-0 text-dark">Find Blocked Domain In Lists</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row mt-3">
          <div class="col-md-12">
            <div class="card card-outline card-secondary">
              <div class="card-body">
                <div class="form-group">
                  <div class="input-group">
                    <input id="domain" type="text" class="form-control" placeholder="Domain to look for (example.com or sub.example.com)">
                    <input id="quiet" type="hidden" value="no">
                    <span class="input-group-btn">
                      <button type="button" id="btnSearch" class="btn btn-light">Search partial match</button>
                      <button type="button" id="btnSearchExact" class="btn btn-light">Search exact match</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <pre id="output" class="w-100 h-100 bg-light d-none"></pre>
    </div> <!-- /.container-fluid -->
</div> <!-- /.content -->

<script src="scripts/pi-hole/js/queryads.js"></script>

<?php
    require "scripts/pi-hole/php/footer.php";
?>

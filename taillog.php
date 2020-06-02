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
                <h1 class="m-0 text-dark">Output the last lines of the pihole.log file (live)</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <!-- TODO -->
        <div>
            <input type="checkbox" checked id="chk1">
            <label for="chk1">Automatic scrolling on update</label>
        </div>
        <pre id="output" class="w-100 h-100 bg-light" style="max-height:650px; overflow-y:scroll;"></pre>

        <!-- TODO -->
        <div>
            <input type="checkbox" checked id="chk2">
            <label for="chk2">Automatic scrolling on update</label>
        </div>
    </div> <!-- /.container-fluid -->
</div> <!-- /.content -->

<script src="scripts/pi-hole/js/taillog.js"></script>

<?php
    require "scripts/pi-hole/php/footer.php";
?>

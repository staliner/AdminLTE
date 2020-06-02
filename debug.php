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
                <h1 class="m-0 text-dark">Generate debug log</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <!-- TODO -->
        <div>
            <input type="checkbox" id="upload">
            <label for="upload">Upload debug log and provide token once finished</label>
        </div>

        <p>Once you click this button a debug log will be generated and can automatically be uploaded if we detect a working internet connection.</p>

        <button type="button" id="debugBtn" class="btn btn-lg btn-primary btn-block">Generate debug log</button>

        <pre id="output" class="w-100 h-100 bg-light d-none"></pre>
    </div> <!-- /.container-fluid -->
</div> <!-- /.content -->

<script src="scripts/pi-hole/js/debug.js"></script>

<?php
    require "scripts/pi-hole/php/footer.php";
?>

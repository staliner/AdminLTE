<?php /*
*    Pi-hole: A black hole for Internet advertisements
*    (c) 2020 Pi-hole, LLC (https://pi-hole.net)
*    Network-wide ad blocking via your own hardware.
*
*    This file is copyright under the latest version of the EUPL.
*    Please see LICENSE file for your rights under this license. */
    require "scripts/pi-hole/php/header.php";
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 text-dark">
                <h1 class="m-0">Pi-hole diagnosis</h1>
                <h2 class="h4">On this page, you can see messages from your Pi-hole concerning possible issues.</h2>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-secondary" id="messages-list">
                    <div class="card-body">
                        <table id="messagesTable" class="table table-striped table-bordered w-100">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Time</th>
                                <th>Type</th>
                                <th>Message</th>
                                <th>Data1</th>
                                <th>Data2</th>
                                <th>Data3</th>
                                <th>Data4</th>
                                <th>Data5</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /.container-fluid -->
</div> <!-- /.content -->

<script src="scripts/pi-hole/js/utils.js"></script>
<script src="scripts/pi-hole/js/messages.js"></script>

<?php
    require "scripts/pi-hole/php/footer.php";
?>

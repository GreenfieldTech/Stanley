<div id="channels"  ng-controller="channelsCtrl">


<div class="panel panel-primary">
    <div class="panel-heading">
        Active Channel
    </div>
    <div class="panel-body">

        <span  class="col-md-2 col-md-offset-5" data-ng-show="channels.length==0">No channels</span>
        <p data-ng-show="channels.length > 0">Search : <input  data-ng-model="query"> </p>

        <table class="table table-bordered table-responsive"  data-ng-show="channels.length > 0" >
            <thead>
            <tr>
                <th>ID</th>
                <th>State</th>
                <th>Name</th>
                <th>Caller</th>
                <th>DialPlan</th>
                <th>Connected</th>
                <th>RemoveChannel</th>

            </tr>
            </thead>
            <tbody>
            <tr  data-ng-repeat="channel in channels | filter:query" data-ng-class="{Up: 'success', Ringing: 'danger'}[channel.state]" >
                <td>{{channel.id}}</td>
                <td>{{channel.state}}</td>
                <td>{{channel.name}}</td>
                <td>{{channel.caller}}</td>
                <td>{{channel.dialplan}}</td>
                <td>{{channel.connected}}</td>
                <td>
                    <a  data-ng-click="deleteChannel(channel.id)"  href="#" class="btn btn-danger btn-large"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
</div>

</div>

<!--End Advanced Tables -->
</div>
</div>




<script language="JavaScript" src="<?php echo BASE_URL; ?>assets/js/jquery-1.10.2.js"></script>
<script language="JavaScript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
<script language="JavaScript" src="<?php echo BASE_URL; ?>assets/js/constants.js"></script>
<script language="JavaScript" src="<?php echo BASE_URL;  ?>assets/js/jquery.metisMenu.js"></script>
<script language="JavaScript" src="<?php echo BASE_URL;  ?>assets/js/morris/morris.js"></script>
<script language="JavaScript" src="<?php echo BASE_URL;  ?>assets/js/morris/raphael-2.1.0.min.js"></script>



<!-- Date Range Picker -->
<script language="JavaScript" src="<?php echo BASE_URL; ?>assets/js/dateRangePicker/moment.js"></script>
<script language="JavaScript" src="<?php echo BASE_URL; ?>assets/js/dateRangePicker/daterangepicker.js"></script>
<script language="JavaScript" src="<?php echo BASE_URL; ?>assets/js/dateRangePicker/mDateRangePicker.js"></script>

<!--<script language="JavaScript" src="--><?php //echo BASE_URL; ?><!--assets/js/analytics/dashboard.js"></script>-->

<!-- DATA TABLE SCRIPTS -->
<script src="<?php echo BASE_URL;  ?>assets/js/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo BASE_URL;  ?>assets/js/dataTables/dataTables.bootstrap.js"></script>


<script  language="JavaScript" src="<?php echo BASE_URL; ?>assets/angular/angular.min.js"></script>
<script  language="JavaScript" src="<?php echo BASE_URL; ?>assets/angular/app/controllers.js"></script>


<div id="dynamic-script">

    <?php

    if(isset($injectionScript))
        echo $injectionScript;

    ?>

</div>

</body>
</html>
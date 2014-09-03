
<div id="channels"  ng-controller="endPointsCtrl">

<div class="panel panel-primary">
    <div class="panel-heading">
        Registered End Points
    </div>
    <div class="panel-body">

        <span  class="col-md-2 col-md-offset-5" data-ng-show="channels.length==0">No end Points registered</span>
        <p data-ng-show="endPoints.length > 0">Search : <input  data-ng-model="queryEndPoints"> </p>

        <table class="table table-bordered table-responsive"  data-ng-show="endPoints.length > 0" >
            <thead>
            <tr>
                <th>Technology</th>
                <th>Resource</th>
                <th>State</th>
                <th>ChannelIDs</th>


            </tr>
            </thead>
            <tbody>
            <tr  data-ng-repeat="endPoint in endPoints | filter:queryEndPoints" data-ng-class="{online : 'success', offline : 'warning' ,unknown: 'danger' || 'warning'}[endPoint.state]" >
                <td>{{endPoint.technology}}</td>
                <td>{{endPoint.resource}}</td>
                <td>{{endPoint.state}}</td>
                <td>{{endPoint.channel_ids}}</td>
<!--                <td>-->
<!--                    <a  data-ng-click="deleteChannel(channel.id)"  href="#" class="btn btn-danger btn-large"><i class="fa fa-times"></i></a>-->
<!--                </td>-->
            </tr>
            </tbody>
        </table>

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
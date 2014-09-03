<?php
/**
 * Created by PhpStorm.
 * User: Leonid
 * Date: 5/13/14
 * Time: 12:20 PM
 */

?>
<!--Here we finish the information about the -->
<!-- /. ROW  -->

</div>
</div>
</div>

<!--<input type="hidden" id="site-maindashboard-url"   value="--><?php //echo MAIN_DASH_URL; ?><!--" />-->
<!--<input type="hidden" id="site-authenticate-url"    value="--><?php //echo REST_URL; ?><!--" />-->
<!--<input type="hidden" id="site-restapi-url"         value="--><?php //echo REST_URL; ?><!--" />-->
<!--<input type="hidden" id="site-cdr-url"             value="--><?php //echo CDR_URL; ?><!--" />-->
<!--<input type="hidden" id="site-dash-url"            value="--><?php //echo DASH_URL; ?><!--" />-->
<!--<input type="hidden" id="site-live-dash-url"       value="--><?php //echo LIVE_DASH_URL; ?><!--" />-->




<script language="JavaScript" src="<?php echo BASE_URL; ?>assets/js/jquery-1.10.2.js"></script>
<script language="JavaScript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
<script language="JavaScript" src="<?php echo BASE_URL; ?>assets/js/welcome/authentication.js"></script>
<script language="JavaScript" src="<?php echo BASE_URL; ?>assets/js/constants.js"></script>
<!--<script language="JavaScript" src="--><?php //echo BASE_URL;  ?><!--assets/js/jquery.metisMenu.js"></script>-->
<script language="JavaScript" src="<?php echo BASE_URL;  ?>assets/js/morris/morris.js"></script>
<script language="JavaScript" src="<?php echo BASE_URL;  ?>assets/js/morris/raphael-2.1.0.min.js"></script>









<!-- Date Range Picker -->
<script language="JavaScript" src="<?php echo BASE_URL; ?>assets/js/dateRangePicker/moment.js"></script>
<script language="JavaScript" src="<?php echo BASE_URL; ?>assets/js/dateRangePicker/daterangepicker.js"></script>
<script language="JavaScript" src="<?php echo BASE_URL; ?>assets/js/dateRangePicker/mDateRangePicker.js"></script>
<script src="../../../assets/js/jquery.metisMenu.js"></script>
<!--<script language="JavaScript" src="--><?php //echo BASE_URL; ?><!--assets/js/analytics/cdr.js"></script>-->
<!--<script language="JavaScript" src="--><?php //echo BASE_URL; ?><!--assets/js/analytics/dashboard.js"></script>-->

<!-- DATA TABLE SCRIPTS -->
<script src="<?php echo BASE_URL;  ?>assets/js/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo BASE_URL;  ?>assets/js/dataTables/dataTables.bootstrap.js"></script>


<div id="dynamic-script">

    <?php

    if(isset($injectionScript))
        echo $injectionScript;



    ?>

</div>


</body>
</html>



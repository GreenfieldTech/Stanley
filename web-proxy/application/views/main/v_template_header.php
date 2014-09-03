<!DOCTYPE html>
<html  ng-app="ariApp"  xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="pragma" content="no-cache">
    <title>Tutorial</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo BASE_URL;  ?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!--    <link href="--><?php //echo BASE_URL;  ?><!--assets/css/font-awesome.css" rel="stylesheet" />-->
    <!-- MORRIS CHART STYLES-->
    <link href="<?php echo BASE_URL;  ?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="<?php echo BASE_URL;  ?>assets/css/custom.css" rel="stylesheet" />
    <!-- TABLES STYLES-->
    <link href="<?php echo BASE_URL;  ?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo MAIN_DASH_URL;  ?>"><i class="fa fa-asterisk fa-1x"></i>&nbsp;Monitoring</a>
        </div>
        <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;"> Last access : Monday 21.06  &nbsp; <a id="logOut"  href="<?php echo MAIN_DASH_URL;  ?>logOut" class="btn btn-danger square-btn-adjust">Logout</a> </div>
    </nav>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">

            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="<?php echo BASE_URL;  ?>assets/img/find_user.png" class="user-image img-responsive"/>
                </li>


                <li>
                    <a id="endPointPage-link" class="mMenu"  href="<?php echo MAIN_DASH_URL;  ?>redirectToEndPointsPage"><i class="fa fa-plug fa-3x"></i>End Points</a>
                </li>

                <li>
                    <a id="channelPage-link" class="mMenu"  href="<?php echo MAIN_DASH_URL;  ?>redirectToChannelsPage"><i class="fa fa-sliders fa-3x"></i>Active Channels</a>
                </li>


                <!--                <li>-->
<!--                    <a id="active-profile-link" class="mMenu"  href="--><?php //echo MAIN_DASH_URL;  ?><!--redirectToActiveCallsDashBoardPage"><i class="fa fa-phone-square fa-3x"></i>Active</a>-->
<!--                </li>-->
<!--<!--                <li>-->
<!--<!--                    <a id="call-detail-record-link" class="mMenu"  href="--><?php ////echo MAIN_DASH_URL;  ?><!--<!--redirectToCallDetailedRecordPage"><i class="fa fa-asterisk fa-3x"></i> Call detailed records</a>-->
<!--<!--                </li>-->
<!--                <li>-->
<!--                    <a id="trace-call-detail-record-link" class="mMenu"  href="--><?php //echo MAIN_DASH_URL;  ?><!--redirectToTraceCallDetailedRecordPage"><i class="fa fa-headphones fa-3x"></i>CDR analyzer</a>-->
<!--                </li>-->
<!---->
<!---->
<!--                <li>-->
<!--                    <a id="reports-detail-record-link" class="mMenu"  href="--><?php //echo MAIN_DASH_URL;  ?><!--redirectToReportsPage"><i class="fa fa-bar-chart-o fa-3x"></i> Reports</a>-->
<!--                </li>-->
<!---->
<!--                <li>-->
<!--                    <a id="debug-link" class="mMenu"  href="--><?php //echo MAIN_DASH_URL;  ?><!--redirectToDebugPage"><i class="fa fa-bug fa-3x"></i> Debug</a>-->
<!--                </li>-->
<!---->
<!--                <li>-->
<!--                    <a id="callback-link" class="mMenu"  href="--><?php //echo MAIN_DASH_URL;  ?><!--redirectToCallBackPlayGroundPage"><i class="fa fa-cloud-upload fa-3x"></i>Call Back Play Ground</a>-->
<!--                </li>-->
<!---->
<!---->
<!---->
<!--                <li>-->
<!--                    <a id="add-user-link" class="mMenu"  href="--><?php //echo MAIN_DASH_URL;  ?><!--redirectToSignInPage"><i class="fa fa-globe fa-3x"></i>Add User</a>-->
<!--                </li>-->
<!---->



            </ul>




        </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Admin Dashboard</h2>
                    <h5>Welcome  <strong>Leonid</strong> , Love to see you back. </h5>
                </div>
            </div>
            <hr />

            <!--  Dynamic context will go here and will be closed in the v_template_footer class  -->





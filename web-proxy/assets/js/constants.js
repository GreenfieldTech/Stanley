
var EMPTY_FIELD_MESSAGE = "One of the fields is empty...";

/**
 * Created by Leonid on 5/12/14.
 */
var FUNCTION_NAMES = {
    'authentication_function'                       : "authentication",
    'main_dashboard_function'                       : "index",
    'calculateOrReceiveFromSessionDashBoardDetails' : "calculateOrReceiveFromSessionDashBoardDetails",
    'callDetailedRecordStatistics'                  : "callDetailedRecordStatistics",
    'callDispositionStatistics'                     : "callDispositionStatistics",
    'jobsAndStatisticsPerBSTube'                    : "jobsAndStatisticsPerBSTube",
    'reflectLiveSessions'                           : "reflectLiveSessions",
    'createStatisticsReport'                        : "createStatisticsReport",
    'createDispositionReport'                       : "createDispositionReport",
    'createUser'                                    : "createUser",
    'getDebugUsers'                                 : "getDebugUsers",
    'updateProductionURL'                           : "updateProductionURL",
    'updateDebugURL'                                : "updateDebugURL",
    'removeDebugUser'                               : "removeDebugUser",
    'setDebugUser'                                  : "setDebugUser",
    'setCallBackJob'                                : "setCallBackJob",
    'getCallBackJobs'                               : "getCallBackJobs",
    'removeCallBackJob'                             : "removeCallBackJob"
};

var  TIME_UNITS = {
    'days'    : "days",
    'hours'   : "hours",
    'minutes' : "minutes",
    'seconds' : "seconds"
};


var URI_NAMES = {

    'MAIN_DASH'          : $("#site-maindashboard-url").val(),
    'REST_URL'           : $("#site-restapi-url").val(),
    'CDR_URL'            : $("#site-cdr-url").val(),
    'DASH_URL'           : $("#site-dash-url").val(),
    'LIVE_DASH_URL'      : $("#site-live-dash-url").val(),
    'TR_CDR_URL'         : $("#site-tr-cdr-url").val(),
    'REPORTS_DASH_URL'   : $("#site-reports-dash-url").val(),
    'CREATE_USER_URL'    : $("#site-create-user-url").val(),
    'GELF2_SERVER_QUERY' : $("#site-gelf2-server-url").val(),
    'GELF2_SERVER_AUTH'  : $("#site-gelf2-server-auth").val(),
    'DEBUG_URL'          : $("#site-debug-url").val(),
    'CALLBACK_URL'       : $("#site-callback-url").val()
};


var TUBES = {

    'jobtube'   : "spool",
    'cdrtube'   : "cdrs",
    'eventtube' : "events"

};


// 'http://localhost/eslane-asterisk/var/www/html/eslane/v1/index.php/main/c_dashboard/callDetailedRecordStatistics',

/**
 * This function will show the alerts from each point in our dashboard
 * @param messageText
 * @param attrClass
 * @param id
 * @param spinnerID
 * @param spinnerOff
 * @returns {boolean}
 */
function showStatus(messageText , attrClass , id ,spinnerID , spinnerOff)
{
    if(spinnerOff == true)
        $("#" + spinnerID).hide();
    else
        $("#" +  spinnerID).show();

    $("#" + id)
        .hide()
        .attr('class', 'alert' + ' ' + attrClass)
        .text(messageText)
        .fadeIn();

    return false;

}
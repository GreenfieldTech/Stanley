///**
// * This function create a date range by setting value of 2 hidden input but displaying as one time range
// * uses the "dateRange picker" library with "date" library
// * @param dateRangeDiv
// * @param begin_date_input
// * @param end_date_input
// */
//function createDateRange(dateRangeDiv,begin_date_input,end_date_input)
//{
//
//
//
//    $('#'+dateRangeDiv).daterangepicker(
//        {
//            ranges: {
//                'Today'       : [moment(), moment()],
//                'Yesterday'   : [moment().subtract('days', 1), moment().subtract('days', 1)],
//                'Last 7 Days' : [moment().subtract('days', 6), moment()],
//                'Last 30 Days': [moment().subtract('days', 29), moment()],
//                'This Month'  : [moment().startOf('month'), moment().endOf('month')],
//                'Last Month'  : [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
//            },
//            startDate: moment().subtract('days', 29),
//            endDate: moment()
//        },
//        function(start, end) {
//
//
//                $('#'+begin_date_input).val(start.format("YYYY-MM-DD HH:mm:ss"));
//                $('#'+end_date_input).val(end.format("YYYY-MM-DD HH:mm:ss"));
//
//            $('#'+dateRangeDiv +' span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
//
//
//        }
//    );
//}


/**
 * This function create dateTime in mySQL format filtered by a UTC location
 * @param UTC_LIST the array of UTC's
 * @param m_location the Location for creating dateTime
 * @returns {string} return  dateTime in mySQL format
 */
function  currentDateTimeInMysqlFormat(UTC_LIST,m_location)
{
    var date;
    date = new Date();
    var  current_dateTime = date.getUTCFullYear() + '-' +
        ('00' + (date.getUTCMonth()+1)).slice(-2) + '-' +
        ('00' + (date.getUTCDate())).slice(-2) + ' ' +
        ('00' + (date.getUTCHours() + UTC_LIST.get(m_location))).slice(-2) + ':' +
        ('00' + date.getUTCMinutes()).slice(-2) + ':' +
        ('00' + date.getUTCSeconds()).slice(-2);

    return current_dateTime;

}














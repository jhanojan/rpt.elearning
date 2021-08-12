// base url
function base_url() {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin+'/'+pathparts[1].trim('/')+'/'; // http://localhost/myproject/
    }else{
        var url = location.origin; // http://stackoverflow.com
    }
    return url;
}
// lazyload config

var MODULE_CONFIG = {
    easyPieChart:   [ 'assets/flatkit/libs/jquery/jquery.easy-pie-chart/dist/jquery.easypiechart.fill.js' ],
    sparkline:      [ 'assets/flatkit/libs/jquery/jquery.sparkline/dist/jquery.sparkline.retina.js' ],
    plot:           [ 'assets/flatkit/libs/jquery/flot/jquery.flot.js',
                      'assets/flatkit/libs/jquery/flot/jquery.flot.resize.js',
                      'assets/flatkit/libs/jquery/flot/jquery.flot.pie.js',
                      'assets/flatkit/libs/jquery/flot.tooltip/js/jquery.flot.tooltip.min.js',
                      'assets/flatkit/libs/jquery/flot-spline/js/jquery.flot.spline.min.js',
                      'assets/flatkit/libs/jquery/flot.orderbars/js/jquery.flot.orderBars.js'],
    vectorMap:      [ 'assets/flatkit/libs/jquery/bower-jvectormap/jquery-jvectormap-1.2.2.min.js',
                      'assets/flatkit/libs/jquery/bower-jvectormap/jquery-jvectormap.css', 
                      'assets/flatkit/libs/jquery/bower-jvectormap/jquery-jvectormap-world-mill-en.js',
                      'assets/flatkit/libs/jquery/bower-jvectormap/jquery-jvectormap-us-aea-en.js' ],
    dataTable:      [
                      'assets/flatkit/libs/jquery/datatables/media/js/jquery.dataTables.min.js',
                      'assets/flatkit/libs/jquery/plugins/integration/bootstrap/3/dataTables.bootstrap.js',
                      'assets/flatkit/libs/jquery/plugins/integration/bootstrap/3/dataTables.bootstrap.css'],
    footable:       [
                      'assets/flatkit/libs/jquery/footable/dist/footable.all.min.js',
                      'assets/flatkit/libs/jquery/footable/css/footable.core.css'
                    ],
    screenfull:     [
                      base_url()+'assets/flatkit/libs/jquery/screenfull/dist/screenfull.min.js'
                    ],
    sortable:       [
                      'assets/flatkit/libs/jquery/html.sortable/dist/html.sortable.min.js'
                    ],
    nestable:       [
                      'assets/flatkit/libs/jquery/nestable/jquery.nestable.css',
                      'assets/flatkit/libs/jquery/nestable/jquery.nestable.js'
                    ],
    summernote:     [
                      'assets/flatkit/libs/jquery/summernote/dist/summernote.css',
                      'assets/flatkit/libs/jquery/summernote/dist/summernote.js'
                    ],
    parsley:        [
                      'assets/flatkit/libs/jquery/parsleyjs/dist/parsley.css',
                      'assets/flatkit/libs/jquery/parsleyjs/dist/parsley.min.js'
                    ],
    select2:        [
                      'assets/flatkit/libs/jquery/select2/dist/css/select2.min.css',
                      'assets/flatkit/libs/jquery/select2-bootstrap-theme/dist/select2-bootstrap.min.css',
                      'assets/flatkit/libs/jquery/select2-bootstrap-theme/dist/select2-bootstrap.4.css',
                      'assets/flatkit/libs/jquery/select2/dist/js/select2.min.js'
                    ],
    datetimepicker: [
                      'assets/flatkit/libs/jquery/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css',
                      'assets/flatkit/libs/jquery/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.dark.css',
                      'assets/flatkit/libs/js/moment/moment.js',
                      'assets/flatkit/libs/jquery/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'
                    ],
    chart:          [
                      'assets/flatkit/libs/js/echarts/build/dist/echarts-all.js',
                      'assets/flatkit/libs/js/echarts/build/dist/theme.js',
                      'assets/flatkit/libs/js/echarts/build/dist/jquery.echarts.js'
                    ],
    bootstrapWizard:[
                      'assets/flatkit/libs/jquery/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js'
                    ],
    fullCalendar:   [
                      'assets/flatkit/libs/jquery/moment/moment.js',
                      'assets/flatkit/libs/jquery/fullcalendar/dist/fullcalendar.min.js',
                      'assets/flatkit/libs/jquery/fullcalendar/dist/fullcalendar.css',
                      'assets/flatkit/libs/jquery/fullcalendar/dist/fullcalendar.theme.css',
                      'scripts/plugins/calendar.js'
                    ],
    dropzone:       [
                      'assets/flatkit/libs/js/dropzone/dist/min/dropzone.min.js',
                      'assets/flatkit/libs/js/dropzone/dist/min/dropzone.min.css'
                    ]
  };

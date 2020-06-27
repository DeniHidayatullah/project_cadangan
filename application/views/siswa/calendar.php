<head>
    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'asset/assets/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'asset/assets/css/style.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'asset/assets/font-awesome/css/font-awesome.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'asset/assets/plugins/fullcalendar/fullcalendar.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'asset/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'; ?>">
</head>
<!--<div class="content-wrapper">
    <section class="content">
        <div class="row">


            <div class="col-md-9">
                <div class="box box-warning">
                    <div class="box-header with-border"> -->

<body>



    <div class="container">
        <div class="content-wrapper">
            <section class="content">
                <div class="content">
                    <div class="alert notification" style="display: none;">
                        <button class="close" data-close="alert"></button>
                        <p></p>
                    </div>
                    <div class="row">
                        <div class="col-md-9">

                            <div class="box box-warning">
                                <div class="box-header with-border">

                                    <div class="portlet light bordered">
                                        <div class="portlet-body">
                                            <div class="table-toolbar">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="btn-group">

                                                            <br>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>






                                    <!-- place -->
                                    <div id="calendarIO"></div>
                                    <div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form class="form-horizontal" method="POST" action="POST" id="form_create">
                                                    <input type="hidden" name="calendar_id" value="0">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">Calendar Event</h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <div class="alert alert-danger" style="display: none;"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2">Title <span class="required"> * </span></label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="title" class="form-control" placeholder="Title">
                                                            </div>
                                                        </div>


                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- end place -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </section>
        </div>
    </div>

    <script type="text/javascript" src="<?php echo base_url() . 'asset/assets/js/jquery.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'asset/assets/js/moment.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'asset/assets/js/bootstrap.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'asset/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url() . 'asset/assets/plugins/fullcalendar/fullcalendar.js'; ?>"></script>
    <script type="text/javascript">
        var get_data = '<?php echo $get_data; ?>';
        var backend_url = '<?php echo base_url(); ?>';

        $(document).ready(function() {
            $('.date-picker').datepicker();
            $('#calendarIO').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month'
                },
                defaultDate: moment().format('YYYY-MM-DD'),
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    $('#create_modal input[name=start_date]').val(moment(start).format('YYYY-MM-DD'));
                    $('#create_modal input[name=end_date]').val(moment(end).format('YYYY-MM-DD'));
                    $('#create_modal').modal('show');
                    save();
                    $('#calendarIO').fullCalendar('unselect');
                },
                eventDrop: function(event, delta, revertFunc) { // si changement de position
                    editDropResize(event);
                },
                eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur
                    editDropResize(event);
                },
                eventClick: function(event, element) {
                    deteil(event);
                    editData(event);
                    deleteData(event);
                },
                events: JSON.parse(get_data)
            });
        });

        $(document).on('click', '.add_calendar', function() {
            $('#create_modal input[name=calendar_id]').val(0);
            $('#create_modal').modal('show');
        })






        function deteil(event) {
            $('#create_modal input[name=calendar_id]').val(event.id);
            $('#create_modal input[name=start_date]').val(moment(event.start).format('YYYY-MM-DD'));
            $('#create_modal input[name=end_date]').val(moment(event.end).format('YYYY-MM-DD'));
            $('#create_modal input[name=title]').val(event.title);

            $('#create_modal select[name=color]').val(event.color);
            $('#create_modal .delete_calendar').show();
            $('#create_modal').modal('show');
        }
    </script>

</body>
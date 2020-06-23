<div class="content-wrapper">
    <section class="content">
        <div class="row">


            <div class="col-md-9">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agenda / Catatan</h3>

                    </div>
                    <div class="box-body">
                        <div id="calendar"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>

            <!-- /.col -->
        </div>
    </section>
</div>

<div class="modal fade in" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php echo base_url(); ?>app/agenda_save" method="post" accept-charset="utf-8">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="addModalLabel">Tambah Catatan / Agenda</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="add" value="1">
                    <label>Tanggal*</label>
                    <p id="labelDate"></p>
                    <input type="hidden" name="date" class="form-control" id="inputDate">
                    <label>Keterangan*</label>
                    <textarea name="info" id="inputDesc" class="form-control"></textarea><br />
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btnSimpan" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="delModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php echo base_url(); ?>app/agenda_hapus" method="post" accept-charset="utf-8">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="delModalLabel">Hapus Catatan / Agenda</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="idDel">
                    <label>Tahun</label>
                    <p id="showYear"></p>
                    <label>Tanggal</label>
                    <p id="showDate"></p>
                    <label>Keterangan*</label>
                    <p id="showDesc"></p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'prevYear,nextYear',
        },

        events: "<?php echo base_url(); ?>home/get_calendar",

        dayClick: function(date, jsEvent, view) {

            var tanggal = date.getDate();
            var bulan = date.getMonth() + 1;
            var tahun = date.getFullYear();
            var fullDate = tahun + '-' + bulan + '-' + tanggal;

            $('#addModal').modal('toggle');
            $('#addModal').modal('show');

            $("#inputDate").val(fullDate);
            $("#labelDate").text(fullDate);
            $("#inputYear").val(date.getFullYear());
            $("#labelYear").text(date.getFullYear());
        },

        eventClick: function(calEvent, jsEvent, view) {
            $("#delModal").modal('toggle');
            $("#delModal").modal('show');
            $("#idDel").val(calEvent.id);
            $("#showYear").text(calEvent.year);

            var tgl = calEvent.start.getDate();
            var bln = calEvent.start.getMonth() + 1;
            var thn = calEvent.start.getFullYear();

            $("#showDate").text(tgl + '-' + bln + '-' + thn);
            $("#showDesc").text(calEvent.title);
        }


    });
</script>
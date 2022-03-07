@include('partials.header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Modal -->
        <div class="modal fade" id="addTimesheetModal" tabindex="-1" role="dialog" aria-labelledby="addTimesheetModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTimesheetModalLabel">Shto Timesheet</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('timesheet.store') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Date</label>
                                        <input type="date" class="form-control" id="date" name="date">
                                    </div>
                                    <div class="form-group">
                                        <label>Supervisor</label>
                                        <select class="form-control" id="supervisor" name="supervisor">
                                            @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->name . ' ' . $employee->surname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="notes">Shenime</label>
                                        <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="activity">Aktiviteti</label>
                                        <input type="text" class="form-control" id="activity" name="activity">
                                    </div>
                                    <div class="form-group">
                                        <label>Punonjesi</label>
                                        <select class="form-control" id="employee" name="employee">
                                            <option value="1">Lediani</option>
                                            <option value="2">Romeo</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Koha Fillimit:</label>
                                        <input type="text" class="form-control" id="time_start" name="time_start" readonly="false">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Koha Mbarimit:</label>
                                        <input type="text" class="form-control" id="time_end" name="time_end">
                                    </div>
                                    <div class="form-group">
                                        <label for="plan">Plani</label>
                                        <input type="text" class="form-control" id="plan" name="plan">
                                    </div>
                                    <div class="form-group">
                                        <label for="notes">Shenime</label>
                                        <textarea class="form-control" id="evidence_notes" name="evidence_notes" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Default box -->
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h3 class="card-title">EVIDENCAT DITORE</h3>
                        <button type="button" class="btn btn-dark btn-sm float-right" data-toggle="modal" data-target="#addTimesheetModal">
                            Shto Timesheet
                        </button>
                    </div>
                </div>

                <form action="{{ route('timesheet.search') }}" method="POST">
                    {{ csrf_field() }}
                <div class="row">
                    <div class="col-1">
                        <span>Data</span>
                    </div>
                    <div class="col-2">
                        <input type="date" id="date" name="date" class="form-control">
                    </div>

                    <div class="offset-1 col-1">
                        <span>Shenime</span>
                    </div>
                    <div class="col-3">
                        <textarea class="form-control" rows="2" id="notes" name="notes"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                        <span>Supervizor</span>
                    </div>

                    <div class="form-group col-2">
                        <select class="form-control" id="supervisor" name="supervisor">
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name . ' ' . $employee->surname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="offset-1 col-4 mt-2">
                            <button class="btn btn-sm btn-dark float-right">Kerko</button>
                    </div>
                </div>
                </form>

                <hr/>

                <div class="row">

                    <div class="col-9">
                        <span class="mb-2">Evidencat</span>
                        <table id="indexTable" class="table-striped">
                            <thead>
                            <tr>
                                <td>Nr</td>
                                <td>Aktiviteti</td>
                                <td>Punonjes</td>
                                <td></td>
                                <td>Fillim</td>
                                <td>Mbarim</td>
                                <td>Ore Pune</td>
                                <td>Plan</td>
                                <td>Shenime</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($evidences as $evidence)
                                <tr>
                                    <td>{{ $evidence->id }}</td>
                                    <td>{{ $evidence->activity }}</td>
                                    <td>{{ $evidence->employee->name . ' ' . $evidence->employee->surname }}</td>
                                    <td></td>
                                    <td>{{ $evidence->time_start }}</td>
                                    <td>{{ $evidence->time_end }}</td>
                                    <td>{{ $evidence->hour }}</td>
                                    <td>{{ $evidence->plan }}</td>
                                    <td>{{ $evidence->notes }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!--   /.content-wrapper -->

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script defer>
    $(document).ready( function () {
        $('#indexTable').DataTable({
            paging: false,
            info: false,
            searching: false

        });

        flatpickr("#time_start", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });

        flatpickr("#time_end", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });
    } );
</script>


<!-- AdminLTE for demo purposes -->
{{--<script src="../../dist/js/demo.js"></script>--}}
</body>
</html>

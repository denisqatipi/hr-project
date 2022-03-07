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

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Modifiko Punonjes</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <form action="/employee/{{ $employee->id }}/update" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            {{ method_field('PUT') }}

                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="name">Emri</label>
                                        <input type="text" class="form-control" id="name" value="{{ $employee->name }}" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gjinia</label>
                                        <input type="text" class="form-control" id="gender" value="{{ $employee->gender }}" name="gender">
                                    </div>
                                    <div class="form-group">
                                        <label for="birthday">Datelindja</label>
                                        <input type="text" class="form-control" id="birthday" value="{{ $employee->birthdate }}" name="birthday">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Adresa</label>
                                        <input type="text" class="form-control" id="address" value="{{ $employee->address }}" name="address">
                                    </div>

                                </div>
                                <div class="offset-1 col-3">
                                    <div class="form-group">
                                        <label for="surname">Mbiemer</label>
                                        <input type="text" class="form-control" id="surname" value="{{ $employee->surname }}" name="surname">
                                    </div>
                                    <div class="form-group">
                                        <label for="insurance">Karta Identitetit</label>
                                        <input type="text" class="form-control" id="insurance" value="{{ $employee->insurance_id }}" name="insurance">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Nr Telefoni</label>
                                        <input type="text" class="form-control" id="phone" value="{{ $employee->mobile }}" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" value="{{ $employee->email }}" name="email">
                                    </div>
                                </div>
                                <div class="offset-1 col-3">
                                    <div class="form-group">
                                        <label for="position">Pozicioni</label>
                                        <select class="form-control" id="position" name="position">
                                            @foreach($positions as $position)
                                                <option value="{{ $position->id }}" {{ $employee->currentMovement ? $position->id != $employee->currentMovement->position->id ?: 'selected' : '' }}>{{ $position->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="department">Departamenti</label>
                                        <select class="form-control" id="department" name="department">
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}" {{ $employee->currentMovement ? $department->id != $employee->currentMovement->department_id ?: 'selected' : '' }}>{{ $department->description }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
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

<script defer>
    $(document).ready( function () {
        $('#indexTable').DataTable();
    } );
</script>

<!-- AdminLTE for demo purposes -->
{{--<script src="../../dist/js/demo.js"></script>--}}
</body>
</html>

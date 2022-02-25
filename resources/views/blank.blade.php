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
          <h3 class="card-title">KARTELE PUNONJESI</h3>

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
              <p>{{ $employee->name . ' ' . $employee->surname }}</p>
            </div>
          </div>
          <div class="row">
            <div class="col-1">
              <p>Aktiv</p>
              <p class="mb-2">Emri</p>
              <p class="mb-2">Mbiemer</p>
              <p class="mb-2">Gjinia</p>
              <p class="mb-2">K Identitetit</p>
              <p class="mb-2">Datelindja</p>
            </div>
            <div class="col-2">
              <input type="checkbox" checked>
              <table class="table table-bordered table-sm">
                <tbody>
                  <tr><td>{{ $employee->name }}</td></tr>
                  <tr><td>{{ $employee->surname }}</td></tr>
                  <tr><td>{{ $employee->gender }}</td></tr>
                  <tr><td>{{ $employee->insurance_id }}</td></tr>
                  <tr><td>{{ $employee->birthdate }}</td></tr>
                </tbody>
              </table>
            </div>
            <div class="offset-1 col-1 mt-4">
              <p class="mb-4">Nr Telefoni</p>
              <p class="mb-4">Email</p>
              <p class="mb-4">Adresa</p>
            </div>
            <div class="col-2 mt-4">
              <table class="table table-bordered table-sm">
                <tbody>
                  <tr><td>{{ $employee->mobile }}</td></tr>
                  <tr><td>{{ $employee->email }}</td></tr>
                  <tr><td>{{ $employee->address }}</td></tr>
                </tbody>
              </table>
            </div>
          </div>
          <hr/>
          <div class="row mt-3">
            <div class="col-8">
            <p>Pozicioni</p>
              <table class="table table-bordered table-sm">
                <thead>
                  <tr>
                    <td>Nr</td>
                    <td>Dt. Fillimi</td>
                    <td>Dt. Mbarimi</td>
                    <td>Pozicioni</td>
                    <td>Niveli</td>
                    <td>Departament</td>
                    <td>Shenime</td>
                  </tr>
                </thead>
                <tbody>
                @foreach($movements as $movement)
                  <tr>
                    <td>{{ $movement->id }}</td>
                    <td>{{ $movement->start_work }}</td>
                    <td>{{ $movement->end_work }}</td>
                    <td>{{ $movement->position->description }}</td>
                    <td>{{ $movement->position->level->description }}</td>
                    <td>{{ $movement->department->description }}</td>
                    <td>{{ $movement->note }}</td>
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

@include('partials.footer')
@include('partials.header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
      </div><!-- /.container-fluid -->
    </section>

    <!-- Modal -->
    <div class="modal fade" id="movementModal" tabindex="-1" role="dialog" aria-labelledby="movementModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="movementModalLabel">Shto Movement</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('store-movement') }}">
              {{ csrf_field() }}
              <input type="hidden" name="employee_id" value="{{ $employee->id }}">
              <div class="form-group">
                <label for="position">Pozicioni</label>
                <select class="form-control" id="position" name="position">
                  @foreach($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->description }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="department">Departamenti</label>
                <select class="form-control" id="department" name="department">
                  @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->description }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="note">Shenime</label>
                <textarea class="form-control" id="note" name="note" rows="3"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Mbyll</button>
                <button type="submit" class="btn btn-primary">Ruaj</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-2">
              <h3 class="card-title">KARTELE PUNONJESI</h3>
            </div>
            <div class="col-1 d-flex justify-content-between">
              <a href="/employee/{{ App\Employee::first()->id }}/show">
                <svg width="32px" height="32px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path d="m16.293 17.707 1.414-1.414L13.414 12l4.293-4.293-1.414-1.414L10.586 12zM7 6h2v12H7z"/>
                </svg>
              </a>
              <a href="/employee/{{ $previous }}/show">
                <svg style="margin-top: 6px" width="18px" height="18px" viewBox="0 0 52 52" data-name="Layer 1"
                     id="Layer_1" xmlns="http://www.w3.org/2000/svg">
                  <g data-name="Group 132" id="Group_132">
                    <path d="M38,52a2,2,0,0,1-1.41-.59l-24-24a2,2,0,0,1,0-2.82l24-24a2,2,0,0,1,2.82,0,2,2,0,0,1,0,2.82L16.83,26,39.41,48.59A2,2,0,0,1,38,52Z"/>
                  </g>
                </svg>
              </a>
            </div>
            <div class="col-1 d-flex justify-content-between">
              <a href="/employee/{{ $next }}/show">
                <svg style="margin-top: 6px" width="18px" height="18px" viewBox="0 0 52 52" data-name="Layer 1"
                     id="Layer_1" xmlns="http://www.w3.org/2000/svg">
                  <g data-name="Group 132" id="Group_132">
                    <path d="M14,52a2,2,0,0,1-1.41-3.41L35.17,26,12.59,3.41a2,2,0,0,1,0-2.82,2,2,0,0,1,2.82,0l24,24a2,2,0,0,1,0,2.82l-24,24A2,2,0,0,1,14,52Z"/>
                  </g>
                </svg>
              </a>
              <a href="/employee/{{ App\Employee::latest()->first()->id }}/show">
                <svg width="30px" height="30px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M7.707 17.707 13.414 12 7.707 6.293 6.293 7.707 10.586 12l-4.293 4.293zM15 6h2v12h-2z"/>
                </svg>
              </a>
            </div>
            <div class="offset-5 col-3 d-flex justify-content-between">
              <button type="button" class="btn" data-toggle="modal" data-target="#movementModal">
                <svg style="width: 24px; height: 24px;" xmlns="http://www.w3.org/2000/svg"   viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
              </button>
            </div>
          </div>

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
            <div class="col-3">
              <div class="form-group">
                <label for="name">Emri</label>
                <p>{{ $employee->name }}</p>
              </div>
              <div class="form-group">
                <label for="gender">Gjinia</label>
                <p>{{ $employee->gender }}</p>
              </div>
              <div class="form-group">
                <label for="birthday">Datelindja</label>
                <p>{{ $employee->birthdate }}</p>
              </div>
              <div class="form-group">
                <label for="address">Adresa</label>
                <p>{{ $employee->address }}</p>
              </div>

            </div>
            <div class="offset-1 col-3">
              <div class="form-group">
                <label for="surname">Mbiemer</label>
                <p>{{ $employee->surname }}</p>
              </div>
              <div class="form-group">
                <label for="insurance">Karta Identitetit</label>
                <p>{{ $employee->insurance_id }}</p>
              </div>
              <div class="form-group">
                <label for="phone">Nr Telefoni</label>
                <p>{{ $employee->mobile }}</p>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <p>{{ $employee->email }}</p>
              </div>
            </div>
            <div class="offset-1 col-3">
              <div class="form-group">
                <label for="position">Pozicioni</label>
                <p>{{ $employee->currentMovement ? $employee->currentMovement->position->description : '' }}</p>
              </div>
              <div class="form-group">
                <label for="department">Departamenti</label>
                <p>{{ $employee->currentMovement ? $employee->currentMovement->department->description : '' }}</p>
              </div>
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
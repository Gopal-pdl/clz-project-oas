<x-app-layout>


    @section('stylesheet')

        <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    @endsection

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Register</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Students Register</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('student-register')}}" method="post" class="needs-validation">
                            @csrf
                            <div class="form-group">
                                <label for="fullName">Full Name:</label>
                                <input type="text" class="form-control" id="fullName" placeholder="Enter full name" name="name">
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                            <div class="form-group">
                                <label for="fiscal">Fiscal Year:</label>
                                <select name="fiscal" id="" class="form-control" >
                                    <option value="">Select</option>
                                    @forelse($fiscal as $f)
                                        <option value="{{$f->id}}">{{$f->nepali_year}}</option>
                                    @empty
                                    @endforelse
                                </select>

                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="year">Duration In Year:</label>
                                        <select name="year" id="" class="form-control">
                                            <option value="">Select</option>
                                            @forelse($year as $y)
                                                <option value="{{$y->id}}">{{$y->class}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="year">Duration In Semester:</label>
                                        <select name="semester" id="" class="form-control">
                                            <option value="">Select</option>
                                            @forelse($semester as $s)
                                                <option value="{{$s->id}}">{{$s->semester}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table dataTable" >
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Student Name</th>
                                    <th>Fiscal Year</th>
                                    <th>Year</th>
                                    <th>Semester</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @forelse($students as $key => $student)

                                        <tr>
                                            <td>{{$student->rand_id}}</td>
                                            <td>{{$student->name}}</td>
                                            <td>{{$student->fiscalYear->nepali_year}}</td>
                                            <td>{{$student->year_id}}</td>
                                            <td>{{$student->semester_id}}</td>
                                        </tr>

                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')

            <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
            <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
            <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
            <script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
            <script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>



            <script>
                $('.dataTable').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": false,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            </script>

    @endsection

</x-app-layout>

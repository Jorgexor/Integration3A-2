@extends('admin.admin_master')
@extends('layouts.main')

@section('admin')
    
<title>Reports</title>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> Type of Accident</th>
                                <th> Description</th>
                                <th> Date & Time</th>
                                <th> Filename</th>
                                <th> Location</th>
                                <th> Generate Report</th>
                                <th>Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($list))
                                @foreach($list as $c)
                                    <tr>
                                        <td>{{$c->TypeOfAccident}}</td>
                                        <td>{{$c->Description}}</td>
                                        <td>{{$c->Date}}</td>
                                        <td>{{$c->filename}}</td>
                                        <td>{{$c->location}}</td>
                                        <td><a href="{{ route('pdfview', $c->id)}}">Download PDF</a></td>
                                        <td><a onclick = "remove(report.id)" tabIndex="-1" class ="btn btn-danger">Delete</a></td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection

   
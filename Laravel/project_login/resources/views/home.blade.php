@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Student</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
      @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="email" class="form-control" name="name" placeholder="Student Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">ID</label>
    <input type="text" class="form-control" name="id" placeholder="Student ID">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Department</label>
    <select name="dept" id="" class="form-control">
        <option value="">CSE</option>
        <option value="">EEE</option>
        <option value="">CE</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Level/Term</label>
    <input type="text" class="form-control" name="lt" placeholder="Level/Term">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
  </div>
</div>
        </div>
    </div>
</div>
@endsection

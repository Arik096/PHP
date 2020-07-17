@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Report</button>

                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          
                          <form method="POST" action="{{ route('ArikCovid.store') }}" class="col-md-12 " enctype="multipart/form-data">@csrf

                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name"  placeholder="Name">
                            </div>

                            <div class="form-group">
                              <label>Area</label>
                              <input type="text" class="form-control" name="area"  placeholder="Area">
                            </div>

                            <div class="form-group">
                              <label>Symptoms</label>
                              <input type="text" class="form-control" name="symptoms"  placeholder="Symptoms">
                            </div>

                            <div class="form-group">
                              <label>Date</label>
                              <input type="date" class="form-control" name="date">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                          </form>



                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

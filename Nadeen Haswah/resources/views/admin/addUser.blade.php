@extends('admin.layout.master')

@section('title', 'Add User')

@section('content')

    <div class="page-inner">
        <form>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group form-group-default">
                        <label>Name</label>
                        <input id="addName" type="text" class="form-control" placeholder="fill name" />
                    </div>
                </div>
                <div class="col-md-6 pe-0">
                    <div class="form-group form-group-default">
                        <label>Email</label>
                        <input id="addPosition" type="text" class="form-control" placeholder="fill Email" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>Role</label>
                        <input id="addOffice" type="text" class="form-control" placeholder="fill Role" />
                    </div>
                </div>
                <div class="col-md-6 pe-0">
                    <div class="form-group form-group-default">
                        <label>Join date</label>
                        <input id="addPosition" type="text" class="form-control" placeholder="fill Join date" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>Company</label>
                        {{-- list --}}
                        <input id="addOffice" type="text" class="form-control" placeholder="fill Company Name" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>Depaerment</label>
                        <input id="addOffice" type="text" class="form-control"
                            placeholder="fill Depaerment (optional)" />
                    </div>
                </div>
                <div class="col-md-6 pe-0">
                    <div class="form-group form-group-default">
                        <label>Password</label>
                        <input id="addPosition" type="text" class="form-control" placeholder="fill Password" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>Confirm Password</label>
                        <input id="addOffice" type="text" class="form-control" placeholder="fill Confirm Password" />
                    </div>
                </div>
            </div>

            <div>
                <button type="button" id="addRowButton" class="btn btn-primary">
                    Add
                </button>
                <a href="{{ route('admin.users') }}">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Close
                    </button>
                </a>
            </div>
        </form>
    </div>
@endsection

@extends('admin.layout.master')

@section('title', 'Add Department')

@section('content')

    <div class="page-inner">
        <form>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group form-group-default">
                        <label>Title</label>
                        <input id="addName" type="text" class="form-control" placeholder="fill Title" />
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group form-group-default">
                        <label>Description</label>
                        <input id="addName" type="text" class="form-control" placeholder="fill Description" />
                    </div>
                </div>
                <div class="col-md-6 pe-0">
                    <div class="form-group form-group-default">
                        <label>department manager</label>
                        <input id="addPosition" type="text" class="form-control" placeholder="fill department manager" />
                    </div>
                </div>

            </div>

            <div>
                <button type="button" id="addRowButton" class="btn btn-primary">
                    Add
                </button>
                <a href="{{ route('admin.departments') }}">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Close
                    </button>
                </a>
            </div>
        </form>
    </div>
@endsection

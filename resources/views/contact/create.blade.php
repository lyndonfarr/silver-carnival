@extends('layouts.app')

@section('content')
    <form>
        <div class="card">
            <div class="card-header">Create Contact</div>
            <div class="card-body">
                <div class="form-row">
                    <text-input
                        class="col-md-4"
                        label="First Name"
                        name="first_name"
                    ></text-input>
                    <text-input
                        class="col-md-4"
                        label="Middle Names"
                        name="middle_names"
                    ></text-input>
                    <text-input
                        class="col-md-4"
                        label="Last Name"
                        name="last_name"
                    ></text-input>
                </div>
                <div class="form-row">
                    <textarea-input
                        class="col-md-5"
                        name="description"
                        label="Description"
                    ></textarea-input>
                    <textarea-input
                        class="col-md-7"
                        name="notes"
                        label="Notes"
                    ></textarea-input>
                </div>
                <div class="form-row">
                    <nationality-input></nationality-input>
                    <text-input
                        class="col-md-4"
                        name="nickname"
                        label="Nickname"
                    ></text-input>
                    <div class="form-group col-md-4">
                        DOB
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button
                    type="submit"
                    class="btn btn-primary btn-block"
                >
                    Save
                </button>
            </div>
        </div>
    </form>
@endsection()
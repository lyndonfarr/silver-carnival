@extends('layouts.app')

@section('content')
    <form>
        <div class="card">
            <div class="card-header">Create Contact</div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="first_name">First Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="first_name"
                            name="first_name"
                            placeholder="First Name"
                        >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="middle_names">Middle Names</label>
                        <input
                            type="text"
                            class="form-control"
                            id="middle_names"
                            name="middle_names"
                            placeholder="Middle Names"
                        >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="last_name">Last Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="last_name"
                            name="last_name"
                            placeholder="Last Name"
                        >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="description">Description</label>
                        <textarea
                            class="form-control"
                            id="description"
                            name="description"
                            placeholder="Description"
                        ></textarea>
                    </div>
                    <div class="form-group col-md-7">
                        <label for="notes">Notes</label>
                        <textarea
                            class="form-control"
                            id="notes"
                            name="notes"
                            placeholder="Notes"
                        ></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nationality">Nationality</label>
                        <select id="nationality" name="nationality" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nickname">Nickname</label>
                        <input
                            type="text"
                            class="form-control"
                            id="nickname"
                            name="nickname"
                            placeholder="Nickname"
                        >
                    </div>
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
@extends('layouts.app')

@section('content')
    <form method="POST" action="{{url('contacts')}}">
        @csrf
        <div class="card">
            <div class="card-header">Create Contact</div>
            <div class="card-body">
                <div class="form-row">
                    <text-input
                        class="col-md-12"
                        label="Name"
                        name="name"
                        :no-label="true"
                    ></text-input>
                </div>
                <div class="form-row">
                    <phone-input
                        class="col-md-12"
                        label="Phone"
                        name="phone"
                        :no-label="true"
                    ></phone-input>
                </div>
                <div class="form-row">
                    <textarea-input
                        class="col-md-12"
                        label="Notes"
                        name="notes"
                        :no-label="true"
                    ></textarea-input>
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
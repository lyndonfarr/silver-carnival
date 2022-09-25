@extends('layouts.contact')

@section('contactContent')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('contacts.store') }}">
        @csrf
        <div class="card">
            <div class="card-header">Create Contact</div>
            <div class="card-body">
                <div class="form-row">
                    <text-input
                        class="col-md-12"
                        label="Name"
                        name="full_name"
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
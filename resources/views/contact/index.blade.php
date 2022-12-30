@extends('layouts.contact')

@section('contactContent')

<div class="card">
    <div class="card-header bg-white">Index Contacts</div>
    <ul class="list-group list-group-flush">
        @foreach($contacts as $contact)
            <li class="list-group-item">
                <a class="text-dark" href="{{ route('contacts.show', $contact->id) }}">
                    {{ $contact->full_name }}
                    @if(isset($contact->nickname))
                        <span class="text-muted"> ({{ $contact->nickname }})</span>
                    @endif
                </a>
            </li>
        @endforeach
    </ul>
</div>

@endsection
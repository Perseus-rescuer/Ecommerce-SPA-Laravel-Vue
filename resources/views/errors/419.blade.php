@extends('layouts.error-app')
@push('title')
Page Expired
@endpush
@section('section')
<main>
    <div class="container">
        <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <h1>419</h1>
            <h2>Page Expired.</h2>
            <a class="btn" href="{{ route('home') }}">Back to home</a>
        </section>
    </div>
</main>
@endsection
@extends('layout.app')

@section('title', trans('common.head_title'))

@section('content')

    <div class="container">

        <form id="create_note_form" method="POST">
            @csrf

            @include('note.layout.row-textarea')
            @include('note.layout.row-params')

            <div class="row my-5 justify-content-center">
                <div class="col-8">
                    <div class="d-grid">
                        <button id="create_note_form__submit_btn" type="submit" class="btn btn-lg btn-primary">
                            {{ __('home.create_btn') }}
                        </button>
                    </div>
                </div>
            </div>

        </form>

    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/note/create.js')}}"></script>
@endpush

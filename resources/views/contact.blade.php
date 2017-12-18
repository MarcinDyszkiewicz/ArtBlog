@extends('layout')

@section('title', '| Contact')



@section('content')
    <link href="{{ asset('css/parsley.css') }}">

    <section id="main">
        <div class="container">
            <div id="main-col">
                <h2>Contact Me</h2>
                <hr>
                <form action="{{ route('contactPost') }}" method="POST" data-parsley-validate="">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label name=name">Name:</label>
                        <input id="name" name="name" class="form-control" required="" minlength="2" maxlength="60">
                    </div>
                    <div class="form-group">
                        <label name="email">Email:</label>
                        <input id="email" name="email" class="form-control" required="" type="email" maxlength="60">
                    </div>
                    <div class="form-group">
                        <label name="subject">Subject:</label>
                        <input id="subject" name="subject" class="form-control" required="" minlength="3" maxlength="80">
                    </div>
                    <div class="form-group">
                        <label name=message">Message:</label>
                        <textarea id="message" name="message" class="form-control" required="" minlength="10" maxlength="2000"></textarea>
                    </div>

                    <input type="submit" class="submit" value="Send Message">
                </form>
            </div>

            <aside id="sidebar">
                <div class="dark">
                    <h3>Marcin Dyszkiewicz</h3>
                    <p>sdfdfsdfsdfs</p>
                </div>
            </aside>
        </div>
    </section>



@endsection
@section('footer')

@endsection

@section('scripts')
    <link href="{{ asset('js/parsley.min.js') }}">
@endsection
@extends('layout')

@section('title', '| Contact')



@section('content')

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
                        <textarea id="message" name="message" class="form-control" required="" minlength="10" maxlength="3000"></textarea>
                    </div>

                    <input type="submit" class="submit" value="Send Message">
                </form>
            </div>
        </div>
    </section>



@endsection


@section('scripts')
    <script src="/js/parsley.min.js"></script>
@endsection

@section('footer')

@endsection
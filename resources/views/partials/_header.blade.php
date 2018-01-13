<header class="header">

    <div class="header-overlay">

        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    {{--logo--}}
                    <div class="logo text-center">

                        <img src="img/logo1.png" alt="logo">
                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-md-8">

                    <div class="header-text">

                        {{--title & destripction--}}
                        <h1>Blog for everybody who loves art</h1>
                        <p> Built with great love! </p>

                    </div>

                    {{$slot}}
                        {{--<div class="header-btns">--}}
                        {{----}}
                            {{--header buttons--}}
                            {{--<a class="btn btn-make-account" href="#"> Make a New Account </a>--}}
                            {{--<a class="btn btn-tour" href="#"> Take a Tour and See Our Posts--}}
                                {{--<i class="fa fa-angle-down"></i>--}}
                            {{--</a>--}}

                        {{--</div>--}}

                </div>

            </div>

        </div>

    </div>


</header>
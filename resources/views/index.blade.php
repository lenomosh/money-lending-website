@extends('layouts.front1')
@section('script')
    @if ($errors->has('successMessage'))
        <div class="alert alert-danger alert-dismissible fade in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{ $errors->first('successMessage') }}
        </div>
    @endif
    <script>
        var element = document.getElementById("index");
        element.classList.add("active");
    </script>

    @endsection
@section('index')
    <style>
        p{
            font-size: inherit;
        }
    </style>

    <section id="main-slider" class="no-margin">
        <div class="carousel slide">
            <div class="carousel-inner">
                <div class="item active" style="background-image: url({{asset('images/slider/fel.jpg')}})">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2 class="animation animated-item-1">Welcome to <span>Hopemore life solution</span></h2>
                                    <p class="animation animated-item-2"><b>Hopemore life solution</b> is an independent federal agency established to support African-led development that grows community enterprises by providing seed capital and technical support. Partnering with Africans, whereby we are answering the development demands from communities’ one partnership at a time.</p>
                                    <a class="btn-slide animation animated-item-3" href="signup">Sign Up</a>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.item-->
        </div>
        <!--/.carousel-inner-->
        <!--/.carousel-->
    </section>
    <!--/#main-slider-->

    <div class="feature">
        <div class="container">
            <div class="text-center">
                <div class="col-md-3">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                        <i class="fa fa-book"></i>
                        <h2>school fees</h2>
                        <p><b>Hopemore Life Solution</b> have awarded over 200 grants to high school learning students to cater for their learnig expenses.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <i class="fa fa-laptop"></i>
                        <h2>business start up & boost</h2>
                        <p><b>Hopemore Life Solution</b> grants are helping grassroots communities to create better livelihoods by generating Ksh. 10 million in new local economic activities (Businesess) that produce stable jobs and better incomes.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
                        <i class="fa fa-heart-o"></i>
                        <h2>Hospital bills</h2>
                        <p><b>Hopemore Life Solution</b> invests grants of up to Ksh. 250,000 directly to underserved hospital bills. .</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="hi-icon-wrap hi-icon-effect wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
                        <i class="fa fa-cloud"></i>
                        <h2>Emergency loan</h2>
                        <p><b>Hopemore Life Solution</b> grants range from Ksh.50 000 to Ksh.250 000  to investments, allowing many groups to “right-size” funding to fit their needs and constraints. .</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about">
        <div class="container">
            <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <h2><B>ABOUT US </B></h2>
                <img src="{{asset('images/6.jpg')}}" class="img-responsive" />
                <h2>African Led</h2>
                <p>At the core of <b>Hopemore Life Solution's</b> programming is our direct connection to African ingenuity and Africans developing solutions. <b>Hopemore Life Solution</b> finds, funds and scales social enterprises to create sound and sustainable communities. Africans lead our country teams, and implement our African-led model. <b>Hopemore Life Solution</b> headquarters in Washington, D.C. coordinates with each of the 18 field offices led by Country Program Coordinators. Each project is unique, and must be monitored closely for success. <b>Hopemore Life Solution</b> in Washington, DC coordinates with each of the 18 Field Offices and technical partners to develop and monitor each project’s financial benchmarks and set internal audits for each project. <b>Hopemore Life Solution</b> maintains a rigorous, evidenced-based framework for monitoring and evaluating program performance. Key indicators are identified for each grant, which are tracked to a performance matrix and form the basis for an ongoing learning agenda. Grant performance is scored bi-annually against established goals, helping to define program outcomes and to shape program management objectives.
                </p>
            </div>

            <div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                <h2>Demand Driven</h2>
                <p>At the core of <b>Hopemore Life Solution's</b> programming is our direct connection to African solutions for the development challenges each community faces. <b>Hopemore Life Solution</b> support is requested by local community associations, cooperatives and social entrepreneurs to increase their organization's ability to successfully unlock opportunities to develop or expand local markets. <b>Hopemore Life Solution</b> extends the reach of the U.S. Government’s foreign assistance programs by using small grants or seed capital and customized technical assistance to target each project's constraints to growth and success. <b>Hopemore Life Solution</b> is customizing community needs with economic trends to ensure a future generation of Africans in a global marketplace.
                <p>
                <h2>First Mile of Development</h2>
                <p><b>Hopemore Life Solution</b> is on the <i>frontier of development</i>  working with a diversity of groups from smallholder farmers cooperatives to youth-led enterprises working to make their communities a better place. By serving communities at the start of the development pyramid, we identify and target Africans who need various levels of support, and use our targeted and patient capital to ensure a complete financial, technical and grassroots approach to their success. By working with the most vulnerable, including those impacted by conflict,  the disabled, women and at-risk youth, and religious minorities; <b>Hopemore Life Solution</b> caters each project benchmark to the group, its objectives and the work or progress grantees have contributed to make the project a success. Although the grants seem small in size compared to other development agencies, <b>Hopemore Life Solution</b> prides itself on transferring the financial knowledge and project management skills necessary to properly use each dollar.  <p>

            </div>
        </div>
    </div>



    <section id="partner">
        <div class="container">
            <div class="center wow fadeInDown">
                <h2>Our Partners</h2>
                <p><b>Hopemore Life Solution</b> partners with community enterprises to support organizations to create and sustain jobs, improve income levels and achieve greater food security.</p>
            </div>

            <div class="partners">
            </div>
        </div>
        <!--/.container-->
    </section>
    <!--/#partner-->

    <section id="conatcat-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="pull-left">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="media-body">
                            <h2>Have a question or need any clarification?</h2>
                            <p>Hopemore life solution is based in Nairobi CBD for More information reach us through <a href="tel:+254759192818">+2547 59 192 818</a>  / <a href="tel:+254743684894">+2547 43 684 894</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.container-->
    </section>

    @endsection
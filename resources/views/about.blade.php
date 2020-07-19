@extends('layouts.front1')
@section('script')
    <script>
        var element = document.getElementById("about");
        element.classList.add("active");
    </script>

@endsection
@section('about')

    <div id="breadcrumb">
        <div class="container">
            <div class="breadcrumb">
                <li><a href="">Home</a></li>
                <li>About Us</li>
            </div>
        </div>
    </div>

    <div class="aboutus">
        <div class="container">
            <h3>Who we are</h3>
            <hr>
            <div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <img src="{{asset('images/man.jpg')}}" class="img-responsive">
                <h4>We Give Grants, To support and provide capital to community enterprises</h4>
                <p>Hopemore life solution is an independent federal agency established to support African-led development that grows community enterprises by providing seed capital and technical support.</p>
                <p>Partnering with Africans, whereby we are answering the development demands from communities’ one partnership at a time.</p>
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
    </div>

    <div class="our-team">
        <div class="container">
            <h3>Our Team</h3>
            <div class="text-center">
                <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <img src="{{asset('images/services/1.jpg')}}" alt="">
                    <h4>Marry Mildred</h4>
                    <p>I am happy about hopemore life solution to my perspective, hopemore is the best solution so far</p>
                </div>
                <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <img src="{{asset('images/services/2.jpg')}}" alt="">
                    <h4>Ashley johnson</h4>
                    <p>Hopemore life solution has changed most of the youths around africa as the founder i am very happy about hopemore</p>
                </div>
                <div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <img src="{{asset('images/services/3.jpg')}}" alt="">
                    <h4>John Robinson</h4>
                    <p>This is good idea as it has more positive impacts on the real life situation especially the youths</p>
                </div>
            </div>
        </div>
    </div>

@endsection
@extends('layouts.front1')
@section('script')
    <script>
        var element = document.getElementById("services");
        element.classList.add("active");
    </script>

@endsection
@section('services')

    <div id="breadcrumb">
        <div class="container">
            <div class="breadcrumb">
                <li><a href="">Home</a></li>
                <li>Services</li>
            </div>
        </div>
    </div>

    <div class="services">
        <div class="container">
            <h3>Company Services</h3>
            <hr>
            <div class="col-md-6">
                <img src="{{asset('images/4.jpg')}}" class="img-responsive">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus interdum erat libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero, pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque libero,
                    pulvinar tincidunt leo consectetur eget. Curabitur lacinia pellentesque</p>
            </div>

            <div class="col-md-6">
                <div class="media">
                    <ul>
                        <li>
                            <div class="media-left">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">School fees</h4>
                                <p><b>Hopemore Life Solution</b> have awarded over 200 grants to high school learning students to cater for their learnig expenses.</p>
                            </div>
                        </li>
                        <li>
                            <div class="media-left">
                                <i class="fa fa-book"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Emmagency loan</h4>
                                <p><b>Hopemore Life Solution</b> grants range from Ksh.50 000 to Ksh.250 000  to investments, allowing many groups to “right-size” funding to fit their needs and constraints.</p>
                            </div>
                        </li>
                        <li>
                            <div class="media-left">
                                <i class="fa fa-rocket"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">business start up & boost</h4>
                                <p><b>Hopemore Life Solution</b> grants are helping grassroots communities to create better livelihoods by generating Ksh. 10 million in new local economic activities (Businesess) that produce stable jobs and better incomes.</p>
                            </div>
                        </li>
                        <li>
                            <div class="media-left">
                                <i class="fa fa-heart-o"></i>
                            </div>
                            <div class="media-body">
                                <h4>Hospital bills</h4>
                                <p><b>Hopemore Life Solution</b> invests grants of up to Ksh. 250,000 directly to underserved hospital bills. .</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                {{--<img src="{{asset('images/4.jpg')}}" class="img-responsive">--}}
                <p><b>HOPEMORE LIFE SOLUTION</b> is working with African communities in fragile and post-conflict areas throughout the Sahel, Horn and Great Lakes region, empowering vulnerable populations such as ethnic and religious minorities, pastoralists, youth and women, and those living with disabilities create sustainable livelihoods. </p>
            </div>
        </div>


    </div>


@endsection
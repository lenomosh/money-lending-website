@extends('layouts.front1')
@section('script')
    <script>
        var element = document.getElementById("grant");
        element.classList.add("active");
    </script>

@endsection
@section('grant')

    <div id="breadcrumb">
        <div class="container">
            <div class="breadcrumb">
                <li><a href="">Home</a></li>
                <li>get grant</li>
            </div>
        </div>
    </div>

    <section id="portfolio">
        <div class="container">
            <div class="center">
                <p><b>HopeMore Life Solution</b> invites African Individuals, cooperatives, producer groups, and enterprises to submit proposals for grant financing and local support for innovative solutions that extend their capabilities to increase revenues, create jobs, improve farmer incomes, and achieve sustainable market-based growth.</p>
            </div>

            <ul class="portfolio-filter text-center">
                <li><a class="btn btn-default active" href="#" data-filter="*">requirements</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".bootstrap">Create account</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".html">success</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".wordpress">implementation</a></li>
            </ul>
            <!--/#portfolio-filter-->
        </div>
        <div class="container">
            <div class="">
                <div class="portfolio-items">
                    <div class="portfolio-item apps col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Individual Grant Requirements</a></h3>
                                    <p>• National Identification document/student ID/Business Permit/Business plan</p>
                                    <p>• Recent verified Fee structure/hospital bill statement</p>
                                    <h3><a href="#">Organization Requirements
                                            <p>• The organization must be 100% African-owned and managed by country national</p>
                                            <p>• The organization must be a legally registered African entity </p>
                                            <p>• The organization must demonstrate that it has successfully worked together and has the capability to effectively use grants funds</p>
                                            <p>• The ownership and management must be in agreement on the problem to be addressed and have a commitment to benefit their community.</p>
                                            <p>• The organization must have basic functional management and controls to account for HOPEMORE LIFE SOLUTION funds</p>
                                        </a></h3>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.portfolio-item-->

                    <div class="portfolio-item joomla bootstrap col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Registration</a></h3>
                                    <p>Sign up using the <b><i>sign up</i></b> icon in the home menu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.portfolio-item-->

                    <div class="portfolio-item bootstrap wordpress col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Successful Proposals Must </a></h3>
                                    <p>• Have a clearly defined market opportunity to grow revenues that can increase farmer incomes or impact the community</p>
                                    <p>• Have a clearly defined plan of how they can increase revenues and farmer incomes in 2- 4 years.</p>
                                    <p>•  Be able to make significant cash or in-kind contributions toward making the project successful</p>
                                    <p>• Be able to impact hundreds of farmers.</p>
                                    <p>•  Be able to identify additional financing options available after the HOPEMORE LIFE SOLUTION grant ends</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.portfolio-item-->

                    <div class="portfolio-item joomla wordpress apps col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Supporting Documents</a></h3>
                                    <p>• Completed Application Form. - <b>Required</b></p>
                                    <p>• Copy of a valid organization or enterprise registration form. - <b>Required</b></p>
                                    <p>• Most Recent Business Plan. - Preferred but <b>Optional</b></p>
                                    <p>• Two Years of Financial Statements - Preferred but <b>Optional</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.portfolio-item-->

                    <div class="portfolio-item wordpress html bootstrap col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Implementation</a></h3>
                                    <p>HOPEMORE LIFE SOLUTION will review all applications and will contact those organizations that best fit country strategies and objectives. A site visit will be conducted and finalists will be referred to HopeMore life solution-Kenya branch for a final assessment and selection. Once an application is selected by Hopemore life solution, a local HOPEMORE LIFE SOLUTION Technical Partner will be assigned to the organization to help complete additional Grant Design and Budget steps.  After the design steps are completed HOPEMORE LIFE SOLUTION will enter into a formal agreement to award grant funds to the organization.  The HOPEMORE LIFE SOLUTION Technical Partner will continue to assist the organization during the grant implementation period. Grant funds are disbursed to the organization over the grant period as the organization achieves the plans, activities, and outcomes of the grant design. Grant organizations report to HOPEMORE LIFE SOLUTION on a quarterly basis.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.portfolio-item-->
                </div>
            </div>
        </div>
    </section>
    <!--/#portfolio-item-->
@endsection
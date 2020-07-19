@extends('layouts.front1')
@section('signup')
    <div id="breadcrumb">
        <div class="container">
            <div class="breadcrumb">
                <li><a href="">Home</a></li>
                <li>Signup</li>
            </div>
        </div>
    </div>
    <style>
        form {
            margin-left: 25%;
            margin-right: 25%;
            /*
                        margin-bottom: 5%;
            */
            margin-top: 5%;

        }
    </style>
    <!-- /Nav -->
    <form method="post" action="signup">
        @csrf
        <style>
            label{
                color: #1b1e21;
            }
        </style>



        <div class="form-group">
            <label for="fname">First Name: </label>
            <input id="fname" class="form-control" type="text" value="{{old('fname')}}" name="fname">
            @if ($errors->has('fname'))
                <div class="alert alert-danger">{{ $errors->first('fname') }}</div>
                <style>
                    #fname {
                        border-color: #761b18;
                    }
                </style>

            @endif
        </div>


        <div class="form-group">
            <label for="lname">Last Name: </label>
            <input id="lname" class="form-control" type="text" value="{{old('lname')}}" name="lname">
            @if ($errors->has('lname'))
                <div class="alert alert-danger">{{ $errors->first('lname') }}</div>
                <style>
                    #lname {
                        border-color: #761b18;
                    }
                </style>

            @endif
        </div>


        <div class="form-group">
            <label for="dob">Date of Birth: </label>
            <input id="dob" class="form-control" type="date" value="{{old('dob')}}" name="dob">
            @if ($errors->has('dob'))
                <div class="alert alert-danger">{{ $errors->first('dob') }}</div>
                <style>
                    #dob {
                        border-color: #761b18;
                    }
                </style>

            @endif
        </div>

        <div class="form-group">
            <label for="idno" >ID Number </label>
            <input type="number" name="idno" id="idno" pattern="[-+]?[0-9]" minlength="7" maxlength="8" onkeypress="return isNumberKey(event)" value="{{old('idno')}}" class="form-control">
            @if ($errors->has('idno'))
                <div class="alert alert-danger">{{ $errors->first('idno') }}</div>
                <style>
                    #idno {
                        border-color: #761b18;
                    }
                </style>

            @endif
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <select class="form-control" id="gender" name="gender" tabindex="-1" >
                <option value="" >Choose option</option>
                <option value="Male" @if (old('gender') == "Male") {{ 'selected' }} @endif>Male</option>
                <option value="Female" @if (old('gender') == "Female") {{ 'selected' }} @endif>Female</option>
            </select>
            <div class="select-dropdown"></div>
            @if ($errors->has('gender'))
                <div class="alert alert-danger">{{ $errors->first('gender') }}</div>
                <style>
                    #gender {
                        border-color: #761b18;
                    }
                </style>

            @endif
        </div>
        <div class="form-group">
            <label for="gender">Loan Type</label>
            <select class="form-control" id="ltype" name="ltype" tabindex="-1" >
                <option value="">Choose option</option>
                <option value="Business Startup" @if (old('ltype') == "Business Startup") {{ 'selected' }} @endif>Business Startup</option>
                <option value="Business Boost" @if (old('ltype') == "Business Boost") {{ 'selected' }} @endif>Business Boost</option>
                <option value="School Fees" @if (old('ltype') == "School Fees") {{ 'selected' }} @endif>School Fees</option>
                <option value="Agricultural Sector Investment" @if (old('ltype') == "Agricultural Sector Investment") {{ 'selected' }} @endif>Agricultural Sector Investment</option>
                <option value="Hospital Bill Payment" @if (old('ltype') == "Hospital Bill Payment") {{ 'selected' }} @endif>Hospital Bill Payment</option>
                <option value="Emergency Loan" @if (old('ltype') == "Emergency Loan") {{ 'selected' }} @endif>Emergency Loan</option>
            </select>
            <div class="select-dropdown"></div>
            @if ($errors->has('ltype'))
                <div class="alert alert-danger">{{ $errors->first('ltype') }}</div>
                <style>
                    #ltype {
                        border-color: #761b18;
                    }
                </style>

            @endif
        </div>
        <div class="form-group">
            <label for="tel">Safaricom Phone Number: </label>
            <input type="tel" class="form-control" name="tel" minlength="10" maxlength="13" id="tel" value="{{old('tel')}}" placeholder="+254 712 345 678">
            @if ($errors->has('tel'))
                <div class="alert alert-danger">{{ $errors->first('tel') }}</div>
                <style>
                    #tel {
                        border-color: #761b18;
                    }
                </style>

            @endif
        </div><br>
        <div class="form-group">
            <input type="submit" class="btn btn-block" name="submit" value="Submit" onclick="validate()">
        </div>

    </form>
    <script>
        /*let input =document.getElementsByTagName('input');
        input.setAttribute('required','');*/


        let fname = document.getElementById('fname').value;
        let lname = document.getElementById('lname').value;
        let dob = document.getElementById('dob').value;
        let idno = document.getElementById('idno').value;
        let gender = document.getElementById('gender').value;
        let tel = document.getElementById('tel').value;
        function validate() {
            if(fname.length == 0 || lname.length == null || dob.length == null || idno.length == null || gender.length == null || tel.length == null){
                document.getElementById('head').innerText = "* All fields are mandatory *";
                fname.focus();
                return false;
            };

        }


    </script>
@endsection
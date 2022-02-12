@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <h2 class="card-header">{{ __('Register') }}</h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group row mb-3">
                                    <label for="name" class=" text-md-end">First Name</label>

                                    <!-- <div class="col-md-6"> -->
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <!-- </div> -->
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="email" class=" text-md-end">{{ __('Email Address') }}</label>

                                    <!-- <div class="col-md-6"> -->
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <!-- </div> -->
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="name" class=" text-md-end">Date of Birth</label>

                                    <!-- <div class="col-md-6"> -->
                                    <input id="name" type="date"
                                        class="form-control @error('name') is-invalid @enderror" name="dob" value=""
                                        required autocomplete="date" autofocus>

                                    @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <!-- </div> -->
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="name" class=" text-md-end">Gender</label>
                                    <div class="form-check">
                                        <!-- <div class="col-md-6"> -->
                                        <input id="name" type="radio" class="form-check-input" name="gender" value="M"
                                            required autofocus>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Male
                                        </label>

                                        <input id="name" type="radio" class="form-check-input" name="gender" value="F"
                                            required autofocus>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Female
                                        </label>
                                    </div>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <!-- </div> -->
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="name" class=" text-md-end">Occupation</label>

                                    <select name="occupation" class="form-control form-select"
                                        aria-label="Default select example">
                                        <option selected>Select your occupation</option>
                                        <option value="private">Private job</option>
                                        <option value="goverment">Goverment job</option>
                                        <option value="business">Business</option>
                                    </select>

                                </div>

                                <div class="form-group row mb-3">
                                    <label for="name" class=" text-md-end">Family Type</label>

                                    <select name="familytype" class="form-control form-select"
                                        aria-label="Default select example">
                                        <option selected>Select your family type</option>
                                        <option value="joint">Joint familt</option>
                                        <option value="nuclear">Nuclear family</option>
                                    </select>

                                </div>

                             
                                <script>
                                $('select').selectpicker();
                                $('select').manglik();
                                // $('select').manglik();
                                </script>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="form-group row mb-3">
                                    <label for="name" class=" text-md-end">Last Name</label>

                                    <!-- <div class="col-md-6"> -->
                                    <input id="name" type="text"
                                        class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                        value="" required autocomplete="lastname">

                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <!-- </div> -->
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="password" class=" text-md-end">{{ __('Password') }}</label>

                                    <!-- <div class="col-md-6"> -->
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <!-- </div> -->
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="password-confirm"
                                        class=" text-md-end">{{ __('Confirm Password') }}</label>

                                    <!-- <div class="col-md-6"> -->
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <!-- </div> -->
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="password" class=" text-md-end">Annual income</label>

                                    <!-- <div class="col-md-6"> -->
                                    <input id="password" type="number"
                                        class="form-control @error('password') is-invalid @enderror" name="income"
                                        required>

                                    @error('income')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <!-- </div> -->
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="name" class=" text-md-end">Manglik</label>
                                    <select name="manglik" class="form-control form-select"
                                        aria-label="Default select example">
                                        <option selected>Select Below</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h3>Partner Preference</h3>
                            <div class="col-md-5">
                               
                            {{-- <div class="col-md-6"> --}}
                                <div class="form-group row mb-3">
                                    <label for="name" class=" text-md-end">Expected Occupation</label>

                                    {{-- <select name="expect_occupation[]" multiple data-live-search="true"
                                        class="selectpicker form-control form-select"
                                        aria-label="Default select example">
                                        <option disabled selected>Select  occupation</option>
                                        <option value="private">Private job</option>
                                        <option value="goverment">Goverment job</option>
                                        <option value="business">Business</option>
                                    </select> --}}
                                    <select name="expect_occupation[]" multiple data-live-search="true"
                                        class="selectpicker form-control form-select" aria-label="Default select example">
                                        <option disabled selected>Select  occupation</option>
                                        <option value="private">Private job</option>
                                        <option value="goverment">Goverment job</option>
                                        <option value="business">Business</option>
                                    </select>

                                </div>
                            {{-- </div> --}}
                            {{-- <div class="col-md-6"> --}}
                                <div class="form-group">
                                    <p>
                                        <label class=" text-md-end" for="amount">Price range:</label>
                                        <input name="expect_salary" type="text" id="amount" readonly
                                            style="border:0; color:#f6931f; font-weight:bold;">
                                    </p>

                                    <div id="slider-range"></div>
                                </div>
                            {{-- </div> --}}
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="form-group row mb-3">
                                    <label for="name" class=" text-md-end">Expected Family</label>

                                    <select name="expect_familytype[]" multiple data-live-search="true"
                                        class="selectpicker form-control form-select"
                                        aria-label="Default select example">
                                        <option disabled selected>Select Family</option>
                                        <option value="joint">Joint familt</option>
                                        <option value="nuclear">Nuclear family</option>
                                    </select>

                                </div>
                                <div class="form-group row mb-3">
                                    <label for="name" class=" text-md-end">Expected Manglik </label>
                                    <select name="expect_manglik"
                                        class="form-control form-select"
                                        aria-label="Default select example">
                                        <option disabled selected>Select Manglik </option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
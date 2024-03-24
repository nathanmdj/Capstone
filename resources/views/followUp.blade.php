@extends('layouts.followUpLayout')
@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 shadow box-area bg-info">

            <div class="mb-3">
                <label for="option1" class="form-label col-12">Gender</label>

                <input type="radio" class="btn-check" name="genders" id="gender1" autocomplete="off">
                <label class="btn btn-white" for="gender1">Male</label>

                <input type="radio" class="btn-check" name="genders" id="gender2" autocomplete="off">
                <label class="btn btn-white" for="gender2">Female</label>

            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">City & Country</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="City & Country">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" id="exampleFormControlInput1">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Interest</label>
                <input type="text" class="form-control" id="exampleFormControlInput1">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tech Stack / Programming Language</label>
                <input type="text" class="form-control" id="exampleFormControlInput1">
            </div>

            <div>
                <button type="submit" class="btn btn-danger col-md-3">Submit</button>
            </div>

        </div>
    </div>
@endsection

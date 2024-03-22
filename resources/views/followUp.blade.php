@extends('layouts.followupLayout')
@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 shadow box-area bg-info">

            <form>
                <div class="mb-3">
                    <label for="FirstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="FirstName">
                </div>

                <div class="mb-3">
                    <label for="Last Name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="Last Name">
                </div>

                <div class="mb-3">
                    <label for="Number" class="form-label">Mobile Number</label>
                    <input type="number" class="form-control" id="Number">
                </div>

                <div class="mb-3">
                    <label for="Address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="Address">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>

                <div class="mb-3">
                    <label for="Birthday" class="form-label">Birthday</label>
                    <input type="date" class="form-control" id="Birthday">
                </div>

                <div>
                    <label for="Gender" class="form-label">Gender</label>
                    <select class="form-select mb-3" id="Gender" aria-label="Default select example">
                        <option selected>Select</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>

                <div class="mb-5">
                    <label for="exampleInputPassword2" class="form-label">Re-enter Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword2">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Something About You</span>
                    <textarea class="form-control" aria-label="With textarea"></textarea>
                </div>

                <button type="submit" class="btn btn-danger">Submit</button>
            </form>

        </div>
    </div>
@endsection

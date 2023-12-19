<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{{ asset('assets/css/company.css') }}">
  <!-- Add other necessary stylesheets and scripts here -->
</head>
<body>

@extends('Layout/company')


    <p class="title">Job List</p>
        @foreach($jobs as $job)
            @if(Auth::guard('company')->user()->id == $job->company->id)   
        <div class="box-layout"> 
            <div class="job-box" >   
                <img src="company_icon/Kaltsit_first.jpg" width="100" height="100" alt="Kaltsit"/>
                <h1>{{ $job->jobName }}</h1>
                <h2>{{ $job->company->companyName }}</h2>
                <h3>{{ $job->Category }}</h3>
                <h3><img src="../../assets/icons/map-black.png" style="margin-right: 5px;">{{ $job->company->address }}</h3>
                <h4><img src="../../assets/icons/price.png" style="margin-right: 5px;">{{ $job->Salary }}</h4>
                <p>{{ $job->jobDesc }}</p>
                <p>{{ $job->requirement }}</p>

                <div>
                <a href="{{ route('job.edit', ['job' => $job]) }}" class="btn btn-primary" style="width: 10rem">Edit</a>  
                <a href="{{ route('applicant', ['job' => $job]) }}" class="btn btn-primary" style="width: 10rem">View Applicant</a>    
                <form method="POST" action= "{{ route('job.delete', ['job' => $job]) }}">
                    @csrf
                    @method('delete')           
                <input class="btn btn-primary mt-2" type="submit" value="Delete" style="height: 2.3rem; background-color: red"/>
                </form>
                </div>   
            </div>
        </div>
            @endif  
        @endforeach
        <a href="{{ route('job.create',['company' => Auth::guard('company')->user()->id]) }}" class="btn btn-primary mt-3">Create a Job</a>   
        <a href="{{ route('job.index.company') }}" class="btn btn-primary mt-3">Back</a>   
        <!-- </div> -->
</body>
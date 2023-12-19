<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('assets/css/user.css') }}">
  <!-- Add other necessary stylesheets and scripts here -->
</head>
<body>

@extends('Layout/user')


    <p class="title" style="margin-top: 5%;">Job List</p>
        @foreach($jobs as $job)   
            @if($job->status == 'Open' && $job->approved == 1)
                <div class="box-layout" style="width: 40rem; height: 10rem"> 
                    <div class="job-box">   
                        <img src="company_icon/Kaltsit_first.jpg" width="100" height="100" alt="Kaltsit"/>
                        <h1>{{ $job->jobName }}</h1>
                        <h2>{{ $job->company->companyName }}</h1>
                        <h3>{{ $job->Category }}</h3>
                        <h3><img src="../../assets/icons/map-black.png" style="margin-right: 5px;">{{ $job->company->address }}</h3>
                        <h4><img src="../../assets/icons/price.png" style="margin-right: 5px;">{{ $job->Salary }}</h4>
                        <p>{{ $job->jobDesc }}</p>
                        <p>{{ $job->requirement }}</p>
                        <div>    
                            <form method="POST" action="{{ route('apply_job', ['job' => $job]) }}">
                                @csrf
                                @method('post')           
                                <button class="btn btn-primary mt-2" type="submit" style="height: 2.3rem; background-color: blue">Apply</button>
                            </form>
                        </div> 
                    </div>
                </div>
            @endif
        @endforeach  
  </body>

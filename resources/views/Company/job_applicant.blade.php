<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{{ asset('assets/css/company.css') }}">
  <!-- Add other necessary stylesheets and scripts here -->
</head>
<body>

@extends('Layout/company')

    <p class="title" style="margin: 0px; margin-top: 5%;"> Applicant </p>
    <div class="container-table">
    <table>
    <tr>
        <td>Name</td>
        <td>Email</td>
        <td>Phone Number</td>
        <td>CV</td>
        <td>Acceptance</td>
    </tr>
    @foreach( $applicant as $applicants )
       @if ($applicants->job_id == $job->id)
    <tr>    
        <td>{{ $applicants->user->name }}</td>
        <td>{{ $applicants->user->email }}</td>
        <td>{{ $applicants->user->phoneNum }}</td>
        <td>
            {{ $applicants->user->CV }}
        </td>
        <td>
        @if ($applicants->status == 'Waiting')
        <form action="{{ route('accepted', ['apply' => $applicants]) }}" method="POST">
            @csrf
            @method('put')
                <button type="submit" class="btn btn-primary mt-3" style="height: 2.3rem; background-color: blue">Accept</button>
            </form>
        @else
            {{ $applicants->status}}
        @endif
        </td>   
    </tr>
        @endif
    @endforeach    
</table>
</div>
</body>
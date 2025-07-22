@extends('layouts.dashboard_member')

@section('content')
    <x-task-submit-form :task="$task" />
@endsection
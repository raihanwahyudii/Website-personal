@extends('layouts.admin')

@section('content')
<h1>Edit User: {{ $user->name }}</h1>

<form action="{{ route('admin.users.update', $user->id)

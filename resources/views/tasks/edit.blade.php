@extends('layouts.app')
@section('content')
<h1 class="page-header">Edit Task</h1>
@php 
    $option = ['Critical' => 'Critical', 'High' => 'High', 'Medium' => 'High', 'Low' => 'High'];
    $statuses = ['New' => 'New', 'In Progress' => 'In Progress', 'Completed' => 'Completed', 'Pedning' => 'Pedning', 'Closed' => 'Closed'];
@endphp
           @if ($errors->any())
         
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
<div class="d-flex justify-content-around">
 

<x-ui.form :action_route="route('task.update', $task->id)"> 
          <!-- Name input -->
          @method('PUT')
            <x-ui.input :name="'name'" :id="'name'" :label="'Task'" :type="'text'"  :isrequired="true" :value="$task->name"/>  
            <x-ui.input :name="'date'" :id="'date'" :label="'Date'" :type="'date'" :isrequired="false" :value="$task->date"/>  
            <x-ui.select :name="'priority'" :id="'priority'" :label="'Priority'" :options="$option"  :isrequired="true" :value="$task->priority"/>  
            <x-ui.select :name="'status'" :id="'status'" :label="'Status'" :options="$statuses"  :isrequired="true" :value="$task->status"/>  
            <x-ui.text :name="'comments'" :id="'comments'" :label="'Comments'"  :isrequired="true" :value="$task->comments"/>  



        <!-- Submit button -->
        <div class="d-flex gap-2">
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4 w-50">Save</button>


    </x-ui.form>
            <x-ui.form :action_route="route('task.destroy', $task)" onsubmit="return confirm('Are you sure?')"> 
             @method('DELETE')
        <button data-mdb-ripple-init type="submit" class="btn btn-danger btn-block mb-4 w-50">Delete</button>
            </x-ui.form>
        </div>
</div>
@endsection
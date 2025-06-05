@extends('layouts.app')

@php 
    $option = ['Critical' => 'Critical', 'High' => 'High', 'Medium' => 'High', 'Low' => 'High'];
    $statuses = ['New' => 'New', 'In Progress' => 'In Progress', 'Completed' => 'Completed', 'Pedning' => 'Pedning', 'Closed' => 'Closed'];
@endphp
@section('content')

<h1 class="page-header">Tasks Page</h1>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTaskModal">
    Add new task
  </button>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
    Filters
  </button>


    <x-ui.modal :header="'Add New Task'" :id="'filterModal'">

    <x-ui.form :action_route="route('tasks.index')" :method="'GET'"> 
                <x-ui.select :name="'status'" :id="'status'" :label="'Status'" :options="$statuses"  :isrequired="false" :value="''"/>  
                <x-ui.select :name="'priority'" :id="'priority'" :label="'Priority'" :options="$option"  :isrequired="false" :value="''"/>  
                <x-ui.input :name="'name'" :id="'name'" :label="'Task name'" :type="'text'" :isrequired="false" :value="''"/>  
                <x-ui.input :name="'per_page'" :id="'per_page'" :label="'Items Per Page'"  :type="'number'" :isrequired="false"/>  
    <button type="submit" class="btn btn-primary btn-block mb-4 w-100">Filter</button>
      </x-ui.form>
  </x-ui.modal>

  <x-ui.modal :header="'Add New Task'" :id="'newTaskModal'">
    <x-ui.form :action_route="route('task.store')"> 
          <!-- Name input -->
            <x-ui.input :name="'name'" :id="'name'" :label="'Task'" :type="'text'"  :isrequired="true" />  
            <x-ui.input :name="'date'" :id="'date'" :label="'Date'" :type="'date'" :isrequired="true"/>  
            <x-ui.select :name="'priority'" :id="'priority'" :label="'Priority'" :options="$option"  :isrequired="true", :value=''/>  
            <x-ui.text :name="'comments'" :id="'comments'" :label="'Comments'"  :isrequired="true"/>  
          
            



        <!-- Submit button -->
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4 w-100">Submit</button>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </x-ui.form>
  </x-ui.modal>

<x-ui.table :rows="$tasks">
</x-ui.table>
<div class="d-flex justify-content-between align-items-center my-3">
    <div>
        Showing page {{ $tasks->currentPage() }} of {{ $tasks->lastPage() }}
    </div>
    <div>
        {{ $tasks->appends(request()->query())->links() }}
    </div>
</div>

@endsection

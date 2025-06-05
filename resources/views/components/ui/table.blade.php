@props(['rows'])
<table class="table table-centered mb-0 mt-3 text-center">
    <thead class="table-dark">
        <tr>
            <th>Task</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Date</th>
            <th>Creation Date</th>
            <th>View</th>
  
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row )
             <tr>
            <td>{{ $row->name }}</td>
            <td> {{ $row->status }}</td>
            <td> {{ $row->priority }}</td>
            <td>{{ $row->date }}</td>
            <td>{{ $row->created_at }}</td>
            <td><a href="{{ route('task.edit', $row->id) }}" ><i class='fa fa-eye'></i></a></td>
              
        </tr>
        @endforeach
       
    </tbody>
</table>

                                            
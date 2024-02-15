  
 <div class="card-body table-responsive p-0">
     <table class="table table-hover text-nowrap">
         <thead>
             <tr>
                 <th width="60">ID</th>
                 <th>Name</th>
                 <th>Topic</th>
                 <th width="100">Price Range</th>
                 <th>Speakers</th>
                 <th width="100">Created ON</th>

             </tr>
         </thead>
         <tbody>
             @foreach ($courses as $course)
                 <tr>
                     <td>{{ $course->id }}</td>
                     <td>{{ $course->name }}</td>
                     <td>{{ $course->topic->name }}</td>
                     <td>{{ $course->price_range }}</td>
                     <td>
                         @foreach ($course->Speakers as $Speaker)
                             <span class="float-right badge bg-success">
                                 {{ $Speaker->name }}
                             </span>
                         @endforeach
                     </td>
                     <td>{{ $course->created_at }}</td>


                 </tr>
             @endforeach

         </tbody>
     </table>
 </div>
 <div class="card-footer clearfix">
     <ul class="pagination pagination m-0 float-right">
         {{ $courses->links() }}
     </ul>
 </div>

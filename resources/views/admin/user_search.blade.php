
<body class="bg-gray-100 p-8">
@if($userSearch === null)
  <p class="text-black-600 text-4xl text-center">No Data Found</p>
@else
  <div class="max-w-full mx-auto">

    <!-- Responsive Table Container -->
    <div id="tableBody" class="bg-white shadow-md rounded-lg overflow-hidden overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        
        <tbody class="bg-white divide-y divide-gray-200">
          <!-- Sample Data Row -->
            @foreach($userSearch as $user)
              <tr>
                <th class="px-6 py-4">
                  <input type="checkbox" class="updateTShirtGivenStatus w-4 h-4" data-id="{{ $user->id }}" {{ $user->t_shirt_given == 'yes' ? 'checked' : '' }}>
                </th>
                <th class="px-6 py-4">
                  <input type="checkbox" class="updateFoodGivenStatus w-4 h-4" data-id="{{ $user->id }}" {{ $user->food_given == 'yes' ? 'checked' : '' }}>
                </th>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->father_name ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->mother_name ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->address ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->current_job ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->mobile_number ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->t_shirt_size ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->ssc_result_status ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->ssc_batch ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->study_status_check ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->study_year_count ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->which_class ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->participation_type ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->take_come_children ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->child_age_less_five ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->child_age_more_five ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->total_participant ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->total_amount ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->payment_status ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->registrant_ID ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->registrant ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->registrant_name ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $user->registrant_mobile_number ?? 'N/A' }}</td>
              </tr>
            @endforeach
          <!-- Add more rows as needed -->
        </tbody>
      </table>
      @endif
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      
      $('.updateTShirtGivenStatus').change(function() {
        var userId = $(this).data('id');
        var value = $(this).prop('checked') ? 'yes' : 'no';
        const type = 't_shirt_given';
        dataSave(userId, type, value, this);
      });

      $('.updateFoodGivenStatus').change(function() {
        var userId = $(this).data('id');
        var value = $(this).prop('checked') ? 'yes' : 'no';
        const type = 'food_given';
        dataSave(userId, type, value, this);
      });

      function dataSave(userId, type, value, element){
        $.ajax({
          url: "{{route('user.update.given')}}",
          type: 'POST',
          data: {
            'user_id' : userId,
            'type' : type,
            'value' : value
          },
          success: function(response) {
            if(response.value === 'yes') {
              $(this).checked;
            } else if(response.value === 'no') {
              $(this).checked = false;
            }
          }
        });
      }
    });

  </script>

</body>
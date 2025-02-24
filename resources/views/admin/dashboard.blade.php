@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<body class="bg-gray-100 p-8">
@if(!$usersData)
  <p class="text-black-600 text-4xl text-center">No Data Found</p>
@else
  <div class="max-w-full mx-auto">
    <!-- Search Bar -->
    <div class="mb-4">
      <input
        type="text"
        id="searchInput"
        placeholder="Search by name..."
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
    </div>
    <!-- Responsive Table Container -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">T-Shirt Given</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Food Given</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Father Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mother Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Current Job</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mobile Number</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">T-Shirt Size</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SSC Result</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SSC Batch</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Study Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Study Duration</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Which Class</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Participation Type</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Take Come Children</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Child Age Less Five</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Child Age More Five</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Participant</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Amount</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registrant ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registrant</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registrant Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registrant Mobile Number</th>
          </tr>
        </thead>
       
        <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
          <!-- Sample Data Row -->
            @foreach($usersData as $user) 
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
      <div class="mt-4 mb-4 px-4">
        {{ $usersData->links() }}
      </div>
      @endif
    </div>
  </div>

  <!-- JavaScript for Search Functionality -->
  <script>
    $(document).ready(function() {
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('#searchInput').on('keyup', function(e){
        e.preventDefault();
        const searchValue = $('#searchInput').val().trim();

        $.ajax({
          url: "{{ route('admin.user.search')}}",
          type: 'GET',
          data: {
            'search_value' : searchValue
          },
          success: function(response) {
            // console.log(response.status);
            if(response.status === 'found') {
              $('#tableBody').html(response.data);
            } else if(response.status === 'notFound') {
              $('#tableBody').html(response.data);
            }
          }
        });

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

      $('#tShirtGiven').click(function() {
        let Value = 'no';
        if($(this).prop('checked')) {
          Value = 'yes';
        }
        const Type = 't_shirt_given';
        dataSave(Type, Value, this)
      });

      $('#foodGiven').click(function() {
        let Value = 'no';
        if($(this).prop('checked')) {
          Value = 'yes';
        }
        const Type = 'food_given';
        dataSave(Type, Value, this);
      });

      function dataSave(userId, type, value, element){
        console.log(userId+type+value);
        return;
        $.ajax({
          url: "{{route('user.update.given')}}",
          type: 'POST',
          data: {
            'user_id' : userId,
            'type' : type,
            'value' : value
          },
          success: function(response) {
            console.log(response);
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

@endsection
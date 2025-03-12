@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<body class="bg-gray-100 p-8">
@if(!$usersData)
  <p class="text-black-600 text-4xl text-center">No Data Found</p>
@else
<section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 md:gap-6 mb-8">
    <!-- Total Users Section -->
    <div class="bg-white rounded-2xl shadow p-3 md:p-4 flex flex-col items-center text-center transition-transform hover:scale-[1.02]">
        <div class="flex justify-between items-center w-full mb-3">
            <div>
            <span class="mt-2 text-blue-600 text-xl md:text-2xl font-bold">{{ $usersData->count() }}</span>
              <h3 class="text-sm md:text-base font-semibold mb-1">Total Registrants</h3>
            </div>
            <div class="bg-blue-100 p-2 md:p-3 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
            </svg>
            </div>
        </div>
    </div>
     <!-- Total Amount Section -->
     <div class="bg-white rounded-2xl shadow p-3 md:p-4 flex flex-col items-center text-center transition-transform hover:scale-[1.02]">
        <div class="flex justify-between items-center w-full mb-3">
            <div>
            <span class="mt-2 text-blue-600 text-xl md:text-2xl font-bold">{{ $totalAmount }}Taka</span>
            <h3 class="text-sm md:text-base font-semibold mb-1">Total Paid</h3>
            </div>
            <div class="bg-blue-100 p-2 md:p-3 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
            </svg>

            </div>
        </div>
    </div>
</section>

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

  <!-- JavaScript for Search Functionality and Update -->
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
            if(response.status === 'found') {
              $('#tableBody').html(response.data);
            } else if(response.status === 'notFound') {
              $('#tableBody').html(response.data);
            }
          }
        });

      });

      $('#tableBody').on('change', '.updateTShirtGivenStatus', function() {
        var userId = $(this).data('id');
        var value = $(this).prop('checked') ? 'yes' : 'no';
        const type = 't_shirt_given';
        dataSave(userId, type, value, this);
      });

       $('#tableBody').on('change', '.updateFoodGivenStatus', function() {
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

@endsection
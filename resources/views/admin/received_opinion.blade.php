@extends('layouts.app')

@section('title', 'Received Opinion')

@section('content')

<body class="bg-gray-100 p-8">
@if($usersOpinionData->isEmpty())
  <p class="text-black-600 text-4xl text-center">No Data Found</p>
@else
    <!-- Responsive Table Container -->
    <div class="bg-white shadow-md rounded-lg overflow-hidden overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SSC Batch</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Opinion</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
          </tr>
        </thead>
       
        <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
          <!-- Sample Data Row -->
            @foreach($usersOpinionData as $userOpinionData) 
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $userOpinionData->name ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $userOpinionData->ssc_batch ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap max-w-[10px] truncate">
                    {{ $userOpinionData->user_opinion ?? 'N/A' }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap"><a href="{{ route('admin.received.opinion.view', $userOpinionData->id) }}" class="inline-flex items-center rounded-md bg-green-500 px-2 py-1 text-xs font-bold text-white ring-1 ring-green-600/20 ring-inset">View</a></td>
            </tr>

            @endforeach
          <!-- Add more rows as needed -->
        </tbody>
      </table>
      <div class="mt-4 mb-4 px-4">
        {{ $usersOpinionData->links() }}
      </div>
      @endif
    </div>
  </div>

  <!-- JavaScript for Search Functionality -->
  <script>

  </script>
</body>

@endsection
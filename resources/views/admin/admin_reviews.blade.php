@extends('admin')
@section('reviews') active @endsection
@section('content')
<section class="card">
  <div class="d-flex ">
    <h2>Reviews</h2>
    <div>
    <form class="navbar-search search-form" action="{{ route('search_review') }}" method="GET">
      <input type="text" name="search" placeholder="Search Reviews" class="navbar-search-input">
      <i class="fas fa-search search-btn" onclick="submitSearchForm()"></i>
    </form>
    <script>
      function submitSearchForm() {
        document.querySelector('.search-form').submit();
      }
    </script>
  </div>

  </div>
  <table>
  <thead>
    <tr>
      <th >Subject</th>
      <th class="hide-on-small-screen" >Email</th>
      <th>Message</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($reviews as $review)
      <tr>
        <td >{{ $review->subject }}</td>
        <td class="hide-on-small-screen">{{ $review->email }}</td>
        <td>{{ Str::limit($review->message, 1000) }}</td>
        <td>
          
          <form action="{{ route('delete_review', $review->id) }}" method="POST">
          @csrf
          @method('DELETE')
            <button type="submit" class="btn btn-delete">Delete</button>
          </form>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="4" class="text-center">No reviews found.</td>
      </tr>
    @endforelse  
  </tbody>
</table>

  
</section>

@endsection

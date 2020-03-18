@forelse ($evaluations as $evaluation)
<div class="card mb-2">
  <div class="card-body">
    <div class="card-text">{{ $evaluation->body }}</div>
    <div class="d-flex justify-content-between align-items-end">
      <div>
        <span class="text-muted font-italic"><small>{{ $evaluation->created_at->diffForHumans() }}</small></span>
      </div>
      <div class="d-flex">
        <a href="{{ $evaluation->path() . '/edit' }}" class="btn btn-outline-secondary btn-sm mr-2">Edit</a>
        <form method="POST" action="{{ $evaluation->path() }}" class="d-flex justify-content-end">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@empty
<p>No evaluations yet.</p>
@endforelse

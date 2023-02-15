@extends('pages.layout.master')
@section('main')
    <div class="card">
        <div class=" p-5 bg-primary text-white text-center">
            <h1>{{ strtoupper($forumDetails->title) }}</h1>
            <p class="mt-2">{{ $forumDetails->description }}</p>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">
            <h4>{{ strtoupper($forumDetails->title) }} Question</h4>
            {{-- <button type="button" class="btn btn-warning float-right ml-2">Save</button> --}}
            @if(session('username'))

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addForumaModal"
                id="openModalButton" style="float: right">
                Open modal
            </button>

        @endif
        </div>
        <div class="card-body">
            <div class="row">

            </div>
        </div>
    </div>
    @forelse ($forumDetails->topic as $key=>$topic)
        <div class="card mt-2">
            <div class="row">
                <div class="card-body m-2">
                    <h5 class="card-title">
                        <a href="{{ route('viewQuestion', [ $topic->id]) }}">Q{{ $key + 1 }}.
                            {{ $topic->title }}</a>
                    </h5>
                    <p class="card-text">{{ Str::limit($topic->description, 30) }}</p>
                </div>
            </div>
        </div>
    @empty
    @endforelse
    </div>
    </div>

    <!-- Add Category Modal -->
    <div class="modal" id="addForumaModal">
        <div class="modal-dialog">
            <form id="addForuma">
                @csrf
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Foruma</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body ">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <input type="hidden" name="forum_id" id="forum_id" value="{{ $forumDetails->id }}">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter Title">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>

                </div>
            </form>
        </div>
    </div>


    {{-- </div> --}}
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            //Category Add
            $("#addForuma").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                console.log(formData);
                $.ajax({
                    url: "{{ route('addQuestion') }}",
                    type: "POST",
                    data: formData,
                    success: function(res) {
                        console.log(res);
                        if (res.success == true) {
                            location.reload();
                        } else {
                            alert(res);
                        }
                    }
                });

            });
        });
    </script>
@endpush
</body>

</html>

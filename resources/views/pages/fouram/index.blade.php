@extends('pages.layout.master')
@section('main')

    <div class="card">
        <div class=" p-5 bg-primary text-white text-center">
            <h1>Coding Support Site</h1>
        </div>
    </div>


    <div class="card mt-4">
        <div class="card-header">
            <h4>Forums</h4>
            {{-- <button type="button" class="btn btn-warning float-right ml-2">Save</button> --}}
            @if (session('username'))
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addForumaModal"
                    id="openModalButton" style="float: right">
                    Add Forums
                </button>
            @endif
        </div>
        <div class="card-body">
            <div class="row">
                @forelse ($fouramCategory as $fouramCategorys)
                    <div class="col-sm-4">
                        <div class="card" style="width: 18rem;">
                            <img src="https://images.unsplash.com/photo-1508919801845-fc2ae1bc2a28?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8aW1nfGVufDB8fDB8fA%3D%3D&w=1000&q=80"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $fouramCategorys->title }}</h5>
                                <p class="card-text">{{ Str::limit($fouramCategorys->description, 3) }}</p>
                                <a href="{{ route('viewTopic', [$fouramCategorys->id, $fouramCategorys->title]) }}"
                                    class="btn btn-primary">Go
                                    somewhere</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No found</p>
                @endforelse

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <!-- Add Category Modal -->
    <div class="modal" id="addForumaModal">
        <div class="modal-dialog">
            <form id="addForuma">
                @csrf
                <div class="modal-content">
                    @auth
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add Foruma</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                    @endauth
                    <!-- Modal body -->
                    <div class="modal-body ">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
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
                    url: "{{ route('addForumas') }}",
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

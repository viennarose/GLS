<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <input type="search" wire:model="search" class="form-control input mb-3" placeholder="Search">
                <div class="card">
                    <div class="text-center"><a href="{{ route('home') }}">Back to Home Page</a></div>
                    <div class="card-header text-center">EDICTS</div>
                    @if(auth()->check() && (auth()->user()->admin == true))
                    <button type="button" class="btn" style="background-color: #343a40; color:white;"
                        data-toggle="modal" data-target="#exampleModal">
                        <span class="fas fa-plus-circle"></span> Add
                    </button>
                    @endif
                    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #234495; color:white;">
                                    <h5 class="modal-title" id="exampleModalLabel">Adding EDICTS</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <form wire:submit.prevent="AddFile()">
                                        @csrf
                                        <div class="container mx-auto">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="" style="color:dimgray">Title</label>
                                                    <input type="text" class="form-control" wire:model='description'
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="" style="color:dimgray">Date</label>
                                                    <input type="date" class="form-control" wire:model='date'
                                                        required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="" style="color:dimgray">Document Link:</label>
                                                    <input type="text" class="form-control" wire:model="link">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="" style="color:dimgray">Hashtag</label>
                                                    <input type="text" class="form-control" wire:model="hashtag"
                                                        required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success"><span
                                                    class="fas fa-save"></span>
                                                Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        @if ($message = Session::get('success_message'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        @if ($message = Session::get('delete_message'))
                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        <table class="table text-center">
                            <tr>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Link</th>
                                <th>Hashtag</th>
                                @if(auth()->check() && (auth()->user()->admin == true))
                                <th>Edit/Delete</th>
                                @endif
                            </tr>
                            @forelse ($files as $file)
                                <tr>

                                    <td>{{ $file->description }}</td>
                                    <td>{{ $file->date }}</td>
                                    <td><a href="{{ $file->link }}">Link</a>
                                    </td>
                                    <td>{{ $file->hashtag }}</td>
                                    <td> @if(auth()->check() && (auth()->user()->admin == true))
                                         <a class="btn btn-success ms-1" type="button" data-bs-toggle="modal"
                                            data-bs-target="#updateFile">
                                            <svg wire:click="editFile({{ $file->id }})"
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                            </svg>
                                        </a>
                                        @endif
                                        <div wire:ignore.self class="modal fade" id="updateFile" tabindex="-1" role="dialog"
                                        aria-labelledby="updateFileLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color: #234495; color:white;">
                                                        <h5 class="modal-title" id="updateFileLabel">Updating EDICTS</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form wire:submit.prevent="updateFile()">
                                                            @csrf
                                                            <div class="container mx-auto">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="" style="color:dimgray">Title</label>
                                                                        <input type="text" class="form-control" wire:model='description'
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="" style="color:dimgray">Date</label>
                                                                        <input type="date" class="form-control" wire:model='date'
                                                                            required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="" style="color:dimgray">Document Link:</label>
                                                                        <input type="text" class="form-control" wire:model="link">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="" style="color:dimgray">Hashtag</label>
                                                                        <input type="text" class="form-control" wire:model="hashtag"
                                                                            required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success"><span
                                                                        class="fas fa-save"></span>
                                                                    Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(auth()->check() && (auth()->user()->admin == true))
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                class="btn btn-danger ms-1">
                                                <svg wire:click="deleteFile({{ $file->id }})"
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-trash3-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                                </svg>
                                            </a>
                                            @endif
                                            <div>
                                                <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1"
                                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger">
                                                                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button wire:click="destroyFile" class="btn btn-primary">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No files found.</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

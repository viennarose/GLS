<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <input type="search" wire:model="search" class="form-control input mb-3 mt-3" placeholder="Search">
                <div class="col-md-12">
                    <div class="form-group">
                        <select class="form-select" wire:model="byResource">
                            <option selected value="all">Filter Resources</option>
                            @foreach ($resources as $resource)
                                <option value="{{ $resource->id }}">{{ $resource->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('resource_id')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <Label>Year</Label>
                        <input type="number" wire:model="year" id="year" min="1900" max="{{ date('Y') }}"
                            step="1" value="{{ date('Y') }}">
                    </div>
                </div>
                <div class="card">
                    <div class="card-header text-center">FILES</div>
                    <button type="button" class="btn" style="background-color: #343a40; color:white;"
                        data-toggle="modal" data-target="#exampleModal">
                        <span class="fas fa-plus-circle"></span> Add
                    </button>
                    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #234495; color:white;">
                                    <h5 class="modal-title" id="exampleModalLabel">Adding RESOURCES</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <form>
                                        @csrf
                                        <div class="container mx-auto">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="" style="color:dimgray">Title</label>
                                                    <input type="text" class="form-control" wire:model='title'>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="" style="color:dimgray">Select Resources</label>
                                                    <select class="form-select" wire:model="resource_id">
                                                        <option selected>Select Resources</option>
                                                        @foreach ($resources as $resource)
                                                            <option value="{{ $resource->id }}">{{ $resource->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('resource_id')
                                                        <span class="error text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="" style="color:dimgray">Description</label>
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
                                            <button wire:click.prevent="addFile()" class="btn btn-success">
                                                <span class="fas fa-save"></span> Submit
                                            </button>
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
                                <th>Title</th>
                                <th>Date</th>
                                <th>Link</th>
                                <th>Hashtag</th>
                                <th>Resource</th>
                                @if (auth()->check() && auth()->user()->admin == true)
                                    <th>Edit/Delete</th>
                                @endif
                            </tr>
                            @forelse ($files as $file)
                                <tr>

                                    <td>{{ $file->title }}</td>
                                    <td>{{ $file->date }}</td>
                                    <td><a href="{{ $file->link }}">Link</a>
                                    </td>
                                    <td>{{ $file->hashtag }}</td>
                                    <td>{{ $file->resource->title }}</td>
                                    <td> <button type="button" class="btn bg-success" data-toggle="modal"
                                            data-target="#updateModal" wire:click="editFile({{ $file->id }})">
                                            Edit
                                        </button>
                                        <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1"
                                            role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header"
                                                        style="background-color: #234495; color:white;">
                                                        <h5 class="modal-title" id="updateModalLabel">Updating Files
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <form>
                                                            @csrf
                                                            <div class="container mx-auto">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for=""
                                                                            style="color:dimgray">Title</label>
                                                                        <input type="text" class="form-control"
                                                                            wire:model='title'>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for=""
                                                                            style="color:dimgray">Select
                                                                            Resources</label>
                                                                        <select class="form-select"
                                                                            wire:model="resource_id">
                                                                            <option selected>Select Resources</option>
                                                                            @foreach ($resources as $resource)
                                                                                <option value="{{ $resource->id }}">
                                                                                    {{ $resource->title }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('resource_id')
                                                                            <span
                                                                                class="error text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for=""
                                                                            style="color:dimgray">Description</label>
                                                                        <input type="text" class="form-control"
                                                                            wire:model='description' required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for=""
                                                                            style="color:dimgray">Date</label>
                                                                        <input type="date" class="form-control"
                                                                            wire:model='date' required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for=""
                                                                            style="color:dimgray">Document
                                                                            Link:</label>
                                                                        <input type="text" class="form-control"
                                                                            wire:model="link">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for=""
                                                                            style="color:dimgray">Hashtag</label>
                                                                        <input type="text" class="form-control"
                                                                            wire:model="hashtag" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button wire:click.prevent="updateFile()"
                                                                    class="btn btn-success">
                                                                    <span class="fas fa-save"></span> Submit
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn bg-danger" data-toggle="modal"
                                            data-target="#deleteModal" wire:click="deleteFile({{ $file->id }})">
                                            Delete
                                        </button>
                                        <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1"
                                            role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title" id="deleteModalLabel">Are you sure to
                                                            delete this?
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <form>
                                                            @csrf

                                                            <div class="modal-footer">
                                                                <button wire:click.prevent="destroyFile()"
                                                                    class="btn btn-danger">
                                                                    <span class="fas fa-save"></span> Delete
                                                                </button>
                                                            </div>
                                                        </form>
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

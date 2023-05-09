<div>
    @if ($message = Session::get('message'))
        <div class="alert alert-success alert-dismissible fade show mt-2 col-md-8 mx-auto" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($message = Session::get('delete_message'))
        <div class="alert alert-danger alert-dismissible fade show mt-2 col-md-8 mx-auto" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                    <input type="search" wire:model="search" class="form-control input mb-3 mt-3" style="width: 400px;"
                        placeholder="Search">
                </div>

                <div class="col-md-12">
                    <div class="form-group text-center d-flex justify-content-center" style="margin-top:10px;">
                        <Label class="text-secondary" style="font-weight: 500;">Year &nbsp;</Label>
                        <input type="number" style="width: 200px; margin-top: -10px;" class="form-control"
                            wire:model="year" id="year" min="1900" max="{{ date('Y') }}" step="1"
                            value="{{ date('Y') }}">
                    </div>
                    <div class="form-group">
                        <select class="form-control" style="width: 230px;" wire:model="byResource">
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

                </div>
                <div class="card">
                    <div class="card-header text-center"><span class="fas fa-envelope"></span> FILES</div>
                    <button type="button" class="btn" style="background-color: #343a40; color:white;"
                        data-toggle="modal" data-target="#exampleModal">
                        <span class="fas fa-plus-circle"></span> Add
                    </button>
                    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header text-dark">
                                    <h5 class="modal-title" id="exampleModalLabel">Adding Resources</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-start">
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
                                                    <select class="form-control" style="width: 200px;"
                                                        wire:model="resource_id">
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
                                                    <textarea type="text" class="form-control" rows="5" wire:model='description' required></textarea>
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
                        <table class="table text-center table-bordered elevation-3">
                            <tr>
                                <th>Title</th>
                                <th scope="col" class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">Date
                                </th>
                                <th>Link</th>
                                <th scope="col" class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">
                                    Hashtag</th>
                                <th scope="col" class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">
                                    Resource</th>
                                @if (auth()->check() && auth()->user()->admin == true)
                                    <th>Edit/Delete</th>
                                @endif
                            </tr>
                            @forelse ($files as $file)
                                <tr>

                                    <td class="text-wrap">{{ $file->title }}</td>
                                    <td scope="col" class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">
                                        {{ $file->date }}</td>
                                    <td><a href="{{ $file->link }}">Link</a>
                                    </td>
                                    <td scope="col" class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">
                                        {{ $file->hashtag }}</td>
                                    <td scope="col" class="d-none d-md-table-cell d-lg-table-cell d-xl-table-cell">
                                        {{ $file->resource->title }}</td>
                                    <td> <button type="button" class="btn fas m-1" data-toggle="modal"
                                            data-target="#updateModal" wire:click="editFile({{ $file->id }})">
                                            <span class="fas fa-edit text-warning"></span>
                                        </button>
                                        <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1"
                                            role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header text-dark">
                                                        <h5 class="modal-title" id="updateModalLabel">Updating Files
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align: start;">
                                                        <form>
                                                            @csrf
                                                            <div class="container">
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
                                                                        <select class="form-control"
                                                                            style="width: 200px;"
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
                                                                        <textarea type="text" class="form-control" rows="5" wire:model='description' required></textarea>
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
                                                                    <span class="fas fa-save"></span> Save Changes
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn" data-toggle="modal"
                                            data-target="#deleteModal" wire:click="deleteFile({{ $file->id }})">
                                            <span class="fas fa-trash-alt text-danger"></span>
                                        </button>
                                        <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1"
                                            role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-danger" id="exampleModalLabel">
                                                            Delete
                                                            Confirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-dark">Are you sure you want to delete this
                                                            file?</p>
                                                    </div>
                                                    <div class="text-center">
                                                        <form>
                                                            @csrf

                                                            <div class="modal-footer">
                                                                <button wire:click.prevent="destroyFile()"
                                                                    class="btn btn-danger">
                                                                    Confirm </button>
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
<script>
    setTimeout(function() {
        $(' .alert-dismissible').fadeOut('slow');
    }, 1000);
</script>

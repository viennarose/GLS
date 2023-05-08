<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                    <input type="search" wire:model="search" class="form-control input mb-3 mt-3" style="width: 400px;"
                        placeholder="Search">
                </div>
                <div class="card">
                    <div class="card-header text-center"><span class="fas fa-chart-bar"></span> RESOURCES</div>

                    <button type="button" class="btn" style="background-color: #343a40; color:white;"
                        data-toggle="modal" data-target="#exampleModal">
                        <span class="fas fa-plus-circle"></span> Add
                    </button>
                    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header text-dark">
                                    <h5 class="modal-title" id="exampleModalLabel">Adding Resources</h5>
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
                                                    <label for="title" style="color:dimgray">Title</label>
                                                    <input type="text" class="form-control" wire:model='title'
                                                        required>
                                                    @error('title')
                                                        <span class="error text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button wire:click.prevent="addResources()" class="btn btn-success">
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

                        <table class="table text-center table-bordered elevation-3">
                            <tr>
                                <th>Title</th>
                                @if (auth()->check() && auth()->user()->admin == true)
                                    <th>Edit/Delete</th>
                                @endif
                            </tr>
                            @forelse ($resources as $resource)
                                <tr>
                                    <td>{{ $resource->title }}</td>

                                    <td>
                                        <button type="button" class="btn m-1" data-toggle="modal"
                                            data-target="#updateModal" wire:click="editResources({{ $resource->id }})">
                                            <span class="fas fa-edit text-warning"></span>
                                        </button>
                                        <div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1"
                                            role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header text-dark">
                                                        <h5 class="modal-title" id="updateModalLabel">Updating Resources
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            @csrf
                                                            <div class="container">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="title"
                                                                            style="color:dimgray">Title</label>
                                                                        <input type="text" class="form-control"
                                                                            wire:model='title' required>
                                                                        @error('title')
                                                                            <span
                                                                                class="error text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button wire:click.prevent="updateResources()"
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
                                            data-target="#deleteModal"
                                            wire:click="deleteResources({{ $resource->id }})">
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
                                                            resource?</p>
                                                    </div>
                                                    <div class="text-center">
                                                        <form>
                                                            @csrf

                                                            <div class="modal-footer">
                                                                <button wire:click.prevent="destroyResources()"
                                                                    class="btn btn-danger">
                                                                    Confirm
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    <div wire:ignore.self class="modal fade" id="updateResources" tabindex="-1"
                                        role="dialog" aria-labelledby="updateResourcesLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header"
                                                    style="background-color: #234495; color:white;">
                                                    <h5 class="modal-title" id="updateResourcesLabel">Adding RESOURCES
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
                                                                    <label for="title"
                                                                        style="color:dimgray">Title</label>
                                                                    <input type="text" class="form-control"
                                                                        wire:model='title' required>
                                                                    @error('title')
                                                                        <span
                                                                            class="error text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button wire:click.prevent="updateResources()"
                                                                class="btn btn-success">
                                                                <span class="fas fa-save"></span> Submit
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No resources found.</td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                    <div class="d-flex justify-content-center flex-wrap mt-2">
                        {{ $resources->onEachSide(-1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

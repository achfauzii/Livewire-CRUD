<div class="col-sm-10">
    {{-- Stop trying to control. --}}

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduser">
        Add User
    </button>
    <div class="card">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            <div wire:poll.6000ms class="text-center">
                @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($user as $data)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td>
                            <button wire:click='UserById({{ $data->id }})' class="btn btn-sm btn-warning"
                                data-toggle="modal" data-target="#edituser">Edit</button>
                            <button wire:click='UserById({{ $data->id }})' class="btn btn-sm btn-danger"
                                data-toggle="modal" data-target="#deleteuser">Delete</button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="adduser" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Nama</label>
                            <input name="name" type="name" wire:model="name" class="form-control">
                            @error('name')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" wire:model="email" class="form-control">
                            @error('email')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input name="paswword" type="password" wire:model="password" class="form-control">
                            @error('password')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" wire:click="save" class="btn  btn-primary">Add User</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Edit -->
    <div wire:ignore.self class="modal fade" id="edituser" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="form-group">
                            <label>Nama</label>
                            <input name="name" type="name" wire:model="name" class="form-control">
                            @error('name')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" wire:model="email" class="form-control">
                            @error('email')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input name="paswword" type="password" wire:model="password" class="form-control">
                            @error('password')
                            <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="resetInput" class="btn btn-secondary"
                        data-dismiss="modal">Close</button>
                    <button type="submit" wire:click="SaveUpdate" class="btn  btn-primary">Save
                        Changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Delete -->
    <div wire:ignore.self class="modal fade" id="deleteuser" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete ({{ $name }})</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin ingin Menghapus?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" wire:click='DeleteUser'>Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.livewire.on('adduser', () => {
            $('#adduser').modal('hide');
        });

        window.livewire.on('edituser', () => {
            $('#edituser').modal('hide');
        });

        window.livewire.on('deleteuser', () => {
            $('#deleteuser').modal('hide');
        });
    </script>
</div>
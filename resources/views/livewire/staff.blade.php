<div class>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    Input Data Staff
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="submit">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="name" wire:model="name" class="form-control" >
                            @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input  wire:model="email" class="form-control" >
                            @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label>No Telpon</label>
                            <input type="no_telp" wire:model="no_telp" class="form-control" >
                            @error('no_telp') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <div wire:poll.3000ms>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
    
</div>

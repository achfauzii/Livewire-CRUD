<div style="text-align: center">
    <button wire:click="tampilpesan" class="btn btn-primary mt-2">Click</button>
    <h1>{{ $pesan }}</h1>
    <button wire:click="hidepesan" class="btn btn-primary mt-2">Hide</button>
    <div class="mt-5">
        <button wire:click="increment" class="btn btn-primary ">+</button>
        <h1>{{ $count }}</h1>
        <button wire:click="decrement" class="btn btn-primary ">+</button>
    </div>

</div>
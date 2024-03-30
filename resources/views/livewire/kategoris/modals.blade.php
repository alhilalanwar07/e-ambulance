<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Kategori</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="nama">Nama Kategori</label>
                        <input wire:model="nama" type="text" class="form-control" id="nama" placeholder="Nama">@error('nama') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="warna">Kode Warna</label>
                        <input wire:model="warna" type="text" class="form-control" id="warna" placeholder="ex. #99ccff">@error('warna') <span class="error text-danger">{{ $message }}</span> @enderror
                        <small class="text-muted text-small">Gunakan kode warna <a href="https://www.w3schools.com/colors/colors_picker.asp" target="_blank">disini</a></small>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea wire:model="keterangan" class="form-control" id="keterangan" rows="3"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Kategori</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="nama">Nama Kategori</label>
                        <input wire:model="nama" type="text" class="form-control" id="nama" placeholder="Nama">@error('nama') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="warna">Kode Warna</label>
                        <input wire:model="warna" type="text" class="form-control" id="warna" placeholder="ex. #99ccff">@error('warna') <span class="error text-danger">{{ $message }}</span> @enderror
                        <small class="text-muted text-small">Gunakan kode warna <a href="https://www.w3schools.com/colors/colors_picker.asp" target="_blank">disini</a></small>
                    </div>
                    {{-- keterangan --}}
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea wire:model="keterangan" class="form-control" id="keterangan" rows="3"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Save</button>
            </div>
       </div>
    </div>
</div>

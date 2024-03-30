<!-- Add Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Rumah Sakit</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="nama">Nama Rumah Sakit</label>
                        <input wire:model="nama" type="text" class="form-control" id="nama" placeholder="Nama">@error('nama') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Rumah Sakit</label>
                        <input wire:model="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat">@error('alamat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telp Rumah Sakit</label>
                        <input wire:model="no_telp" type="text" class="form-control" id="no_telp" placeholder="No Telp">@error('no_telp') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="province_id">Provinsi</label>
                        <select wire:model="selectedProvince" class="form-control">
                            <option value="">Pilih Provinsi</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                        @error('province_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="regency_id">Kota</label>
                        <select wire:model="regency_id" class="form-control">
                            <option value="">Pilih Kota</option>
                            @foreach ($regencies as $regency)
                                <option value="{{ $regency['id'] }}">{{ $regency['name'] }}</option>
                            @endforeach
                        </select>
                        @error('regency_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input wire:model="longitude" type="text" class="form-control" id="longitude" placeholder="Longitude">@error('longitude') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input wire:model="latitude" type="text" class="form-control" id="latitude" placeholder="Latitude">@error('latitude') <span class="error text-danger">{{ $message }}</span> @enderror
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

{{-- CREATE MODAL --}}



<!-- Edit Modal -->
<div wire:ignore.self class="modal fade" id="updateDataModal" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Rumah Sakit</h5>
                <button wire:click.prevent="cancel()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="nama"></label>
                        <input wire:model="nama" type="text" class="form-control" id="nama" placeholder="Nama">@error('nama') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat"></label>
                        <input wire:model="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat">@error('alamat') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_telp"></label>
                        <input wire:model="no_telp" type="text" class="form-control" id="no_telp" placeholder="No Telp">@error('no_telp') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="longitude"></label>
                        <input wire:model="longitude" type="text" class="form-control" id="longitude" placeholder="Longitude">@error('longitude') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="latitude"></label>
                        <input wire:model="latitude" type="text" class="form-control" id="latitude" placeholder="Latitude">@error('latitude') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="province_id"></label>
                        <input wire:model="province_id" type="text" class="form-control" id="province_id" placeholder="Province Id">@error('province_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="regency_id"></label>
                        <input wire:model="regency_id" type="text" class="form-control" id="regency_id" placeholder="Regency Id">@error('regency_id') <span class="error text-danger">{{ $message }}</span> @enderror
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

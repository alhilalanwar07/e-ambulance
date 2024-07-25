@section('title', __('Data Pesanan'))
{{-- <div class="container-fluid"> --}}
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fas fa-receipt"></i>
							Data Pesanan </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Search...">
						</div>
						{{-- <div class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#createDataModal">
						<i class="fa fa-plus"></i>  Tambah Data
						</div> --}}
					</div>
				</div>

				<div class="card-body">
						@include('livewire.pesanans.modals')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr class="text-center">
								<td>#</td>
								<th>Pemesan </th>
								<th colspan="2">Dari/Ke/Supir </th>
								<th>Kategori</th>
								<th>Nama Pasien</th>
								<th>No Telp</th>
                                <th>Keterangan</th>
                                <th>Status</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@forelse($pesanans as $row)
							<tr class="align-middle">
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->pelanggans }}</td>
								<td>Dari <br> Ke <br> Supir</td>
                                <td>:<a href="https://www.google.com/maps/search/?api=1&query={{ $row->longitude_jemput }},{{ $row->latitude_jemput }}" target="_blank">
                                    <i class="fas fa-map-marker-alt"></i> {{ ucwords($row->alamat_jemput) }}
                                </a> <br>
                                : {{ $row->rumahsakit->nama }} <br>
                                : {{ $row->supir->nama }}
                                </td>
								<td>
                                    <span class="badge" style="background-color: {{ $row->kategori->warna }}">{{ $row->kategori->nama }}</span>
                                </td>
								<td>{{ strtoupper($row->nama_pasien) }}</td>
								<td> <a href="tel:{{ $row->no_telp }}"><i class="fa fa-phone"></i> {{ $row->no_telp }}</a></td>
                                <td class="text-wrap">{{ $row->keterangan_pasien }}</td>
                                <td>
                                    @if($row->status == 'menunggu')
                                        <span class="badge bg-warning">Menunggu</span>
                                    @elseif($row->status == 'dikonfirmasi')
                                        <span class="badge bg-info">Dikonfirmasi</span>
                                    @elseif($row->status == 'diproses')
                                        <span class="badge bg-info">Diproses</span>
                                    @elseif($row->status == 'selesai')
                                        <span class="badge bg-success">Selesai</span>
                                    @elseif($row->status == 'dibatalkan')
                                        <span class="badge bg-danger">Dibatalkan</span>
                                    @endif
                                </td>

                                <td width="90">
                                {{-- <a data-bs-toggle="modal" data-bs-target="#updateDataModal" class="btn btn-sm btn-warning" wire:click="edit({{$row->id}})"><i class="fa fa-edit"></i> Edit </a> --}}
                                {{-- button konfirmasi, batalkan, proses, selesai --}}
                                @if($row->status == 'menunggu')
                                    <button class="btn btn-sm btn-primary mb-1" wire:click="konfirmasi({{$row->id}})"><i class="fa fa-check"></i> Konfirmasi</button>
                                    <br><button class="btn btn-sm btn-danger" wire:click="batalkan({{$row->id}})"><i class="fa fa-times"></i> Batalkan</button>
                                @elseif($row->status == 'dikonfirmasi')
                                    <button class="btn btn-sm btn-info" wire:click="proses({{$row->id}})"><i class="fa fa-check"></i> Proses</button>
                                @elseif($row->status == 'diproses')
                                    <button class="btn btn-sm btn-primary" wire:click="selesai({{$row->id}})"><i class="fa fa-check"></i> Selesai</button>
                                @elseif($row->status == 'dibatalkan')
                                <a class="btn btn-sm btn-danger" onclick="confirm('Confirm Delete Pesanan id {{$row->id}}? \nDeleted Pesanans cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$row->id}})"><i class="fa fa-trash"></i> Delete </a></li>
                                @endif

								</td>
							</tr>
							@empty
							<tr>
								<td class="text-center" colspan="100%">No data Found </td>
							</tr>

							@endforelse
						</tbody>
					</table>
					<div class="float-end">{{ $pesanans->links() }}</div>
					</div>
				</div>
			</div>
		</div>
	{{-- </div> --}}
</div>

<!-- Menghubungkan dengan view template master -->
@extends('layouts.layout')
@section('judul', 'Unit Kerja')
@section('content')
    <h3>Form Unit Kerja</h3>
    <div class="outer-wrapper">
        <div class="table-wrapper">
            <table>
                <thead>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Unit Kerja</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td contenteditable="true">{{ $user->username }}</td>
                            <td contenteditable="true">{{ $user->unit_kerja }}</td>
                            <td> <select name="kode_ik" type="text" id="kode_ik" class="d-inline form-control w-auto required">
                                @foreach($roles as $role)
                                    @if($role->name === $user->roles->first()->name)
                                        <option value="{{$role->id}}" selected="true">{{$role->name}}</option>
                                    @else
                                        <option value="{{$role->id}}" >{{$role->name}}</option>
                                    @endif
                                @endforeach
                                </select>
                            </td>

                            <td style="width: 200px;">
                                <span class="del_btn"><i role="button"
                                        class="rounded bg-danger p-3 fa-solid fa-trash fa-sm"></i></span>
                                <span class="save_btn"><i role="button"
                                        class="rounded bg-info p-3 fa-solid fa-floppy-disk fa-sm"></i></span>
                                <span class="new_btn"><i role="button"
                                        class="rounded bg-success p-3 fa-solid fa-plus fa-sm"></i></span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    @include('UnitKerja.script')
@endpush

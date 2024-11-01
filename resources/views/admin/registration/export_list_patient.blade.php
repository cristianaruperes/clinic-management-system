<table class="table card-table table-vcenter text-nowrap datatable">
    <thead>
      <tr>
        <th class="w-1">No. Patient</th>
        <th>Nama</th>
        <th>Kartu Identitas</th>
        <th>No. Kartu</th>
        <th>Nama Ayah</th>
        <th>Alamat</th>
        <th>Kelurahan</th>
        <th>Kecamatan</th>
        <th>Kota</th>
        <th>Kode Pos</th>
        <th>Perumahan</th>
        <th>No Telp Rumah</th>
        <th>No Telp Kantor</th>
        <th>No HP</th>
        <th>No Fax</th>
        <th>No WA</th>
        <th>Golongan Darah</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Status Perkawinan</th>
        <th>Agama</th>
        <th>Email</th>
        <th>Kewarganegaraan</th>
        <th>Suku Bangsa</th>
        <th>Bahasa</th>
        <th>Pekerjaan</th>
        <th>Nama Wali</th>
        <th>Hubungan dengan Pasien</th>
        <th>Alamat Wali</th>
        <th>Kelurahan</th>
        <th>Kecamatan</th>
        <th>Kota</th>
        <th>Kode Pos</th>
        <th>Perumahan</th>
        <th>No Telp Rumah (Wali)</th>
        <th>No Telp Kantor (Wali)</th>
        <th>No HP (Wali)</th>
        <th>No Fax (Wali)</th>
        <th>No WA (Wali)</th>
        <th>Jaminan</th>
        <th>Info Klinik</th>
      </tr>
    </thead>
    <tbody>
      @if ($patients->isNotEmpty())
        @foreach ($patients as $patient)
            <tr>
                <td>{{ $patient->patient_number }}</td>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->id_card }}</td>
                <td>{{ $patient->id_card_number }}</td>
                <td>{{ $patient->patient_father_name }}</td>
                <td>{{ $patient->jalan }}</td>
                <td>{{ $patient->kelurahan }}</td>
                <td>{{ $patient->kecamatan }}</td>
                <td>{{ $patient->city }}</td>
                <td>{{ $patient->postal_code }}</td>
                <td>{{ $patient->residence }}</td>
                <td>{{ $patient->home_phone_number }}</td>
                <td>{{ $patient->handphone_phone_number }}</td>
                <td>{{ $patient->office_phone_number }}</td>
                <td>{{ $patient->fax_phone_number }}</td>
                <td>{{ $patient->wa_phone_number }}</td>
                <td>{{ $patient->golongan_darah }}</td>
                <td>{{ $patient->placeOfBirth }}</td>
                <td><?php echo ($patient->dateOfBirth) ? date('d-m-Y', strtotime($patient->dateOfBirth)) : ''; ?></td>
                <td>{{ $patient->sex }}</td>
                <td>{{ $patient->marrital_status }}</td>
                <td>{{ $patient->religion }}</td>
                <td>{{ $patient->email }}</td>
                <td>{{ $patient->nationality }}</td>
                <td>{{ $patient->tribe }}</td>
                <td>{{ $patient->language }}</td>
                <td>{{ $patient->occupation }}</td>
                <td>{{ $patient->family->name }}</td>
                <td>{{ $patient->family->relation_with_patient }}</td>
                <td>{{ $patient->family->jalan }}</td>
                <td>{{ $patient->family->kelurahan }}</td>
                <td>{{ $patient->family->kecamatan }}</td>
                <td>{{ $patient->family->city }}</td>
                <td>{{ $patient->family->postal_code }}</td>
                <td>{{ $patient->family->residence }}</td>
                <td>{{ $patient->family->home_phone_number }}</td>
                <td>{{ $patient->family->handphone_phone_number }}</td>
                <td>{{ $patient->family->office_phone_number }}</td>
                <td>{{ $patient->family->fax_phone_number }}</td>
                <td>{{ $patient->family->wa_phone_number }}</td>
                <td>{{ $patient->family->assurance }}</td>
                <td>{{ $patient->clinic_info }}</td>
            </tr>
        @endforeach
      @else
        <tr>
            <td>Tidak Ada Pasien</td>
        </tr>
      @endif
    </tbody>
  </table>

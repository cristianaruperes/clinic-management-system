<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Patients;
use App\RekamMedis;
use App\Doctor;
use App\GuarantorFamily;
use App\Medicines;
use App\MedicineStock;
use App\Resep;
use App\ResepObat;
use App\ResepObatRawatInap;
use App\RekamMedisRawatInap;

class PharmacyController extends Controller
{
    public function list()
    {
        $medicines = Medicines::orderBy('nama')->paginate(10);

        return view('admin.pharmacy.list_obat', compact('medicines'));
    }

    public function showUnpaidPatient()
    {
        $rekamJalan = RekamMedis::where('status', 'belum selesai')->paginate(10);
        $rekamInap = RekamMedisRawatInap::Where('status', 'belum selesai')->paginate(10);

        return view('admin.pharmacy.list_unpaid_patient', compact('rekamJalan', 'rekamInap'));
    }

    public function add()
    {
        return view('admin.pharmacy.add_obat');
    }

    public function addStockObat()
    {
        $medicine = DB::table('medicines')->find(request()->id);
        $medicine_stock = DB::table('medicine_stock')->where('medicine_id', request()->id)->paginate(10);

        return view('admin.pharmacy.add_stock_obat', compact('medicine', 'medicine_stock'));
    }

    public function edit()
    {
        $medicine = DB::table('medicines')->find(request()->id);

        return view('admin.pharmacy.edit_obat', compact('medicine'));
    }

    public function search()
    {
        $keyword = request()->keyword;

        $medicines = Medicines::paginate(10);

        if (!empty($keyword)) {
            $medicines = Medicines::where('nama', 'LIKE', '%' . $keyword . '%')->orWhere('kode_item', 'LIKE', '%' . $keyword . '%')->paginate(10);
            $medicines->appends(['keyword' => $keyword]);
        }

        return view('admin.pharmacy.list_obat', compact('medicines'));
    }

    public function save(Request $request)
    {
        $data = [
            'kode_item' => 'OB' . mt_rand(1000000000, 9999999999),
            'jenis_produk' => $request->input('jenis_produk'),
            'nama' => $request->input('nama'),
            'harga_jual' => $request->input('harga_jual'),
            'harga_beli' => $request->input('harga_beli'),
            'satuan' => $request->input('satuan'),
            'stok_minimal' => $request->input('stok_minimal'),
            'tanggal_expired' => $request->input('tanggal_expired'),
        ];

        $validator = Validator::make($data, [
            'kode_item' => 'required|unique:medicines',
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $medicines = new Medicines($data);

        if ($medicines->save()) {
            session()->flash('alert-success', 'Obar baru ditambah');
            return redirect()->route('list.medicines');
        }
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $array = collect($request->all());
        $collect = $array->except(['_token', 'id']);
        $collect = $collect->toArray();

        if (DB::table('medicines')->where('id', $request->input('id'))->update($collect)) {
            session()->flash('alert-success', 'obat telah di update!');
            return redirect()->route('list.medicines');
        }
        return redirect()->back();
    }

    public function delete()
    {
        DB::table('medicines')->where('id', request()->id)->delete();
        session()->flash('alert-success', 'Obat telah di hapus');
        return redirect()->route('list.medicines');
    }

    public function saveStockObat(Request $request)
    {
        $data = [
            'medicine_id' => $request->input('id'),
            'jumlah' => $request->input('jumlah'),
        ];

        $validator = Validator::make($data, [
            'medicine_id' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $stok_obat = new MedicineStock($data);

        if ($stok_obat->save()) {

            $stok_sisa = $stok_obat->medicine->stok_sisa + $data['jumlah'];

            $stok_obat->medicine->update(['stok_sisa' => $stok_sisa]);

            session()->flash('alert-success', 'Jumlah obar ditambah');
            return redirect()->route('add.medicines.stock', ['id' => $stok_obat->medicine->id]);
        }
        return redirect()->back();
    }

    public function deleteStockObat()
    {
        $stok_obat = DB::table('medicine_stock')->find(request()->id);
        $obat_id = $stok_obat->medicine_id;

        $medicine = DB::table('medicines')->find($stok_obat->medicine_id);
        $stok_sisa = $medicine->stok_sisa - $stok_obat->jumlah;

        $medicine = DB::table('medicines')->where('id', $medicine->id);
        $medicine->update(['stok_sisa' => $stok_sisa]);

        $stok_obat = DB::table('medicine_stock')->where('id', $stok_obat->id);
        $stok_obat->delete();

        session()->flash('alert-success', 'Jumlah obat telah di hapus');
        return redirect()->route('add.medicines.stock', ['id' => $obat_id]);
    }

    // Start Daftar Pasien Untuk Resep
    public function listPatients()
    {
        $patients = Patients::orderBy('name')->paginate(10);

        return view('admin.pharmacy.list_patient', compact('patients'));
    }

    public function searchPatients()
    {
        $keyword = request()->keyword;

        $patients = Patients::paginate(10);

        if (!empty($keyword)) {
            $patients = Patients::where('name', 'LIKE', '%' . $keyword . '%')->orWhere('patient_number', 'LIKE', '%' . $keyword . '%')->paginate(10);
            $patients->appends(['keyword' => $keyword]);
        }

        return view('admin.pharmacy.list_patient', compact('patients'));
    }
    // End Daftar Pasien Untuk Resep

    // Start Controller Rawat Jalan
    public function listRekamMedis()
    {
        $patient =  Patients::find(request()->id);
        $records = RekamMedis::where('patient_id', $patient->id)->paginate(10);

        return view('admin.pharmacy.list_rekam_medis', compact('records', 'patient'));
    }

    public function buatResep()
    {
        $record = RekamMedis::find(request()->id);
        $medicines = Medicines::all();

        return view('admin.pharmacy.buat_resep', compact('record', 'medicines'));
    }

    public function updateResep(Request $request)
    {
        // $array = collect($request->all());
        // $collect = $array->except(['_token', 'id']);
        // $collect = $collect->toArray();

        $data = [
            'alergi' => $request->input('alergi'),
            'keterangan_alergi' => $request->input('keterangan_alergi'),
            'hamil' => $request->input('hamil'),
            'menyusui' => $request->input('menyusui'),
        ];

        $validator = Validator::make($data, [
            'alergi' => 'required',
            'hamil' => 'required',
            'menyusui' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (DB::table('resep')->where('id', $request->input('resep_id'))->update($data)) {
            session()->flash('alert-success', 'resep telah di simpan!');
            return redirect()->route('buat.pharmacy.resep', ['id' => $request->input('rekam_medis_id')])->with('success', 'resep telah disimpan!');;
        }
        return redirect()->back();
    }

    public function addMedicine(Request $request)
    {
        $medicine = Medicines::where('nama', $request->medicine_id)->first();

        if ($medicine == null) {
            return redirect()->back()->with('success', 'Mohon Lengkapi Data Resep!');;
        }

        $data = [
            'resep_id' => $request->input('resep_id'),
            'medicine_id' => $medicine->id,
            'dosis' => $request->input('dosis'),
            'jumlah' => $request->input('jumlah'),
        ];

        $validator = Validator::make($data, [
            'resep_id' => 'required',
            'medicine_id' => 'required',
            'jumlah' => 'required',
        ]);

        $data['harga'] = $data['jumlah'] * $medicine->harga_jual;

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $stok_sisa = $medicine->stok_sisa - $data['jumlah'];
        $stok_terpakai = $medicine->stok_terpakai + $data['jumlah'];

        $dataMedicine = [
            'stok_sisa' => $stok_sisa,
            'stok_terpakai' => $stok_terpakai,
        ];

        $medicine->update($dataMedicine);

        $resepObat = new ResepObat($data);

        if ($resepObat->save()) {
            session()->flash('alert-success', 'obat telah di tambah!');
            return redirect()->back()->with('success', 'resep telah ditambah!');
        }
        return redirect()->back();
    }

    public function deleteMedicine()
    {
        $resepObat = ResepObat::find(request()->id);

        $stok_sisa = $resepObat->medicine->stok_sisa + $resepObat->jumlah;
        $stok_terpakai = $resepObat->medicine->stok_terpakai - $resepObat->jumlah;

        $dataMedicine = [
            'stok_sisa' => $stok_sisa,
            'stok_terpakai' => $stok_terpakai,
        ];

        $resepObat->medicine->update($dataMedicine);
        $resepObat->delete();

        session()->flash('alert-success', 'Obat telah di hapus');
        return redirect()->back()->with('success', 'resep telah dihapus!');
    }

    public function printResep()
    {
        dd("on progress");
    }
    // End Controller Rawat Jalan

    // Start Controller Rawat Inap
    public function listRekamMedisRawatInap()
    {
        $patient =  Patients::find(request()->id);
        $records = RekamMedisRawatInap::where('patient_id', $patient->id)->paginate(10);

        return view('admin.pharmacy.rawat_inap.list_rekam_medis', compact('records', 'patient'));
    }

    public function buatResepRawatInap()
    {
        $record = RekamMedisRawatInap::find(request()->id);
        $medicines = Medicines::all();

        return view('admin.pharmacy.rawat_inap.buat_resep', compact('record', 'medicines'));
    }

    public function updateResepRawatInap(Request $request)
    {
        $data = [
            'alergi' => $request->input('alergi'),
            'keterangan_alergi' => $request->input('keterangan_alergi'),
            'hamil' => $request->input('hamil'),
            'menyusui' => $request->input('menyusui'),
        ];

        $validator = Validator::make($data, [
            'alergi' => 'required',
            'hamil' => 'required',
            'menyusui' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (DB::table('resep_rawat_inap')->where('id', $request->input('resep_id'))->update($data)) {
            session()->flash('alert-success', 'resep telah di simpan!');
            return redirect()->route('buat.pharmacy.resep.rekam_medis_rawat_inap', ['id' => $request->input('rekam_medis_id')])->with('success', 'resep telah disimpan!');;
        }
        return redirect()->back();
    }

    public function addMedicineRawatInap(Request $request)
    {
        $medicine = Medicines::where('nama', $request->medicine_id)->first();

        if ($medicine == null) {
            return redirect()->back()->with('success', 'Mohon Lengkapi Data Resep!');;
        }

        $data = [
            'resep_id' => $request->input('resep_id'),
            'medicine_id' => $medicine->id,
            'dosis' => $request->input('dosis'),
            'jumlah' => $request->input('jumlah'),
        ];

        if ($medicine->stok_sisa < $data['jumlah']) {
            return redirect()->back()->with('success', 'Mohon Maaf Stok Obat Tidak Cukup, Silahkan Tambah Stok Obat!');;
        }

        $validator = Validator::make($data, [
            'resep_id' => 'required',
            'medicine_id' => 'required',
            'jumlah' => 'required',
        ]);

        $data['harga'] = $data['jumlah'] * $medicine->harga_jual;

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $stok_sisa = $medicine->stok_sisa - $data['jumlah'];
        $stok_terpakai = $medicine->stok_terpakai + $data['jumlah'];

        $dataMedicine = [
            'stok_sisa' => $stok_sisa,
            'stok_terpakai' => $stok_terpakai,
        ];

        $medicine->update($dataMedicine);

        $resepObat = new ResepObatRawatInap($data);

        if ($resepObat->save()) {
            session()->flash('alert-success', 'obat telah di tambah!');
            return redirect()->back()->with('success', 'resep telah ditambah!');
        }
        return redirect()->back();
    }

    public function deleteMedicineRawatInap()
    {
        $resepObat = ResepObatRawatInap::find(request()->id);

        $stok_sisa = $resepObat->medicine->stok_sisa + $resepObat->jumlah;
        $stok_terpakai = $resepObat->medicine->stok_terpakai - $resepObat->jumlah;

        $dataMedicine = [
            'stok_sisa' => $stok_sisa,
            'stok_terpakai' => $stok_terpakai,
        ];

        $resepObat->medicine->update($dataMedicine);
        $resepObat->delete();

        session()->flash('alert-success', 'Obat telah di hapus');
        return redirect()->back()->with('success', 'resep telah dihapus!');
    }

    public function printResepRawatInap()
    {
        dd("on progress");
    }
    // End Controller Rawat Inap

}

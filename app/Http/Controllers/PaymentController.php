<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Patients;
use App\Doctor;
use App\Services;
use App\Payment;
use App\GuarantorFamily;
use App\RekamMedis;
use App\RekamMedisRawatInap;
use App\PaymentRawatInap;

class PaymentController extends Controller
{

    // Start Rawat Jalan
    public function show()
    {
        $record = RekamMedis::find(request()->id);
        $services = Services::all();
        $payments = Payment::where('rekam_medis_id', $record->id)->get();

        return view('admin.payment.list_payment', compact('record','services','payments'));
    }

    public function delete()
    {
        DB::table('payment')->where('id', request()->id)->delete();
        session()->flash('alert-success', 'Service is Deleted!');

        return redirect()->back()->with('success', 'Service is deleted!')->withInput();
    }

    public function print()
    {
        $record =  RekamMedis::find(request()->id);
        $services = Services::all();
        $payments = Payment::where('rekam_medis_id', $record->id)->get();

        return view('admin.payment.print_payment', compact('record','services','payments'));
    }

    public function pay()
    {
        $record =  RekamMedis::find(request()->id);

        $data = [
            'tanggal_pembayaran' => now(),
            'status' => 'selesai',
        ];

        if ($record->update($data)) {
            session()->flash('alert-success', 'Terima kasih Pembayarannya');
            return redirect()->route('list.cashier.rekam_medis_rjalan.patient', ['id' => $record->patient->id]);
        }
        return redirect()->back();
    }

    public function cancelPayment()
    {
        $record =  RekamMedis::find(request()->id);

        $data = [
            'tanggal_pembayaran' => null,
            'status' => 'belum selesai',
        ];

        if ($record->update($data)) {
            session()->flash('alert-success', 'Pembayaran di batalkan');
            return redirect()->route('list.cashier.rekam_medis_rjalan.patient', ['id' => $record->patient->id]);
        }
        return redirect()->back();
    }

    public function add(Request $request)
    {
        if ($request->input('service_name') == '') {
            return redirect()->back()->with('success' , 'Please select the Service'); 
        }

        $service = Services::where('name', $request->input('service_name'))->first();

        if ($service == null) {
            return redirect()->back()->with('success' , 'Maaf layanan ini tidak ada'); 
        }

        $data = [
            'rekam_medis_id' => $request->input('rekam_medis_id'),
            'service_id' => $service->id,
        ];

        $validator = Validator::make($data, [
            'rekam_medis_id' => 'required',
            'service_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $payment = new Payment($data);

        if ($payment->save()) {
            session()->flash('alert-success', 'New service Added!');
            return redirect()->back()->with('success' , 'New service Added!'); 
        }
        return redirect()->back();
    }
    // End Rawat Jalan

    // Start Rawat Inap
    public function showRawatInap()
    {
        $record = RekamMedisRawatInap::find(request()->id);
        $services = Services::all();
        $payments = PaymentRawatInap::where('rekam_medis_id', $record->id)->get();

        return view('admin.payment.rawat_inap.list_payment', compact('record','services','payments'));
    }

    public function deleteRawatInap()
    {
        DB::table('payment_rawat_inap')->where('id', request()->id)->delete();
        session()->flash('alert-success', 'Service is Deleted!');

        return redirect()->back()->with('success', 'Service is deleted!')->withInput();
    }

    public function printRawatInap()
    {
        $record =  RekamMedisRawatInap::find(request()->id);
        $services = Services::all();
        $payments = PaymentRawatInap::where('rekam_medis_id', $record->id)->get();

        return view('admin.payment.rawat_inap.print_payment', compact('record','services','payments'));
    }

    public function payRawatInap()
    {
        $record =  RekamMedisRawatInap::find(request()->id);

        $data = [
            'tanggal_pembayaran' => now(),
            'tanggal_keluar' => now(),
            'status' => 'selesai',
        ];

        if ($record->update($data)) {
            session()->flash('alert-success', 'Terima kasih Pembayarannya');
            return redirect()->route('list.cashier.rekam_medis_rawat_inap.patient', ['id' => $record->patient->id]);
        }
        return redirect()->back();
    }

    public function cancelPaymentRawatInap()
    {
        $record =  RekamMedisRawatInap::find(request()->id);

        $data = [
            'tanggal_pembayaran' => null,
            'tanggal_keluar' => null,
            'status' => 'belum selesai',
        ];

        if ($record->update($data)) {
            session()->flash('alert-success', 'Pembayaran di batalkan');
            return redirect()->route('list.cashier.rekam_medis_rawat_inap.patient', ['id' => $record->patient->id]);
        }
        return redirect()->back();
    }

    public function addRawatInap(Request $request)
    {
        if ($request->input('service_name') == '') {
            return redirect()->back()->with('success' , 'Please select the Service'); 
        }

        $service = Services::where('name', $request->input('service_name'))->first();

        if ($service == null) {
            return redirect()->back()->with('success' , 'Maaf layanan ini tidak ada'); 
        }

        $data = [
            'rekam_medis_id' => $request->input('rekam_medis_id'),
            'service_id' => $service->id,
        ];

        $validator = Validator::make($data, [
            'rekam_medis_id' => 'required',
            'service_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $payment = new PaymentRawatInap($data);

        if ($payment->save()) {
            session()->flash('alert-success', 'New service Added!');
            return redirect()->back()->with('success' , 'New service Added!'); 
        }
        return redirect()->back();
    }

    public function checkoutKamar()
    {
        $record =  RekamMedisRawatInap::find(request()->id);

        $data = [
            'tanggal_keluar' => now(),
        ];

        if ($record->update($data)) {
            session()->flash('alert-success', 'Checkout Berhasil');
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function cancelKamar()
    {
        $record =  RekamMedisRawatInap::find(request()->id);

        $data = [
            'tanggal_keluar' => null,
        ];

        if ($record->update($data)) {
            session()->flash('alert-success', 'Checkout Berhasil');
            return redirect()->back();
        }
        return redirect()->back();
    }
    // End Rawat Inap
}

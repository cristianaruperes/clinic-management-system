<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Patients;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'patient_number' => mt_rand(100000, 999999),
            'name' => 'cristian aruperes',
            'id_card_number' => '123456789012',
            'id_card' => 'ktp',
            'patient_father_name' => 'refland aruperes',
            'jalan' => 'jalan sudirman',
            'kelurahan' => 'tanjung priok',
            'kecamatan' => 'tomang',
            'city' => 'jakarta barat',
            'postal_code' => '956954',
            'residence' => 'Perumahan Permai',
            'home_phone_number' => '0123090',
            'handphone_phone_number' => '0896902375',
            'office_phone_number' => '01232323123',
            'fax_phone_number' => '123789',
            'wa_phone_number' => '082346205979',
            'golongan_darah' => 'O',
            'dateOfBirth' => '2020-09-16',
            'sex' => 'laki-laki',
            'marrital_status' => 'belum menikah',
            'religion' => 'kristen',
            'email' => 'cristianaruperes@gmail.com',
            'nationality' => 'Indonesia',
            'tribe' => 'Minahasa',
            'language' => 'Indonesia',
            'occupation' => 'Programmer',
            'clinic_info' => 'dokter',
        ];

        $patient = new Patients($data);
        $patient->save();

        DB::table('guarantor_and_family')->insert([
            'patient_id' => $patient->id,
            'name' => 'refland aruperes',
            'relation_with_patient' => 'anak',
            'jalan' => 'jalan sudirman',
            'kelurahan' => 'tanjung priok',
            'kecamatan' => 'tomang',
            'city' => 'jakarta barat',
            'postal_code' => '956954',
            'residence' => 'Perumahan Permai',
            'home_phone_number' => '0123090',
            'handphone_phone_number' => '0896902375',
            'office_phone_number' => '01232323123',
            'fax_phone_number' => '123789',
            'wa_phone_number' => '082346205979',
            'assurance' => 'iklan',
        ]);
    }
}

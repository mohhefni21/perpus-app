<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            ['name' => 'Ahmad Subarjo', 'phone' => '081234567890', 'address' => 'Jl. Merdeka No. 10'],
            ['name' => 'Siti Aminah', 'phone' => '081299887766', 'address' => 'Perumahan Indah Blok A'],
            ['name' => 'Budi Santoso', 'phone' => '085644332211', 'address' => 'Jl. Melati No. 5'],
            ['name' => 'Dewi Lestari', 'phone' => '087711223344', 'address' => 'Apartemen Gading Lantai 3'],
            ['name' => 'Rizky Pratama', 'phone' => '081388776655', 'address' => 'Jl. Kenanga No. 12'],
            ['name' => 'Linda Permata', 'phone' => '082155667788', 'address' => 'Komp. Hijau Lestari C5'],
            ['name' => 'Hendra Wijaya', 'phone' => '089844332211', 'address' => 'Jl. Pahlawan No. 45'],
            ['name' => 'Anisa Fitri', 'phone' => '081566778899', 'address' => 'Jl. Mawar Putih No. 8'],
            ['name' => 'Fajar Ramadhan', 'phone' => '085211223344', 'address' => 'Desa Sukamaju RT 01'],
            ['name' => 'Maya Saputri', 'phone' => '081199887766', 'address' => 'Jl. Sudirman No. 100'],
        ];

        foreach ($members as $member) {
            Member::create($member);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'isbn'   => '978-602-04-1234-1',
                'title'  => 'Mastering Laravel 11 untuk Pemula',
                'author' => 'Hefni Dev',
                'stock'  => 10,
            ],
            [
                'isbn'   => '978-623-00-1234-5',
                'title'  => 'Membangun API SIMRS dengan Lumen',
                'author' => 'Budi Setiawan',
                'stock'  => 5,
            ],
            [
                'isbn'   => '978-602-02-9988-7',
                'title'  => 'Clean Code: A Handbook of Agile Software',
                'author' => 'Robert C. Martin',
                'stock'  => 3,
            ],
            [
                'isbn'   => '978-602-04-7766-1',
                'title'  => 'React & Next.js: Modern Frontend',
                'author' => 'Eko Kurniawan',
                'stock'  => 12,
            ],
            [
                'isbn'   => '978-602-05-1122-3',
                'title'  => 'Database Design & SQL Mastery',
                'author' => 'Sandi Mahardika',
                'stock'  => 8,
            ],
            [
                'isbn'   => '978-979-04-4567-8',
                'title'  => 'Manajemen Rekam Medis Elektronik',
                'author' => 'Dr. Siti Aminah',
                'stock'  => 4,
            ],
            [
                'isbn'   => '978-602-11-8899-0',
                'title'  => 'Informatika Kesehatan: Teori & Aplikasi',
                'author' => 'Prof. Wahyu',
                'stock'  => 6,
            ],
            [
                'isbn'   => '978-979-04-1122-9',
                'title'  => 'Etika Profesi Tenaga IT Medis',
                'author' => 'Drs. Bambang Hermanto',
                'stock'  => 2,
            ],
            [
                'isbn'   => '978-602-03-3344-5',
                'title'  => 'Panduan Lulus CPNS Pranata Komputer 2026',
                'author' => 'Tim Sukses CPNS',
                'stock'  => 15,
            ],
            [
                'isbn'   => '978-602-03-9900-1',
                'title'  => 'Logika Numerik & Penalaran Analitis',
                'author' => 'Arif Budiman',
                'stock'  => 20,
            ],
            [
                'isbn'   => '978-623-22-1111-0',
                'title'  => 'Strategi Menghadapi Tes SKD & SKB',
                'author' => 'Indra Wijaya',
                'stock'  => 10,
            ],
            [
                'isbn'   => '978-602-01-2233-4',
                'title'  => 'Kumpulan Soal Algoritma & Struktur Data',
                'author' => 'Rinaldi Munir',
                'stock'  => 9,
            ],
            [
                'isbn'   => '978-602-05-8877-6',
                'title'  => 'Keamanan Siber di Lingkungan Instansi',
                'author' => 'Pratama Persadha',
                'stock'  => 5,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LegalDocumentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('legal_documents')->insert([
            'title' => 'Политика обработки персональных данных',
            'file_path' => 'legal-documents/Политика обработки персональных данных.docx',
            'file_url' => config('app.url') . '/storage/legal-documents/Политика обработки персональных данных.docx',
            'description' => '',
            'is_active' => true,
        ]);

        DB::table('legal_documents')->insert([
            'title' => 'Пример пользовательского соглашения',
            'file_path' => 'legal-documents/Пример пользовательского соглашения.docx',
            'file_url' => config('app.url') . '/storage/legal-documents/Пример пользовательского соглашения.docx',
            'description' => '',
            'is_active' => true,
        ]);

        DB::table('legal_documents')->insert([
            'title' => 'Пример публичной оферты',
            'file_path' => 'legal-documents/Пример публичной оферты.docx',
            'file_url' => config('app.url') . '/storage/legal-documents/Пример публичной оферты.docx',
            'description' => '',
            'is_active' => true,
        ]);

    }
}

<?php

namespace App\Imports;

use App\Models\Guest;
use App\Models\Wedding;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuestsImport implements ToCollection, WithHeadingRow
{
    public function __construct(
        private Wedding $wedding
    ) {
    }

    public function collection(Collection $rows): void
    {
        foreach ($rows as $row) {
            $name = trim((string) ($row['nama'] ?? ''));
            $phone = $this->normalizePhone(
                trim((string) ($row['phone'] ?? ''))
            );

            if ($name === '') {
                continue;
            }

            /*
             * Duplikat berdasarkan nama + nomor HP.
             *
             * Nama sama + nomor sama  = skip
             * Nama sama + nomor beda = tetap import
             */
            $duplicate = Guest::where('wedding_id', $this->wedding->id)
                ->whereRaw('LOWER(TRIM(name)) = ?', [mb_strtolower($name)])
                ->where(function ($query) use ($phone) {
                    if ($phone === null) {
                        $query->whereNull('phone');
                    } else {
                        $query->where('phone', $phone);
                    }
                })
                ->exists();

            if ($duplicate) {
                continue;
            }

            $baseSlug = Str::slug($name);
            $slug = $baseSlug;
            $counter = 2;

            while (
                Guest::where('wedding_id', $this->wedding->id)
                    ->where('slug', $slug)
                    ->exists()
            ) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            Guest::create([
                'wedding_id' => $this->wedding->id,
                'name' => $name,
                'slug' => $slug,
                'phone' => $phone,
            ]);
        }
    }

    private function normalizePhone(string $phone): ?string
    {
        if ($phone === '') {
            return null;
        }

        $phone = preg_replace('/[^0-9+]/', '', $phone);

        if ($phone === '') {
            return null;
        }

        if (str_starts_with($phone, '+62')) {
            return '0' . substr($phone, 3);
        }

        if (str_starts_with($phone, '62')) {
            return '0' . substr($phone, 2);
        }

        if (str_starts_with($phone, '8')) {
            return '0' . $phone;
        }

        return $phone;
    }
}

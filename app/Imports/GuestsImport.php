```php
<?php

namespace App\Imports;

use App\Models\Guest;
use App\Models\Wedding;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuestsImport implements ToCollection, WithHeadingRow
{
    public function __construct(
        private Wedding $wedding
    ) {
        if (!$this->wedding->exists || !$this->wedding->getKey()) {
            throw new InvalidArgumentException(
                'Data wedding tidak valid untuk proses import.'
            );
        }
    }

    public function collection(Collection $rows): void
    {
        $weddingId = $this->wedding->getKey();

        // Ambil data tamu yang sudah ada hanya sekali.
        $existingGuests = Guest::where('wedding_id', $weddingId)
            ->get(['name', 'phone', 'slug']);

        $duplicateKeys = [];
        $usedSlugs = [];

        foreach ($existingGuests as $guest) {
            $nameKey = mb_strtolower(trim($guest->name));

            $duplicateKeys[serialize([
                $nameKey,
                $guest->phone,
            ])] = true;

            $usedSlugs[$guest->slug] = true;
        }

        $toInsert = [];

        foreach ($rows as $row) {
            $name = trim((string) ($row['nama'] ?? ''));

            if ($name === '') {
                continue;
            }

            $phone = $this->normalizePhone(
                trim((string) ($row['phone'] ?? ''))
            );

            // Cegah duplikat berdasarkan nama dan nomor HP.
            $nameKey = mb_strtolower($name);

            $duplicateKey = serialize([
                $nameKey,
                $phone,
            ]);

            if (isset($duplicateKeys[$duplicateKey])) {
                continue;
            }

            // Tandai langsung agar duplikat dalam file yang sama ikut dilewati.
            $duplicateKeys[$duplicateKey] = true;

            // Buat slug unik tanpa query berulang.
            $baseSlug = Str::slug($name);

            if ($baseSlug === '') {
                $baseSlug = 'tamu';
            }

            $slug = $baseSlug;
            $counter = 2;

            while (isset($usedSlugs[$slug])) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $usedSlugs[$slug] = true;

            $toInsert[] = [
                'wedding_id' => $weddingId,
                'name' => $name,
                'slug' => $slug,
                'phone' => $phone,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Simpan semua tamu baru sekaligus.
        if (!empty($toInsert)) {
            DB::transaction(function () use ($toInsert) {
                Guest::insert($toInsert);
            });
        }
    }

    private function normalizePhone(string $phone): ?string
    {
        if ($phone === '') {
            return null;
        }

        $phone = (string) preg_replace('/[^0-9+]/', '', $phone);

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
```
<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use App\Models\Rsvp;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class RsvpExport implements
    FromCollection,
    WithHeadings,
    WithStyles,
    WithColumnWidths,
    WithEvents,
    WithCustomStartCell
{
    public function startCell(): string
{
    return 'A8';
}
    public function __construct(
        protected ?string $search = null,
        protected ?string $status = null
    ) {
    }

    public function collection(): Collection
    {
        return Rsvp::with('guest')
            ->when($this->search, function ($query) {

                $search = $this->search;

                $query->where(function ($query) use ($search) {

                    $query->where(
                        'name',
                        'like',
                        '%' . $search . '%'
                    );

                    $query->orWhereHas('guest', function ($query) use ($search) {

                        $query->where(
                            'name',
                            'like',
                            '%' . $search . '%'
                        );

                    });

                });

            })
            ->when($this->status, function ($query) {

                $query->where(
                    'attendance',
                    $this->status
                );

            })
            ->latest()
            ->get()
            ->map(function ($rsvp, $index) {

                return [
                    'No' => $index + 1,

                    'Tamu' =>
                        $rsvp->guest?->name
                        ?? 'Tamu Umum',

                    'Nama Pengisi RSVP' =>
                        $rsvp->name,

                    'Status' =>
                        match ($rsvp->attendance) {

                            'hadir' =>
                                'HADIR',

                            'tidak_hadir' =>
                                'TIDAK HADIR',

                            'ragu' =>
                                'RAGU',

                            default =>
                                '-',
                        },

                    'Jumlah Orang' =>
                        $rsvp->guest_count,

                    'Pesan' =>
                        $rsvp->message ?? '-',

                    'Waktu RSVP' =>
                        $rsvp->created_at?->format(
                            'd/m/Y H:i'
                        ),
                ];

            });
    }


    public function headings(): array
    {
        return [
            'No',
            'Tamu',
            'Nama Pengisi RSVP',
            'Status',
            'Jumlah Orang',
            'Pesan',
            'Waktu RSVP',
        ];
    }


    public function styles(Worksheet $sheet): ?array
{
    return [

        // Judul
        1 => [
            'font' => [
                'bold' => true,
                'size' => 16,
            ],

            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ],

        // Nama pasangan
        2 => [
            'font' => [
                'bold' => true,
                'size' => 13,
            ],

            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ],

        // Tanggal
        3 => [
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ],

        // Rekap
        5 => [
            'font' => [
                'bold' => true,
            ],

            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ],

        6 => [
            'font' => [
                'bold' => true,
            ],

            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ],

        7 => [
            'font' => [
                'bold' => true,
            ],
        ],

        // Header tabel
        8 => [
            'font' => [
                'bold' => true,
            ],

            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ],

    ];
}


        public function columnWidths(): array
    {
        return [

            'A' => 8,

            'B' => 25,

            'C' => 25,

            'D' => 18,

            'E' => 18,

            'F' => 40,

            'G' => 20,

        ];
    }


    public function registerEvents(): array
{
    return [

        AfterSheet::class => function (AfterSheet $event) {

            $sheet = $event->sheet->getDelegate();

            $highestRow = $sheet->getHighestRow();

            // ==========================================
            // JUDUL LAPORAN
            // ==========================================

            $sheet->mergeCells('A1:G1');

            $sheet->setCellValue(
                'A1',
                'LAPORAN RSVP PERNIKAHAN'
            );

            $sheet->mergeCells('A2:G2');

            $sheet->setCellValue(
                'A2',
                'Widya & Iyan'
            );

            $sheet->mergeCells('A3:G3');

            $sheet->setCellValue(
                'A3',
                'Tanggal Export: ' . now()->format('d/m/Y H:i')
            );


            // ==========================================
            // REKAP
            // ==========================================

            $totalRsvp = Rsvp::query()
                ->when($this->search, function ($query) {

                    $search = $this->search;

                    $query->where(function ($query) use ($search) {

                        $query->where(
                            'name',
                            'like',
                            '%' . $search . '%'
                        );

                        $query->orWhereHas(
                            'guest',
                            function ($query) use ($search) {

                                $query->where(
                                    'name',
                                    'like',
                                    '%' . $search . '%'
                                );

                            }
                        );

                    });

                })
                ->when($this->status, function ($query) {

                    $query->where(
                        'attendance',
                        $this->status
                    );

                })
                ->get();


            $jumlahHadir = $totalRsvp
                ->where('attendance', 'hadir')
                ->count();

            $jumlahTidakHadir = $totalRsvp
                ->where('attendance', 'tidak_hadir')
                ->count();

            $jumlahRagu = $totalRsvp
                ->where('attendance', 'ragu')
                ->count();

            $totalOrangHadir = $totalRsvp
                ->where('attendance', 'hadir')
                ->sum('guest_count');


            // ==========================================
            // REKAP RSVP
            // ==========================================

            // Gabungkan kolom agar rekap lebih rapi
            $sheet->mergeCells('A5:B5');
            $sheet->mergeCells('C5:D5');
            $sheet->mergeCells('E5:F5');
            $sheet->mergeCells('G5:G5');

            $sheet->mergeCells('A6:B6');
            $sheet->mergeCells('C6:D6');
            $sheet->mergeCells('E6:F6');
            $sheet->mergeCells('G6:G6');


            // Label
            $sheet->setCellValue('A5', 'Total RSVP');
            $sheet->setCellValue('C5', 'Hadir');
            $sheet->setCellValue('E5', 'Tidak Hadir');
            $sheet->setCellValue('G5', 'Ragu');


            // Nilai
            $sheet->setCellValue(
                'A6',
                $totalRsvp->count()
            );

            $sheet->setCellValue(
                'C6',
                $jumlahHadir
            );

            $sheet->setCellValue(
                'E6',
                $jumlahTidakHadir
            );

            $sheet->setCellValue(
                'G6',
                $jumlahRagu
            );


            // Total orang akan hadir
            $sheet->mergeCells('A7:B7');
            $sheet->mergeCells('C7:D7');

            $sheet->setCellValue(
                'A7',
                'Total Orang Akan Hadir'
            );

            $sheet->setCellValue(
                'C7',
                $totalOrangHadir
            );


            // ==========================================
            // FREEZE HEADER
            // ==========================================

            $sheet->freezePane('A9');


            // ==========================================
            // FILTER TABEL
            // ==========================================

            $sheet->setAutoFilter(
                "A8:G{$highestRow}"
            );


            // ==========================================
            // ALIGNMENT
            // ==========================================

            $sheet->getStyle(
                "A1:G{$highestRow}"
            )->getAlignment()
                ->setVertical('center');

            // Alignment rekap
            $sheet->getStyle('A5:G6')
                ->getAlignment()
                ->setHorizontal('center')
                ->setVertical('center');

            $sheet->getStyle('A7:D7')
                ->getAlignment()
                ->setHorizontal('center')
                ->setVertical('center');

            // Border rekap
            $sheet->getStyle('A5:G6')
                ->getBorders()
                ->getAllBorders()
                ->setBorderStyle(
                    \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                );

            $sheet->getStyle('A7:D7')
                ->getBorders()
                ->getAllBorders()
                ->setBorderStyle(
                    \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                );
            // Wrap text pesan
            $sheet->getStyle(
                "F9:F{$highestRow}"
            )->getAlignment()
                ->setWrapText(true);


            // ==========================================
            // TINGGI BARIS
            // ==========================================

            $sheet->getRowDimension(1)
                ->setRowHeight(30);

            $sheet->getRowDimension(2)
                ->setRowHeight(25);

            $sheet->getRowDimension(3)
                ->setRowHeight(20);

            $sheet->getRowDimension(8)
                ->setRowHeight(25);


            // ==========================================
            // BORDER TABEL
            // ==========================================

            $sheet->getStyle(
                "A8:G{$highestRow}"
            )->getBorders()
                ->getAllBorders()
                ->setBorderStyle(
                    \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                );

        },

    ];
}
}
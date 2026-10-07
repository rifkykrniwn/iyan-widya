<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use RuntimeException;

class CloudinaryService
{
    public function upload(
        UploadedFile $file,
        string $folder = 'wedding/gallery'
    ): array {
        \Cloudinary::config_from_url(
            env('CLOUDINARY_URL')
        );

        $result = \Cloudinary\Uploader::upload(
            $file->getRealPath(),
            [
                'folder' => $folder,
                'resource_type' => 'image',
            ]
        );

        if (
            empty($result['secure_url']) ||
            empty($result['public_id'])
        ) {
            throw new RuntimeException(
                'Upload Cloudinary berhasil tetapi URL/public_id tidak ditemukan.'
            );
        }

        return [
            'url' => $result['secure_url'],
            'public_id' => $result['public_id'],
            'format' => $result['format'] ?? null,
        ];
    }

    public function delete(?string $publicId): void
    {
        if (!$publicId) {
            return;
        }

        \Cloudinary::config_from_url(
            env('CLOUDINARY_URL')
        );

        $result = \Cloudinary\Uploader::destroy(
            $publicId,
            [
                'resource_type' => 'image',
                'type' => 'upload',
                'invalidate' => true,
            ]
        );

        if (($result['result'] ?? null) !== 'ok') {
            throw new RuntimeException(
                'Hapus file Cloudinary gagal: ' .
                json_encode($result)
            );
        }
    }
}
<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use RuntimeException;

class ImageKitService
{
    protected string $uploadEndpoint = 'https://upload.imagekit.io/api/v1/files/upload';

    protected string $apiEndpoint = 'https://api.imagekit.io/v1/files';

    protected function request()
    {
        $privateKey = config('services.imagekit.private_key');

        if (!$privateKey) {
            throw new RuntimeException('IMAGEKIT_PRIVATE_KEY belum dikonfigurasi.');
        }

        return Http::withBasicAuth($privateKey, '')
            ->withOptions([
                'verify' => config('services.imagekit.verify_ssl', true),
            ]);
    }

    public function upload(
        UploadedFile $file,
        string $folder = '/wedding/gallery'
    ): array {
        $fileName = 'gallery-' . Str::uuid() . '.webp';

        $response = $this->request()
            ->attach(
                'file',
                file_get_contents($file->getRealPath()),
                $fileName
            )
            ->post($this->uploadEndpoint, [
                'fileName' => $fileName,
                'folder' => $folder,
                'useUniqueFileName' => 'false',
            ]);

        if ($response->failed()) {
            throw new RuntimeException(
                'Upload ImageKit gagal: ' . $response->body()
            );
        }

        return $response->json();
    }

    public function delete(?string $fileId): void
    {
        if (!$fileId) {
            return;
        }

        $response = $this->request()
            ->delete($this->apiEndpoint . '/' . $fileId);

        if ($response->failed() && $response->status() !== 404) {
            throw new RuntimeException(
                'Hapus file ImageKit gagal: ' . $response->body()
            );
        }
    }
}
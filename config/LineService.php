<?php


namespace App\Http\Services;

use App\Models\Consolelog;
use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\HttpException;

class LineService
{
    public $baseUrl;
    public $token;
    public function __construct()
    {
        $this->baseUrl = "https://notify-api.line.me/";
        $this->token = "c6KTjSU6Vmb05BNZb7Yykg4j6wQtmiF8iBJ7O2nNSr0";
    }

    public function getHeader($args = null)
    {
        return [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => "Bearer $this->token"
        ];
    }

    public function getUrl($path)
    {
        return $this->baseUrl . "" . $path;
    }

    public function sendNotify($message, $imageThumbnail = null, $imageFullsize = null, $imageFile = null, $stickerPackageId = null, $stickerId = null, $notificationDisabled = null)
    {
        $path = 'api/notify';
        $payload = [
            'message' => $message,
            'imageThumbnail' => $imageThumbnail,
            'imageFullsize' => $imageFullsize,
            'imageFile' => $imageFile,
            'stickerPackageId' => $stickerPackageId,
            'stickerId' => $stickerId,
            'notificationDisabled' => $notificationDisabled,
        ];

        $response = Http::withHeaders($this->getHeader())->asForm()->post($this->getUrl($path), $payload);
        try {
            return $this->response($response);
        } catch (Exception $e) {
            $error = new Consolelog();
            $error->user_id = Auth::user()->id;
            $error->public = "attenDance";
            $error->message = $e->getMessage();
            $error->save();
        }
    }


    protected function response(Response $response)
    {
        if ($response->successful()) {
            return $response->json();
        } else if ($response->clientError() || $response->serverError()) {
            $body = $response->body();
            $status = $response->status();
            Log::info($response->body());
            throw new HttpException($status, $body);
        }
    }
}

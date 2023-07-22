<?php
namespace App\Services;

use App\Contracts\RapidApiServiceProvider;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RapidApiService implements RapidApiServiceProvider
{
    protected $baseUrl, $apiKey, $headers, $apiHost;

    public function __construct()
    {
        $this->baseUrl = Config::get('services.rapid_api.api_url');
        $this->apiKey = Config::get('services.rapid_api.api_key');
        $this->apiHost = Config::get('services.rapid_api.api_host');
        $this->headers = ['X-RapidAPI-Key' => $this->apiKey,'X-RapidAPI-Host' => $this->apiHost, 'Content-Type' => 'application/json;charset=utf-8'];
    }

    public function getIterableFromProvider(string $uri, string $dataIndex = ''): ?iterable
    {
        $url = $this->baseUrl . $uri;
        $response = Http::withHeaders($this->headers)->get($url);
        if ($response->failed() || $response->json('name') == 'RequestError') {
            Log::channel('errors')->error(__METHOD__ . " @ {$this->getErrorMessage($response)}");
            return null;
        }

        empty($dataIndex) ? $responseData = $response->json() : $responseData = $response->json($dataIndex);
        return $responseData;
    }


    private function getErrorMessage(Response $response): string
    {
        $statusCode = $response->json('statusCode') ? $response->json('statusCode') . ' - ' : '';
        $statusText = $response->json('statusText') ? $response->json('statusText') . ' - ' : '';
        $message = $response->json('message') ?? 'Unknown Error';

        return "{$statusCode}{$statusText}{$message}";
    }
}

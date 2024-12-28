<?php

namespace MarkSitko\LaravelUnsplash;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use MarkSitko\LaravelUnsplash\API\UnsplashAPI;
use MarkSitko\LaravelUnsplash\Http\HttpClient;
use MarkSitko\LaravelUnsplash\Models\UnsplashAsset;

class Unsplash extends HttpClient
{
    use UnsplashAPI;

    /**
     * Accepted url keys from response.
     */
    const PHOTO_KEYS = [
        'raw',
        'full',
        'regular',
        'small',
        'thumb',
    ];

    /**
     * Storage disk to store photos.
     */
    protected $storage;

    /**
     * Guzzle response.
     */
    protected \GuzzleHttp\Psr7\Response $response;

    /**
     * Storage disk to store photos.
     */
    protected string $storeInDatabase;

    /**
     * Creates a new instance of Unsplash.
     */
    public function __construct()
    {
        parent::__construct();

        $this->initalizeConfiguration();

        return $this;
    }

    /**
     * Checks if the accessed property exists as a method
     * if exists, call the get() method and return the complete response.
     */
    public function __get($param)
    {
        if (method_exists($this, $param)) {
            return $this->$param()->get();
        }
    }

    /**
     * Returns the full http response.
     */
    public function get(): \GuzzleHttp\Psr7\Response
    {
        $this->buildResponse();

        return $this->response;
    }

    /**
     * Returns the http response body.
     */
    public function toJson(): mixed
    {
        $this->buildResponse();

        return json_decode($this->response->getBody()->getContents());
    }

    /**
     * Returns the http response body.
     */
    public function toArray(): array
    {
        $this->buildResponse();

        return json_decode($this->response->getBody()->getContents(), true);
    }

    /**
     * Returns the http response body as collection.
     */
    public function toCollection(): \Illuminate\Support\Collection
    {
        $this->buildResponse();

        return collect(json_decode($this->response->getBody()->getContents(), true));
    }

    /**
     * Stores the retrieving photo in the storage.
     *
     * @param string $name If no name is provided, a random 24 Charachter name will be generated
     * @param string $key  Defines the size of the retrieving photo
     * @return string|UnsplashAsset If UNSPLASH_STORE_IN_DATABASE is set to true it returns an instance of UnsplashAsset otherwise a string of the name of the stored image
     */
    public function store($name = null, $key = 'small'): string | UnsplashAsset
    {
        $response = $this->toArray();
        if (! array_key_exists('urls', $response)) {
            throw new Exception('Photo can not be stored. Certainly the "urls" key is missing or you try to store an photo while retrieving multiple photos.');
        }

        if (! in_array($key, self::PHOTO_KEYS)) {
            throw new Exception("Your provided key \"{$key}\" is an undefined accessor.");
        }

        $name = $name ?? Str::random(24);
        $image = file_get_contents($response['urls'][$key]);

        while ($this->storage->exists("{$name}.jpg")) {
            $name = Str::random(24);
        }

        $this->storage->put("{$name}.jpg", $image);

        if ($this->storeInDatabase) {
            return UnsplashAsset::create([
                'unsplash_id' => $response['id'],
                'name' => "{$name}.jpg",
                'author' => $response['user']['name'],
                'author_link' => $response['user']['links']['html'],
            ]);
        }

        return $name;
    }

    /**
     * Builds the http request.
     */
    protected function buildResponse(): self
    {
        $verb = $this->apiCall['verb'] ?? 'get';
        $this->response = $this->client->$verb("{$this->apiCall['endpoint']}?{$this->getQuery()}");

        return $this;
    }

    /**
     * Initalize storage.
     */
    private function initalizeConfiguration(): self
    {
        $this->storage = Storage::disk(config('unsplash.disk', 'local'));
        $this->storeInDatabase = config('unsplash.store_in_database', false);

        return $this;
    }
}

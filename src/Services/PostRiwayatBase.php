<?php

namespace Kanekescom\Siasn\Simpeg\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Kanekescom\Siasn\Simpeg\Exceptions\FailedPostRiwayatException;
use Kanekescom\Siasn\Simpeg\Facades\Simpeg;

class PostRiwayatBase
{
    protected $data = [];

    protected $record;

    protected $only = [];

    protected $pushMethod;

    protected $pullMethod;

    protected $response;

    protected $success = false;

    protected $message = null;

    public function __construct(array $data, Model $record)
    {
        $this->data = $data;
        $this->record = $record;
    }

    protected function transform(array $data = [])
    {
        return $data;
    }

    protected function buildQuery()
    {
        $data = collect($this->data)
            ->merge($this->transform());

        $this->record->path = array_values($this->record->path);

        return collect($this->record->toArray())
            ->merge($data)
            ->only($this->only)
            ->reject(fn ($value) => $value === null || $value === '')
            ->toArray();
    }

    public function send()
    {
        $this->response = Simpeg::{$this->pushMethod}($this->buildQuery());
        $this->success = $this->response->object()->success;
        $this->message = $this->response->object()->message;

        if ($this->success === false) {
            throw new FailedPostRiwayatException($this->message);
            Log::error($this->message);
        }

        return $this;
    }

    public function pull($nipBaru)
    {
        if ($this->success) {
            return PullRiwayatService::find($nipBaru)
                ->{$this->pullMethod}();
        }
    }
}

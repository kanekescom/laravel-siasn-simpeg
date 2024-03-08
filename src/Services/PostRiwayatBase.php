<?php

namespace Kanekescom\Siasn\Simpeg\Services;

use Illuminate\Database\Eloquent\Model;
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

        if ($this->success === false) {
            throw new FailedPostRiwayatException($this->response->object()->message);
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

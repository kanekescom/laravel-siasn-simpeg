<?php

namespace Kanekescom\Siasn\Simpeg\Services;

use Illuminate\Database\Eloquent\Model;
use Kanekescom\Siasn\Simpeg\Facades\Simpeg;

class PostRiwayatBase
{
    protected $data = [];

    protected $record;

    protected $only = [];

    protected $pushMethod;

    protected $pullMethod;

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

        return collect($this->record->toArray())
            ->merge($data)
            ->only($this->only)
            ->reject(fn ($value) => $value === null || $value === '')
            ->toArray();
    }

    public function send()
    {
        Simpeg::{$this->pushMethod}($this->buildQuery());

        return $this;
    }

    public function pull($nipBaru)
    {
        return PullRiwayatService::find($nipBaru)
            ->{$this->pullMethod}();
    }
}

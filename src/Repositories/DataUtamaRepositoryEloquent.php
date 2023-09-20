<?php

namespace Kanekescom\Siasn\Simpeg\Repositories;

use Kanekescom\Siasn\Simpeg\Models\DataUtama;
use Kanekescom\Siasn\Simpeg\Presenters\DataUtamaPresenter;
use Kanekescom\Siasn\Simpeg\Validators\DataUtamaValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class DataUtamaRepositoryEloquent extends BaseRepository implements DataUtamaRepository
{
    /**
     * @var bool
     */
    protected $skipPresenter = true;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DataUtama::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return DataUtamaValidator::class;
    }

    /**
     * Specify Presenter class name
     *
     * @return string
     */
    public function presenter()
    {
        return DataUtamaPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

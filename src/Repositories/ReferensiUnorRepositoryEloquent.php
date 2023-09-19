<?php

namespace Kanekescom\Siasn\Simpeg\Repositories;

use Kanekescom\Siasn\Simpeg\Models\ReferensiUnor;
use Kanekescom\Siasn\Simpeg\Presenters\ReferensiUnorPresenter;
use Kanekescom\Siasn\Simpeg\Repositories\ReferensiUnorRepository;
use Kanekescom\Siasn\Simpeg\Validators\ReferensiUnorValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class ReferensiUnorRepositoryEloquent extends BaseRepository implements ReferensiUnorRepository
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
        return ReferensiUnor::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return ReferensiUnorValidator::class;
    }

    /**
     * Specify Presenter class name
     *
     * @return string
     */
    public function presenter()
    {
        return ReferensiUnorPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

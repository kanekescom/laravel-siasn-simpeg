<?php

namespace Kanekescom\Siasn\Simpeg\Repositories;

use Kanekescom\Siasn\Simpeg\Models\Pegawai;
use Kanekescom\Siasn\Simpeg\Presenters\PegawaiPresenter;
use Kanekescom\Siasn\Simpeg\Validators\PegawaiValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class PegawaiRepositoryEloquent extends BaseRepository implements PegawaiRepository
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
        return Pegawai::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return PegawaiValidator::class;
    }

    /**
     * Specify Presenter class name
     *
     * @return string
     */
    public function presenter()
    {
        return PegawaiPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

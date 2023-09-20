<?php

namespace Kanekescom\Siasn\Simpeg\Repositories;

use Kanekescom\Siasn\Simpeg\Models\RiwayatJabatan;
use Kanekescom\Siasn\Simpeg\Presenters\RiwayatJabatanPresenter;
use Kanekescom\Siasn\Simpeg\Repositories\RiwayatJabatanRepository;
use Kanekescom\Siasn\Simpeg\Validators\RiwayatJabatanValidator;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class RiwayatJabatanRepositoryEloquent extends BaseRepository implements RiwayatJabatanRepository
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
        return RiwayatJabatan::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {
        return RiwayatJabatanValidator::class;
    }

    /**
     * Specify Presenter class name
     *
     * @return string
     */
    public function presenter()
    {
        return RiwayatJabatanPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

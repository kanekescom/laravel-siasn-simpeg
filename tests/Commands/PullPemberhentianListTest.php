<?php

it('can pull pns list pensiun instansi', function () {
    $tahun = config('siasn-simpeg.params_test.pull_pns_list_pensiun_instansi_tahun');

    expect($tahun)->not->toBeEmpty();

    $this->artisan("siasn-simpeg:pull-pemberhentian-pensiun-list {$tahun}")->assertSuccessful();
});

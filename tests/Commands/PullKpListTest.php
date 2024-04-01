<?php

it('can pull pns list kp instansi', function () {
    $periode = config('siasn-simpeg.params_test.pull_pns_list_kp_instansi_periode');

    expect($periode)->not->toBeEmpty();

    $this->artisan("siasn-simpeg:pull-kp-list {$periode}")
        ->assertSuccessful();
});

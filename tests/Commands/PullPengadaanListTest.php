<?php

it('can get pengadaan list pengadaan instansi', function () {
    $tahun = config('siasn-simpeg.params_test.pull_pengadaan_list_pengadaan_instansi_tahun');

    expect($tahun)->not->toBeEmpty();

    $this->artisan("siasn-simpeg:pull-pengadaan-list {$tahun}")
        ->assertSuccessful();
});

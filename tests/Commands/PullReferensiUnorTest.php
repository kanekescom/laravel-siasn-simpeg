<?php

it('can pull referensi ref unor', function () {
    $this->artisan('siasn-simpeg:pull-referensi-unor')->assertSuccessful();
});

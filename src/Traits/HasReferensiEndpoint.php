<?php

namespace Kanekescom\Siasn\Simpeg\Traits;

use Kanekescom\Siasn\Simpeg\Helpers\ReferensiResponseTransformer;

trait HasReferensiEndpoint
{
    public function getReferensiRefUnor()
    {
        $response = $this->simpeg::{__FUNCTION__}();
        $transformer = str(__FUNCTION__)->replaceFirst('get', '');
        $transformerClass = "\\Kanekescom\\Siasn\\Simpeg\\Transformers\\{$transformer}Transformer";

        return new ReferensiResponseTransformer(
            $response,
            new $transformerClass
        );
    }
}

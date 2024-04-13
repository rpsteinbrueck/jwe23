<?php
namespace rpsteinbrueck\jwe23\classes\model\row;


class vehicle extends row_abstract {
    protected string $table = "cars";

    public function get_brand(): brand {
        return new brand($this->brand_id);
    }
}
<?php

namespace App;

interface PieceInterface {
    public function getColor() : string;
}

class Piece implements PieceInterface {
    protected $color;

    public function __construct($color) {
        // 🟥🟦
        $this->color = $color;
    }

    public function getColor() : string {
        return $this->color;
    }

}


?>

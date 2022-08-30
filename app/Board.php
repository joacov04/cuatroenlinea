<?php

namespace App;

interface BoardInterface {
    public function putPiece(Piece $piece, int $column) : bool;
    public function getPiece(int $column, int $row) : ?Piece;
    public function cleanBoard() : void;

}


?>

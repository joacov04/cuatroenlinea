<?php

namespace App;

interface BoardInterface {
    public function putPiece(Piece $piece, int $column) : bool;
    public function getPiece(int $column, int $row) : ?Piece;
    public function cleanBoard() : void;
    public function getRowsCount() : int;
    public function getColumnsCount() : int;

}

class Board implements BoardInterface {
    protected $columns;
    protected int $columns_count, $rows_count;

    public function __construct(int $columns_count = 7, int $rows_count = 8) {
        if($columns_count < 4 || $rows_count < 4) {
            throw new \Exception("Rows and columns counts must be >= 4");
        }
        $this->columns_count = $columns_count;
        $this->rows_count = $rows_count;

    }

    public function getRowsCount() : int {
        return $this->rows_count;
    }

    public function getColumnsCount() :int {
        return $this->columns_count;
    }

    public function putPiece(Piece $piece, int $column) : bool {
        $column -= 1;
        if($column >= $this->getColumnsCount() || $column < 0) {
            throw new \Exception("Column out of range.");
        }

        if(count($this->columns[$column]) >= $this->getRowsCount()) {
            return false;
        }

        $this->columns[$column][] = $piece;
        return true;

    }
    
    public function getPiece(int $column, int $row) : ?Piece {
        $column -= 1;
        $row -= 1;
        $out_left = ($column < 0 || $row < 0);
        $out_right = ($column > $this->getColumnsCount() || $row > $this->getRowsCount());
        if($out_left || $out_right) {
            throw new \Exception("Index('es) out of range.");
        }
        return $this->columns[$column][$row];

    }

    public function cleanBoard() : void {
        for($x = 0; $x < $this->getColumnsCount(); $x++) {
            for($y = 0; $y < $this->getRowsCount(); $y++) {
                $this->columns[$x][$y] = "⬜";
            }
        }

    }
}


?>

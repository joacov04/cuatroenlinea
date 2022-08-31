<?php

namespace App;

include "Piece.php";

interface BoardInterface {
    public function putPiece(int $column, Piece $piece) : bool;
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
        $this->cleanBoard();

    }

    public function getRowsCount() : int {
        return $this->rows_count;
    }

    public function getColumnsCount() :int {
        return $this->columns_count;
    }

    public function putPiece(int $column, Piece $piece) : bool {
        $column -= 1;
        // print_r($this->columns);
        if($column >= $this->getColumnsCount() || $column < 0) {
            throw new \Exception("Column out of range.");
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

    public function showBoard() {
        print("\n\n");
        for($y = 0; $y < $this->getRowsCount(); $y++){
            for($x = 0;$x < $this->getColumnsCount(); $x++){

                if($this->columns[$x][$y] == "⬜") {
                    print($this->columns[$x][$y]);
                } else {
                    print($this->columns[$x][$y]->getColor());
                }

            }
            print("\n");
        }
        print("\n\n");
    }

}
$board = new Board;
$blue = new Piece("🟦");
$red = new Piece("🟥");
print($board->putPiece(1,$red));
print($board->putPiece(3,$blue));
print($board->putPiece(2,$blue));
print($board->putPiece(1,$blue));
print($board->putPiece(2,$blue));
print($board->putPiece(6,$red));
print($board->putPiece(9,$blue));
print($board->putPiece(4,$red));
print($board->putPiece(7,$blue));
print($board->putPiece(3,$red));
print($board->putPiece(1,$red));
print($board->putPiece(3,$red));
$board->showBoard();
?>

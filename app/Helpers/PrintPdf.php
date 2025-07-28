<?php

namespace App\Helpers;

use Dompdf\Dompdf;
use PDO;

class PrintPdf
{
    public $dompdf;
    public $size;
    public $type;
    public $name;

    public function __construct()
    {
        $this->dompdf = new Dompdf();
    }
    // instantiate and use the dompdf class
    public function loadHtml($direct, $data)
    {
        $html = view($direct, $data);
        $this->dompdf->loadHtml($html);
        $this->setPaper($this->size, $this->type);
        $this->dompdf->render();
        $this->dompdf->stream($this->name, [
            'Attachment' => 0
        ]);
    }
    public function setPaper($size, $type)
    {
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper($size, $type);
    }
}

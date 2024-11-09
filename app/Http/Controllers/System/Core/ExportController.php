<?php

namespace App\Http\Controllers\System\Core;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Style_Alignment;
use PHPExcel_Style_Border;
use PHPExcel_Style_NumberFormat;
use PHPExcel_Worksheet_Drawing;

class ExportController extends Controller{
    protected $letters = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "w", "X", "Y", "Z", "AA", "AB", "AC", "AD", "AE", "AF", "AG", "AH", "AI", "AJ", "AK", "AL", "AM", "AN", "AO", "AP", "AQ", "AR", "AS", "AT", "AU", "AV");
    protected $excelFile = null;
    protected $_path = 'files/exports/excel/';

    protected $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            'vertical' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        ),
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )

    );
    public function saveToTable($name, $what){
        $ext = ".xlsx";
        if($what == 'word'){
            $ext = ".docx";
        } else if($what == 'pdf'){
            $ext = ".pdf";
        }

        return json_encode(array('type' => $what, 'value' => $name.$ext));
    }

    protected function getNameFromNumber($num) {
        $numeric = ($num - 1) % 26;
        $letter = chr(65 + $numeric);
        $num2 = intval(($num - 1) / 26);
        if ($num2 > 0) {
            return $this->getNameFromNumber($num2) . $letter;
        } else {
            return $letter;
        }
    }

    /*
     *  Excel file
     */
    public function remove($string){
        // $str = "This is   a Text \n and so on \t     Text text.";
        $str = str_replace(["\r", "\t"], " ", $string);
        while (strpos($str, "  ") !== false)
        {
            $str = str_replace("  ", " ", $str);
        }
        return $str;
    }
    public function removeSpaces(Request $request): array{
        $array = ['data' => [], 'result' => [], 'header' => []];

        try{
            foreach ($request->data as $data){
                $arr = [];
                foreach ($data as &$d){
                    $arr[] = $this->remove($d);
                }
                $array['data'][] = $arr;
            }

            $array['header'] = $request->header;
            $array['result'] = $request->result;
        }catch (\Exception $e){}

        return $array;
    }

    public function boldCell($cellName){$this->excelFile->getActiveSheet()->getStyle( $cellName )->getFont()->setBold( true );}
    public function fontSize($cellName, $size){$this->excelFile->getActiveSheet()->getStyle( $cellName )->getFont()->setSize( $size );}

    /**
     * @param Request $request
     * @return false|string|void
     * @throws \PHPExcel_Exception
     */
    public function excel(Request $request){
        $this->excelFile = new PHPExcel();
        $this->excelFile->setActiveSheetIndex(0); // Aktivni sheet nulti - početni
        $this->excelFile->getDefaultStyle()->applyFromArray($this->style); // Ovdje pozicioniramo tekst u sredinu - H i V
        $data = $this->removeSpaces($request);
        $fileName = sha1(time());

        $result   = $data['result'];
        try{
            $this->excelFile->getProperties()->setCreator("Core-BD app")
                ->setLastModifiedBy("Core-BD app")
                ->setTitle("Izvještaj")
                ->setSubject("Izvještaj sa aplikacije")
                ->setDescription("Ovo je automatski kreirani izvještaj za Agencija za državnu službu Federacija BiH")
                ->setKeywords("office 2007 core-bd")
                ->setCategory("Excel fajlovi");

            /**************************************************************************************************************
             *
             *      Postavimo header row nešto malo širi od ostalih
             *
             *************************************************************************************************************/

            $this->excelFile->getActiveSheet()->getRowDimension('1')->setRowHeight(40);

            /**************************************************************************************************************
             *
             *      Ubacimo logo na vrhu stranice u fajl
             *
             *************************************************************************************************************/

            // $this->setImage(5,5, 40, 40, 'images/logo_2.png', 'A1', 'Reprezentacija.BA', 'Logo na vrhu skripte');

            $this->excelFileWriter = PHPExcel_IOFactory::createWriter($this->excelFile, 'Excel2007');

            /**************************************************************************************************************
             *
             *      Naslov fajla ; Postavimo naslov fajla; Postavimo ćeliju kojoj pripada; Boldirajmo ćeliju;
             *      Povećajmo font; Spojimo ćelije od do
             *
             *************************************************************************************************************/
            $this->excelFile->getActiveSheet()->SetCellValue('A1','www.scout.reprezentacija.ba');
            $this->boldCell('A1');
            $this->fontSize('A1', 14);
            $this->excelFile->getActiveSheet()->mergeCells('A1:'.$this->getNameFromNumber(count($data['header']) - 1).'1');

            $this->excelFile->getActiveSheet()
                ->getStyle('A1')
                ->getAlignment()
                ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $this->excelFile->getActiveSheet()->getStyle('A1')->getAlignment()->setIndent(3);

            /**************************************************************************************************************
             *
             *      Postavimo sve ćelije da su autoresize u zavisnosti od dužine riječi / rečnice - HEIGHT SAMO
             *
             *************************************************************************************************************/

            $this->excelFile->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

            for ($column = 'A'; $column != $this->getNameFromNumber(count($data['header']) + 1); $column++) {
                $this->excelFile->getActiveSheet()->getColumnDimension($column)
                    ->setAutoSize(true);
                $this->excelFile->getActiveSheet()->getStyle($column)->getAlignment()->setWrapText(true);
            }

            /**************************************************************************************************************
             *
             *      Dodajmo automatske nazive kolona u excel fajlu.
             *
             *************************************************************************************************************/
            unset($data['header'][count($data['header']) - 1]); // Obriši akcije
            $i = 0;

            for ($column = 'A'; $column != $this->getNameFromNumber(count($data['header'])+1); $column++) {
                $this->excelFile->getActiveSheet()->SetCellValue($column.(2), ' '.$data['header'][$i++]);

                $this->boldCell($column.(2));
            }

            /*
             *  Set data into excel
             */
            $columnCounter = 0;

            for($i=0; $i<count($data['data']); $i++){
                $j = 0;
                for ($column = 'A'; $column != $this->getNameFromNumber(count($data['header']) + 1); $column++) {
                    try{
                        $cellVal = $data['data'][$i][$j++];

                        $floatVal = (float)$cellVal;
                        $float    = (strval($floatVal) == $cellVal) ? true : false;

                        $textFormat ='@'; //'General','0.00','@'

                        if($float){
                            if(str_contains($cellVal, '.')) $textFormat = PHPExcel_Style_NumberFormat::FORMAT_NUMBER_00;
                            $cellvalue  = $cellVal;
                        }else {
                            $cellvalue  = ' '.$cellVal.' ';
                        }

                        $this->excelFile->getActiveSheet()
                            ->getStyle($column.($i + 3))
                            ->getNumberFormat()
                            ->setFormatCode(
                                $textFormat
                            );

                        $this->excelFile->getActiveSheet()->SetCellValue($column.($i + 3), $cellVal);
                        $columnCounter = $i;
                    }catch (\Exception $e){}
                }
            }

            /**
             *  File footer; Setup when user exported this report
             */
            $columnCounter += 5;

            $this->excelFile->getActiveSheet()->SetCellValue('A' . $columnCounter,'Datum i vrijeme: ' . Carbon::now()->format('d.m.Y H:i:s') . '.');
            $this->fontSize('A' . $columnCounter, 12);
            $this->excelFile->getActiveSheet()->mergeCells('A'.$columnCounter.':'.$this->getNameFromNumber(count($data['header'])). $columnCounter);

            $this->excelFile->getActiveSheet()
                ->getStyle('A' . $columnCounter)
                ->getAlignment()
                ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
            $this->excelFile->getActiveSheet()->getStyle('A' . $columnCounter)->getAlignment();

            /* Other excel settings */
            $this->excelFile->getActiveSheet()->getDefaultColumnDimension()->setWidth(25);
            $this->excelFile->getActiveSheet()->getDefaultRowDimension()->setRowHeight(25);

            $this->excelFileWriter->save(storage_path($this->_path . $fileName . '.xlsx'));
            return $this->saveToTable($fileName, 'excel');
        }catch (\Exception $e){ dd($e); }
    }

    public function setImage($x_of, $y_of, $width, $height, $url, $cell, $name = null, $description = null){
        $this->excelFileDrawing = new PHPExcel_Worksheet_Drawing();
        $this->excelFileDrawing->setName($name);
        $this->excelFileDrawing->setDescription($description);
        $this->excelFileDrawing->setPath($url);
        $this->excelFileDrawing->setCoordinates($cell);
        //setOffsetX works properly
        $this->excelFileDrawing->setOffsetX($x_of);
        $this->excelFileDrawing->setOffsetY($y_of);
        //set width, height
        $this->excelFileDrawing->setWidth($width);
        $this->excelFileDrawing->setHeight($height);
        $this->excelFileDrawing->setWorksheet($this->excelFile->getActiveSheet());
    }

    public function download($filename){
        return response()->download(storage_path($this->_path . $filename));
    }
}

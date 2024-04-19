<?php
namespace App\Http\Controllers;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class DataToExcel
{
    private $headerStyle = [
                           'fill' => [
                                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                                    'rotation' => 0,
                                    'startColor' => [
                                        'rgb' => 'ffffff'
                                    ],
                                    'endColor' => [
                                        'rgb' => 'ffffff'
                                    ]
                            ],
                            'font' => [
                                'name' => 'Calibri',
                                'bold' => true,
                                'italic' => false,
                                'underline' => \PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_NONE,
                                'strikethrough' => false,
                                'color' => [
                                    'rgb' => '000000'
                                ]
                            ],
                            'borders' => [
                                'bottom' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    'color' => [
                                        'rgb' => '000000'
                                    ]
                                ],
                                'top' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    'color' => [
                                        'rgb' => '000000'
                                    ]
                                ],
                                'left' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    'color' => [
                                        'rgb' => '000000'
                                    ]
                                ],
                                'right' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    'color' => [
                                        'rgb' => '000000'
                                    ]
                                ]
                            ],
                            'alignment' => [
                                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                'wrapText' => true,
                            ],
                            'quotePrefix'    => true
                        ];
    
    private $headerStyleLeft = [
                           'fill' => [
                                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                                    'rotation' => 0,
                                    'startColor' => [
                                        'rgb' => 'ffffff'
                                    ],
                                    'endColor' => [
                                        'rgb' => 'ffffff'
                                    ]
                            ],
                            'font' => [
                                'name' => 'Calibri',
                                'bold' => true,
                                'italic' => false,
                                'underline' => \PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_NONE,
                                'strikethrough' => false,
                                'color' => [
                                    'rgb' => '000000'
                                ]
                            ],
                            'borders' => [
                                'bottom' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    'color' => [
                                        'rgb' => '000000'
                                    ]
                                ],
                                'top' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    'color' => [
                                        'rgb' => '000000'
                                    ]
                                ],
                                'left' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    'color' => [
                                        'rgb' => '000000'
                                    ]
                                ],
                                'right' => [
                                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                    'color' => [
                                        'rgb' => '000000'
                                    ]
                                ]
                            ],
                            'alignment' => [
                                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                                'wrapText' => true,
                            ],
                            'quotePrefix'    => true
                        ];
        
    private $cellStyle = [
                        'fill' => [
                                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                                'rotation' => 0,
                                'startColor' => [
                                    'rgb' => 'ffffff'
                                ],
                                'endColor' => [
                                    'rgb' => 'ffffff'
                                ]
                        ],
                        'font' => [
                            'name' => 'Calibri',
                            'bold' => false,
                            'italic' => false,
                            'underline' => \PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_NONE,
                            'strikethrough' => false,
                            'color' => [
                                'rgb' => '000000'
                            ]
                        ],
                        'borders' => [
                            'bottom' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => [
                                    'rgb' => '000000'
                                ]
                            ],
                            'top' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => [
                                    'rgb' => '000000'
                                ]
                            ],
                            'left' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => [
                                    'rgb' => '000000'
                                ]
                            ],
                            'right' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => [
                                    'rgb' => '000000'
                                ]
                            ]
                        ],
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'wrapText' => true,
                        ],
                        'quotePrefix'    => true
                    ];
        
    private $cellStyleLeft = [
                        'fill' => [
                                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                                'rotation' => 0,
                                'startColor' => [
                                    'rgb' => 'ffffff'
                                ],
                                'endColor' => [
                                    'rgb' => 'ffffff'
                                ]
                        ],
                        'font' => [
                            'name' => 'Calibri',
                            'bold' => false,
                            'italic' => false,
                            'underline' => \PhpOffice\PhpSpreadsheet\Style\Font::UNDERLINE_NONE,
                            'strikethrough' => false,
                            'color' => [
                                'rgb' => '000000'
                            ]
                        ],
                        'borders' => [
                            'bottom' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => [
                                    'rgb' => '000000'
                                ]
                            ],
                            'top' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => [
                                    'rgb' => '000000'
                                ]
                            ],
                            'left' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => [
                                    'rgb' => '000000'
                                ]
                            ],
                            'right' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                                'color' => [
                                    'rgb' => '000000'
                                ]
                            ]
                        ],
                        'alignment' => [
                            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                            'wrapText' => true,
                        ],
                        'quotePrefix'    => true
                    ];
    public $objPHPExcel;
    public $excelColumns = [];
    public $excelRows = [];
    public $headerRowIndex = 1;
    static public $defaultValue = 'N/A';
    public function __construct(array $columns, array $rows, string $sheetTitle, bool $isVertical = false, int $activeSheetIndex = 0)
    {
        $this->excelColumns = $columns;
        $this->excelRows = $rows;
        $this->createNewExcel();
        if(count($this->excelColumns) > 0 && count($this->excelRows) > 0)
        {
            if($isVertical)
            {
                 $this->addNewSheetWithIndexAndTitle($activeSheetIndex,$sheetTitle)
                 ->setExcelColumnsVertical($this->excelColumns)
                 ->processDataArrayVertical([$this->excelRows]);
            }
            else
            {
                 $this->addNewSheetWithIndexAndTitle($activeSheetIndex,$sheetTitle)
                 ->setExcelColumns($this->excelColumns)
                 ->processDataArray($this->excelRows);
            }
        }
    }
    
    protected function createNewExcel() : DataToExcel
    {
        $this->objPHPExcel = new Spreadsheet();
        return $this;
    }
    
    public function getActiveSheetIndex() :int
    {
        return $this->objPHPExcel->getActiveSheetIndex();
    }
    
    public function addNewSheetWithIndexAndTitle(int $index, string $title) : DataToExcel
    {
        if($index != 0) 
        {
            $this->objPHPExcel->createSheet($index);
        }
        $this->objPHPExcel->setActiveSheetIndex($index);
        $this->objPHPExcel->getActiveSheet()->setTitle(substr($title,0,30));
        return $this;
    }
    
    public function setExcelColumns(array $columns, int $rowNumber = 1, bool $autosize = true): DataToExcel
    {
        $this->excelColumns = $columns;
        $this->headerRowIndex = $rowNumber;
        for ($index = 0; $index < count($this->excelColumns); $index++)
        {
            $columnName = isset($this->excelColumns[$index]['column']) ? $this->excelColumns[$index]['column'] : (isset($this->excelColumns[$index]) ? $this->excelColumns[$index] : NULL);
            if(isset($columnName) && !empty($columnName))
            {
                $this->objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($index+1, $this->headerRowIndex, $columnName);
                $this->objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($index+1)->setAutoSize($autosize);
                $this->setHeaderStyle($index+1, $this->headerRowIndex, $this->excelColumns[$index]);
            }
        }
        return $this;
    }
                
    public function processData(array $rows): DataToExcel
    {
        $this->excelRows = $rows;
        for ($index = 0; $index < count($this->excelRows); $index++)
        {
            if(isset($this->excelRows[$index]) && is_array($this->excelRows[$index]))
            {
                $row = $this->excelRows[$index];
                for ($x = 0; $x < count($this->excelColumns); $x++)
                {
                    $keyName = isset($this->excelColumns[$x]['key']) ? $this->excelColumns[$x]['key'] : ($this->excelColumns[$x] ? $this->excelColumns[$x] : NULL);
                    if(isset($keyName) && !empty($keyName))
                    {
                        $this->objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($x+1, $index+1+$this->headerRowIndex,(isset($keyName)?$keyName: self::$defaultValue));
                        $this->setCellStyle($x+1, $index+1+$this->headerRowIndex, $this->excelColumns[$x]);
                    }
                }
            }        
        }
        return $this;
    }
    
    /*
     * When we have cell data as Array we need to use below function.
     */
    public function processDataArray(array $rows): DataToExcel
    {
        $this->excelRows = $rows;
        $rowShowIndex = $this->headerRowIndex;
        $extraRows = 0;
        $extraRowsCount = 0;
        for ($rowIndex = 1; $rowIndex <= count($this->excelRows); $rowIndex++)
        {
            if(isset($this->excelRows[$rowIndex-1]) && is_array($this->excelRows[$rowIndex-1]))
            {
                $row = $this->excelRows[$rowIndex-1];
                $extraRowsCount = $extraRowsCount + $extraRows;
                $extraRows = 0;
                $rowShowIndex = $rowIndex + $extraRowsCount + $this->headerRowIndex;
                for ($colIndex = 1; $colIndex <= count($this->excelColumns); $colIndex++)
                {
                    $column = $this->excelColumns[$colIndex-1];
                    $keyName = isset($column['key']) ? $column['key'] : ($column ? $column : NULL);
                    if(isset($keyName) && !empty($keyName))
                    {
                        if(isset($row[$keyName]) && is_array($row[$keyName]))
                        {
                            for ($y = 0; $y < count($row[$keyName]); $y++)
                            {
                                $extraRows = count($row[$keyName]);
                                $cellValue = (isset($row[$keyName][$y])?$row[$keyName][$y]:self::$defaultValue);
                                $this->objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colIndex, $rowShowIndex+$y,$cellValue);
                                $this->setCellStyle($colIndex, $rowShowIndex+$y, $column);
                            }
                        }
                        else
                        {
                            $cellValue = (isset($row[$keyName])?$row[$keyName]:self::$defaultValue);
                            $this->objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($colIndex, $rowShowIndex,$cellValue);
                            $this->setCellStyle($colIndex, $rowShowIndex, $column);
                        }
                    }
                }
            }        
        }
        return $this;
    }
    
    public function saveExcelWithPath($filename): DataToExcel
    {
        $objWriter = new Xlsx($this->objPHPExcel);
        $objWriter->save($filename);
        return $this;
    }
    
    
    public function setExcelColumnsVertical(array $columns, int $columnNumber = 1, bool $autosize = true): DataToExcel
    {
        $this->excelColumns = $columns;
        for ($index = 0; $index < count($this->excelColumns); $index++)
        {
            $columnName = isset($this->excelColumns[$index]['column']) ? $this->excelColumns[$index]['column'] : (isset($this->excelColumns[$index]) ? $this->excelColumns[$index] : NULL);
            if(isset($columnName) && !empty($columnName))
            {
                $this->objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($columnNumber,$index+1 , $columnName);
                $this->objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($columnNumber)->setAutoSize($autosize);
                $this->setHeaderStyle($columnNumber, $index+1, $this->excelColumns[$index]);
            }
        }
        return $this;
    }
    
    public function processDataArrayVertical(array $rows): DataToExcel
    {
        $this->excelRows = $rows;
        for ($index = 0; $index < count($this->excelRows); $index++)
        {
            if(isset($this->excelRows[$index]) && is_array($this->excelRows[$index]))
            {
                $row = $this->excelRows[$index];
                for ($x = 0; $x < count($this->excelColumns); $x++)
                {
                    $keyName = isset($this->excelColumns[$x]['key']) ? $this->excelColumns[$x]['key'] : ($this->excelColumns[$x] ? $this->excelColumns[$x] : NULL);
                    if(isset($keyName) && is_array($keyName))
                    {
                        for ($keyLoop = 0; $keyLoop < count($keyName); $keyLoop++)
                        {
                            $key = $keyName[$keyLoop];
                            $this->objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($index+1+$this->headerRowIndex+$keyLoop,$x+1,(isset($row[$key])?$row[$key]:$key));
                            $this->setCellStyle($index+1+$this->headerRowIndex+$keyLoop,$x+1, $this->excelColumns[$x]);
                        }
                    }
                }
            }        
        }
        return $this;
    }
    
    private function setHeaderStyle($columnIndex,$rowIndex,$cell)
    {
        if(isset($cell['headerStyle']))
        {
            if(is_array($cell['headerStyle']))
            {
                $this->objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($columnIndex, $rowIndex)->applyFromArray($cell['headerStyle']);
            }
            else 
            {
                $headerStyle = $this->{$cell['headerStyle']};
                if(isset($headerStyle) && is_array($headerStyle))
                {
                    $this->objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($columnIndex, $rowIndex)->applyFromArray($headerStyle);
                }
            }
        }
    }
    
    public function setExcelDescriptionColumns(array $columns, int $rowNumber = 1, bool $autosize = true): DataToExcel
    {
        for ($index = 0; $index < count($columns); $index++)
        {
            $columnName = isset($columns[$index]['column']) ? $columns[$index]['column'] : (isset($columns[$index]) ? $columns[$index] : NULL);
            if(isset($columnName) && !empty($columnName))
            {
                $this->objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($index+1, $rowNumber, $columnName);
                $this->objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($index+1)->setAutoSize($autosize);
                $this->setHeaderStyle($index+1, $rowNumber, $columns[$index]);
            }
        }
        return $this;
    }
    
    private function setCellStyle($columnIndex,$rowIndex,$cell)
    {
        if(isset($cell['cellStyle']))
        {
            if(is_array($cell['cellStyle']))
            {
                $this->objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($columnIndex,$rowIndex)->applyFromArray($cell['cellStyle']);
            }
            else 
            {
                $cellStyle = $this->{$cell['cellStyle']};
                if(isset($cellStyle) && is_array($cellStyle))
                {
                    $this->objPHPExcel->getActiveSheet()->getStyleByColumnAndRow($columnIndex,$rowIndex)->applyFromArray($cellStyle);
                }
            }
        }
    }

    public function setExcelColumnsStaticWidthWithWrapText(array $columns, int $rowNumber = 1, int $width = 15): DataToExcel
    {
        $this->excelColumns = $columns;
        $this->headerRowIndex = $rowNumber;
        for ($index = 0; $index < count($this->excelColumns); $index++)
        {
            $columnName = isset($this->excelColumns[$index]['column']) ? $this->excelColumns[$index]['column'] : (isset($this->excelColumns[$index]) ? $this->excelColumns[$index] : NULL);
            if(isset($columnName) && !empty($columnName))
            {
                $this->objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($index+1, $this->headerRowIndex, $columnName);
                $this->objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($index+1)->setWidth($width);                
                $this->objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(false);
                $this->setHeaderStyle($index+1, $this->headerRowIndex, $this->excelColumns[$index]);
            }
        }
        return $this;
    }
}
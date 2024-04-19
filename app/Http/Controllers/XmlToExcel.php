<?php

namespace App\Http\Controllers;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Foundation\Validation\ValidatesRequests;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Exporter;
use App\Http\Controllers\DataToExcel;

class XmlToExcel extends BaseController
{
    static public $DataToExcel;
    static public $sheetIndex;
   // use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    static public function index(){
        return view('xmltoexcel');
    }
    static public function getdata(Request $request){
        if (filter_var($request['url'], FILTER_VALIDATE_URL) === FALSE) {
            die('Not a valid URL');
        }else{
            self::processDataWithUrl($request['url']);
        }
        exit;
    }
    
    protected static function processDataWithUrl($url)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Cookie: ASPSESSIONIDSQRBRRQB=JLDPNOLBGNCCLNPDHHAIEHKN'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        self::convertXMLResponseToExcel($response);
        /*$excel->save($yourFileNameWithPath);
        $writer->save('hello_world.xlsx');
        $spreadsheet->getActiveSheet()->fromArray($array);
        $Excel_writer = new Xls($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Customer_ExportedData.xls"');
        header('Cache-Control: max-age=0');
        ob_end_clean();
        $writer->save('php://output');
        exit();*/
    }
    
    protected static function convertXMLResponseToFile($xmlResponse) {
        $file = fopen( 'xmlrespose.xml', "w") or exit("Unable to open file!");
        // Write $somecontent to our opened file.
        if (fwrite($file, $xmlResponse) === FALSE) {
            echo "Cannot write to file ($file)";
            exit;
        }
        fclose($file);
        return 'xmlrespose.xml';
    }
    
    protected static function convertXMLResponseToArray($xmlResponse) {
        $response = str_replace('env:', 'Env', $xmlResponse);
        $xml = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        return self::filterXMLResponseArray($array);
    }
    
    protected static function convertStdResponseToArray($stdResponse) {
        $json = json_encode($stdResponse);
        $array = json_decode($json,TRUE);
        return $array;
    }
    
    protected static function convertXMLResponseToExcel($response) {
        self::$DataToExcel = new DataToExcel([], [],'');
        self::$sheetIndex = 0;
        self::$DataToExcel::$defaultValue = "";
        $array = self::convertXMLResponseToArray($response);
        $header = self::getHeaderArray($array);
        /*$json_pretty = json_encode($array, JSON_PRETTY_PRINT);
        echo '<pre>';
        print_r($json_pretty);die();*/
        $headerIndexKey = isset($header[0]) ? $header[0] : '';
        if(!empty($headerIndexKey)) {
            $data = self::getDataArray($array,$headerIndexKey);
            /*$json_pretty = json_encode($data, JSON_PRETTY_PRINT);
            echo '<pre>';
            print_r($json_pretty);die;*/
            self::getExcel($data, $header);
            $input['filename'] = date("Y-m-d H-i-s").'.xlsx';
            self::saveFile($input);
            storage_path($input['filename']);
            header('Content-Type: application/pdf');
            header("Content-Disposition: attachment; filename=\"".$input['filename']."\"");
            readfile($input['filename']);
            unlink($input['filename']);
            /*echo "<a target='_blank' href='".asset('sample_excel.xlsx')."'>click hear</a></br>";
            echo "<a href='".url()->previous()."'>Back</a>";*/
        }
    }


    protected static function getDataArray($rawData,$headerIndexKey,$finalData = []){
        
        $data = $rawData[$headerIndexKey];
        $object = [];
        foreach($data as $key=>$objectValue){
            if(is_array($objectValue)){
                $object = self::getSubdataArray($objectValue,$object);
            }else  {
                $object[$key]= $objectValue;
            }
            $finalData[] = $object;
            $object = [];
        }
        return $finalData;
    }
    
    protected static function getSubdataArray($array,$object){
        
        foreach($array as $key=>$objectValue){
            if(is_array($objectValue)){
                $object = self::getSubdataArray($objectValue, $object);
            }else  { 
                if(isset($object[$key]) && !empty($object[$key]) && is_array($object[$key])) {
                    $object[$key][]= $objectValue;
                } else if(isset($object[$key]) && !empty($object[$key]) && is_string($object[$key])) {
                    $stringValue = $object[$key];
                    unset($object[$key]);
                    $object[$key][] = $stringValue;
                    $object[$key][]= $objectValue;
                } else {
                    $object[$key]= $objectValue;
                }
            }
        }
        return $object;
    }
    
    protected static function getHeaderArray($array, $header = []){
        foreach($array as $key=>$arr){
            if(!is_numeric($key) && !in_array($key, $header) && $key != '@attributes'){
                $header[] = $key; 
            }
            if(is_array($arr)){
                $header = self::getHeaderArray($arr, $header);
            }
        }
        return $header;
    }
    
    protected static function filterXMLResponseArray($array, $startAfter = 'EnvBody'){
       foreach($array as $key=>$arr){
            if($key == $startAfter){
                return $arr;
            }
        }
        return $array;
    }
    
    /*
     * Not in USE
     */
    protected static function startHeaderArray($array, $startAfter = 'EnvBody'){
        $index = array_search($startAfter, $array);
        if(is_bool($index) == true && $index == false) {
            return $array;
        } else if(is_int($index) && isset($array) && is_array($array) && count($array) > $index+1) {
            return array_slice($array,$index+1);
        }
        return $array;
    }
    
    protected static function getExcel($responseData,$columns)
    {
        self::$DataToExcel->addNewSheetWithIndexAndTitle(self::$sheetIndex, 'Data')
                    ->setExcelColumns($columns)
                    ->processDataArray($responseData);
        self::$sheetIndex = self::$sheetIndex + 1;
    }
    
    /*
     * Not in USE
     */
    protected static function setFileNameAndPath($input): array
    {
        $time = strval(microtime(true) * 1000);//.'-'.$input['startDate'].'-'.$input['endDate']
        $companyFolderPath = \EB\Utilities\Utility::sanitizeDirectoryName(self::$classResponseData['clientModel']['id'].'-'.self::$classResponseData['clientModel']['company_name']);
        $filename = __DIR__.DS.'../../../'.getenv('REPORT_DOWNLOAD').DS. $companyFolderPath.DS. \EB\Utilities\Utility::sanitizeDocumentFileName(self::$classResponseData['clientModel']['company_name']) .'_'. $time . '.xlsx';
        if(!file_exists(__DIR__.DS.'../../../'.getenv('REPORT_DOWNLOAD').DS. $companyFolderPath))
        {
            mkdir(__DIR__.DS.'../../../'.getenv('REPORT_DOWNLOAD').DS. $companyFolderPath,0755,TRUE);
        }
        $input['root_path'] = getenv('REPORT_DOWNLOAD');
        $input['report_path'] = $companyFolderPath;
        $input['filename'] = \EB\Utilities\Utility::sanitizeDocumentFileName(self::$classResponseData['clientModel']['company_name']) .'_'. $time . '.xlsx';
        $input['filepath'] = $filename;
        return $input;
    }
    
    protected static function saveFile($input) {
//        $inputWithFileData = self::setFileNameAndPath($input);
        self::$DataToExcel->saveExcelWithPath($input['filename']);
    }
    
}

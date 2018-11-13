<style>
    @media print {
        .header,.footer{
            background-color: #89e3ec4f !important;
            -webkit-print-color-adjust: exact;
        }
        .header1{
            width: 70%;
            min-height: 130px;
        }
        .cmp_name{
            width: 80%;
        }
        .comp_address{
            width: 100% !important;
        }
        .cell_address{
            margin-top: -10px !important;
        }
        .header_right{
            width: 30%!important;
        }
        .iner_body{
            width: 100%!important;
        }
        .cus_name{
            width: 73% !important;
        }
        .cus_adds{
            width: 60%;
        }
        .cus_phn{
            width: 17%;
        }
        .chassis{
            width: 48%;
        }
        .engine{
            width: 29%;
        }
    }
</style>


<div class="row">
    <div class="col-xs-12">
        <div class="widget-body">
            <div class="widget-main">
                <?php
                $cmp_name = $this->Setting_model->get_company_info('cmp_name');
                $cmp_adds = $this->Setting_model->get_company_info('cmp_adds');
                $cmp_phn = $this->Setting_model->get_company_info('cmp_phn');
                $cmp_eml = $this->Setting_model->get_company_info('cmp_eml');

                $logo = $this->Setting_model->get_company_info('logo');
                $image = base_url().$logo;
                if(!file_exists($image) && !getimagesize($image) ){
                    $image =base_url().'libs/upload_pic/no.png';
                }
                ?>
                <div class="row">
                    <div class="header" style="width: 100%; background-color: #89e3ec4f; min-height: 130px; display: block;">
                        <div class="header1" style="width: 70%; float: left; padding: 15px 30px; ">
                            <div style="width: 100%; display: block;  margin: 0 auto; min-height: 65px; border-bottom: 3px solid #000; ">
                                <div style="width: max-content; float: left; height: auto; display: inline-block; padding: 10px  5px 0px 0px; ">
                                    <img src="<?= $image ?>" alt="" style="height: auto; width: 50px; display: block;" >
                                </div>
                                <div class="cmp_name" style="width: 80%; display: inline-block; float:left;">
                                    <h3 style="margin-top: 0px; margin-bottom: 0px; font-size: 37px; font-weight: 900; padding: 15px 0 0 0;"><?php if(isset($cmp_name) && $cmp_name){echo $cmp_name; }?></h3>
                                </div>
                            </div>
                            <div class="comp_address" style="width: 50%; display: block;  margin: 0 0; min-height: 50px; padding-top: 5px;">
                                <p style="margin-bottom: 0px; font-size: 12px;"><?php if(isset($cmp_adds) && $cmp_adds){echo $cmp_adds; }?></p>
                                <p class="cell_address" style="margin-bottom: 0px; font-size: 12px;"><?php if(isset($cmp_phn) && $cmp_phn){echo 'Cell: '.$cmp_phn; }?> <?php  if(isset($cmp_eml) && $cmp_eml){echo 'E-mail: '.$cmp_eml; }?></p>

                            </div>
                        </div>
                        <div class="header_right" style="width: 30%; float: left; padding: 15px 30px; ">
                            <div style="position: relative; width: 100%; display: block; min-height: 80px;">
                                <p style="float: right; background-color: #4eade4; padding: 5px 7px; color: #fff;">Money Receipt</p>
                            </div>
                            <div style="position: relative; width: 100%; display: block; ">
                                <p style="float: right;" >Date:
                                    <span style=" border-bottom: .12em dotted #000;">
                                        <?php
                                        $date = new DateTime($collection->date);
                                        echo date_format($date, 'd/m/Y');
                                        ?>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="iner_body" style="width: 100%; background-color: #fff; min-height: 300px;  padding: 0px 25px;">
                        <div style="width: 100%; overflow: hidden; ">
                            <span style="padding: 5px 0;">SL No. : <b style="font-weight: bolder; font-size: 16px;"><?= $collection->coll_sl; ?></b></span>
                        </div>
                        <div style="width: 100%; padding: 7px 0;">
                            <label style="margin-right: 7px; font-style: italic; font-size: 13px;">Received with thanks from: </label><span class="cus_name" style="display: inline-block; width: 83%; border-bottom: 1px dotted;"><?= ucwords($collection->cus_name)?></span>
                        </div>
                        <div style="width: 100%; padding: 7px 0;">
                            <label style="margin-right: 7px; font-style: italic; font-size: 13px;"> Address: </label><span class="cus_adds" style="display: inline-block;  border-bottom: 1px dotted; margin-right: 5px;"><?= ucwords($collection->cus_address)?></span>
                            <label style="margin-right: 7px; font-style: italic; font-size: 13px;"> contact No: </label><span  class="cus_phn" style="display: inline-block;  border-bottom: 1px dotted;"> <?= $collection->cus_contact_no; ?></span>
                        </div>
                        <div style="width: 100%; padding: 7px 0;">
                            <label style="margin-right: 7px; font-style: italic; font-size: 13px;"> Chassis No: </label><span class="chassis" style="display: inline-block;   border-bottom: 1px dotted; margin-right: 3px;"> <?= $collection->ord_chassis_no; ?></span>
                            <label style="margin-right: 7px; font-style: italic; font-size: 13px;"> Engine No: </label><span class="engine" style="display: inline-block;  border-bottom: 1px dotted;"><?= $collection->ord_engine_no; ?></span>
                        </div>
                        <div style="width: 100%; padding: 7px 0;">
                            <label style="margin-right: 10px; font-style: italic; font-size: 13px;">as <?php if($collection->collection_type ==1 ): echo 'Advance'; elseif($collection->collection_type ==2): echo 'Part'; elseif($collection->collection_type ==3): echo 'Full Payment'; elseif($collection->collection_type ==4): echo 'Cheque'; endif; ?>  Taka: </label>
                            <span style="display: inline-block; width: 70%; border-bottom: 1px dotted;"><?= number_format($collection->amount, 2)?></span>
                        </div>
                        <div style="width: 100%; padding: 7px 0;">
                            <label style="margin-right: 10px; font-style: italic; font-size: 13px;">Taka (In Words): </label><span style="display: inline-block; width: 82%; font-size: 12px; border-bottom: 1px dotted;"><?= strtoupper(convertNumberToWord($collection->amount))."Taka Only"; ?></span>
                        </div>
                        <div style="width: 100%; padding: 7px 0;">
                            <label style="margin-right: 10px; font-style: italic; font-size: 13px;">An Account of: </label><span style="display: inline-block; width: 83%; border-bottom: 1px dotted;">Maven Autos</span>
                        </div>
                        <div style="width: 100%; padding: 7px 0;">
                            <label style="margin-right: 7px; font-style: italic; font-size: 13px;"> Cheque No: </label><span style="display: inline-block; width: 50%;  border-bottom: 1px dotted; margin-right: 3px;"><?= $collection->cheque_no?></span>
                            <label style="margin-right: 7px; font-style: italic; font-size: 13px;"> Bank: </label><span style="display: inline-block; width: 30%; border-bottom: 1px dotted;"><?= ucwords($collection->bank_name)?></span>
                        </div>
                    </div>
                    <div class="footer" style="width: 100%; background-color: #b5f9ef4f; min-height: 70px; display: block;">
                        <label style="float: right; position: relative; right: 10%; bottom: 25px;">For Maven Autos</label>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
function convertNumberToWord($number=false) {
    error_reporting(E_ALL & ~E_NOTICE);
    if(!$number){
        return false;
    }

    $no = round($number);
    $point = round($number - $no, 2) * 100;
    $hundred = null;
    $digits_1 = strlen($no);
    $i = 0;
    $str = array();
    $words = array('0' => '', '1' => 'one', '2' => 'two',
        '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
        '7' => 'seven', '8' => 'eight', '9' => 'nine',
        '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
        '13' => 'thirteen', '14' => 'fourteen',
        '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
        '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
        '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
        '60' => 'sixty', '70' => 'seventy',
        '80' => 'eighty', '90' => 'ninety');
    $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
    while ($i < $digits_1) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += ($divider == 10) ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number] .
                //" " . $digits[$counter] . $plural . " " . $hundred
                " " . $digits[$counter] . " " . $hundred
                :
                $words[floor($number / 10) * 10]
                . " " . $words[$number % 10] . " "
                //. $digits[$counter] . $plural . " " . $hundred;
                . $digits[$counter] . " " . $hundred;
        } else $str[] = null;
    }
    $str = array_reverse($str);
    $result = implode('', $str);
    $points = ($point) ?
        "." . $words[$point / 10] . " " .
        $words[$point = $point % 10] : '';
    return $result;// . "Taka  " . $points . " Paise";
}
?>

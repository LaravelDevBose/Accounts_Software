<style type="text/css">
    .header{
        /*border: 1px solid;*/
        width: 100%;
        height: 150px;
        margin-top: 0px;
    }

    .img{
        height: 100px;
        width: 280px;
        margin-top: 10px;
        /*border: 1px solid;*/
    }

    /*.img{*/
    /*height: 120px;*/
    /*width: 220px;*/
    /*margin-top: 0px;*/
    /*!*border: 1px solid;*!*/
    /*}*/
    .section3{
        /*border: 1px solid;*/
        height: 150px;
    }
    .section12{
        height: 130px;
        width: 100%;
        margin-top: 5px;
        border-radius: 5px;
        background-color: #A7ECFB;
        border: 1px solid #0A829B;
    }
    .logo{
        /*border: 1px solid;*/
        height: 50px;
        width: 100%;
        font-size: 50px;
        text-align: center;
        margin-top: 5px;
    }
    .textModule{
        height: auto;
        width: 100%;
        margin-top: 15px;
        font-weight: bold;
        font-size: 17px;
        color: #000;
        text-align: center;
    }
    a{
        color:#333;
    }
</style>

<div class="row">
    <div class="col-md-12 col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
<!--        <div class="col-md-1"></div>-->
        <div class="col-md-12">

            <div class="col-md-3 section3">
                <div class="col-md-12 section12">
                    <div class="logo">
                        <i class="fa fa-usd"></i>
                    </div>
                    <div class="textModule">
                        <span><?= number_format($total_coll, 2)?></span> <br>
                        Total Collection
                    </div>
                </div>
            </div>
            <div class="col-md-3 section3">
                <div class="col-md-12 section12">

                    <div class="logo">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="textModule">
                        <span><?= number_format($total_pymt, 2)?></span> <br>
                        Total Payment
                    </div>

                </div>
            </div>
            <div class="col-md-3 section3">
                <div class="col-md-12 section12">

                    <div class="logo">
                        <i class="fa fa-hand-paper-o"></i>
                    </div>
                    <div class="textModule">
                        <span><?= number_format($hand_balance, 2)?></span> <br>
                        Cash in Hand
                    </div>

                </div>
            </div>
            <div class="col-md-3 section3">
                <div class="col-md-12 section12">

                    <div class="logo">
                        <i class="fa fa-university"></i>
                    </div>
                    <div class="textModule">
                        <span><?= number_format($bank_balance, 2)?></span> <br>
                        Bank Balance
                    </div>

                </div>
            </div>
            <div class="col-md-3 section3"></div>
            <div class="col-md-6 section3">
                <div class="col-md-12 section12">

                    <div class="logo">
                        <i class="fa fa-balance-scale"></i>
                    </div>
                    <div class="textModule">
                        <span><?= number_format($hand_balance+$bank_balance, 2)?></span> <br>
                        Total Income
                    </div>

                </div>
            </div>

        </div>


        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
    <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Insurance Bill Payment Report</h4>
                <div class="widget-toolbar">

                    <button type="button" onclick="print_data()" class="btn btn-sm btn-info pull-right"><i class="ace-icon fa fa-print"  ></i> Print</button>
                </div>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="widget-box " >
                                <div class="widget-body" style="background-color: #E7F2F8;">
                                    <div class="widget-main">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <select class="form-control chosen-select " id="search_type" style="height: 30px; border-radius: 5px;">
                                                        <option value="">Select a search type</option>
                                                        <option value="comp">In. company wise</option>
                                                        <option value="date">Date wise</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <select class="form-control chosen-select " id="comp_id" style="height: 30px; border-radius: 5px;">
                                                        <option value="">Select a Company</option>
                                                        <?php if(isset($companies) && $companies):  foreach($companies as $company):?>
                                                            <option value="<?= $company->in_comp_id; ?>"><?= ucfirst($company->in_comp_name); ?></option>
                                                        <?php endforeach; endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <input class="form-control date-picker"  id="date_from"  type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                                                </div>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <input class="form-control date-picker"  id="date_to" type="text" value="<?php echo date('Y-m-d'); ?>"  data-date-format="yyyy-mm-dd" />
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group" >
                                                    <button type="button" id="in_search" style="height: 27px; padding-top: 0px; float: left; " class="btn btn-primary ">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div id="data_table">
                        <div id="header" style="display: none;">
                            <?php $this->load->view('admin/partials/print_header');?>
                        </div>
                        <div id="table-header" class="table-header">
                            Collection Report List
                        </div>
                        <table  class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>SL.No</th>
                                    <th>Date</th>
                                    <th>MC/CRT No</th>
                                    <th>Company Name</th>
                                    <th>Customer Name</th>
                                    <th>Remarks</th>
                                    <th style="text-align: right">Gross Premium</th>
                                    <th style="text-align: right">Net Premium</th>
                                    <th style="text-align: right">Vat</th>
                                    <th style="text-align: right">30%</th>
                                    <th style="text-align: right">70%</th>
                                    <th style="text-align: right">Stamp</th>
                                    <th style="text-align: right">Bill Amount</th>
                                    <th style="text-align: right">Payment Amount</th>
                                </tr>
                            </thead>

                            <tbody id="tBody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('admin/ajax/insurance_bill_ajax');?>
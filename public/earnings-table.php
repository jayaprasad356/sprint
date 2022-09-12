<section class="content-header">
    <h1>
        Earnings /
        <small><a href="home.php"><i class="fa fa-home"></i> Home</a></small>
    </h1>
    
</section>
<section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-xs-12">
                <div class="box">
                    <!-- <div class="col-xs-6"> -->
                    
                    <div class="box-header">
                    </div>
                    <!-- /.box-header -->
                    <div  class="box-body table-responsive">
                        <table  id='products_table' class="table table-hover" data-toggle="table" data-search="true" data-url="api/get-bootstrap-table-data.php?table=earnings" data-page-list="[5, 10, 20, 50, 100, 200]" data-show-refresh="true"  data-side-pagination="server" data-pagination="true" data-query-params="queryParams_1"  data-trim-on-search="false" data-filter-control="true" data-sort-name="id" data-sort-order="desc"  data-export-types='["txt","excel"]' >
                            <thead>
                                <tr>
                                   
                                    <th  data-field="id" data-sortable="true">ID</th>
                                    <th  data-field="name" data-sortable="true">Name</th>
                                    <th  data-field="email" data-sortable="true">Email</th>
                        
                                    <th data-field="reward" data-sortable="true">Reward</th>
                                    <th data-field="steps" data-sortable="true">Steps</th>
                                    <th data-field="reward_date" data-sortable="true">Reward Date</th>
                                    
                                    
                                </tr>
                                  
                                
                            </thead>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="separator"> </div>
        </div>
        <!-- /.row (main row) -->
    </section>
    <script>

    function queryParams_1(p) {
        return {
            limit: p.limit,
            sort: p.sort,
            order: p.order,
            offset: p.offset,
            search: p.search
        };
    }
</script>
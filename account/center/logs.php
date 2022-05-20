<div class="_container-fluid">
    <ul class="pagination">
        <li  class="page-item">
            <a href="javascript:history.back()">Go back</a>
        </li>
        <!-- <li class="page-item"><a href="#">Next</a></li> -->
    </ul>
        <h2 class="page-header text-center text-dark no-border ">Your Activities .</h2>
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <style>
             .color{
                    width:30px;
                    padding-bottom:8px !important;
                }
                @media(max-width:600px){
                   #clear{
                       width:400px !important;
                   } 
                   .float-left{
                       width:10px !important;
                   }
                   .color{
                      width:30px;
                      padding-bottom:2px !important;
                   }
                }
            </style>
            <div class="table-responsive">
                <table class='table table-bordered table-striped'>
                    <thead>
                        <tr class='bg-pale-dark'>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody id='table'>
                    </tbody>
                     <tbody id='clicktable'>
                       
                    </tbody>
                    <div class="spin col-lg-5 mx-auto">
                    </div>    
                </table>
            </div> 
        </div>
    </div>
</div>


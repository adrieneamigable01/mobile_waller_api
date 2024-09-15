<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Suppliers</h1>
        <button class="btn btn-coffee float-right" data-toggle="modal" data-target="#addSuppliers"> 
            <i class="fa fa-plus"> Suppliers</i>
        </button>
    </div>

    <div class="row">
        <div class="col-12">
        <div class="table-responsive">
                <table class="table table-bordered text-center" id="suppliers-table" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Company Name</th>
                      <th>Address</th>
                      <th>Contact</th>
                      <th>Date Created</th>
                      <th>Description</th>
                      <th>-</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addSuppliers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Suppliers</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="user" id="frm-add-suppliers">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="companyName" name="companyName" aria-describedby="companyName" placeholder="Company name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="companyAddress" name="companyAddress" aria-describedby="companyAddress" placeholder="Company Address">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="companyContact" name="companyContact" aria-describedby="emailHcompanyContactelp" placeholder="Company Contact">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="description" name="description" aria-describedby="description" placeholder="Description"  cols="30" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-coffee btn-user btn-block">
                    Submit
                </button>
            </form>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="updateSuppliers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Suppliers</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="user" id="frm-update-suppliers">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="companyName" name="companyName" aria-describedby="companyName" placeholder="Company name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="companyAddress" name="companyAddress" aria-describedby="companyAddress" placeholder="Company Address">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="companyContact" name="companyContact" aria-describedby="emailHcompanyContactelp" placeholder="Company Contact">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="description" name="description" aria-describedby="description" placeholder="Description"  cols="30" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-coffee btn-user btn-block">
                    Submit
                </button>
            </form>
        </div>
      </div>
    </div>
</div>
<!-- /.container-fluid -->
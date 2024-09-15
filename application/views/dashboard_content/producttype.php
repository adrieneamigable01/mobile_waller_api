<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products Types</h1>
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addProductType"> 
            <i class="fa fa-plus"> Product Type</i>
        </button>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="product-type-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Type</th>
                            <th>Date Created</th>
                            <th>Last Date Updated</th>
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

<div class="modal fade" id="addProductType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product Type</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="user" id="frm-add-producttype">
                <div class="form-group">
                    <label for="store">Product Type</label>
                    <input type="text" class="form-control form-control-user" id="productType" name="productType" aria-describedby="store">
                </div>
                <div class="form-group">
                        <textarea class="form-control" id="description" name="description" aria-describedby="description" placeholder="Description"  cols="30" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block col-3 float-right">
                    Submit
                </button>
            </form>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="updateProductType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Product Type</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="user" id="frm-update-producttype">
                <div class="form-group">
                    <label for="store">Product Type</label>
                    <input type="text" class="form-control form-control-user" id="productType" name="productType" aria-describedby="store">
                </div>
                <div class="form-group">
                        <textarea class="form-control" id="description" name="description" aria-describedby="description" placeholder="Description"  cols="30" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block col-3 float-right">
                    Submit
                </button>
            </form>
        </div>
      </div>
    </div>
</div>
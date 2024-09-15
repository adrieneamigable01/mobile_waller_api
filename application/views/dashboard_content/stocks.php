<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Stocks</h1>
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addProduct"> 
            <i class="fa fa-plus"> Product</i>
        </button>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="stocks-table" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Store</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Code</th>
                            <th>Expiration Date</th>
                            <th>productTypeId</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="user" id="frm-add-product">
                <div class="row">
                    <div class="form-group col">
                        <label for="store">Store</label>
                        <select type="text" class="form-control store-type-menu" id="store" name="store" aria-describedby="store"></select>
                    </div>
                    <div class="form-group col">
                        <label for="product">Product</label>
                        <select type="text" class="form-control product-type-menu" id="product" name="product" aria-describedby="product"></select>
                    </div>
                    <div class="form-group col">
                        <label for="supllier">Suppoer</label>
                        <select type="text" class="form-control supplier-type-menu" id="supllier" name="supllier" aria-describedby="supllier"></select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="price">Price</label>
                        <input type="number" class="form-control form-control-user" id="price" name="price" aria-describedby="price" placeholder="Price">
                    </div>
                    <div class="form-group col">
                        <label for="discount">Discount</label>
                        <input type="number" class="form-control form-control-user" id="discount" name="discount" aria-describedby="discount" placeholder="Dicount Price">
                    </div>
                    <div class="form-group col">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control form-control-user" id="quantity" name="quantity" aria-describedby="quantity" placeholder="Enter quantity">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="label">Label</label>
                        <input type="text" class="form-control form-control-user" id="label" name="label" aria-describedby="quanlabeltity" placeholder="Enter Label ex. Sacs,galons,pcs">
                    </div>
                    <div class="form-group col">
                        <label for="barCode">BarCode</label>
                        <input type="text" class="form-control form-control-user" id="barCode" name="barCode" aria-describedby="barCode" placeholder="Enter Bar Code">
                    </div>
                    <div class="form-group col">
                        <label for="expirationDate">Expiration Date</label>
                        <input type="text" class="form-control form-control-user" id="expirationDate" name="expirationDate" aria-describedby="expirationDate" placeholder="Expiration Date">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <textarea class="form-control" id="description" name="description" aria-describedby="description" placeholder="Description"  cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-user btn-block col-3 float-right">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="updateProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="user" id="frm-update-product">
                <div class="row">
                    <div class="form-group col">
                        <label for="store">Store</label>
                        <select type="text" class="form-control store-type-menu" id="store" name="store" aria-describedby="store"></select>
                    </div>
                    <div class="form-group col">
                        <label for="product">Product</label>
                        <select type="text" class="form-control product-type-menu" id="product" name="product" aria-describedby="product"></select>
                    </div>
                    <div class="form-group col">
                        <label for="supllier">Suppoer</label>
                        <select type="text" class="form-control supplier-type-menu" id="supllier" name="supllier" aria-describedby="supllier"></select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="price">Price</label>
                        <input type="number" class="form-control form-control-user" id="price" name="price" aria-describedby="price" placeholder="Price">
                    </div>
                    <div class="form-group col">
                        <label for="discount">Discount</label>
                        <input type="number" class="form-control form-control-user" id="discount" name="discount" aria-describedby="discount" placeholder="Dicount Price">
                    </div>
                    <div class="form-group col">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control form-control-user" id="quantity" name="quantity" aria-describedby="quantity" placeholder="Enter quantity">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="label">Label</label>
                        <input type="text" class="form-control form-control-user" id="label" name="label" aria-describedby="quanlabeltity" placeholder="Enter Label ex. Sacs,galons,pcs">
                    </div>
                    <div class="form-group col">
                        <label for="barCode">BarCode</label>
                        <input type="text" class="form-control form-control-user" id="barCode" name="barCode" aria-describedby="barCode" placeholder="Enter Bar Code">
                    </div>
                    <div class="form-group col">
                        <label for="expirationDate">Expiration Date</label>
                        <input type="text" class="form-control form-control-user" id="expirationDate" name="expirationDate" aria-describedby="expirationDate" placeholder="Expiration Date">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <textarea class="form-control" id="description" name="description" aria-describedby="description" placeholder="Description"  cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-user btn-block col-3 float-right">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
<!-- /.container-fluid -->
@extends('layouts.base')
@section('body')
<div class="container">
    {{-- <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#itemModal">Add<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
    <button type="button" class="btn btn-info btn-lg" id="customerbtn">Customer<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button> --}}
    
    <div class="table-responsive">
        <table id="itable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Description</th>
                    <th>Sell price</th>
                    <th>Cost price</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody id="ibody">
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="itemModal" role="dialog" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="iform" method ="post" action="#" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="description" class="control-label">Desc</label>
                        <input type="text" class="form-control" id="idescription" name="description">
                    </div>
                    <div class="form-group">
                        <label for="cost_price" class="control-label">CostPrice</label>
                        <input type="text" class="form-control" id="icost_price" name="cost_price">
                    </div>
                    <div class="form-group">
                        <label for="sell_price" class="control-label">SellPrice</label>
                        <input type="text" class="form-control " id="isell_price" name="sell_price">
                    </div>
                    <div class="form-group">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" class="form-control " id="ititle" name="title">
                    </div>
                    <div class="form-group">
                        <label for="imagePath" class="control-label">Item Image</label>
                        <input type="file" class="form-control" id="imagePath" name="imagePath">
                    </div>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                <button id="itemSubmit" type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editItemModal" role="dialog" style="display:none">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="updateformItem" action="#" >
                <input type="hidden">
                <div class="form-group">
                    <label for="eedescription" class="control-label">Description</label>
                    <input type="text" class="form-control" id="eedescription" name="description" >
                </div>
                
                <div class="form-group">
                    <label for="eecost_price" class="control-label">Cost Price</label>
                    <input type="text" class="form-control" id="eecost_price" name="cost_price">
                </div>
                
                <div class="form-group">
                    <label for="eesell_price" class="control-label">Sell Price</label>
                    <input type="text" class="form-control " id="eesell_price" name="sell_price" >
                </div>
            
                <div class="form-group">
                    <label for="eetitle" class="control-label">Title</label>
                    <input type="text" class="form-control " id="eetitle" name="title" >
                </div>
            
                <div class="form-group"> 
                    <label for="eeimagePath" class="control-label">Image</label>
                    <input type="text" class="form-control" id="eeimagePath" name="img_path" >
                </div>
            </form>
        </div>
        <div class="modal-footer">
            
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            <button id="updatebtnItem" type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</div>
</div>
@endsection